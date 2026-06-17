<?php

session_start();

require_once __DIR__ . "/../../config/koneksi.php";
require_once __DIR__ . "/../models/UserModel.php";

class AuthController
{
    private $userModel;

    public function __construct($conn)
    {
        $this->userModel = new UserModel($conn);
    }

    public function register()
    {
        if(isset($_POST['register']))
        {
            $result = $this->userModel->register($_POST);

            if($result)
            {
                echo "
                <script>
                    alert('Registrasi berhasil');
                    window.location='../views/auth/login.php';
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

    public function login()
    {
        if(isset($_POST['login']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->login(
                $email,
                $password
            );

            if($user)
            {
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['nama'] = $user['nama_lengkap'];
                $_SESSION['role'] = $user['role'];

                header(
                    "Location: ../../public/index.php"
                );
            }
            else
            {
                echo "
                <script>
                    alert('Email atau Password Salah');
                    history.back();
                </script>
                ";
            }
        }
    }
}

$auth = new AuthController($conn);

if(isset($_POST['register']))
{
    $auth->register();
}

if(isset($_POST['login']))
{
    $auth->login();
}