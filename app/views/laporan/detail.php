<!DOCTYPE html>
<html>

<head>

    <title>Detail Laporan</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">

            Detail Laporan

        </div>

        <div class="card-body">

            <?php if ($data['foto_barang']) { ?>

                <img
                    src="uploads/barang/<?php echo $data['foto_barang']; ?>"
                    width="300"
                    class="mb-3">

            <?php } ?>

            <h4>

                <?php echo $data['nama_barang']; ?>

            </h4>

            <p>
                <b>Kategori :</b>
                <?php echo $data['nama_kategori']; ?>
            </p>

            <p>
                <b>Pelapor :</b>
                <?php echo $data['nama_lengkap']; ?>
            </p>

            <p>
                <b>Jenis :</b>
                <?php echo $data['jenis_laporan']; ?>
            </p>

            <p>
                <b>Status :</b>
                <?= $data['status_laporan']; ?>
            </p>
            
            <p>
                <b>Lokasi :</b>
                <?php echo $data['lokasi']; ?>
            </p>

            <p>
                <b>Tanggal :</b>
                <?php echo $data['tanggal_kejadian']; ?>
            </p>

            <p>
                <b>Deskripsi :</b><br>

                <?php echo $data['deskripsi']; ?>
            </p>

            <hr>

            <h4>Komentar</h4>

            <<form
                action="index.php?aksi=komentar"
                method="POST"
                enctype="multipart/form-data">

                <input
                    type="hidden"
                    name="id_laporan"
                    value="<?= $data['id_laporan']; ?>">

                <input
                    type="hidden"
                    name="id_user"
                    value="<?= $_SESSION['id_user']; ?>">

                <div class="mb-3">

                    <textarea
                        name="isi_komentar"
                        class="form-control"
                        required></textarea>

                </div>

                <div class="mb-3">

                    <label>Foto Bukti (Opsional)</label>

                    <input
                        type="file"
                        name="foto_bukti"
                        class="form-control">

                </div>

                <button
                    type="submit"
                    name="kirim"
                    class="btn btn-primary">

                    Kirim Komentar

                </button>

            </form>

            <?php
            while ($row = mysqli_fetch_assoc($komentar))
            {
            ?>

                <div class="card mt-3">

                    <div class="card-body">

                        <b>

                            <?= $row['nama_lengkap']; ?>

                        </b>

                        <br><br>

                        <?= $row['isi_komentar']; ?>

                        <?php if ($row['foto_bukti'] != "") { ?>

                            <br><br>

                            <img
                                src="uploads/bukti/<?= $row['foto_bukti']; ?>"
                                width="200"
                                class="img-thumbnail">

                        <?php } ?>

                    </div>

                </div>

            <?php } ?>

            <hr>

            <a
                href="index.php?aksi=laporan"
                class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

</body>
</html>