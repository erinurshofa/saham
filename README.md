# 📈 Aplikasi Analisis Saham - Indonesia Stock Insight

Selamat datang di **Aplikasi Analisis Saham**, sebuah proyek open-source berbasis PHP (Yii2) yang dirancang untuk memberikan wawasan mendalam dan real-time terhadap pergerakan saham di Indonesia. Aplikasi ini membantu pengguna mulai dari pemula hingga trader aktif untuk membuat keputusan investasi yang cerdas berdasarkan data teknikal, historis, dan fundamental.

---

## 🚀 Fitur Utama

- 📊 **Dashboard Saham**  
  Ringkasan performa pasar, saham populer, grafik harga, dan tren terkini.

- 🧾 **Data Harga Harian (OHLC)**  
  Tabel dan grafik candlestick dari data harian (`open`, `high`, `low`, `close`, `volume`).

- 🧮 **Moving Average Analysis**  
  MA7, MA14, MA21, MA100, MA200 — bantu deteksi tren naik/turun saham.

- 💡 **Prospek Saham Otomatis**  
  Indikator `prospek_5`, `prospek_10`, dan `prospek_10_5` untuk analisis trend potensial.

- 💰 **Dividen Tracker**  
  Pantau dividen terbaru dari saham beserta tanggal dan jumlahnya.

- ⚡ **Scalping Tools**  
  Fitur khusus untuk trader harian dengan sinyal `TP`, `SL`, dan `UP`.

- 🔍 **Pencarian & Filter Cerdas**  
  Temukan saham undervalue, growth stock, dan volume tinggi dalam sekali klik.

---

---

## 🏗️ Teknologi yang Digunakan

- **Backend**: [Yii2 Framework](https://www.yiiframework.com/)
- **Database**: MySQL 8
- **Frontend**: Admin LTE, Chart.js
- **Tools**: HeidiSQL, Git, GitHub
- Alasan pilihan:
  - Yii2 karena cocok untuk aplikasi birokrasi (RBAC kuat, Active Record aman)
  - AdminLTE karena cepat dan familiar untuk admin interface

---

## 🗃️ Struktur Database

Database `saham` terdiri dari tabel utama berikut:

- `saham`: Data utama saham, moving average, sektor, market cap, dll.
- `harga_harian`: Harga harian dengan OHLC dan volume
- `dividen`: Riwayat pembagian dividen
- `saham_scalping`: Analisis teknikal untuk trading harian

> Lihat folder `sql/` untuk file struktur dan contoh isi database.

---

## 🛠️ Cara Menjalankan

```bash
git clone https://github.com/username/saham-app.git
cd saham-app
composer install

# 🧠 Catatan Pribadi Project Ini

## 🗓️ Tanggal Mulai
2025-06-13




## 💡 Keputusan Kritis (Why-Logs)
> Gunakan setiap kali kamu mengambil keputusan teknis penting

- **2025-05-08**: Tidak pakai `??` operator karena server pakai PHP 7.0.
- **2025-05-08**: Ganti field `user_id` jadi `account_id` agar konsisten dengan struktur RBAC yang dipakai DINSOS.
- **2025-05-09**: Tidak pakai Bootstrap 5 karena konflik dengan Kartik GridView (masih Bootstrap 4).

---

## 🔄 Alur Singkat Aplikasi (Flow)
1. User login via halaman `/site/login`
2. Role dicek via RBAC (Yii2 authManager)
3. User masuk ke dashboard berdasarkan `role_id`
4. Proses izin input melalui form `/izin/create`
5. Data divalidasi lalu dikirim via API ke endpoint eksternal DPMPTSP

---

## 🧪 Test Manual
> Catat hasil uji coba biar nggak ulang dari awal

- Login sebagai admin: ✅
- Input form saham dengan file dokumen kosong: ❌ (error karena field wajib belum dicek)
- Export Excel laporan bulanan: ✅

---

## 🛠️ TODO Pribadi
- [ ] Tambah filter pencarian di halaman index
- [ ] Buat modul notifikasi untuk user

