<?php

class LaporanModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Tambah laporan
    public function insert($data)
    {
        $foto = $_FILES['foto_barang']['name'];

        if($foto != "")
        {
            $tmp =
            $_FILES['foto_barang']['tmp_name'];

            move_uploaded_file(
                $tmp,
                __DIR__ .
                "/../../public/uploads/barang/" .
                $foto
            );
        }

        $query = "INSERT INTO laporan
        (
            id_user,
            id_kategori,
            jenis_laporan,
            nama_barang,
            deskripsi,
            foto_barang,
            lokasi,
            tanggal_kejadian
        )
        VALUES
        (
            '{$data['id_user']}',
            '{$data['id_kategori']}',
            '{$data['jenis_laporan']}',
            '{$data['nama_barang']}',
            '{$data['deskripsi']}',
            '$foto',
            '{$data['lokasi']}',
            '{$data['tanggal_kejadian']}'
        )";

        return mysqli_query(
            $this->conn,
            $query
        );
    }

    public function insertAdmin($data)
    {
        $foto = $_FILES['foto_barang']['name'];

        if($foto != "")
        {
            $tmp = $_FILES['foto_barang']['tmp_name'];

            move_uploaded_file(
                $tmp,
                __DIR__ . "/../../public/uploads/barang/" . $foto
            );
        }

        $query = "
        INSERT INTO laporan
        (
            id_user,
            id_kategori,
            jenis_laporan,
            nama_barang,
            deskripsi,
            foto_barang,
            lokasi,
            tanggal_kejadian,
            status_laporan
        )
        VALUES
        (
            '{$data['id_user']}',
            '{$data['id_kategori']}',
            '{$data['jenis_laporan']}',
            '{$data['nama_barang']}',
            '{$data['deskripsi']}',
            '$foto',
            '{$data['lokasi']}',
            '{$data['tanggal_kejadian']}',
            'dititip_baak',
            'baak'
        )
        ";

        return mysqli_query(
            $this->conn,
            $query
        );
    }

    public function search($keyword)
    {
        $query = "
        SELECT
            laporan.*,
            kategori.nama_kategori,
            users.nama_lengkap
        FROM laporan

        JOIN kategori
        ON laporan.id_kategori = kategori.id_kategori

        JOIN users
        ON laporan.id_user = users.id_user

        WHERE
        (
            nama_barang LIKE '%$keyword%'
            OR deskripsi LIKE '%$keyword%'
        )
        AND status_laporan IN ('aktif','baak')

        ORDER BY laporan.id_laporan DESC
        ";

        return mysqli_query($this->conn,$query);
    }

    public function cariAdmin($keyword)
    {
        $query = "
        SELECT laporan.*, users.nama_lengkap, kategori.nama_kategori
        FROM laporan
        JOIN users ON laporan.id_user = users.id_user
        JOIN kategori ON laporan.id_kategori = kategori.id_kategori
        WHERE
            laporan.nama_barang LIKE '%$keyword%'
            OR users.nama_lengkap LIKE '%$keyword%'
        ORDER BY laporan.id_laporan DESC
        ";

        return mysqli_query($this->conn,$query);
    }

    public function getStatistik()
    {
        $query = mysqli_query($this->conn,"
            SELECT
            COUNT(*) AS total,
            SUM(jenis_laporan='kehilangan') AS kehilangan,
            SUM(jenis_laporan='penemuan') AS penemuan,
            SUM(status_laporan='aktif') AS aktif,
            SUM(status_laporan='baak') AS baak
            FROM laporan
        ");

        return mysqli_fetch_assoc($query);
    }

    public function getStatistikAdmin()
    {
        $query=mysqli_query($this->conn,"
            SELECT
            COUNT(*) total_laporan,
            (SELECT COUNT(*) FROM users) total_user,
            (SELECT COUNT(*) FROM kategori) total_kategori,
            SUM(status_laporan='baak') barang_baak
            FROM laporan
        ");

        return mysqli_fetch_assoc($query);
    }

    public function getLaporanTerbaruAdmin()
    {
        return mysqli_query($this->conn,"
            SELECT
            nama_barang,
            foto_barang,
            status_laporan
            FROM laporan
            ORDER BY id_laporan DESC
            LIMIT 4
        ");
    }

    public function getLaporanTerbaru()
    {
        $query = "
        SELECT
            laporan.*,
            kategori.nama_kategori,
            users.nama_lengkap
        FROM laporan

        JOIN kategori
        ON laporan.id_kategori = kategori.id_kategori

        JOIN users
        ON laporan.id_user = users.id_user

        WHERE status_laporan IN ('aktif','baak')

        ORDER BY laporan.id_laporan DESC
        LIMIT 4
        ";

        return mysqli_query(
            $this->conn,
            $query
        );
    }

    public function filter($jenis)
    {
        $query = "
        SELECT
            laporan.*,
            kategori.nama_kategori,
            users.nama_lengkap
        FROM laporan

        JOIN kategori
        ON laporan.id_kategori = kategori.id_kategori

        JOIN users
        ON laporan.id_user = users.id_user

        WHERE
            jenis_laporan = '$jenis'
            AND status_laporan IN ('aktif','baak')

        ORDER BY laporan.id_laporan DESC
        ";

        return mysqli_query($this->conn,$query);
    }

    // Ambil semua laporan
    public function getAll()
    {
        $query = "
        SELECT
            laporan.*,
            kategori.nama_kategori,
            users.nama_lengkap
        FROM laporan

        JOIN kategori
        ON laporan.id_kategori =
            kategori.id_kategori

        JOIN users
        ON laporan.id_user =
            users.id_user

        WHERE laporan.status_laporan = 'aktif'
        OR
        status_laporan='baak'

        ORDER BY laporan.id_laporan DESC
        ";

        return mysqli_query(
            $this->conn,
            $query
        );
    }

    public function getAllAdmin()
    {
        $query = "
        SELECT
            laporan.*,
            kategori.nama_kategori,
            users.nama_lengkap
        FROM laporan

        JOIN kategori
        ON laporan.id_kategori = kategori.id_kategori

        JOIN users
        ON laporan.id_user = users.id_user

        ORDER BY laporan.id_laporan DESC
        ";

        return mysqli_query($this->conn, $query);
    }

    public function updateStatus($id, $status)
    {
        $query = "
        UPDATE laporan
        SET status_laporan = '$status'
        WHERE id_laporan = '$id'
        ";

        return mysqli_query($this->conn, $query);
    }

    // Ambil 1 laporan
    public function getById($id)
    {
        $query =
        "SELECT * FROM laporan
        WHERE id_laporan='$id'";

        $result =
        mysqli_query(
            $this->conn,
            $query
        );

        return mysqli_fetch_assoc($result);
    }

    // Update laporan
    public function update($data)
    {
        $foto = $data['foto_lama'];

        if($_FILES['foto_barang']['name'] != "")
        {
            $foto =
            $_FILES['foto_barang']['name'];

            $tmp =
            $_FILES['foto_barang']['tmp_name'];

            move_uploaded_file(
                $tmp,
                __DIR__ .
                "/../../public/uploads/barang/" .
                $foto
            );
        }

        $query = "
        UPDATE laporan
        SET
            id_kategori = '{$data['id_kategori']}',
            jenis_laporan = '{$data['jenis_laporan']}',
            nama_barang = '{$data['nama_barang']}',
            deskripsi = '{$data['deskripsi']}',
            foto_barang = '$foto',
            lokasi = '{$data['lokasi']}',
            tanggal_kejadian = '{$data['tanggal_kejadian']}'
        WHERE id_laporan = '{$data['id_laporan']}'
        ";

        return mysqli_query(
            $this->conn,
            $query
        );
    }

    public function getDetail($id)
    {
        $query = "
        SELECT
            laporan.*,
            kategori.nama_kategori,
            users.nama_lengkap
        FROM laporan

        JOIN kategori
        ON laporan.id_kategori =
        kategori.id_kategori

        JOIN users
        ON laporan.id_user =
        users.id_user

        WHERE laporan.id_laporan = '$id'
        ";

        $result =
        mysqli_query(
            $this->conn,
            $query
        );

        return mysqli_fetch_assoc($result);
    }

    public function getByUser($id)
    {
        $query = "
        SELECT
            laporan.*,
            kategori.nama_kategori
        FROM laporan

        JOIN kategori
        ON laporan.id_kategori = kategori.id_kategori

        WHERE laporan.id_user='$id'

        ORDER BY laporan.id_laporan DESC
        ";

        return mysqli_query(
            $this->conn,
            $query
        );
    }


    // Hapus laporan
    public function delete($id)
    {
        $query = "
        DELETE FROM laporan
        WHERE id_laporan = '$id'
        ";

        return mysqli_query(
            $this->conn,
            $query
        );
    }
}