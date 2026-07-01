<?php

require_once __DIR__ . "/../models/LaporanModel.php";

class DashboardController
{
    private $conn;
    private $laporanModel;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->laporanModel = new LaporanModel($conn);
    }

    public function index()
    {
        $statistik = $this->laporanModel->getStatistik();
        $laporanTerbaru = $this->laporanModel->getLaporanTerbaru();

        require __DIR__ . "/../views/dashboard/index.php";
    }
}