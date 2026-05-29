# 🕌 Program Masjid

## 📖 Deskripsi Program

Program Masjid adalah aplikasi berbasis web yang dirancang untuk membantu proses pendataan dan pengelolaan informasi masjid secara terpusat dan terstruktur. Sistem ini dibuat untuk menggantikan proses pencatatan manual sehingga data dapat disimpan, dikelola, dan disajikan dengan lebih cepat, akurat, dan efisien.

---

## ✨ Fitur Utama

- 🗺️ Manajemen Data Daerah
- 🕌 Manajemen Data Masjid
- 📚 Manajemen Data Kelas
- 👨‍🎓 Manajemen Data Murid
- 👨‍🏫 Manajemen Data Pengajar
- 🖼️ Upload Foto Murid
- 👤 Manajemen User dan Hak Akses
- 📊 Dashboard Statistik
- 📄 Export Laporan PDF
- 🔐 Autentikasi Login Berbasis Username

---

## 🛠️ Teknologi yang Digunakan

### ⚙️ Backend

- PHP 8.x
- Laravel 12/13

### 🎨 Frontend

- Blade Template Engine
- Tailwind CSS
- JavaScript

### 🗄️ Database

- MySQL / MariaDB

### 📦 Library Tambahan

- Laravel Breeze
- DomPDF

---

## 🔄 How It Works

### 🔑 1. Login Sistem

Pengguna melakukan login menggunakan username dan password yang telah terdaftar pada sistem.

### 👥 2. Manajemen Hak Akses

#### 👑 Admin

- Mengelola seluruh data sistem
- Melihat dashboard keseluruhan
- Mengelola user

#### 🙋 User

- Mengelola data masjid yang menjadi tanggung jawabnya
- Melihat dashboard masjid sendiri

---

## 🗂️ Entity Relationship Diagram (ERD)

### 📌 Diagram ERD

```markdown
![ERD Program Masjid](docs/erd.png)
```

### 🔗 Struktur Relasi

```text
Daerah
│
└── Masjid
    │
    ├── User
    │
    └── Kelas
        │
        ├── Murid
        │
        └── Pengajar
```

---

## 📁 Struktur Folder

```text
app/
├── Http/
├── Models/

database/
├── migrations/

resources/
├── views/

routes/

storage/
```

### 📂 Penjelasan Folder

| Folder         | Fungsi                        |
| -------------- | ----------------------------- |
| 📁 app         | Logika utama aplikasi         |
| 🎮 Controllers | Mengatur alur proses aplikasi |
| 🗃️ Models      | Interaksi dengan database     |
| 📝 Views       | Tampilan aplikasi             |
| 🛣️ Routes      | Routing aplikasi              |
| 💾 Storage     | Penyimpanan file upload       |
| 📦 Vendor      | Dependency Composer           |

---

## 🚀 Cara Menjalankan Program

### 📥 Getting Started

Clone repository:

```bash
git clone https://github.com/username/program-masjid.git
```

Masuk ke folder project:

```bash
cd program-masjid
```

---

### ⚙️ Instalasi

#### 1️⃣ Install Dependency PHP

```bash
composer install
```

#### 2️⃣ Install Dependency Frontend

```bash
npm install
```

#### 3️⃣ Salin Environment

```bash
cp .env.example .env
```

#### 4️⃣ Generate Key

```bash
php artisan key:generate
```

#### 5️⃣ Konfigurasi Database

Edit file `.env`

```env
DB_CONNECTION=mysql
DB_DATABASE=program_masjid
DB_USERNAME=root
DB_PASSWORD=
```

#### 6️⃣ Jalankan Migration

```bash
php artisan migrate
```

#### 7️⃣ Buat Storage Link

```bash
php artisan storage:link
```

#### 8️⃣ Jalankan Program

```bash
composer run dev
```

---

## 📚 Penggunaan

### 👑 Admin

- Mengelola Daerah
- Mengelola Masjid
- Mengelola Kelas
- Mengelola Murid
- Mengelola Pengajar
- Mengelola User
- Export Laporan PDF

### 🙋 User

- Mengelola Kelas
- Mengelola Murid
- Mengelola Pengajar
- Melihat Dashboard Masjid

---

## 👨‍💻 Contributor

### Developer

**Putra Sangaji**

### Framework

⚡ Laravel

### Frontend

🎨 Blade Template Engine & Tailwind CSS

### Database

🗄️ MySQL

---

## 📌 Version

**Program Masjid v1.0**
