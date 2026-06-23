<?php

    session_start();


    require_once "../../../config/koneksi.php";
    require_once "../../models/LaporanModel.php";
    require_once "../../models/KategoriModel.php";

    $laporanModel  = new LaporanModel($conn);
    $kategoriModel = new KategoriModel($conn);

    $id = $_GET['id'];

    $laporan = $laporanModel->getById($id);

    $kategori = $kategoriModel->getAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            Edit Laporan
        </div>

        <div class="card-body">

            <form
                action="../../controllers/LaporanController.php"
                method="POST"
                enctype="multipart/form-data">

                <input
                type="hidden"
                name="id_laporan"
                value="<?php echo $laporan['id_laporan']; ?>">

                <input
                type="hidden"
                name="foto_lama"
                value="<?= $laporan['foto_barang']; ?>">

                <div class="mb-3">

                    <label>Jenis Laporan</label>

                    <select
                    name="jenis_laporan"
                    class="form-control">

                        <option
                        value="kehilangan"
                        <?php echo $laporan['jenis_laporan']=='kehilangan' ? 'selected' : ''; ?>>

                            Kehilangan

                        </option>

                        <option
                        value="penemuan"
                        <?php echo $laporan['jenis_laporan']=='penemuan' ? 'selected' : ''; ?>>

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
                            while ($row = mysqli_fetch_assoc($kategori)) {
                            ?>

                        <option
                        value="<?php echo $row['id_kategori']; ?>"

                        <?php echo $laporan['id_kategori']==$row['id_kategori']
        ? 'selected'
        : ''; ?>>

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
                    value="<?php echo $laporan['nama_barang']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label>Deskripsi</label>

                    <textarea
                    name="deskripsi"
                    class="form-control"><?php echo $laporan['deskripsi']; ?></textarea>

                </div>

                <div class="mb-3">

                    <label>Lokasi</label>

                    <input
                    type="text"
                    name="lokasi"
                    class="form-control"
                    value="<?php echo $laporan['lokasi']; ?>">

                </div>

                <div class="mb-3">

                    <label>Tanggal Kejadian</label>

                    <input
                    type="date"
                    name="tanggal_kejadian"
                    class="form-control"
                    value="<?php echo $laporan['tanggal_kejadian']; ?>">

                </div>
                <div class="mb-3">

                    <label>Foto Saat Ini</label>
                    <br>

                    <?php if($laporan['foto_barang'] != "") { ?>

                        <img
                        src="../../../public/uploads/barang/<?php echo $laporan['foto_barang']; ?>"
                        width="150">

                    <?php } ?>

                </div>
                <div class="mb-3">

                    <label>Ganti Foto</label>

                    <input
                    type="file"
                    name="foto_barang"
                    class="form-control">

                </div>
                <button
                type="submit"
                name="update"
                class="btn btn-warning">

                    Update

                </button>

            <a
            href="../profile/index.php"
            class="btn btn-secondary">

                Kembali

            </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>