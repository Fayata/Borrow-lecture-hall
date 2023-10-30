<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Page</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Silahkan Login</h5>
                        <p class="text-error">
                            <?= session()->getFlashdata('error'); ?>
                        </p>
                        <?php $error_validasi = session()->getFlashdata('error_validasi') ?? null ?>
                        <form action="<?= base_url('login') ?>" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="text" class="form-control" id="email" name="email">
                                <?php if ($error_validasi and isset($error_validasi['email'])) { ?>
                                    <p class="text-danger">
                                        <?= $error_validasi['email'] ?>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <?php if ($error_validasi and isset($error_validasi['password'])) { ?>
                                    <p class="text-danger">
                                        <?= $error_validasi['password'] ?>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" value="1">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>