# Sistem Pakar Diagnosis Penyakit Kucing

Project berbasis web untuk mendiagnosis penyakit pada kucing
menggunakan metode sistem pakar.

# Nama dan NIM
Bella imannuel - 20241020082
Puput Nur Annisa - 20241020044

## Fitur
- Diagnosis penyakit kucing
- Interface user-friendly
- Basis aturan (rule-based)

# Deskripsi Projek
Sistem Pakar Diagnosis Penyakit Kulit Kucing merupakan aplikasi berbasis website yang digunakan untuk membantu pengguna melakukan diagnosis awal penyakit kulit pada kucing berdasarkan gejala yang dipilih.

Sistem akan mencocokkan gejala yang dipilih pengguna dengan aturan penyakit yang tersimpan di dalam database. Hasil diagnosis ditampilkan dalam bentuk nama penyakit, tingkat keyakinan, deskripsi penyakit, saran penanganan, dan kemungkinan penyakit lainnya.

Aplikasi ini juga memiliki fitur riwayat diagnosis untuk menyimpan hasil diagnosis yang pernah dilakukan oleh pengguna, agar pengguna bisa melihat kembali hasil diagnosa sebelumnya.

# Metode yang Digunakan
- Forward Chaining : Sistem melihat gejala yang dipilih pengguna, lalu mencocokkannya dengan aturan penyakit.
- Certainty Factor : untuk menghitung tingkat keyakinan terhadap setiap penyakit berdasarkan bobot gejala yang telah ditentukan.
Hasil perhitungan ditampilkan dalam bentuk persentase tingkat keyakinan. Penyakit dengan tingkat keyakinan tertinggi akan ditampilkan sebagai hasil diagnosis utama.
- CF Negatif : digunakan untuk mengurangi nilai penyakit apabila ada gejala yang tidak sesuai dengan penyakit tersebut.

# Penyakit yang Dapat Didiagnosis

Sistem dapat melakukan diagnosis terhadap lima penyakit kulit kucing, yaitu:

1. Scabies atau kudis kucing
2. Dermatitis alergi
3. Jamur kulit atau Ringworm
4. Infeksi bakteri atau Pioderma
5. Kutu atau parasit kulit

# Teknologi yang Digunakan

- Laravel (PHP)
- MySQL
- Blade Template
- Tailwind CSS
- JavaScript
- Laragon
- HeidiSQL
- Visual Studio Code


## CARA MENJALANKAN WEBSITE
- masuk ke folder projek lalu buka terminal,
ketik :
cd website_sistem_pakar_kucing
composer install
npm install
ubah".env.example" -> ".env"
php artisan key:generate

- kemudian buat database MYSQL dengan nama :
sistem_pakar_kucing
- Kemudian atur bagian database pada file .env:
hapus semua tanda # di depan
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_pakar_kucing
DB_USERNAME=root
DB_PASSWORD=

- Selanjutnya, jalankan terminal dan ketik :
php artisan migrate
php artisan db:seed --class=SistemPakarSeeder
php artisan serve

- buka terminal baru
npm.cmd run dev

lalu Buka alamat yang muncul berikut pada browser :
http://127.0.0.1:8000

