<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('content') ?>

<!-- Widgets Start -->
<div class="container-fluid">
    <section class="section">
        <div class="section-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Admin</h1>
                </div>
                <div class="col-md-6 text-end">
                    <a href="/AdminController/create" class="btn btn-success">Add New</a>
                </div>
            </div>
        </div>

        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if (session()->has('delete')) : ?>
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

    <div class="card">
        <div class="card-header">
            <h4>Daftar Admin</h4>
        </div>
        <div class="card-body col">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        <?php if (!empty($admin)) : ?>
                            <?php foreach ($admin as $key => $adm) : ?>
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
                                        <a href="/AdminController/edit/<?= $adm['id'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="/AdminController/delete/<?= $adm['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">Tidak ada pengguna dengan peran admin.</td>
                            </tr>
                        <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->

<?= $this->endSection() ?>