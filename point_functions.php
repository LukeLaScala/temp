<?php
require('point_connection.php');


function get_id_of_point()
{
    global $dbh;

    $stmt = $dbh->prepare("SELECT MAX(id) + 1 as maxID from point");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row['maxID'];
}

function add_point($uid, $data, $id){
    global $dbh;

    $stmt = $dbh->prepare("INSERT INTO point (id, point_blob, uid) VALUES (:id, :point_blob, :uid)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':point_blob', $data);
    $stmt->bindParam(':uid', $uid);

    $stmt->execute();

    return 1;
}

function get_all_points($uid)
{
    global $dbh;

    $stmt = $dbh->prepare("SELECT point_blob from point where uid = :uid");
    $stmt->bindParam(':uid', $uid);
    $stmt->execute();
    return $stmt->fetchAll();
}

?>