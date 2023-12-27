<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page &mdash;</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="app">
        <header>
            <nav class="navbar">
            </nav>
        </header>
        <aside id="sidebar-wrapper">
        </aside>
        <main class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Peminjaman</h1>
                </div>
                <div class="section-body">
                </div>
            </section>

            <div class="card">
                <div class="card-header">
                    <h4>Daftar Peminjaman</h4>
                </div>
                <div class="card-body col">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>No</th>
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Nomor WhatsApp</th>
                                <th>Tujuan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php if (!empty($bookings)): ?>
                                <?php foreach ($bookings as $key => $booking): ?>
                                    <tr>
                                        <td>
                                            <?= $key + 1; ?>
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
                                            <?php if ($booking['status'] === 'pending'): ?>
                                                <span class="pending">Pending</span>
                                            <?php elseif ($booking['status'] === 'approved'): ?>
                                                <span class="approved">Approved</span>
                                            <?php elseif ($booking['status'] === 'rejected'): ?>
                                                <span class="rejected">Rejected</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($booking['status'] === 'pending'): ?>
                                                <a href="/booking/update-status/<?= $booking['id'] ?>/approved">Approve</a>
                                                <a href="/booking/update-status/<?= $booking['id'] ?>/rejected">Reject</a>
                                            <?php else: ?>
                                                <span class="disabled">
                                                    <?= $booking['status']; ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">Belum ada peminjaman ruangan.</td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="main-footer">
        </footer>
    </div>
    <script src="assets/js/scripts.js"></script>
</body>

</html>