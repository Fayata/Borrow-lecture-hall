<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room Page</title>
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
                    <div class="section-header-back">
                        <a href="rooms"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Ruangan</h1>
                </div>
                <div class="section-body">
                </div>
            </section>

            <div class="card">
                <div class="card-header">
                    <h4>Edit Ruangan</h4>
                </div>
                <div class="card-body col">
                    <form action="rooms/update/<?= $room['id'] ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= csrf_token() ?>">
                        <div class="form-group">
                            <label>Ruangan</label>
                            <input type="text" name="ruangan" class="form-control" value="<?= $room['ruangan'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control"
                                value="<?= $room['kapasitas'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Fasilitas</label>
                            <textarea name="fasilitas" class="form-control"><?= $room['fasilitas'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <div>
                            <button class="btn btn-success" type="submit"><i
                                    class="fas fa-paper-plane"></i>Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <footer class="main-footer">
        </footer>
    </div>
    <script src="assets/js/scripts.js"></script>
</body>

</html>