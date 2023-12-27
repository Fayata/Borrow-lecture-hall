<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
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
                        <a href="booking/list"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Form Peminjaman</h1>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <?= $room['ruangan']; ?>
                        </h4>
                    </div>
                    <div class="card-body col">
                        <form action="booking/register/store" method="post">
                            <input type="hidden" name="csrf_token" value="<?= $csrf_token; ?>">
                            <div class="form-group">
                                <label>Tanggal Peminjaman</label>
                                <input type="text" class="form-control datepicker" name="date_request" required>
                            </div>
                            <button type="submit" class="btn btn-primary" id="bmit-button">Submit</button>
                        </form>
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