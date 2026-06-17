<?php

session_start();

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

    // TAMBAH
    public function store()
    {
        if(isset($_POST['simpan']))
        {
            $result =
                $this->laporanModel
                ->insert($_POST);

            if($result)
            {
                echo "
                <script>
                    alert('Laporan berhasil ditambahkan');
                    window.location='../views/laporan/index.php';
                </script>
                ";
            }
        }
    }

    // UPDATE
    public function update()
    {
        if(isset($_POST['update']))
        {
            $result =
                $this->laporanModel
                ->update($_POST);

            if($result)
            {
                echo "
                <script>
                    alert('Laporan berhasil diupdate');
                    window.location='../views/laporan/index.php';
                </script>
                ";
            }
        }
    }

    // DELETE
    public function delete()
    {
        if(isset($_GET['hapus']))
        {
            $id = $_GET['hapus'];

            $this->laporanModel
                 ->delete($id);

            header(
                "Location: ../views/laporan/index.php"
            );
        }
    }
}

$laporan =
    new LaporanController($conn);

$laporan->store();
$laporan->update();
$laporan->delete();