<?php session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php session(); ?>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title') ?>

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <?php session(); ?>
                    <?php $user = session()->get('user'); ?>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>/stisla/assets/img/avatar/avatar-1.png"
                                class="rounded-circle mr-1">
                            <?php if (session()->get('success') && session()->get('user') && session()->get('user')['nama']): ?>
                                <div class="d-sm-none d-lg-inline-block">Hi,
                                    <?= session()->get('user')['nama']; ?>
                                </div>
                            <?php endif; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <div class="dropdown-divider"></div>
                            <a href="<?= site_url('logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <ul class="sidebar-menu">
                        <?= $this->include('layout/sidebar') ?>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?= $this->renderSection('content') ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> Developed By Fayata</a>
                </div>
            </footer>
        </div>
    </div>
    <script>
        function confirmAction(message, element) {
            swal({
                title: "Confirmation",
                text: message,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then(function (confirm) {
                if (confirm) {
                    window.open(element.getAttribute("data-href"), "_blank");
                }
            });

            return false;
        }
    </script>


</body>

</html>