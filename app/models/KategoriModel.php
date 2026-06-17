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
}