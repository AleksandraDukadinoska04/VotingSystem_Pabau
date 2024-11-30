<?php
session_start();

require_once __DIR__ . '/autoload.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if (!$email) {
        echo json_encode(['status' => 'error', 'errorType' => 'email', 'message' => 'Please enter a valid email.']);
        exit;
    }

    if (empty($password)) {
        echo json_encode(['status' => 'error', 'errorType' => 'password', 'message' => 'Password cannot be empty.']);
        exit;
    }
 
    try {
        $query = "SELECT * FROM employees WHERE email = :email";
        $user = $connObj->selectOne($query, ['email' => $email]);
        
        if ($user && password_verify($password, $user['password'])) { 
            $_SESSION['login'] = true;
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userName'] = $user['name'];

            echo json_encode(['status' => 'success', 'message' => 'Login successful.']);
        } else {
            echo json_encode(['status' => 'error', 'errorType' => 'password', 'message' => 'Invalid email or password.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
