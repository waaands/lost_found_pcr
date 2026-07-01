<!DOCTYPE html>
<html>

<head>
    <title>Kelola User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            Kelola User
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                $no = 1;
                while($row = mysqli_fetch_assoc($user)){
                ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $row['nim']; ?></td>

                        <td><?= $row['nama_lengkap']; ?></td>

                        <td><?= $row['email']; ?></td>

                        <td><?= $row['role']; ?></td>

                        <td>
                            Edit |
                            Hapus
                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

            <a href="index.php?aksi=admin" class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>

</div>

</body>

</html>