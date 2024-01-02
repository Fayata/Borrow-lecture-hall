<?= $this->extend('anggota/layout/layout') ?>

<?= $this->section('content') ?>

<!-- Widgets Start -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Riwayat Peminjaman</h4>
        </div>
        <div class="card-body col">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Ruangan</th>
                        <th>Tanggal</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Nomor WhatsApp</th>
                        <th>Tujuan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php if (!empty($bookings)) : ?>
                        <?php foreach ($bookings as $key => $booking) : ?>
                            <tr>
                                <td>
                                    <?= $key + 1; ?>
                                </td>
                                <td>
                                    <?= $booking['nama']; ?>
                                </td>
                                <td>
                                    <?= $booking['ruangan']; ?>
                                </td>
                                <td>
                                    <?= $booking['date_request']; ?>
                                </td>
                                <td>
                                    <?= $booking['start_time']; ?>
                                </td>
                                <td>
                                    <?= $booking['end_time']; ?>
                                </td>
                                <td>
                                    <?= $booking['no_wa']; ?>
                                </td>
                                <td>
                                    <?= $booking['tujuan']; ?>
                                </td>
                                <td>
                                    <?php if ($booking['status'] === 'pending') : ?>
                                        <div class="badge bg-secondary">
                                            <?= $booking['status']; ?>
                                        </div>
                                    <?php elseif ($booking['status'] === 'approved') : ?>
                                        <div class="badge bg-success">
                                            <?= $booking['status']; ?>
                                        </div>
                                    <?php elseif ($booking['status'] === 'rejected') : ?>
                                        <div class="badge bg-danger">
                                            <?= $booking['status']; ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="btn btn-sm btn-secondary disabled">
                                        <?= $booking['status']; ?>
                                    </span>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7">Belum ada riwayat peminjaman ruangan.</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->


<?= $this->endSection() ?>