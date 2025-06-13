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

## 🏗️ Teknologi yang Digunakan

- **Backend**: [Yii2 Framework](https://www.yiiframework.com/)
- **Database**: MySQL 8
- **Frontend**: Admin LTE, Chart.js
- **Tools**: HeidiSQL, Git, GitHub

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
