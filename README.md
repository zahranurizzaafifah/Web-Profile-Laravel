# Web Profile Zahra

Proyek web profile pribadi berbasis Laravel untuk Zahra Nurizza Afifah.

## Fitur
- Landing page dinamis
- Halaman tentang diri
- Portofolio
- Detail contact
- Karakter 3D di landing page
- Badge AI di pojok
- CRUD admin untuk portfolio dan contact

## Setup Lokal

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Jika memakai Windows PowerShell:

```powershell
Copy-Item .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## URL Penting
- Halaman utama: `/`
- Admin portfolio: `/admin/portfolios`
- Admin contact: `/admin/contact`

## Deploy Singkat
1. Push proyek ke GitHub.
2. Set environment production di server.
3. Jalankan `composer install --no-dev`.
4. Jalankan `php artisan migrate --seed`.
5. Jalankan `php artisan config:cache` dan `php artisan route:cache`.
6. Arahkan web server ke folder `public`.

## GitHub Repo

Kalau ingin membuat repo GitHub dan push dari lokal, pakai langkah ini:

```bash
git add .
git commit -m "Initial web profile Zahra"
git branch -M main
git remote add origin https://github.com/zahranurizzaafifah/Web-Profile-Laravel.git
git push -u origin main
```

Jika repo GitHub sudah dibuat dengan nama berbeda, cukup ganti `USERNAME` dan `web-profile-zahra` dengan akun dan nama repo kamu.
Repo target yang dipakai: `https://github.com/zahranurizzaafifah/Web-Profile-Laravel.git`.

## Checklist Deploy
- Buat repository di GitHub.
- Pastikan `.env` production terisi benar.
- Jalankan `composer install --no-dev` di server.
- Jalankan `php artisan migrate --seed`.
- Jalankan `php artisan optimize`.
- Set document root ke folder `public`.

## Catatan
- Data awal Zahra sudah tersedia lewat seeder.
- Jika database belum siap, halaman publik tetap memakai fallback data.
