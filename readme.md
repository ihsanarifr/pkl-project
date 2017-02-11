# Sistem Informasi Prakerin Siswa #
Sistem Informasi dibuat untuk siswa yang akan melaksanakan PKL (Praktik Kerja Lapang) di Institut Pertanian Bogor. Sistem Informasi ini dibawah naungan dan bimbingan Direktorat Integrasi Data dan Sistem Informasi Institut Pertanian Bogor.

## Kebutuhan Fungsional ##
* Pemrograman menggunakan bahasa PHP 
* Framework CodeIgniter (3.0.0)
* Database MySQL

## IDE yang digunakan ##
* SublimeText 3
* MySQL Workbench
* SourceTree
* XAMPP (bagi yang menggunakan Windows)

## Kontribusi & Kolaborasi ##
* [Ihsan Arif Rahman](http://github.com/ihsanarifr/)
* [Alin Nur](https://github.com/alinnural)
* [Andini Putri](https://github.com/andiniputri)
* [Siti Nurhikmah](https://github.com/SitiNurhikmah11)
* [Febrilia Syahputri](https://github.com/febriliasyahputri)
* [Melenia Dwi](https://github.com/meleniadwia22)
* [Vini Mulyani](https://github.com/vinimulyani)
* [Salsabila Latifah](https://github.com/salsabillalatifah00)
* [Dina Dewi Anjani](https://github.com/dinadewianjani)

## Cara mengambil `source code` menggunakan `command terminal`
1. Posisi folder sudah masuk ke dalam `htdocs` (windows) atau `/var/www/`
2. Lakukan cloning dengan perintah `git clone http://github.com/ihsanarifr/pkl-project/`
3. masuk ke folder pkl dengan perintah `cd pkl-project`
4. Buat branch baru jika akan melakukan perubahan dengan perintah `git checkout -b <namabranch>`

## Perintah `git` yang sering digunakan `command terminal`
1. Mengambil data pada repository `git pull origin master`
2. Mengambil data pada repository branch tertentu `git pull origin <namabranch>`
3. Melakukan stagging pada semua file perubahan `git add .`
4. Memberikan label pada stage `git commit -m 'namalabel'`
4. Melakukan kirim data ke repository `git push origin <namabranch>`
6. Menggabungkan beberapa file dari beda branch `git merge --no-ff origin <namabranch>`
7. Melakukan pindah branch `git checkout <namabranch>`

## Tanya Jawab
### Kenapa CSS tidak muncul dan error?
Jika CSS tidak terlihat dan tampilan hanya putih dan tulisan saja maka coba lihat pada file `applications/config/config.php` dan cari kode `$config['base_url'] = 'http://pkl.ipb.dev/'` lalu ganti dengan sintaks `$config['base_url'] = ''`.

### Mengapa koneksi timeout dan selalu seperti itu?
Jika mengalami koneksi lambat memang database yang digunakan `public` sehingga memang akan terlihat lambat jika koneksi pada komputer Anda lambat.

### Bagaimana agar datbase-nya mau disimpan di `local` komputer sendiri?
Bisa saja Anda tinggal melakukan eksekusi file yang sudah ada pada file `database/backup-20170130.sql` pada project ini. Tetapi datanya masih kosong hanya skemanya saja, sehingga Anda harus mengisi sendiri. Setelah itu ubah koneksinya pada file `application/config/database.php`