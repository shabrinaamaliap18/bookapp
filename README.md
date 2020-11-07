# bookapp

NAMA : SHABRINA AMALIA PUTRI 
NIM  : 185150701111008

  Pada projek praktikum kali ini saya dapat belajar tentang membuat suatu projek pada Lumen. Dimulai dengan melakukan instalasi projek lumen pada command prompt untuk membuat projek bernama bookapp. Setelah selesai maka projek tersebut dapat digunakan melalui visual studio code. Selain itu saya dapat belajar mengenai fungsi - fungsi yang terdapat pada laravel lumen pada projek ini yaitu bagaimana cara mengimplementasikan Controller, Migration, Seeder, Model dan tidak lupa cara menjalankan aplikasi Lumen nya.

  Adapun langkah - langkah saat membuat projek bookapp yaitu setelah selesai melakukan instalasi, selanjutnya membuat database pada mysql phpmyadmin dengan nama bookapp_lumen, tidak lupa untuk menjalankan xampp agar bisa mysql dijalankan. Setelah itu melakukan env setup pada file .env untuk menyesuaikannya seperti APP_KEY, nama database, dan password database jika ada. Untuk mendapatkan Key, kita melakukan langkah - langkah yang ada dalam modul 1 yaitu menyesuaikan str_random pada routes/web.php untuk mendapatkan karakter acak saat menjalankan server php -S localhost:8000 -t public pada terminal VS Code dengan url  localhost:8000/key. 
  
  Selanjutnya, mengaktifkan fitur Facade karena nanti kita menggunakan DB Facade dan Eloquent yang nanti bisa digunakan sebagai Object Relation Maping untuk database pada file app.php direktori bootstrap. Setelah itu kita membuat Migration yang berfungsi untuk membuat dan memodifikasi tabel yang ada pada basisdata. Dengan begitu, kita tidak perlu dibuat repot untuk menjalankan syntax SQL dari terminal atau editor khusus. Cukup dengan satu perintah, maka perubahan di basisdata dapat dilakukan tanpa harus menggangu tabel dan data yang sudah ada. Pada praktikum ini kita membuat tabel books dengan perintah php artisan make:migration create_books_table --create=books pada terminal. Setelah berhasil, kita menyesuakaian kolom tabel pada file migration dengan skema yang berisi id, title, description, author dan timestamps. Selanjutnya, menjalankan migrate menggunakan artisan dengan perintah php artisan migrate. Untuk memastikan tabel books berhasil dibuat, bisa dilakukan pengecekan melalui mysql pada basisdata sesuai pengaturan sebelumnya.
  
  Selanjutnya kita mengubah data pada file DatabaseSeeder.php dengan menginputkan masing - masing values pada kolom tabel yang telah dibuat. Database seeder sangat berguna untuk inisiasi data pada tabel atau beberapa tabel ketika setup aplikasi pertama kali. Bisa juga untuk memperbarui data yang sudah ada atau menghapusnya dari belakang layar. Lalu jika selesai, selanjutnya menjalankan perintah php artisan db:seed untuk melakukan seeding ke database.
  
  Selanjutnya membuat Model dengan file baru dengan nama book.app pada direktori app/Models dan mendefinisikan atribut tabel sesuai ketentuan. Setelah itu membuat file baru pada controllers dengan nama BooksController.php dan edit file dengan menambahkan method untuk memanggil data buku. Direktori Model digunakan untuk menyimpan class PHP yang berhubugan dengan model database, kemudian direktori Controller digunakan untuk menyimpan class PHP yang berhubungan dengan application logic.

  Setelah itu buat route pada route\web.php untuk memanggil function pada BooksController yaitu $router->get('books', 'BooksController@index');
Lalu selanjutnya menjalankan perintah php -S localhost:8000 -t public pada terminal VS Code dan mengakses url localhost:8000/books pada browser atau postman. 

  Setelah berhasil, langkah selanjutnya menambahkan route /books/{id} dengan menampilkan detail buku sesuai id. Jadi kita harus membuat method baru dengan parameter id pada BooksController.php dan menambahkan route pada web.php untuk dapat menampilkan data buku sesuai id yang ditentukan.
