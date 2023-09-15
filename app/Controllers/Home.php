<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $auth;
    public function index()
    {
        $this->auth = service('authentication');
        // Periksa apakah pengguna telah masuk atau belum
        $user = user(); // Mendapatkan objek pengguna yang terautentikasi
        if ($this->auth->check()) {
            $username = $user->username; // Mengakses properti 'username'

            return view('Homes', ['username' => $username]);
        } else {
            // Pengguna belum masuk atau telah logout
            // Tampilkan pesan untuk login terlebih dahulu
            $message = "Silakan login terlebih dahulu untuk mengakses halaman ini.";
            // return view('login_message', ['message' => $message]);
        }
        $data =
            [
                'title' => 'Home',
                'username' =>  $user,
            ];

        // dd($Minuman);
        return view('Homes', $data);
    }
}
