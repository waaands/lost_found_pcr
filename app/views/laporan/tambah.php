<?php

    session_start();

    require_once "../../../config/koneksi.php";
    require_once "../../models/KategoriModel.php";

    $model = new KategoriModel($conn);

    $kategori = $model->getAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            Tambah Laporan
        </div>

        <div class="card-body">

            <form
            action="../../controllers/LaporanController.php"
            method="POST"
            enctype="multipart/form-data">

                <input
                type="hidden"
                name="id_user"
                value="<?php echo $_SESSION['id_user']; ?>">

                <div class="mb-3">

                    <label>Jenis Laporan</label>

                    <select
                    name="jenis_laporan"
                    class="form-control">

                        <option value="kehilangan">
                            Kehilangan
                        </option>

                        <option value="penemuan">
                            Penemuan
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Kategori</label>

                    <select
                    name="id_kategori"
                    class="form-control">

                        <?php
                            while (
                                $row =
                                mysqli_fetch_assoc($kategori)
                            ) {
                            ?>

                        <option
                        value="<?php echo $row['id_kategori']; ?>">

                            <?php echo $row['nama_kategori']; ?>

                        </option>

                        <?php }?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Nama Barang</label>

                    <input
                    type="text"
                    name="nama_barang"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label>Deskripsi</label>

                    <textarea
                    name="deskripsi"
                    class="form-control">
                    </textarea>

                </div>

                <div class="mb-3">

                    <label>Lokasi</label>

                    <input
                    type="text"
                    name="lokasi"
                    class="form-control">

                </div>

                <div class="mb-3">

                    <label>Tanggal Kejadian</label>

                    <input
                    type="date"
                    name="tanggal_kejadian"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label>Foto Barang</label>

                    <input
                    type="file"
                    name="foto_barang"
                    class="form-control">

                </div>
                <button
                type="submit"
                name="simpan"
                class="btn btn-success">

                    Simpan

                </button>

                <a
                href="../../../public/index.php"
                class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>