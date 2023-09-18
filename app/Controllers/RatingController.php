<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\RatingModel;
use App\Models\MakananModel;

class RatingController extends BaseController
{

    protected $auth;

    public function __construct()
    {
        // $this->makananModel = new MakananModel();
        // $this->ratingModel = new RatingModel();
        $this->auth = service('authentication');
    }

    public function index()
    {
        $data = [
            'title' => 'Rating Makanan',
            // 'makanan' => $this->RatingModel->findAll()
        ];

        if ($this->auth->check()) {
            $user = user(); // Mendapatkan objek pengguna yang terautentikasi
            $username = $user->username; // Mengakses properti 'username'
    
            // Mengembalikan view dengan data dan username
            return view('Layanan/Makanan/RatingMakanan', array_merge($data, ['username' => $username]));
        } else {
            // Pengguna belum masuk atau telah logout
            // Tampilkan pesan untuk login terlebih dahulu
            $message = "Silakan login terlebih dahulu untuk mengakses halaman ini.";
            
            echo '<script>reloadPage();</script>';
            // Mengembalikan view dengan data pesan
            return view('Layanan/Makanan/RatingMakanan', array_merge($data, ['message' => $message]));
        }

        // return view('Layanan/Makanan/RatingMakanan', $data);
    }

    public function createReview()
    {
        // Mendapatkan data yang dikirimkan dari formulir
        $rating = $this->request->getPost('rating1');
        // $comment = $this->request->getPost('comment');
        $makananId = $this->request->getPost('makanan_id'); // ID makanan yang direview

        // Validasi data jika diperlukan

        // Simpan ulasan ke database
        $reviewModel = new RatingModel(); // Ganti dengan model yang sesuai
        $data = [
            'rating1' => $rating,
            // 'comment' => $comment,
            'makanan_id' => $makananId,
            // Tambahkan kolom lain yang mungkin Anda perlukan
        ];
        $reviewModel->insert($data);

        // Redirect atau tampilkan pesan sukses jika perlu
        return redirect()->to('/makanan')->with('success', 'Ulasan Anda telah disimpan.');
    }

    public function showRatings()
    {
        $ratingModel = new RatingModel();

        // Mengambil rata-rata rating untuk setiap makanan
        $makananRatings = $ratingModel->select('makanan_id, AVG(rating) as rata_rating')
            ->groupBy('makanan_id')
            ->join('makanan', 'makanan.id = ratings.makanan_id')
            ->findAll();

        return view('Layanan/Makanan', ['makananRatings' => $makananRatings]);
    }
}
