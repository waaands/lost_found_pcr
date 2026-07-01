<?php

class UserModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($data)
    {
        $nim = $data['nim'];
        $nama = $data['nama_lengkap'];
        $email = $data['email'];
        $password = $data['password'];

        $cek = mysqli_query(
            $this->conn,
            "SELECT * FROM users WHERE email='$email'"
        );

        if(mysqli_num_rows($cek) > 0)
        {
            return false;
        }

        $query = "INSERT INTO users
        (
            nim,
            nama_lengkap,
            email,
            password,
            role
        )
        VALUES
        (
            '$nim',
            '$nama',
            '$email',
            '$password',
            'mahasiswa'
        )";

        return mysqli_query(
            $this->conn,
            $query
        );
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM users
                    WHERE email='$email'
                    AND password='$password'";

        $result = mysqli_query(
            $this->conn,
            $query
        );

        return mysqli_fetch_assoc($result);
    }

    public function getAll()
    {
        $query = "SELECT * FROM users
                ORDER BY id_user DESC";

        return mysqli_query(
            $this->conn,
            $query
        );
    }
}