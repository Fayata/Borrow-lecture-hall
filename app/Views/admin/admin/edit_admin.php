<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin Page &mdash;</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>

    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url('admin') ?>"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1 class="text-center">Edit Admin</h1>
        </div>

        <div class="section-body">
            <div class="container">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Admin</h4>
                    </div>
                    <div class="card-body">

                        <form action="/admin/update/<?= $admin['id'] ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control"
                                    value="<?= $admin['username'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    value="<?= $admin['nama'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="<?= $admin['email'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</body>

</html>