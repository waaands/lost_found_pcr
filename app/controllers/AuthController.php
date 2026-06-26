<?php

require_once __DIR__ . "/../../config/koneksi.php";
require_once __DIR__ . "/../models/UserModel.php";

class AuthController
{
    private $userModel;

    public function __construct($conn)
    {
        $this->userModel = new UserModel($conn);
    }

    // Tampilkan halaman login
    public function login()
    {
        require __DIR__ . "/../views/auth/login.php";
    }

    // Proses login
    public function prosesLogin()
    {
        if (isset($_POST['login']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->login($email, $password);

            if ($user)
            {
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['nama'] = $user['nama_lengkap'];
                $_SESSION['role'] = $user['role'];

                header("Location: index.php?aksi=dashboard");
                exit;
            }

            echo "
            <script>
                alert('Email atau Password Salah');
                window.location='index.php?aksi=login';
            </script>
            ";
        }
    }

    // Tampilkan halaman register
    public function register()
    {
        require __DIR__ . "/../views/auth/register.php";
    }

    // Proses register
    public function prosesRegister()
    {
        if (isset($_POST['register']))
        {
            $result = $this->userModel->register($_POST);

            if ($result)
            {
                echo "
                <script>
                    alert('Registrasi Berhasil');
                    window.location='index.php?aksi=login';
                </script>
                ";
            }
            else
            {
                echo "
                <script>
                    alert('Email sudah digunakan');
                    history.back();
                </script>
                ";
            }
        }
    }

    // Logout
    public function logout()
    {
        session_unset();
        session_destroy();

        header("Location: index.php?aksi=dashboard");
        exit;
    }
}