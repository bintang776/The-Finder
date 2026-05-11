<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Campus;
use App\Models\Facility;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // === Admin User ===
        $admin = User::create([
            'name' => 'Admin TheFinder',
            'email' => 'admin@thefinder.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // === Categories ===
        $categories = [
            ['name' => 'Kost Putra', 'slug' => 'kost-putra', 'icon' => '👨', 'description' => 'Kost khusus untuk laki-laki dengan lingkungan yang aman dan nyaman.'],
            ['name' => 'Kost Putri', 'slug' => 'kost-putri', 'icon' => '👩', 'description' => 'Kost khusus untuk perempuan dengan keamanan ekstra.'],
            ['name' => 'Kost Campur', 'slug' => 'kost-campur', 'icon' => '👫', 'description' => 'Kost untuk laki-laki dan perempuan.'],
            ['name' => 'Kontrakan', 'slug' => 'kontrakan', 'icon' => '🏠', 'description' => 'Rumah kontrakan untuk keluarga atau bersama teman.'],
            ['name' => 'Rumah Sewa', 'slug' => 'rumah-sewa', 'icon' => '🏡', 'description' => 'Rumah sewa dengan fasilitas lengkap.'],
        ];
        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // === Campuses ===
        $campuses = [
            ['name' => 'UPN Veteran Jawa Timur', 'slug' => 'upn-veteran', 'address' => 'Jl. Rungkut Madya No.1, Surabaya', 'latitude' => -7.3149, 'longitude' => 112.7808],
            ['name' => 'Universitas Airlangga (UNAIR)', 'slug' => 'unair', 'address' => 'Jl. Airlangga No.4-6, Surabaya', 'latitude' => -7.2697, 'longitude' => 112.7602],
            ['name' => 'Institut Teknologi Sepuluh Nopember (ITS)', 'slug' => 'its', 'address' => 'Jl. Raya ITS, Keputih, Surabaya', 'latitude' => -7.2819, 'longitude' => 112.7953],
            ['name' => 'Universitas Negeri Surabaya (UNESA)', 'slug' => 'unesa', 'address' => 'Jl. Lidah Wetan, Surabaya', 'latitude' => -7.3191, 'longitude' => 112.6828],
            ['name' => 'Universitas Surabaya (UBAYA)', 'slug' => 'ubaya', 'address' => 'Jl. Raya Kalirungkut, Surabaya', 'latitude' => -7.3226, 'longitude' => 112.7785],
            ['name' => 'UNITOMO', 'slug' => 'unitomo', 'address' => 'Jl. Semolowaru No.84, Surabaya', 'latitude' => -7.3002, 'longitude' => 112.7716],
            ['name' => 'Universitas Ciputra', 'slug' => 'universitas-ciputra', 'address' => 'UC Town, CitraLand, Surabaya', 'latitude' => -7.3182, 'longitude' => 112.6312],
            ['name' => 'Universitas Petra', 'slug' => 'petra', 'address' => 'Jl. Siwalankerto No.121-131, Surabaya', 'latitude' => -7.3327, 'longitude' => 112.7346],
        ];
        foreach ($campuses as $campus) {
            Campus::create($campus);
        }

        // === Facilities ===
        $facilities = [
            ['name' => 'AC', 'icon' => '❄️'],
            ['name' => 'WiFi', 'icon' => '📶'],
            ['name' => 'Kasur', 'icon' => '🛏️'],
            ['name' => 'Lemari', 'icon' => '🗄️'],
            ['name' => 'Kamar Mandi Dalam', 'icon' => '🚿'],
            ['name' => 'Parkir Motor', 'icon' => '🏍️'],
            ['name' => 'Parkir Mobil', 'icon' => '🚗'],
            ['name' => 'Dapur Bersama', 'icon' => '🍳'],
            ['name' => 'Mesin Cuci', 'icon' => '🧺'],
            ['name' => 'TV', 'icon' => '📺'],
            ['name' => 'Meja Belajar', 'icon' => '📚'],
            ['name' => 'Water Heater', 'icon' => '🔥'],
            ['name' => 'CCTV', 'icon' => '📹'],
            ['name' => 'Satpam', 'icon' => '💂'],
        ];
        foreach ($facilities as $fac) {
            Facility::create($fac);
        }

        // === Properties ===
        $properties = [
            [
                'name' => 'Kost Putri Sakura Residence',
                'category_id' => 2, // Kost Putri
                'campus_id' => 1,   // UPN
                'description' => 'Kost putri eksklusif dekat UPN Veteran dengan suasana asri dan nyaman. Lingkungan aman dengan akses 24 jam menggunakan kartu. Cocok untuk mahasiswi yang mencari hunian tenang dengan fasilitas lengkap. Tersedia laundry dan cleaning service mingguan.',
                'address' => 'Jl. Rungkut Asri Utara No.15, Surabaya',
                'latitude' => -7.3168,
                'longitude' => 112.7790,
                'price_monthly' => 1500000,
                'price_yearly' => 15000000,
                'owner_name' => 'Ibu Sari',
                'owner_phone' => '081234567890',
                'is_featured' => true,
                'is_promo' => false,
                'status' => 'available',
                'facilities' => [1, 2, 3, 4, 5, 6, 8, 11, 13, 14], // AC, WiFi, Kasur, Lemari, KM Dalam, Parkir Motor, Dapur, Meja, CCTV, Satpam
            ],
            [
                'name' => 'Kost Putra Graha Rungkut',
                'category_id' => 1, // Kost Putra
                'campus_id' => 1,   // UPN
                'description' => 'Kost putra strategis hanya 5 menit jalan kaki ke kampus UPN. Kamar luas dengan ventilasi baik. Area parkir luas untuk motor dan mobil. Tersedia WiFi kencang cocok untuk gaming dan streaming.',
                'address' => 'Jl. Rungkut Madya No.88, Surabaya',
                'latitude' => -7.3155,
                'longitude' => 112.7815,
                'price_monthly' => 1200000,
                'price_yearly' => 12000000,
                'owner_name' => 'Pak Budi',
                'owner_phone' => '081345678901',
                'is_featured' => true,
                'is_promo' => true,
                'status' => 'available',
                'facilities' => [1, 2, 3, 4, 5, 6, 7, 8, 11],
            ],
            [
                'name' => 'Kost Campur Harmoni Living',
                'category_id' => 3, // Kost Campur
                'campus_id' => 3,   // ITS
                'description' => 'Kost campur modern dengan konsep co-living. Terletak strategis dekat ITS dan pusat kuliner Keputih. Dilengkapi ruang komunal untuk belajar bersama dan area rooftop untuk bersantai.',
                'address' => 'Jl. Keputih Tegal Timur No.42, Surabaya',
                'latitude' => -7.2850,
                'longitude' => 112.7920,
                'price_monthly' => 1800000,
                'price_yearly' => 18000000,
                'owner_name' => 'Pak Ahmad',
                'owner_phone' => '082456789012',
                'is_featured' => true,
                'is_promo' => false,
                'status' => 'available',
                'facilities' => [1, 2, 3, 4, 5, 6, 9, 10, 11, 12, 13],
            ],
            [
                'name' => 'Kontrakan Keluarga Sejahtera',
                'category_id' => 4, // Kontrakan
                'campus_id' => 2,   // UNAIR
                'description' => 'Rumah kontrakan 2 kamar tidur dekat kampus UNAIR. Cocok untuk pasangan atau keluarga kecil. Halaman luas dan lingkungan perumahan yang tenang. Sudah termasuk PAM dan listrik token.',
                'address' => 'Jl. Dharmawangsa No.22, Surabaya',
                'latitude' => -7.2720,
                'longitude' => 112.7580,
                'price_monthly' => 3500000,
                'price_yearly' => 36000000,
                'owner_name' => 'Pak Susanto',
                'owner_phone' => '083567890123',
                'is_featured' => false,
                'is_promo' => true,
                'status' => 'available',
                'facilities' => [2, 5, 6, 7, 8],
            ],
            [
                'name' => 'Kost Putri Melati Indah',
                'category_id' => 2, // Kost Putri
                'campus_id' => 2,   // UNAIR
                'description' => 'Kost putri dengan taman yang indah dan suasana homey. Sangat cocok untuk mahasiswi UNAIR. Pemilik yang ramah dan selalu siap membantu. Free laundry 3 kg per minggu!',
                'address' => 'Jl. Mulyorejo Utara No.7, Surabaya',
                'latitude' => -7.2688,
                'longitude' => 112.7640,
                'price_monthly' => 1300000,
                'price_yearly' => 13500000,
                'owner_name' => 'Ibu Melati',
                'owner_phone' => '084678901234',
                'is_featured' => false,
                'is_promo' => true,
                'status' => 'available',
                'facilities' => [1, 2, 3, 4, 5, 6, 8, 9, 11, 13],
            ],
            [
                'name' => 'Kost Putra ITS Techno House',
                'category_id' => 1, // Kost Putra
                'campus_id' => 3,   // ITS
                'description' => 'Kost putra premium dekat ITS dengan konsep modern industrial. Dilengkapi meja kerja besar cocok untuk mahasiswa teknik. Internet fiber optic 100 Mbps. Lingkungan produktif.',
                'address' => 'Jl. Teknik Kimia No.12, Keputih, Surabaya',
                'latitude' => -7.2835,
                'longitude' => 112.7900,
                'price_monthly' => 2000000,
                'price_yearly' => 20000000,
                'owner_name' => 'Pak Roni',
                'owner_phone' => '085789012345',
                'is_featured' => true,
                'is_promo' => false,
                'status' => 'available',
                'facilities' => [1, 2, 3, 4, 5, 6, 10, 11, 12, 13, 14],
            ],
            [
                'name' => 'Rumah Sewa Villa Unesa',
                'category_id' => 5, // Rumah Sewa
                'campus_id' => 4,   // UNESA
                'description' => 'Rumah sewa fully furnished dekat kampus UNESA Lidah Wetan. 3 kamar tidur, 2 kamar mandi. Cocok untuk dosen muda atau keluarga. Lingkungan perumahan elit dengan keamanan 24 jam.',
                'address' => 'Perum Lidah Kulon Indah Blok A5, Surabaya',
                'latitude' => -7.3200,
                'longitude' => 112.6850,
                'price_monthly' => 5000000,
                'price_yearly' => 50000000,
                'owner_name' => 'Ibu Diana',
                'owner_phone' => '086890123456',
                'is_featured' => false,
                'is_promo' => false,
                'status' => 'available',
                'facilities' => [1, 2, 5, 7, 8, 10, 12],
            ],
            [
                'name' => 'Kost Campur Semolowaru Residence',
                'category_id' => 3, // Kost Campur
                'campus_id' => 6,   // UNITOMO
                'description' => 'Kost campur nyaman dekat UNITOMO. Akses mudah ke mall dan pusat kota. Tersedia beberapa tipe kamar dari standar hingga VIP. Pengelolaan profesional.',
                'address' => 'Jl. Semolowaru Selatan V No.3, Surabaya',
                'latitude' => -7.3010,
                'longitude' => 112.7700,
                'price_monthly' => 1100000,
                'price_yearly' => 11000000,
                'owner_name' => 'Pak Hendra',
                'owner_phone' => '087901234567',
                'is_featured' => false,
                'is_promo' => true,
                'status' => 'available',
                'facilities' => [2, 3, 4, 5, 6, 8, 13],
            ],
            [
                'name' => 'Kost Putri Ciputra Garden',
                'category_id' => 2, // Kost Putri
                'campus_id' => 7,   // Ciputra
                'description' => 'Kost putri premium di kawasan CitraLand. Interior modern minimalis, kamar luas, dan fasilitas lengkap. Dekat dengan Universitas Ciputra dan mall Ciputra World.',
                'address' => 'Jl. CitraLand CBD Boulevard No.20, Surabaya',
                'latitude' => -7.3190,
                'longitude' => 112.6330,
                'price_monthly' => 2500000,
                'price_yearly' => 27000000,
                'owner_name' => 'Ibu Lina',
                'owner_phone' => '088012345678',
                'is_featured' => true,
                'is_promo' => false,
                'status' => 'available',
                'facilities' => [1, 2, 3, 4, 5, 6, 7, 9, 10, 11, 12, 13, 14],
            ],
            [
                'name' => 'Kost Putra Petra Square',
                'category_id' => 1, // Kost Putra
                'campus_id' => 8,   // Petra
                'description' => 'Kost putra terjangkau dekat kampus Petra. Lokasi strategis dekat warung makan dan minimarket. Kamar bersih dan terawat. Cocok untuk mahasiswa hemat yang tetap ingin nyaman.',
                'address' => 'Jl. Siwalankerto Permai No.16, Surabaya',
                'latitude' => -7.3340,
                'longitude' => 112.7360,
                'price_monthly' => 900000,
                'price_yearly' => 9500000,
                'owner_name' => 'Pak Joko',
                'owner_phone' => '089123456789',
                'is_featured' => false,
                'is_promo' => true,
                'status' => 'available',
                'facilities' => [2, 3, 4, 5, 6, 8],
            ],
            [
                'name' => 'Kost Campur Green Valley',
                'category_id' => 3, // Kost Campur
                'campus_id' => 5,   // UBAYA
                'description' => 'Kost campur bernuansa hijau dekat UBAYA. Taman yang asri membuat suasana sejuk dan nyaman. Tersedia gazebo untuk belajar outdoor. Bonus sarapan setiap pagi!',
                'address' => 'Jl. Raya Kalirungkut No.55, Surabaya',
                'latitude' => -7.3230,
                'longitude' => 112.7795,
                'price_monthly' => 1600000,
                'price_yearly' => 16500000,
                'owner_name' => 'Ibu Ratna',
                'owner_phone' => '081112233445',
                'is_featured' => true,
                'is_promo' => false,
                'status' => 'available',
                'facilities' => [1, 2, 3, 4, 5, 6, 8, 9, 11, 13],
            ],
            [
                'name' => 'Kontrakan Murah Rungkut',
                'category_id' => 4, // Kontrakan
                'campus_id' => 1,   // UPN
                'description' => 'Kontrakan murah dan strategis dekat UPN. 2 kamar tidur dengan halaman depan. Cocok untuk 2-3 mahasiswa yang ingin tinggal bersama. Harga bersahabat!',
                'address' => 'Jl. Rungkut Lor Gang III No.8, Surabaya',
                'latitude' => -7.3175,
                'longitude' => 112.7830,
                'price_monthly' => 2000000,
                'price_yearly' => 21000000,
                'owner_name' => 'Pak Wahyu',
                'owner_phone' => '082223344556',
                'is_featured' => false,
                'is_promo' => true,
                'status' => 'available',
                'facilities' => [2, 5, 6, 8],
            ],
        ];

        // Sample image URLs using picsum for variety
        $imageDescriptions = [
            'Tampak depan bangunan',
            'Kamar tidur',
            'Kamar mandi',
            'Area parkir',
            'Dapur bersama',
        ];

        foreach ($properties as $propData) {
            $facilityIds = $propData['facilities'];
            unset($propData['facilities']);

            $propData['user_id'] = $admin->id;
            $propData['slug'] = Str::slug($propData['name']);

            $property = Property::create($propData);
            $property->facilities()->attach($facilityIds);

            // Create placeholder images for each property
            for ($i = 0; $i < 5; $i++) {
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => 'https://picsum.photos/seed/' . $property->id . $i . '/800/600',
                    'caption' => $imageDescriptions[$i],
                    'is_primary' => $i === 0,
                    'sort_order' => $i,
                ]);
            }
        }

        // === Articles ===
        $articles = [
            [
                'title' => '5 Tips Memilih Kost Biar Nggak Menyesal',
                'slug' => '5-tips-memilih-kost',
                'excerpt' => 'Memilih kost adalah keputusan penting bagi mahasiswa. Jangan sampai salah pilih! Berikut 5 tips jitu yang wajib kamu perhatikan sebelum deal.',
                'body' => '<h2>1. Survei Lokasi Langsung</h2><p>Jangan cuma lihat foto! Datang langsung ke lokasi untuk cek kondisi sekitar. Perhatikan akses jalan, keamanan lingkungan, dan jarak ke kampus. Kalau bisa, datang malam hari juga untuk merasakan suasananya.</p><h2>2. Cek Fasilitas dengan Teliti</h2><p>Pastikan semua fasilitas yang dijanjikan benar-benar ada dan berfungsi. Coba nyalakan AC, tes WiFi-nya kencang atau tidak, dan cek tekanan air di kamar mandi. Jangan malu untuk bertanya detail!</p><h2>3. Tanya Peraturan Kost</h2><p>Setiap kost punya peraturan berbeda. Ada yang bebas jam malam, ada yang strict. Pastikan peraturannya sesuai dengan gaya hidupmu. Juga tanyakan tentang tamu, apakah boleh menginap atau tidak.</p><h2>4. Perhatikan Kontrak dan Pembayaran</h2><p>Baca kontrak dengan teliti sebelum tanda tangan. Perhatikan ketentuan deposit, pengembalian uang, dan denda keterlambatan. Negosiasi harga kalau perlu, terutama untuk pembayaran tahunan.</p><h2>5. Kenali Pemilik Kost</h2><p>Pemilik kost yang baik dan responsif adalah bonus besar. Mereka yang tanggap saat ada masalah (AC rusak, air mati, dll) akan membuat hidupmu lebih nyaman. Coba ngobrol santai dulu sebelum memutuskan.</p>',
                'cover_image' => 'https://picsum.photos/seed/article1/1200/600',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Daftar Tempat Makan Murah Anak Kos di Surabaya',
                'slug' => 'tempat-makan-murah-anak-kos-surabaya',
                'excerpt' => 'Budget makan menipis? Tenang! Surabaya punya segudang tempat makan murah meriah yang ramah di kantong mahasiswa. Simak rekomendasinya!',
                'body' => '<h2>Area Keputih (Dekat ITS)</h2><p>Keputih adalah surganya mahasiswa ITS yang cari makan murah. Deretan warung di sepanjang Jl. Keputih menyediakan nasi campur, pecel, dan rawon mulai dari Rp 10.000 saja. Favorit: Warung Bu Kris dan Nasi Pecel Mbok Darmi.</p><h2>Area Mulyorejo (Dekat UNAIR)</h2><p>Kantin UNAIR C terkenal dengan harganya yang bersahabat. Di luar kampus, Jl. Mulyorejo juga banyak warung tenda yang buka sampai malam. Wajib coba: Mie Ayam Pak Kumis dan Soto Lamongan Cak Har.</p><h2>Area Rungkut (Dekat UPN)</h2><p>Mahasiswa UPN bisa mampir ke deretan warung di Rungkut Madya. Nasi Goreng Gila Mas Prio dengan porsi jumbo hanya Rp 15.000! Ada juga Ayam Geprek Bensu yang selalu rame.</p><h2>Tips Hemat Makan Anak Kos</h2><ul><li>Masak sendiri di dapur bersama kost (lebih hemat 50%!)</li><li>Pakai promo GoFood/GrabFood saat ada diskon</li><li>Beli lauk di pasar tradisional untuk stok seminggu</li><li>Ajak teman patungan masak bareng</li></ul>',
                'cover_image' => 'https://picsum.photos/seed/article2/1200/600',
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Checklist Barang Wajib Bawa Saat Pertama Kali Ngekos',
                'slug' => 'checklist-barang-wajib-ngekos',
                'excerpt' => 'Pertama kali ngekos? Jangan panik! Berikut daftar barang yang wajib kamu bawa agar kehidupan ngekos-mu lancar dari hari pertama.',
                'body' => '<h2>Kebutuhan Tidur</h2><ul><li>Sprei dan sarung bantal (2 set)</li><li>Selimut atau bed cover</li><li>Bantal dan guling</li></ul><h2>Kebutuhan Mandi</h2><ul><li>Handuk (2 buah)</li><li>Peralatan mandi (sabun, shampoo, sikat gigi)</li><li>Sandal kamar mandi</li></ul><h2>Kebutuhan Belajar</h2><ul><li>Laptop dan charger</li><li>Lampu belajar portable</li><li>Alat tulis</li><li>Extension cord / colokan listrik</li></ul><h2>Kebutuhan Dapur</h2><ul><li>Gelas dan piring (masing-masing 2)</li><li>Sendok, garpu, pisau</li><li>Rice cooker mini</li><li>Galon air minum</li></ul><h2>Lain-lain</h2><ul><li>Obat-obatan pribadi (P3K)</li><li>Gembok cadangan</li><li>Hanger baju (minimal 10)</li><li>Cermin kecil</li><li>Ember dan gayung (kalau tidak ada shower)</li></ul>',
                'cover_image' => 'https://picsum.photos/seed/article3/1200/600',
                'is_published' => true,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Cara Menghemat Listrik di Kost Agar Tagihan Tidak Membengkak',
                'slug' => 'cara-hemat-listrik-kost',
                'excerpt' => 'Tagihan listrik kost sering bikin dompet jebol? Yuk pelajari cara-cara simpel menghemat listrik tanpa mengurangi kenyamanan!',
                'body' => '<h2>Gunakan AC dengan Bijak</h2><p>AC adalah penyedot listrik terbesar. Set suhu di 24-26°C dan gunakan timer agar AC mati otomatis saat kamu tidur pulas. Bersihkan filter AC secara rutin agar kinerjanya optimal.</p><h2>Manfaatkan Cahaya Alami</h2><p>Buka jendela dan tirai di siang hari. Cahaya matahari gratis dan baik untuk kesehatan! Gunakan lampu LED yang hemat energi untuk malam hari.</p><h2>Cabut Charger yang Tidak Dipakai</h2><p>Charger HP, laptop, dan perangkat lain yang tetap terpasang di colokan tetap menyedot listrik meskipun tidak mengisi daya. Biasakan cabut setelah selesai.</p><h2>Bijak Menggunakan Peralatan Elektronik</h2><ul><li>Matikan TV saat tidak ditonton</li><li>Jangan biarkan laptop sleep mode berjam-jam</li><li>Gunakan rice cooker hanya saat masak, jangan untuk menghangatkan</li><li>Setrika baju sekaligus banyak, jangan satu-satu</li></ul>',
                'cover_image' => 'https://picsum.photos/seed/article4/1200/600',
                'is_published' => true,
                'published_at' => now(),
            ],
        ];

        foreach ($articles as $article) {
            $article['user_id'] = $admin->id;
            Article::create($article);
        }
    }
}
