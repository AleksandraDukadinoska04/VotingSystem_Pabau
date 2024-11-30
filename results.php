<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/end_of_voting.php';


$MakesWorkFun = $connObj->nominee(1);
$TeamPlayer = $connObj->nominee(2);
$CultureChampion = $connObj->nominee(3);
$DiffrenceMaker = $connObj->nominee(4);

$query = "
    SELECT 
        employees.name AS voter_name,
        COUNT(votes.id) AS vote_count
    FROM 
        votes
    JOIN 
        employees ON votes.voter_id = employees.id
    GROUP BY 
        votes.voter_id
    ORDER BY 
        vote_count DESC
    LIMIT 5;
";

$top5Voters = $connObj->selectAll($query);
$order = 1;

$winnerName = $_SESSION['userName'];
$directory = "Certificates";
$searchPattern = "{$directory}/{$winnerName}_*.pdf";

$files = glob($searchPattern);

?>

<?php require_once __DIR__ . '/Partials/head.php'; ?>

<body class="bg-light py-5">
    <?php require_once __DIR__ . '/Partials/navbar.php'; ?>

    <!-- POP UP FOR DOWNLOADING CERTIFICATES -->
    <?php if ($winners && !empty($files)) { ?>
        <div class="modal show" id="certificateModal" tabindex="-1" style="display: block; background-color: rgba(0, 0, 0, 0.5);" aria-labelledby="certificateModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-2 fst-italic fw-bold text-info" id="certificateModalLabel">Congratulations! <i class="fa-solid fa-champagne-glasses fa-beat-fade"></i></h5>
                        <button type="button" class="btn-close" onclick="hideModal()" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>We are delighted to inform you that you have been nominated as one of the winners in your category/ies this month! Your exceptional dedication and hard work have truly made an impact, and this recognition is well deserved.</p>
                        <p>Please download your certificates below:</p>
                        <ul>
                            <?php foreach ($files as $file) { ?>
                                <li class="my-2"><a href='<?= $file ?>' download>Download Certificate: <?= basename($file) ?> </a></li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>


    <h1 class="fst-italic w-100 text-end mt-5 px-3 mb-0">Current Results of the Winners of this month in each category!</h1>
    <hr class="pb-3 px-5">
    <div class="container d-flex align-items-start justify-content-between flex-wrap">

        <?php

        $connObj->renderTable("Makes Work Fun", $MakesWorkFun, 'info');
        $connObj->renderTable("Team Player", $TeamPlayer, 'warning');
        $connObj->renderTable("Culture Champion", $CultureChampion, 'primary');
        $connObj->renderTable("Diffrence Maker", $DiffrenceMaker, 'danger');

        ?>

    </div>

    <div class="container d-flex align-items-start justify-content-center">

        <table class="table caption-top table-success table-striped table-width my-3">
            <caption class="fw-bold fst-italic text-success fs-5">Employee Voting Activity: Top 5 Participants <i class="fa-solid fa-medal fa-beat-fade"></i></caption>
            <thead>
                <tr>
                    <th scope="col">Place</th>
                    <th scope="col">Voter</th>
                    <th scope="col">Votes Cast</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($top5Voters as $employee) { ?>

                    <tr>
                        <th scope="row"><?= $order ?></th>
                        <td><?= $employee['voter_name'] ?></td>
                        <td><?= $employee['vote_count'] ?></td>
                    </tr>
                <?php $order++;
                } ?>

            </tbody>
        </table>
    </div>

    <?php require_once __DIR__ . '/Partials/footer.php'; ?>

    <script>
        function hideModal() {
            document.getElementById('certificateModal').style.display = 'none';
        }
    </script>

</body>

</html>