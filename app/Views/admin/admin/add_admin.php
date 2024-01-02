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
            <h4>Add Admin</h4>
        </div>
        <div class="card-body col">
            <form action="/AdminController/store" method="post" autocomplete="off">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nohp">Nomor Telepon</label>
                    <input type="number" id="nohp" name="nohp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div>
                    <button class="btn btn-success" type="submit"><i class="fas fa-paper-plane"></i>Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Widgets End -->

<?= $this->endSection() ?>