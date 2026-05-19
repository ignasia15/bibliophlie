# Aplikasi Kasir Berbasis Web

Aplikasi kasir berbasis web yang mendukung dua level akses pengguna: admin dan user. Dibangun menggunakan Laravel dan Bootstrap sebagai project Uji Kompetensi Keahlian (UKK) SMK.

## Teknologi yang Digunakan
- Laravel
- Bootstrap
- MySQL

## Fitur
- Login dengan dua role: Admin dan User
- Manajemen data produk (CRUD)
- Proses transaksi kasir
- Manajemen data pengguna (khusus admin)

## Instalasi

1. Clone repository ini
```bash
git clone https://github.com/username/nama-repo.git
```

2. Masuk ke folder project dan install dependency
```bash
cd nama-repo
composer install
```

3. Salin file `.env.example` menjadi `.env` lalu sesuaikan konfigurasi database
```bash
cp .env.example .env
php artisan key:generate
```

4. Jalankan migrasi database
```bash
php artisan migrate
```

5. Jalankan aplikasi
```bash
php artisan serve
```

---
> Project ini dibuat sebagai bahan Uji Kompetensi Keahlian (UKK) SMK Rekayasa Perangkat Lunak.
