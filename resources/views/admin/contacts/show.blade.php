@extends('layouts.admin')
@section('title', 'Detail Pesan')
@section('content')
<div class="admin-header"><h1>📬 Detail Pesan</h1><a href="{{ route('admin.contacts.index') }}" class="btn btn-outline btn-sm">← Kembali</a></div>
<div class="sidebar-card" style="background: var(--bg-card); max-width: 600px;">
    <table style="width: 100%; font-size: 0.9rem;">
        <tr><td style="color: var(--text-muted); padding: 8px 0; width: 140px;">Nama</td><td style="padding: 8px 0;">{{ $contact->name }}</td></tr>
        <tr><td style="color: var(--text-muted); padding: 8px 0;">Telepon</td><td style="padding: 8px 0;">{{ $contact->phone }}</td></tr>
        <tr><td style="color: var(--text-muted); padding: 8px 0;">Email</td><td style="padding: 8px 0;">{{ $contact->email ?? '-' }}</td></tr>
        <tr><td style="color: var(--text-muted); padding: 8px 0;">Nama Kost</td><td style="padding: 8px 0; font-weight: 600;">{{ $contact->kost_name }}</td></tr>
        <tr><td style="color: var(--text-muted); padding: 8px 0;">Alamat Kost</td><td style="padding: 8px 0;">{{ $contact->kost_address }}</td></tr>
        <tr><td style="color: var(--text-muted); padding: 8px 0;">Pesan</td><td style="padding: 8px 0;">{{ $contact->message }}</td></tr>
        <tr><td style="color: var(--text-muted); padding: 8px 0;">Dikirim</td><td style="padding: 8px 0;">{{ $contact->created_at->format('d M Y H:i') }}</td></tr>
    </table>
</div>
@endsection
