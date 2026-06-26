<?php

require_once __DIR__ . "/../../config/koneksi.php";
require_once __DIR__ . "/../models/LaporanModel.php";

class ProfileController
{
    public function index()
    {
        global $conn;

        $model = new LaporanModel($conn);

        $id_user = $_SESSION['id_user'];

        $laporan = $model->getByUser($id_user);

        require __DIR__ . "/../views/profile/index.php";
    }
}