Selanjutnya menambahkan pesan "Book Not Found" dan status code 404 jika id buku tidak ditemukan. Jadi kita membuat seleksi kondisi if else pada method di file BooksController.php yang berparameter id sebelumnya dengan kondisi, jika id sesuai data buku, maka akan menampilkan data buku sesuai id yang dipilih dan jika memilih id yang tidak ada dalam data buku, maka akan menampilkan pesan dan status code sesuai ketentuan soal.
Selanjutnya menuju ke direktori app/Exception/Handler.php dan mengedit file Handler.php dengan syntax if($e instanceof NotFoundHttpException)
                                                                                                           {
                                                                                                                return response('Book Not Found', 404);
                                                                                                           }
tidak lupa menambahkan use diatas dengan syntax: use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; 

  Lalu membuat file 404.blade.php pada direktori resources/views/errors. Selanjutnya, pada syntax  return response('Book Not Found', 404); , dia akan menampilkan view di folder errors lalu ke 404.blade.php . Maka setelah dijalankan menggunakan postman, ketika memilih id yang tidak ada dalam data buku, akan memberikan pesan "Book Not Found" dan status code 404.
  
==BOOKAPPCHALLANGE==

Pada projek challange ini, saya dapat belajar mengenai CRUD (Create, Read, Update, Delete) di dalam Lumen dengan bantuan postman untuk mengecek dan mengganti pengaturan method nya (GET, POST, PUT, DELETE). Pada challenge ini kita membuat CRUD untuk endpoint authors pada project bookapp sebelumnya dengan skema database :
○	id
○	name: string
○	gender:enum [‘male’,’female’]
○	biography:text
○	timestamp

Jadi yang pertama kita membuat tabel authors dengan langkah - langkah seperti modul 5.
Adapun penjelasan langkah - langkah pembuatan CRUD nya yang dibuat pada file AuthorController.php yaitu yang pertama kita membuat method POST untuk menginput authors baru (Create) dengan nama store dan terdapat parameter request pada AuthorController.php yang sebelumnya file tersebut sudah dibuat terlebih dahulu. Pada method tersebut terdapat fungsi untuk validasi bagian name, gender, biography yang bersifat required yang berarti harus diisi semua dulu agar sukses menginputkan data nya. Lalu pada method tersebut terdapat return respon berbentuk json array yang dapat memberikan pesan respon jika data berhasil dibuat.

Selanjutnya membuat method GET yang berfungsi Read dengan nama method yaitu index dan terdapat return Author:: all() untuk menampilkan semua data dari tabel authors.

Selanjutnya membuat method GET untuk menampilkan data author sesuai id dengan nama method yaitu berdasarID dan memiliki parameter id. Didalamnya terdapat seleksi kondisi if else, maka nanti akan menampilkan data authors sesuai id yang dipilih dan terdapat message dan jika memilih id yang tidak ada dalam data authors, maka akan menampilkan message dan status code 404 not found.

Selanjutnya membuat method PUT untuk mengedit data authors sesuai id yang dipilih dengan nama method yaitu update dan memiliki parameter request dan juga id. Didalam method tersebut terdapat try catch exception yang berfungsi menghandle error dengan pendekatan object oriented, yang nanti jika id dalam data authros tidak ditemukan maka akan dilempar ke halaman 404 dengan pesan exception "author not found". Didalam method tersebut juga terdapat fungsi untuk menginputkan hanya untuk nama, gender dan biography. Lalu jika selesai, maka data akan disave dan terdapat respon message.

Yang terakhir membuat method DELETE untuk menghapus data authors sesuai id yang dipilih dengan nama destroy dan memiliki parameter id. Didalam method tersebut terdapat try catch exception yang berfungsi menghandle error dengan pendekatan object oriented, yang nanti jika id dalam data authros tidak ditemukan maka akan dilempar ke halaman 404 dengan pesan exception "author not found". Dan jika id sesuai dengan data authors, maka data akan terhapus sesuai id yang dipilih. Lalu akan muncul respon message.
  
