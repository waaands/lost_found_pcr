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
        $password = password_hash(
        $data['password'],
        PASSWORD_DEFAULT
        );

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

    public function insert($data)
    {
        $password = password_hash(
            $data['password'],
            PASSWORD_DEFAULT
        );

        $query = "
        INSERT INTO users
        (
            nim,
            nama_lengkap,
            email,
            password,
            role
        )
        VALUES
        (
            '{$data['nim']}',
            '{$data['nama_lengkap']}',
            '{$data['email']}',
            '$password',
            '{$data['role']}'
        )
        ";

        return mysqli_query(
            $this->conn,
            $query
        );
    }

    public function login($email, $password)
    {
        $query = "
        SELECT *
        FROM users
        WHERE email='$email'
        ";

        $result = mysqli_query(
            $this->conn,
            $query
        );

        $user = mysqli_fetch_assoc($result);

        if(
            $user &&
            password_verify(
                $password,
                $user['password']
            )
        )
        {
            return $user;
        }

        return false;
    }

    public function getAll()
    {
        $query = "
        SELECT *
        FROM users
        ORDER BY id_user DESC
        ";

        return mysqli_query(
            $this->conn,
            $query
        );
    }

    public function getById($id)
    {
        $query = "
        SELECT *
        FROM users
        WHERE id_user='$id'
        ";

        $result = mysqli_query($this->conn, $query);

        return mysqli_fetch_assoc($result);
    }

    public function getUserTerbaru()
    {
        return mysqli_query($this->conn,"
            SELECT
            nama_lengkap,
            role
            FROM users
            ORDER BY id_user DESC
            LIMIT 4
        ");
    }

    
    public function update($data)
    {
        if(!empty($data['password']))
        {
            $password = password_hash($data['password'], PASSWORD_DEFAULT);

            $query = "
            UPDATE users
            SET
                nim = '{$data['nim']}',
                nama_lengkap = '{$data['nama_lengkap']}',
                email = '{$data['email']}',
                password = '$password',
                role = '{$data['role']}'
            WHERE id_user = '{$data['id_user']}'
            ";
        }
        else
        {
            $query = "
            UPDATE users
            SET
                nim = '{$data['nim']}',
                nama_lengkap = '{$data['nama_lengkap']}',
                email = '{$data['email']}',
                role = '{$data['role']}'
            WHERE id_user = '{$data['id_user']}'
            ";
        }

        return mysqli_query($this->conn, $query);
    }

    public function delete($id)
    {
        $query = "
        DELETE FROM users
        WHERE id_user='$id'
        ";

        return mysqli_query($this->conn, $query);
    }
}