<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Admin Page &mdash;</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>

    <section class="section">
        <div class="section-header">
            <h1 class="text-center">Admin</h1>
            <div class="section-header-button">
                <a href="admin/create" class="btn btn-success">Add New</a>
            </div>
        </div>

        <?php if (session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if (session()->has('delete')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= session()->getFlashdata('delete'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="section-body">
        </div>
    </section>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Admin</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($admin)): ?>
                                <?php foreach ($admin as $key => $adm): ?>
                                    <tr>
                                        <td>
                                            <?= $key + 1; ?>
                                        </td>
                                        <td>
                                            <?= $adm['username']; ?>
                                        </td>
                                        <td>
                                            <?= $adm['nama']; ?>
                                        </td>
                                        <td>
                                            <?= $adm['email']; ?>
                                        </td>
                                        <td>
                                            <a href="/admin/edit/<?= $adm['id'] ?>" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="/admin/delete/<?= $adm['id'] ?>" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">Tidak ada pengguna dengan peran admin.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>