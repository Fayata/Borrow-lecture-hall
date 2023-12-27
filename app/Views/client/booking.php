<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room List</title>
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
                    <h1>Room List</h1>
                </div>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="section-body">
                    <div class="row">
                        <?php foreach ($rooms as $room): ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>
                                            <?= $room['ruangan']; ?>
                                        </h4>
                                        <div class="card-header-action">
                                            <a href="booking/register/<?= $room['id']; ?>"
                                                class="btn btn-primary">Reservation Now!</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2 text-muted">Kapasitas :
                                            <?= $room['kapasitas']; ?>
                                        </div>
                                        <div class="mb-2 text-muted">Fasilitas :
                                            <?= $room['fasilitas']; ?>
                                        </div>
                                        <div class="chocolat-parent">
                                            <a href="<?= base_url('public/uploads/rooms/' . $room['image']); ?>"
                                                class="chocolat-image" title="Just an example">
                                                <div data-crop-image="285">
                                                    <img alt="image"
                                                        src="<?= base_url('public/uploads/rooms/' . $room['image']); ?>"
                                                        class="img-fluid">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </main>
        <footer class="main-footer">
        </footer>
    </div>
    <script src="assets/js/scripts.js"></script>
</body>

</html>