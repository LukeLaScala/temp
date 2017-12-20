<?php
require('user_connection.php');


function add_user($username, $password)
{
    global $dbh;

    $stmt = $dbh->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
}

function get_user($username){
    global $dbh;
    $stmt = $dbh->prepare("SELECT * from user WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}
function log_in($username, $password)
{
    global $dbh;

    $stmt = $dbh->prepare("SELECT uid,password,username from user WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($password === $row['password']) {
        $_SESSION['user'] = Array();
        $_SESSION['user']['uid'] = $row['uid'];
        $_SESSION['user']['username'] = $row['username'];
    }

    return;

}

function logged_in(){
	return isset($_SESSION['user']['uid']);
}

?>