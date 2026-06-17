<?php

require_once "../config/koneksi.php";
require_once "../app/models/KategoriModel.php";

$model = new KategoriModel($conn);

$data = $model->getAll();

while($row = mysqli_fetch_assoc($data))
{
    echo $row['nama_kategori'];
    echo "<br>";
}