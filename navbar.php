<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #007bff;">
    <div class="container">
        <a class="navbar-brand" href="#" style="color: #fff;">PawPal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php" style="color: #fff;">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_pet.php" style="color: #fff;">Add Pet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transactions.php" style="color: #fff;">Transactions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports.php" style="color: #fff;">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="color: #fff;">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* CSS untuk mengatur tampilan navbar */
    .navbar-brand {
        font-size: 24px;
        font-weight: bold;
    }

    .navbar-nav .nav-item {
        margin-right: 10px;
    }

    .navbar-nav .nav-link {
        font-size: 18px;
    }

    .navbar-nav .nav-link:hover {
        color: #f8f9fa; /* Warna putih untuk teks saat dihover */
    }

    .navbar-toggler {
        border: none;
        background: transparent;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba%28185%2c 58%2c 20%2c 0.7%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .navbar-light .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba%28185%2c 58%2c 20%2c 0.7%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .navbar-toggler:focus {
        outline: none;
    }
</style>
