# BIBLIOTECA

## Apa itu Biblioteca?
Biblioteca merupakan sebuah platform e-commerce berbasis web yang dirancang untuk pembelian buku dengan berbagai macam kategori. User bisa melakukan registrasi untuk melihat detail dan melakukan pembelian produk. Silahkan kunjungi website untuk melihat fitur lebih detail:
https://biblioteca-secprog.bncc.net/

## Pengembangan
Website ini menggunakan laravel sebagai framework untuk pengembangan. Sehingga untuk menjalankan website secara lokal, silakan mengikuti langkah-langkah berikut:
1. Instalasi program-program yang diperlukan:
- IDE (Visual Studio Code)
- XAMPP
- Composer
- NPM v21
2. Clone repository ini
3. Jalankan Apache dan MySQL pada XAMPP
4. Buatkan .env dengan membuat copy-an dari .env.example
5. Buatkan database di dalam PhpMyAdmin sesuai dengan nama yang tertera pada .env
6. Jalankan command sebagai berikut:
__Powershell__
- composer install
- php artisan key:generate
- php artisan migrate:fresh --seed
- php artisan storage:link
- php artisan serve

__Command Prompt__
- npm install
- npm run build

7. Extract file Foto.zip yang terdapat pada public storage dan keluarkan folder users & products ke public storage
8. Website sudah bisa dijalankan secara lokal 
