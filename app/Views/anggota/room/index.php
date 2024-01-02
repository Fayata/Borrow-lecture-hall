<?= $this->extend('anggota/layout/layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <?php foreach ($rooms as $key => $room) : ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/assets/image/ruangan/<?= $room['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $room['ruangan'] ?></h5>
                    <p class="card-text">Kapasitas : <?= $room['kapasitas'] ?></p>
                    <p class="card-text">Fasilitas : <?= $room['fasilitas'] ?></p>
                    <?php if ($room['status'] == 'free') : ?>
                        <a href="/AnggotaController/RegistrationForm/<?= $room['id'] ?>" class="btn btn-primary">Ajukan Peminjaman</a>
                    <?php elseif ($room['status'] == 'booked') : ?>
                        <p class="btn btn-secondary">Ruangan ini sedang dipakai</p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?= $this->endSection() ?>
