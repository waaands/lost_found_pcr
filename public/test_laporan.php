<?php

require_once "../config/koneksi.php";
require_once "../app/models/LaporanModel.php";

$laporan = new LaporanModel($conn);

echo "LaporanModel berhasil";