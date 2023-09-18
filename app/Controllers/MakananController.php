<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MakananModel;
use App\Models\RatingModel;
// use App\Models\RatingModelnModel;
use CodeIgniter\Validation\Validation;

class MakananController extends BaseController
{
    protected $auth;
    protected $makananModel, $ratingModel;

    public function __construct()
    {
        $this->makananModel = new MakananModel();
        $this->ratingModel = new RatingModel();
        $this->auth = service('authentication');
    }
    // app/Controllers/MakananController.php

    public function index()
    {
        // Mengambil data dari model
        $Makanan = $this->makananModel->findAll();

        $data = [
            'title' => 'Daftar Minuman',
            'makanan' => $Makanan
        ];

        // Cek apakah pengguna telah masuk
        if ($this->auth->check()) {
            $user = user(); // Mendapatkan objek pengguna yang terautentikasi
            $username = $user->username; // Mengakses properti 'username'

            // Mengembalikan view dengan data dan username
            return view('Layanan/Makanan/Makanan', array_merge($data, ['username' => $username]));
        } else {
            // Pengguna belum masuk atau telah logout
            // Tampilkan pesan untuk login terlebih dahulu
            $message = "Silakan login terlebih dahulu untuk mengakses halaman ini.";

            // Mengembalikan view dengan data pesan
            return view('Layanan/Makanan/Makanan', array_merge($data, ['message' => $message]));
        }
    }

    private function calculateAverageRating($makananId)
    {
        $reviewModel = new RatingModel();
        $reviews = $reviewModel->where('makanan_id', $makananId)->findAll();

        $totalRating = 0;
        $reviewCount = count($reviews);

        foreach ($reviews as $review) {
            $totalRating += $review['rating'];
        }

        return $reviewCount > 0 ? $totalRating / $reviewCount : 0;
    }


    public function add()
    {
    // Data umum
    $data = [
        'title' => 'Tambah Makanan',
    ];

    // Cek apakah pengguna telah masuk
    if ($this->auth->check()) {
        $user = user(); // Mendapatkan objek pengguna yang terautentikasi
        $username = $user->username; // Mengakses properti 'username'

        // Mengembalikan view dengan data dan username
        return view('Layanan/Makanan/TambahMakanan', array_merge($data, ['username' => $username]));
    } else {
        // Pengguna belum masuk atau telah logout
        // Tampilkan pesan untuk login terlebih dahulu
        $message = "Silakan login terlebih dahulu untuk mengakses halaman ini.";

        // Mengembalikan view dengan data pesan
        return view('Layanan/Makanan/TambahMakanan', array_merge($data, ['message' => $message]));
    }
    }

    public function do_add()
    {
        // Validasi data yang dikirim dari formulir
        $validation = \Config\Services::validation();

        $rules = [
            'nama_makanan' => 'required',
            'harga_makanan' => 'required|numeric',
            'slug' => 'required',
            'deskripsi' => 'required',
            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
        ];

        if (!$this->validate($rules)) {
            // Validasi gagal, kembali ke halaman form dengan pesan error
            return view('Layanan/Makanan/TambahMakanan', [
                'validation' => $validation,
            ]);
        }

        // Handle pengunggahan gambar
        $upload = $this->request->getFile('file_upload');

        if ($upload->isValid() && !$upload->hasMoved()) {
            $newFileName = $upload->getRandomName();
            $upload->move(ROOTPATH . 'public/img', $newFileName); // Ganti dengan path yang sesuai

            // Siapkan data untuk dimasukkan ke database
            $data = [
                'nama_makanan' => $this->request->getPost('nama_makanan'),
                'harga_makanan' => $this->request->getPost('harga_makanan'),
                'slug' => $this->request->getPost('slug'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'image' => $newFileName, // Simpan nama file gambar
            ];

            // Masukkan data ke dalam database
            $makananModel = new MakananModel(); // Ganti dengan model yang sesuai
            $makananModel->insert($data);

            // Redirect dengan pesan sukses
            return redirect()->to('/makanan')->with('success', 'Data Berhasil ditambah');
        } else {
            // Handle kesalahan pengunggahan gambar
            return redirect()->to('/makanan')->with('error', 'Gagal mengunggah gambar');
        }
    }

    public function detail($slug)
    {
        // dd($makanan);
        $data = [
            'title' => 'Detail Makanan',
            'makanan' => $makanan = $this->makananModel->where(['slug' => $slug])->first()
        ];
    
        // Cek apakah pengguna telah masuk
        if ($this->auth->check()) {
            $user = user(); // Mendapatkan objek pengguna yang terautentikasi
            $username = $user->username; // Mengakses properti 'username'
    
            // Mengembalikan view dengan data dan username
            return view('Layanan/Makanan/DetailMakanan', array_merge($data, ['username' => $username]));
        } else {
            // Pengguna belum masuk atau telah logout
            // Tampilkan pesan untuk login terlebih dahulu
            $message = "Silakan login terlebih dahulu untuk mengakses halaman ini.";
    
            // Mengembalikan view dengan data pesan
            return view('Layanan/Makanan/DetailMakanan', array_merge($data, ['message' => $message]));
        }
        // echo $slug;
        // return view('Layanan/Makanan/DetailMakanan');
    }
}
