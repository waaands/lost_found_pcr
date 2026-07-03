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
        $statistik = $this->laporanModel->getStatistikAdmin();

        $laporanTerbaru = $this->laporanModel->getLaporanTerbaruAdmin();

        $userTerbaru = $this->userModel->getUserTerbaru();

        require __DIR__ . "/../views/admin/index.php";
    }

    // Semua Laporan
    public function laporan()
    {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

        if($keyword != "")
        {
            $laporan = $this->laporanModel->cariAdmin($keyword);
        }
        else
        {
            $laporan = $this->laporanModel->getAllAdmin();
        }

        require __DIR__ . "/../views/admin/laporan_admin/laporan.php";
    }

    // Kelola User
    public function user()
    {
        $user = $this->userModel->getAll();

        require __DIR__ . "/../views/admin/user/user.php";
    }

    
    public function ubahStatus()
    {
        $id = $_GET['id'];
        $status = $_GET['status'];

        $this->laporanModel->updateStatus($id, $status);

        header("Location: index.php?aksi=admin_laporan");
        exit;
    }

    // Form Tambah Laporan Admin
    public function tambahLaporan()
    {
        require_once __DIR__ . "/../models/KategoriModel.php";

        $kategoriModel = new KategoriModel($GLOBALS['conn']);

        $kategori = $kategoriModel->getAll();

        require __DIR__ . "/../views/admin/laporan_admin/tambah_laporan.php";
    }

    // Simpan Laporan Admin
    public function simpanLaporan()
    {
        if(isset($_POST['simpan']))
        {
            $this->laporanModel->insertAdmin($_POST);

            header("Location: index.php?aksi=admin_laporan");
            exit;
        }
    }

    public function editLaporan()
    {
        require_once __DIR__ . "/../models/KategoriModel.php";

        $id = $_GET['id'];

        $laporan = $this->laporanModel->getById($id);

        $kategoriModel = new KategoriModel($GLOBALS['conn']);

        $kategori = $kategoriModel->getAll();

        require __DIR__ . "/../views/admin/laporan_admin/edit_laporan.php";
    }

    public function updateLaporan()
    {
        if(isset($_POST['update']))
        {
            $this->laporanModel->update($_POST);

            header("Location: index.php?aksi=admin_laporan");
            exit;
        }
    }

    public function hapusLaporan()
    {
        $id = $_GET['id'];

        $this->laporanModel->delete($id);

        header("Location: index.php?aksi=admin_laporan");
        exit;
    }

    // Form Tambah User
    public function tambahUser()
    {
        require __DIR__ . "/../views/admin/user/tambah_user.php";
    }

    // Simpan User
    public function simpanUser()
    {
        if(isset($_POST['simpan']))
        {
            $this->userModel->insert($_POST);

            header("Location: index.php?aksi=admin_user");
            exit;
        }
    }

    // Form Edit User
    public function editUser()
    {
        $id = $_GET['id'];

        $user = $this->userModel->getById($id);

        require __DIR__ . "/../views/admin/user/edit_user.php";
    }

    // Update User
    public function updateUser()
    {
        if(isset($_POST['update']))
        {
            $this->userModel->update($_POST);

            header("Location: index.php?aksi=admin_user");
            exit;
        }
    }

    // Hapus User
    public function hapusUser()
    {
        $id = $_GET['id'];
        if($id == $_SESSION['id_user'])
        {
            echo "
            <script>
                alert('Anda tidak dapat menghapus akun yang sedang digunakan!');
                window.location='index.php?aksi=admin_user';
            </script>
            ";
            exit;
        }

        $this->userModel->delete($id);

        header("Location: index.php?aksi=admin_user");
        exit;
    }
}