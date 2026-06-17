<?php

require_once "../config/koneksi.php";
require_once "../app/models/UserModel.php";

$user = new UserModel($conn);

echo "UserModel berhasil";