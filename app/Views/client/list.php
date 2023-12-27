<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member List Page</title>
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
                    <h1>Member</h1>
                </div>

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
                                </tr>
                                <?php if (!empty($anggota)): ?>
                                    <?php foreach ($anggota as $key => $ang): ?>
                                        <tr>
                                            <td>
                                                <?= $key + 1; ?>
                                            </td>
                                            <td>
                                                <?= $ang['username']; ?>
                                            </td>
                                            <td>
                                                <?= $ang['nama']; ?>
                                            </td>
                                            <td>
                                                <?= $ang['email']; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5">Tidak ada pengguna dengan peran anggota.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
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