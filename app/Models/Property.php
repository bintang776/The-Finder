<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'category_id', 'campus_id', 'name', 'slug',
        'description', 'address', 'latitude', 'longitude',
        'price_monthly', 'price_yearly', 'owner_name', 'owner_phone',
        'is_featured', 'is_promo', 'status', 'is_verified',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_promo' => 'boolean',
            'is_verified' => 'boolean',
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class)->orderBy('sort_order');
    }

    public function primaryImage()
    {
        return $this->hasOne(PropertyImage::class)->where('is_primary', true);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price_monthly, 0, ',', '.');
    }

    public function getFormattedYearlyPriceAttribute(): ?string
    {
        if (!$this->price_yearly) return null;
        return 'Rp ' . number_format($this->price_yearly, 0, ',', '.');
    }

    public function getWhatsappUrlAttribute(): string
    {
        $phone = preg_replace('/[^0-9]/', '', $this->owner_phone);
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }
        $message = urlencode("Halo, saya tertarik dengan {$this->name} yang ada di TheFinder. Apakah masih tersedia?");
        return "https://wa.me/{$phone}?text={$message}";
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopePromo($query)
    {
        return $query->where('is_promo', true);
    }
}
