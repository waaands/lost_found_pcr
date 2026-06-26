<?php

require_once __DIR__ . "/../../config/koneksi.php";
require_once __DIR__ . "/../models/LaporanModel.php";
require_once __DIR__ . "/../models/UserModel.php";

class AdminController
{
    private $laporanModel;
    private $userModel;

    public function __construct($conn)
    {
        $this->laporanModel = new LaporanModel($conn);
        $this->userModel = new UserModel($conn);
    }

    // Dashboard Admin
    public function index()
    {
        require __DIR__ . "/../views/admin/index.php";
    }

    // Semua Laporan
    public function laporan()
    {
        $laporan = $this->laporanModel->getAll();

        require __DIR__ . "/../views/admin/laporan.php";
    }

    // Kelola User
    public function user()
    {
        $user = $this->userModel->getAll();

        require __DIR__ . "/../views/admin/user.php";
    }
}