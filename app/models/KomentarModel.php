<?php

class KomentarModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert($data)
    {
        $query = "
        INSERT INTO komentar
        (
            id_laporan,
            id_user,
            isi_komentar
        )
        VALUES
        (
            '{$data['id_laporan']}',
            '{$data['id_user']}',
            '{$data['isi_komentar']}'
        )
        ";

        return mysqli_query(
            $this->conn,
            $query
        );
    }

    public function getByLaporan($id_laporan)
    {
        $query = "
        SELECT
            komentar.*,
            users.nama_lengkap
        FROM komentar

        JOIN users
        ON komentar.id_user =
           users.id_user

        WHERE komentar.id_laporan =
              '$id_laporan'

        ORDER BY komentar.id_komentar DESC
        ";

        return mysqli_query(
            $this->conn,
            $query
        );
    }
}