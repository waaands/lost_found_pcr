<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    <h3>Register Lost & Found PCR</h3>
                </div>

                <div class="card-body">

                    <form
                    action="../../controllers/AuthController.php"
                    method="POST">

                        <div class="mb-3">
                            <label>NIM</label>
                            <input
                            type="text"
                            name="nim"
                            class="form-control"
                            required>
                        </div>

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input
                            type="text"
                            name="nama_lengkap"
                            class="form-control"
                            required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input
                            type="email"
                            name="email"
                            class="form-control"
                            required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>
                        </div>

                        <button
                        type="submit"
                        name="register"
                        class="btn btn-success">

                            Register

                        </button>

                        <a
                        href="login.php"
                        class="btn btn-primary">

                            Login

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>