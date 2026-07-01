<?php

require_once __DIR__ . "/../../config/koneksi.php";
require_once __DIR__ . "/../models/LaporanModel.php";

class ProfileController
{
    private $laporanModel;

    public function __construct($conn)
    {
        $this->laporanModel = new LaporanModel($conn);
    }

    public function index()
    {
        $id_user = $_SESSION['id_user'];

        $laporan = $this->laporanModel->getByUser($id_user);

        require __DIR__ . "/../views/profile/index.php";
    }
}