<?php

function showAlert($message)
{
  echo "<script type='text/javascript'>alert('$message');</script>";
}
function autoLogoutAfterInactivity($timeoutInSeconds, $redirectURL)
{
  if (!isset($_SESSION["last_activity"])) {
    $_SESSION["last_activity"] = time();
  }

  if ((time() - $_SESSION["last_activity"]) > $timeoutInSeconds) {
    session_unset();
    session_destroy();
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600, '/');
    }
    header("Location: ../pages/$redirectURL");
    exit();
  }

  $_SESSION["last_activity"] = time();
}
// Kiểm tra để đảm bảo email duy nhất
function isEmailExist($mysqli, $email)
{
  $query = "SELECT COUNT(*) as total FROM users WHERE email = ?";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  return $row['total'] > 0;
}

function insertUserData($mysqli, $UserName, $email, $password)
{
  $query = "INSERT INTO users(UserName, email, matkhau) VALUES (?,?,?);";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("sss", $UserName, $email, $password);

  return $stmt->execute();
}

// Function to authenticate user credentials
function Authentication($mysqli, $email, $password)
{
  $query = "SELECT * FROM `users` WHERE email=? AND password=?";
  $stmt = executePreparedStatement($mysqli, $query, "ss", $email, $password);
  $result = $stmt->get_result();
  return $result->num_rows === 1;
}

// Function to set user session after successful authentication
function Authorization($mysqli, $email)
{
  $query = "SELECT UserName, role FROM `users` WHERE email=?";
  $stmt = executePreparedStatement($mysqli, $query, "s", $email);
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $_SESSION['email'] = $email;
  $_SESSION['UserName'] = $row['UserName'];
  $_SESSION['role'] = $row['role'];
}

// Function to check access role and redirect if necessary
function checkAccessRole($requiredRole)
{
  if (!isset($_SESSION["email"])) {
    header("Location: ../pages/login.php");
    exit();
  }
  $email = $_SESSION["email"];
  require_once '../database/database.php';
  $query = "SELECT role FROM users WHERE email=?";
  $stmt = executePreparedStatement($mysqli, $query, "s", $email);
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user["role"] != $requiredRole) {
    unsetUserSession();
    header("Location: ../pages/login.php");
    exit();
  }
}

// Function to unset and destroy user session
function unsetUserSession()
{
  $_SESSION = array();
  session_destroy();
  if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
  }
}


// Function to get entity ID from the database
function getEntityID($mysqli, $table, $columnName, $value)
{
  $query = "SELECT {$table}ID FROM {$table} WHERE {$columnName}=?";
  $stmt = executePreparedStatement($mysqli, $query, "s", $value);
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  return $row["{$table}ID"];
}

// Function to execute prepared statement and return the statement
function executePreparedStatement($mysqli, $query, $types, ...$params)
{
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param($types, ...$params);
  $stmt->execute();
  return $stmt;
}
