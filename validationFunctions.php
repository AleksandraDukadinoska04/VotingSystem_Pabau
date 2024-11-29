<?php

function requerdField($field)
{
    if (empty($field)) {
        return true;
    }
    return false;
}
function usernameTaken($users, $username)
{

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            return true;
        }
    }
    return false;
}
function invalidEmail($email)
{
    if ($email !== filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}
function emailTaken($users, $email)
{
    foreach ($users as $user) {
        if ($email === $user['email']) {
            return true;
        }
    }
    return false;
}
function passLength($password)
{
    if (strlen($password) < 6) {
        return true;
    }
    return false;
}

function passwordValidation($password)
{
    if (!preg_match('/^(?=.*[0-9])(?=.*[A-Z])(?=.*[^\w\s]).{8,}$/', $password)) {
        return true;
    }
    return false;
}

function checkUser($users, $email, $password)
{
    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            return $user;
        }
    }
    return false;
}
function imageValidation($imageUrl)
{
    if (filter_var($imageUrl, FILTER_VALIDATE_URL) === false) {
        return false;
    }

    return true;
}
