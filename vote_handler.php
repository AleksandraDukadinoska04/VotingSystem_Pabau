<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nominee_id'], $_POST['category_id'], $_POST['comment'])) {
        $voter_id = $_SESSION['userId'];
        $nominee_id = filter_var($_POST['nominee_id'], FILTER_SANITIZE_NUMBER_INT);
        $category_id = filter_var($_POST['category_id'], FILTER_SANITIZE_NUMBER_INT);
        $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');


        if (!$nominee_id || !$category_id || empty($comment)) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required and must be valid.']);
            exit;
        }

        if ($voter_id == $nominee_id) {
            echo json_encode(['status' => 'error', 'message' => 'You cannot vote for yourself.']);
            exit;
        }

        $query = "SELECT * FROM votes WHERE voter_id = :voter_id AND category_id = :category_id";
        $stmt = $connection->prepare($query);
        $stmt->execute(['voter_id' => $voter_id, 'category_id' => $category_id]);
        $result = $stmt->fetch();

        if ($result) {
            echo json_encode(['status' => 'error', 'message' => 'You have already voted for someone in this category.']);
            exit;
        }

        try {

            if (!$connection) {
                echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
                exit;
            }

            $query = "INSERT INTO votes (voter_id, nominee_id, category_id, comment, created_at) 
                      VALUES (:voter_id, :nominee_id, :category_id, :comment, NOW())";
            $stmt = $connection->prepare($query);

            $stmt->bindParam(':voter_id', $voter_id, PDO::PARAM_INT);
            $stmt->bindParam(':nominee_id', $nominee_id, PDO::PARAM_INT);
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Vote submitted successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to submit vote.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . 'something went wrong! Please try again and make sure that you are submitting valid values.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
    }
}
