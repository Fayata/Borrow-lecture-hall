<?= $this->extend('admin/layout/layout') ?>

<?= $this->section('content') ?>

<!-- Widgets Start -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h3>Selamat datang <?= session('user')['nama']?> anda login sebagai <?= session('user')['role']?></h3>
        </div>
    </div>
</div>
<!-- Widgets End -->

<?= $this->endSection() ?>