<nav class="navbar fixed-top navbar-expand-lg p-lg-0 p-md-1 bg-white">
    <div class="container-fluid p-2">
        <a class="navbar-brand" href="index.php"><img src="https://pabau.com/wp-content/uploads/2022/05/Logo-4-e1654525062364.png" alt="Pabau Logo" ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['login'])) { ?>
                    <a href="logout.php" class="login">LOG OUT</a>
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="login.php" class="login">LOGIN</a>
                    </li>

                <?php } ?>
            </ul>
        </div>
    </div>
</nav>