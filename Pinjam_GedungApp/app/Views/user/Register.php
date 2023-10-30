<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registration Page</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Create an Account</h5>
                        <p class="text-success">
                            <!-- Display success message if user is successfully registered -->
                            <?= session()->getFlashdata('success'); ?>
                        </p>
                        <?php $error_validasi = session()->getFlashdata('error_validasi') ?? null ?>
                        <form action="<?= base_url('register') ?>" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="username">
                                <?php if ($error_validasi and isset($error_validasi['username'])) { ?>
                                    <p class="text-danger">
                                        <?= $error_validasi['username'] ?>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
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
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password"
                                    name="confirm_password">
                                <?php if ($error_validasi and isset($error_validasi['confirm_password'])) { ?>
                                    <p class="text-danger">
                                        <?= $error_validasi['confirm_password'] ?>
                                    </p>
                                <?php } ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                        <hr>
                        <p class="text-center">Already have an account? <a href="login.php">Log In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>