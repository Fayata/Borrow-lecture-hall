<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin Page &mdash;</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>

    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url('admin') ?>"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1 class="text-center">Admin</h1>
        </div>

        <div class="section-body">
            <div class="container">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Admin</h4>
                    </div>
                    <div class="card-body">

                        <form action="/admin/store" method="post" autocomplete="off">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</body>

</html>