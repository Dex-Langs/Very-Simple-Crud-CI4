<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\RatingModel;
use App\Models\MakananModel;

class RatingController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Makanan',
            // 'makanan' => $this->RatingModel->findAll()
        ];

        return view('Layanan/RatingMakanan', $data);
    }

    public function createReview()
    {
        // Mendapatkan data yang dikirimkan dari formulir
        $rating = $this->request->getPost('rating');
        // $comment = $this->request->getPost('comment');
        $makananId = $this->request->getPost('makanan_id'); // ID makanan yang direview

        // Validasi data jika diperlukan

        // Simpan ulasan ke database
        $reviewModel = new RatingModel(); // Ganti dengan model yang sesuai
        $data = [
            'rating' => $rating,
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
