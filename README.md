<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## TASK-5-FULLSTACK
<p align="justify">
&emsp; <b>Restful API menggunakan Laravel Passport.</b>
Ini adalah suatu restful api yang dibuat untuk mengelola artikel dan kategori yang merupakan tugas akhir <b>“Investree Fullstack Developer Virtual Interenship”.</b> yang dimana tugas ini untuk memenuhi tugas akhir sebelum menyelesaikan program virtual interenship ini.

&emsp; Pada project kali ini kita menggunakan laravel passport untuk membantu mempermudah mengerjakan project ini. Pada project ini kita bisa menambah, ubah, hapus, search by id and search by name baik untuk artikel ataupun kategori. Pada Project ini terdapat file sql untuk db nya dan pastinya bisa di import ke database, untuk nama file nya <b>“laravel_rest_api.sql”.</b> dan disini saya menggunakan <b>Postman</b> untuk melakukan testing rest api yang sudah di buat.
</p>

<p align="justify">
<b><i>Note : Setelah clone atau download project jangan lupa lakukan tahapan ini :</i></b><br>
1 <b>Install Composer :</b> dengan cara ketikan 'composer install' pada cmd dimana lokasi folder anda disimpan.<br>
2 Copy Paste Terlebih dahulu file <b>'.env.example' dan ubah menjadi '.env'</b> setelah itu edit file tersebut di notepad atau yg lainnya sesuaikan pengaturan databasenya.<br>
3 Jalankan perintah <b>'php artisan key:generate'</b> pada cmd dimana lokasi folder anda disimpan.
</p>

Pada project kali ini kita menggunakan beberapa method yaitu :<br>
A.	<b>GET</b> : berfungsi untuk membaca data/resource dari REST server.<br>
B.	<b>POST</b> : berfungsi untuk membuat sebuah data/resource baru di REST server.<br>
C.	<b>PUT</b> : berfungsi untuk memperbaharui data/resource di REST server.<br>
D.	<b>DELETE</b> : berfungsi untuk menghapus data/resource dari REST serve.<br>

Kali ini akan melakukan beberapa hal pada project kali ini, untuk lebih jelasnya ada pada list di bawah : <br>
1.	Register <br>
2.	Login <br>
3.	Logout <br>
4.	GetAllData (List All) <br>
5.	GetDetailData (Show Detail) <br>
6.	Insert <br>
7.	Update <br>
8.	Delete <br>
9.	SearchBy-Name/Title <br>

Pada no 4 – 9 ini akan dilakukan pada Kategori dan Artikel, selain itu kita kita juga akan memperlihatkan Pagination, Check Data setelah insert dan Update, Check Data setelah di delete, Copy-paste access token agar bisa mengakses CRUD. Disini juga kita menggunakan <b>prefix versi dengan api/v1</b>.

<p align="justify">
<b><i>Untuk tutorial penggunaan rest api secara detail bisa dilihat pada :</i></b><br>
https://docs.google.com/document/d/1FrT33SkvQEujMGLSAElyr23QF2EIdqjm/edit?usp=sharing&ouid=104432453884649434611&rtpof=true&sd=true
</p>

> Terimakasih banyak sudah memberikan kesempatan untuk mengikuti “Investree Fullstack Developer Virtual Interenship”. <br>
> Pembuat : Daniar Nur Amin.


## Ini Beberapa Contoh Penggunaan Api :
<br>
<b>Login</b><br>
<b>POST : http://127.0.0.1:8000/api/login<b><br>

<img src="https://user-images.githubusercontent.com/81208093/179658708-8440addf-73d2-488d-b8d8-a1ee46a83924.PNG" width="600" height="350">
<br>
