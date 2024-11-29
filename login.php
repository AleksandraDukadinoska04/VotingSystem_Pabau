<?php
session_start();

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    return;
}
?>

<?php require_once __DIR__ . '/Partials/head.php' ?>

<body class="bg-light">

    <?php require_once __DIR__ . '/Partials/navbar.php' ?>


    <div class="container d-flex align-items-center justify-content-center mt-5 pt-5">
        <form id="loginForm" method="POST" class="d-flex w-75 flex-column align-items-center justify-content-center">
                <div class="w-75">
                    <h1 class="my-4 text-center fst-italic ">To be able to vote you must first log in!</h1>
                    <hr>
                </div>
                
                <div class="w-50">
                        <div class="coolinput">
                            <label for="email" class="text">Email:</label>
                            <input type="email" placeholder="Write here..." name="email" id="email" class="input">
                        </div>
                        <span class="validations d-block mx-auto fw-bold w-100 text-danger" id="emailError"></span>
                   
                </div>

                <div class="w-50">

                        <div class="coolinput">
                            <label for="email" class="text">Password:</label>
                            <input name="password" id="password" type="password" placeholder="Write here..." class="input">
                        </div>
                        <span class="validations d-block mx-auto fw-bold w-100 text-danger" id="passwordError"></span>
                   
                </div>

                <div class="">

                    <button type="submit" class="bn5 my-4">LOGIN</button>

                </div>


        </form>
    </div>


    <?php require_once __DIR__ . '/Partials/footer.php' ?>

    <script src="JS/login.js"></script>

</body>

</html>