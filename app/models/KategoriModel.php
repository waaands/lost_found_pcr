<?php

class KategoriModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAll()
    {
        $query = "SELECT * FROM kategori";

        return mysqli_query(
            $this->conn,
            $query
        );
    }

    public function getById($id)
    {
        $query = "
        SELECT *
        FROM kategori
        WHERE id_kategori='$id'
        ";

        $result = mysqli_query($this->conn, $query);

        return mysqli_fetch_assoc($result);
    }

    public function insert($data)
    {
        $query = "
        INSERT INTO kategori(nama_kategori)
        VALUES('{$data['nama_kategori']}')
        ";

        return mysqli_query($this->conn, $query);
    }

    public function update($data)
    {
        $query = "
        UPDATE kategori
        SET nama_kategori='{$data['nama_kategori']}'
        WHERE id_kategori='{$data['id_kategori']}'
        ";

        return mysqli_query($this->conn, $query);
    }

    public function delete($id)
    {
        $query = "
        DELETE FROM kategori
        WHERE id_kategori='$id'
        ";

        return mysqli_query($this->conn, $query);
    }
}