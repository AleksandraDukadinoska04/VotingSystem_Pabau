<?php

require_once __DIR__ . '/autoload.php';
$logFile = __DIR__ . '/end_of_voting_log.txt';


// CHEK IF IS TODAY THE LAST DAY OF THE MONTH
$today = new DateTime();
$isLastDay = $today->format('d') === $today->format('t');

if (!$isLastDay) {
    file_put_contents($logFile, date('Y-m-d H:i:s') . " - Command is not executed\n", FILE_APPEND);
    $winners = false;
    exit;
}

// CLEAR THE CERTIFICATES FOLDER FROM THE PAST CERTIFICATES
$directory = 'Certificates';

if (is_dir($directory)) {
    $files = array_diff(scandir($directory), array('.', '..'));
    foreach ($files as $file) {
        $filePath = $directory . DIRECTORY_SEPARATOR . $file;
        if (is_file($filePath)) {
            unlink($filePath);
        }
    }
}

// GENERATE NEW CERTIFICATES FOR WINNERS OF THIS MONTH IN EACH CATEGORY
$MakesWorkFun = $connObj->getWinnersForCategory(1);

if (!empty($MakesWorkFun)) {
    $generate = $connObj->generateCertificates($MakesWorkFun);
}

$TeamPlayer = $connObj->getWinnersForCategory(2);

if (!empty($TeamPlayer)) {
    $generate = $connObj->generateCertificates($TeamPlayer);
}

$CultureChampion = $connObj->getWinnersForCategory(3);

if (!empty($CultureChampion)) {
    $generate = $connObj->generateCertificates($CultureChampion);
}

$DiffrenceMaker = $connObj->getWinnersForCategory(4);

if (!empty($DiffrenceMaker)) {
    $generate = $connObj->generateCertificates($DiffrenceMaker);
}

// TRUNCATE VOTES TABLE FOR NEW VOTES NEXT MONTH 
// $stmt = $connection->prepare("TRUNCATE TABLE votes");
// $stmt->execute();


file_put_contents($logFile, date('Y-m-d H:i:s') . " - Command executed\n", FILE_APPEND);
$winners = true;
