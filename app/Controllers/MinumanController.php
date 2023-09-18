<?php

namespace App\Controllers;

use App\Models\MinumanModel;

class MinumanController extends BaseController
{
    protected $MinumanModel;
    protected $auth;

    public function __construct()
    {
        $this->MinumanModel = new MinumanModel();
        $this->auth = service('authentication'); // Inisialisasi auth
    }

    public function index()
    {
        // Mengambil data dari model
        $Minuman = $this->MinumanModel->findAll();
        
        $data = [
            'title' => 'Daftar Minuman',
            'Minumans' => $Minuman
        ];

        // Cek apakah pengguna telah masuk
        if ($this->auth->check()) {
            $user = user(); // Mendapatkan objek pengguna yang terautentikasi
            $username = $user->username; // Mengakses properti 'username'

            // Mengembalikan view dengan data dan username
            return view('Layanan/Minuman/Minuman', array_merge($data, ['username' => $username]));
        } else {
            // Pengguna belum masuk atau telah logout
            // Tampilkan pesan untuk login terlebih dahulu
            $message = "Silakan login terlebih dahulu untuk mengakses halaman ini.";
            
            // Mengembalikan view dengan data pesan
            return view('Layanan/Minuman/Minuman', array_merge($data, ['message' => $message]));
        }
    }
}
