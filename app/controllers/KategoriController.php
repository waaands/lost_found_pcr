<?php

require_once __DIR__ . "/../../config/koneksi.php";
require_once __DIR__ . "/../models/KategoriModel.php";

class KategoriController
{
    private $kategoriModel;

    public function __construct($conn)
    {
        $this->kategoriModel = new KategoriModel($conn);
    }

    // Daftar Kategori
    public function index()
    {
        $kategori = $this->kategoriModel->getAll();

        require __DIR__ . "/../views/admin/kategori/index.php";
    }

    // Form Tambah
    public function tambah()
    {
        require __DIR__ . "/../views/admin/kategori/tambah.php";
    }

    // Simpan
    public function simpan()
    {
        if(isset($_POST['simpan']))
        {
            $this->kategoriModel->insert($_POST);

            header("Location: index.php?aksi=kategori");
            exit;
        }
    }

    // Form Edit
    public function edit()
    {
        $id = $_GET['id'];

        $kategori = $this->kategoriModel->getById($id);

        require __DIR__ . "/../views/admin/kategori/edit.php";
    }

    // Update
    public function update()
    {
        if(isset($_POST['update']))
        {
            $this->kategoriModel->update($_POST);

            header("Location: index.php?aksi=kategori");
            exit;
        }
    }

    // Hapus
    public function hapus()
    {
        $id = $_GET['id'];

        $this->kategoriModel->delete($id);

        header("Location: index.php?aksi=kategori");
        exit;
    }
}