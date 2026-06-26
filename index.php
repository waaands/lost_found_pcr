<?php

session_start();

require_once "config/koneksi.php";

require_once "app/controllers/AuthController.php";
require_once "app/controllers/DashboardController.php";
require_once "app/controllers/ProfileController.php";
require_once "app/controllers/LaporanController.php";
require_once "app/controllers/KomentarController.php";
require_once "app/controllers/AdminController.php";

$auth = new AuthController($conn);
$dashboard = new DashboardController();
$profile = new ProfileController();
$laporan = new LaporanController($conn);
$komentar = new KomentarController($conn);
$admin = new AdminController();

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'dashboard';

    $halamanWajibLogin = [
        'profile',
        'tambah',
        'simpan',
        'edit',
        'update',
        'hapus',
        'komentar',
        'admin_laporan',
        'admin_user',
        'admin'
    ];

    if (
        in_array($aksi, $halamanWajibLogin)
        && !isset($_SESSION['id_user'])
    )
    {
        header("Location: index.php?aksi=login");
        exit;
    }

    if (
        in_array($aksi, ['admin', 'admin_laporan', 'admin_user'])
        && $_SESSION['role'] != "admin"
    )
    {
        echo "
        <script>
            alert('Akses ditolak!');
            window.location='index.php?aksi=dashboard';
        </script>
        ";
        exit;
    }

switch ($aksi)
{
    // AUTH
    case 'login':
        $auth->login();
        break;

    case 'prosesLogin':
        $auth->prosesLogin();
        break;

    case 'register':
        $auth->register();
        break;

    case 'prosesRegister':
        $auth->prosesRegister();
        break;

    case 'logout':
        $auth->logout();
        break;

    // DASHBOARD
    case 'dashboard':
        $dashboard->index();
        break;

    // PROFILE
    case 'profile':
        $profile->index();
        break;

    // LAPORAN
    case 'laporan':
        $laporan->index();
        break;

    case 'detail':
        $laporan->detail();
        break;

    case 'tambah':
        $laporan->tambah();
        break;

    case 'simpan':
        $laporan->simpan();
        break;

    case 'edit':
        $laporan->edit();
        break;

    case 'update':
        $laporan->update();
        break;

    case 'hapus':
        $laporan->hapus();
        break;

    // KOMENTAR
    case 'komentar':
        $komentar->simpan();
        break;

    // ADMIN
    case 'admin':
        $admin->index();
        break;  

    case 'admin_laporan':
        $admin->laporan();
        break;

    case 'admin_user':
        $admin->user();
        break;

    default:
        $dashboard->index();
        break;
}