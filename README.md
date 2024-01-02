# Aplikasi Keuangan

## Setup Project

jalankan <i>artisan command</i> untuk instal kebutuhan aplikasi

```javascript
composer install
```

copy file <i>.env.example</i> dengan perintah

```javascript
cp env.example .env
```

generate key untuk env dengan perintah

```javascript
php artisan key:generate
```

buat database baru dengan nama <i>keuangan</i> atau sesuaikan dengan isi file env,
jalankan <i>artisan command</i> untuk eksekusi database default kategori, role, permission dan user

```javascript
php artisan migrate --seed
```

## User Default

```javascript
Akun Admin
email: admin@gmail.com
password: password

Akun Operator
email: operator@gmail.com
password: password
```
