<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('content') ?>

<!-- Widgets Start -->
<div class="container-fluid">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url('/AdminController/admin') ?>"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Admin</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <h4>Edit Admin</h4>
        </div>
        <div class="card-body col">
            <form action="/AdminController/update/<?= $admin['id'] ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="<?= $admin['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= $admin['nama'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= $admin['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="nohp">Nomor Telepon</label>
                    <input type="number" id="nohp" name="nohp" class="form-control" value="<?= $admin['nomor_telepon'] ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Widgets End -->

<?= $this->endSection() ?>