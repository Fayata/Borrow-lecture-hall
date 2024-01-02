<?= $this->extend('anggota/layout/layout') ?>

<?= $this->section('content') ?>

<div class="section-header">
    <h1>Data Peminjaman</h1>
</div>
<?php if (session()->has('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="row">
    <?php foreach ($rooms as $key => $room) : ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/assets/image/ruangan/<?= $room['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $room['ruangan'] ?></h5>
                    <p class="card-text">Kapasitas : <?= $room['kapasitas'] ?></p>
                    <p class="card-text">Fasilitas : <?= $room['fasilitas'] ?></p>

                    <?php if ($room['status'] === 'booked') : ?>
                        <a href="/AnggotaController/checkout/<?= $room['id'] ?>" class="btn btn-danger">Checkout</a>
                    <?php elseif ($room['status'] === 'pending') : ?>
                        <p class="btn btn-info">Sedang diproses admin</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>


<?= $this->endSection() ?>