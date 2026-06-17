<?php

session_start();

require_once __DIR__ . "/../../config/koneksi.php";
require_once __DIR__ . "/../models/KomentarModel.php";

class KomentarController
{
    private $komentarModel;

    public function __construct($conn)
    {
        $this->komentarModel =
            new KomentarModel($conn);
    }

    public function store()
    {
        if(isset($_POST['kirim']))
        {
            $this->komentarModel
                 ->insert($_POST);

            header(
                "Location: ../views/laporan/detail.php?id=" .
                $_POST['id_laporan']
            );
        }
    }
}

$komentar =
new KomentarController($conn);

$komentar->store();