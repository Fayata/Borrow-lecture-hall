<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('content') ?>

<!-- Widgets Start -->
<div class="container-fluid">
    <section class="section">
        <div class="section-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Member</h1>
                </div>
                <div class="col-md-6 text-end">
                    <a href="/AdminController/createAnggota" class="btn btn-success">Add New</a>
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
            <h4>Daftar Member</h4>
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
                            <th>No Hp</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php if (!empty($anggota)) : ?>
                            <?php foreach ($anggota as $key => $mem) : ?>
                                <tr>
                                    <td>
                                        <?= $key + 1; ?>
                                    </td>
                                    <td>
                                        <?= $mem['username']; ?>
                                    </td>
                                    <td>
                                        <?= $mem['nama']; ?>
                                    </td>
                                    <td>
                                        <?= $mem['email']; ?>
                                    </td>
                                    <td>
                                        <?= $mem['nomor_telepon']; ?>
                                    </td>
                                    <td>
                                        <?php if ($mem['status_akun'] === 'aktif') : ?>
                                            <span class="badge bg-success"><?= $mem['status_akun']; ?></span>
                                        <?php elseif ($mem['status_akun'] === 'nonaktif') : ?>
                                            <span class="badge bg-secondary"><?= $mem['status_akun']; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="/AdminController/editAnggota/<?= $mem['id'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="/AdminController/deleteAnggota/<?= $mem['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>

                                        <?php if ($mem['status_akun'] === 'aktif') : ?>
                                            <a href="/AdminController/nonaktifkanAnggota/<?= $mem['id'] ?>" class="btn btn-secondary btn-sm"><i class="fas fa-power-off"></i> Nonaktifkan</a>
                                        <?php elseif ($mem['status_akun'] === 'nonaktif') : ?>
                                            <a href="/AdminController/aktifkanAnggota/<?= $mem['id'] ?>" class="btn btn-success btn-sm"><i class="fas fa-power-off"></i> Aktifkan</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">Tidak ada pengguna dengan peran Member.</td>
                            </tr>
                        <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->

<?= $this->endSection() ?>