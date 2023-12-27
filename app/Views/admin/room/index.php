<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms Page</title>
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
                    <h1>Ruangan</h1>
                    <div class="section-header-button">
                        <a href="rooms/create" class="btn btn-success">Add New</a>
                    </div>
                </div>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['delete'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?= $_SESSION['delete']; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="section-body">
                </div>
            </section>

            <div class="card">
                <div class="card-header">
                    <h4>Daftar Ruangan</h4>
                </div>
                <div class="card-body col">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tbody>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Ruangan</th>
                                    <th>Kapasitas</th>
                                    <th>Fasilitas</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach ($rooms as $key => $room): ?>
                                    <tr>
                                        <td>
                                            <?= $key + 1; ?>
                                        </td>
                                        <td>
                                            <?= $room['ruangan'] ?>
                                        </td>
                                        <td>
                                            <?= $room['kapasitas'] ?>
                                        </td>
                                        <td>
                                            <?= $room['fasilitas'] ?>
                                        </td>
                                        <td>
                                            <?= $room['image'] ?>
                                        </td>
                                        <td>
                                            <a href="rooms/edit/<?= $room['id'] ?>" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="rooms/delete/<?= $room['id'] ?>" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
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