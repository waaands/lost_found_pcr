<?php

require_once __DIR__ . "/../../config/koneksi.php";
require_once __DIR__ . "/../models/LaporanModel.php";

class LaporanController
{
    private $laporanModel;

    public function __construct($conn)
    {
        $this->laporanModel =
        new LaporanModel($conn);
    }

        // HALAMAN DAFTAR LAPORAN
    public function index()
    {
        if(isset($_GET['keyword']))
        {
            $laporan = $this->laporanModel->search($_GET['keyword']);
        }
        elseif(isset($_GET['jenis']))
        {
            $laporan = $this->laporanModel->filter($_GET['jenis']);
        }
        else
        {
            $laporan = $this->laporanModel->getAll();
        }

        $statistik = $this->laporanModel->getStatistik();
        require __DIR__ . "/../views/laporan/index.php";
    }

    // HALAMAN DETAIL
    public function detail()
    {
        $id = $_GET['id'];

        $data = $this->laporanModel->getDetail($id);

        require_once __DIR__ . "/../models/KomentarModel.php";

        $komentarModel = new KomentarModel($GLOBALS['conn']);
        $komentar = $komentarModel->getByLaporan($id);

        require __DIR__ . "/../views/laporan/detail.php";
    }

    // HALAMAN TAMBAH
    public function tambah()
    {
        require_once __DIR__ . "/../models/KategoriModel.php";

        $kategoriModel = new KategoriModel($GLOBALS['conn']);

        $kategori = $kategoriModel->getAll();

        require __DIR__ . "/../views/laporan/tambah.php";
    }

    // HALAMAN EDIT
    public function edit()
    {
        require_once __DIR__ . "/../models/KategoriModel.php";

        $id = $_GET['id'];

        $laporan = $this->laporanModel->getById($id);

        $kategoriModel = new KategoriModel($GLOBALS['conn']);
        $kategori = $kategoriModel->getAll();

        require __DIR__ . "/../views/laporan/edit.php";
    }

    // TAMBAH
    public function simpan()    {
        if (isset($_POST['simpan'])) {
            $result =
            $this->laporanModel
                ->insert($_POST);

            if ($result) {
                echo "
                <script>
                    alert('Laporan berhasil ditambahkan');
                    window.location='index.php?aksi=profile';
                </script>
                ";
            }
        }
    }

    // UPDATE
    public function update()
    {
        if (isset($_POST['update'])) {
            $result =
            $this->laporanModel
                ->update($_POST);

            if ($result) {
                echo "
                <script>
                    alert('Laporan berhasil diupdate');
                    window.location='index.php?aksi=profile';
                </script>
                ";
            }
        }
    }

    // DELETE
    public function hapus()
    {
        $id = $_GET['id'];

        $laporan = $this->laporanModel->getById($id);

        if ($laporan['id_user'] != $_SESSION['id_user']) {
            die("Akses Ditolak");
        }

        $this->laporanModel->delete($id);

        header("Location: index.php?aksi=profile");
        exit;
    }

    public function selesai()
    {
        $id = $_GET['id'];

        $laporan = $this->laporanModel->getById($id);

        if(!$laporan || $laporan['id_user'] != $_SESSION['id_user']){
            die("Akses ditolak");
        }

        $this->laporanModel->updateStatus($id,"selesai");

        header("Location: index.php?aksi=profile");
        exit;
    }
}
