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

        ORDER BY laporan.id_laporan DESC
        ";

        return mysqli_query(
            $this->conn,
            $query
        );
    }

    // Ambil 1 laporan
    public function getById($id)
    {
        $query = "
        SELECT * FROM laporan
        WHERE id_laporan = '$id'
        ";

        $result = mysqli_query(
            $this->conn,
            $query
        );

        return mysqli_fetch_assoc($result);
    }

    // Update laporan
    public function update($data)
    {
        $query = "
        UPDATE laporan
        SET
            id_kategori = '{$data['id_kategori']}',
            jenis_laporan = '{$data['jenis_laporan']}',
            nama_barang = '{$data['nama_barang']}',
            deskripsi = '{$data['deskripsi']}',
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