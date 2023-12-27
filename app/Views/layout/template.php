<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title') ?>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <header>
                <nav class="navbar">
                </nav>
            </header>
            <aside id="sidebar-wrapper">
            </aside>
            <main class="main-content">
                <?= $this->renderSection('content') ?>
            </main>
            <footer class="main-footer">
            </footer>
        </div>
    </div>
    <script src="<?= base_url() ?>/assets/js/scripts.js"></script>
</body>

</html>