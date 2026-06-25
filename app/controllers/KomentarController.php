<?php

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

    public function simpan()
    {
        if (isset($_POST['kirim'])) {
            $this->komentarModel
                ->insert($_POST);

            header(
                "Location: index.php?aksi=detail&id=" .
                $_POST['id_laporan']
            );
            exit;
        }
    }
}
