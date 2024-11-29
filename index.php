<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/autoload.php';

$query = "SELECT * FROM employees WHERE id NOT IN (?)";
$stmt = $connection->prepare($query);
$stmt->execute([$_SESSION['userId']]);
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM categories";
$categories = $connObj->selectAll($query);


?>


<?php require_once __DIR__ . '/Partials/head.php'; ?>

<body class="bg-light py-5">
    <?php require_once __DIR__ . '/Partials/navbar.php'; ?>

    <div class="d-flex align-items-end justify-content-between px-2 mt-3">
        <a href="results.php" class="text-info text-decoration-none fst-italic fs-3">See current results: <i class="fa-solid fa-square-poll-horizontal fa-beat-fade"></i> </a>
        <h1 class="text-end fst-italic mt-3 mb-0">Let's appreciate each other. <br> Vote for the best colleague in each category!</h1>
    </div>
    <hr class="mx-1 my-3">

    <div class="d-flex align-items-center justify-content-center my-5">
        <input type="text" id="searchBar" class="search w-25 me-2" placeholder="Search colleague by name or profession" onkeyup="filterEmployees()">
        <i class="fa-solid fa-magnifying-glass fa-beat-fade text-info fs-5"></i>
    </div>

    <div class="container d-flex align-items-stretch justify-content-center flex-wrap">

        <?php if (!empty($employees)) { ?>

            <?php foreach ($employees as $employee) { ?>
                <div class="card m-3 w-25 border-0 bg-light text-center">
                    <img src="<?= $employee['img'] ?>" class="card-img-top rounded-circle" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-decoration-underline"><?= $employee['name'] ?></h5>
                        <small class="text-muted fst-italic"><?= $employee['profession'] ?></small>
                        <p class="card-text"><?= $employee['bio'] ?></p>
                    </div>
                    <div class="card-body py-0">
                        <hr>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#voteModal<?= $employee['id'] ?>">
                            Vote
                        </button>
                        <hr>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="voteModal<?= $employee['id'] ?>" tabindex="-1" aria-labelledby="voteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="voteModalLabel">Vote for: <b class="text-info"><i><?= $employee['name'] ?></i></b></h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="voteForm<?= $employee['id'] ?>" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="nominee_id" value="<?= $employee['id'] ?>">
                                    <div class="coolinput mb-4">
                                        <label for="category_id_<?= $employee['id'] ?>" class="text">Category</label>
                                        <select class="input" name="category_id" id="category_id_<?= $employee['id'] ?>">
                                            <?php if (!empty($categories)) { ?>
                                                <option value="" selected disabled>Choose the category</option>
                                                <?php foreach ($categories as $category) { ?>
                                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <span id="categoryError_<?= $employee['id'] ?>" class="form-text text-danger fw-bold fs-6" style="display: none;"></span>
                                    </div>
                                    <div class="coolinput">
                                        <label for="comment_<?= $employee['id'] ?>" class="text">Comment</label>
                                        <textarea class="input" name="comment" id="comment_<?= $employee['id'] ?>"></textarea>
                                        <span id="commentError_<?= $employee['id'] ?>" class="form-text text-danger fw-bold fs-6" style="display: none;"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary vote-button" data-employee-id="<?= $employee['id'] ?>">Vote</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

        <?php } ?>
    </div>

    <?php require_once __DIR__ . '/Partials/footer.php'; ?>

    <script src="JS/search.js"></script>

</body>

</html>