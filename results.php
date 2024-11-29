<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/autoload.php';

$MakesWorkFun = $connObj->nominee(1);
$TeamPlayer = $connObj->nominee(2);
$CultureChampion = $connObj->nominee(3);
$DiffrenceMaker = $connObj->nominee(4);
$order = 1;
$order1 = 1;
$order2 = 1;
$order3 = 1;
$order4 = 1;



$sql = "
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

$stmt = $connection->query($sql);

$top5Voters = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require_once __DIR__ . '/Partials/head.php'; ?>

<body class="bg-light py-5">
    <?php require_once __DIR__ . '/Partials/navbar.php'; ?>

    <h1 class="fst-italic w-100 text-end mt-5 px-3 mb-0">Current Results of the Winners in each category!</h1>
    <hr class="pb-5 px-5">
    <div class="container d-flex align-items-start justify-content-between flex-wrap">

        <?php

        $connObj->renderTable("Makes Work Fun", $MakesWorkFun, 'info');
        $connObj->renderTable("Team Player", $TeamPlayer, 'warning');
        $connObj->renderTable("Culture Champion", $CultureChampion, 'primary');
        $connObj->renderTable("Diffrence Maker", $DiffrenceMaker, 'danger');

        ?>

    </div>

    <div class="container d-flex align-items-start justify-content-center">

        <table class="table caption-top table-success table-striped table-width">
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
                        <th scope="row"><?= $order4 ?></th>
                        <td><?= $employee['voter_name'] ?></td>
                        <td><?= $employee['vote_count'] ?></td>
                    </tr>
                <?php $order4++;
                } ?>

            </tbody>
        </table>
    </div>
    <?php require_once __DIR__ . '/Partials/footer.php'; ?>



</body>

</html>