<?php
//
////function getAllActeur($status)
////{
////    global $pdo;
////    $sql = "SELECT * FROM acteur WHERE status = :status ORDER BY nom ASC";
////    $query = $pdo->prepare($sql);
////    $query->bindValue(':status', $status, PDO::PARAM_STR);
////    $query->execute();
////    return $query->fetchAll();
////}
////
////
////
//function getReveById($id)
//{
//    global $pdo;
//    $sql = "SELECT * FROM reves WHERE ID = :id";
//    $query = $pdo->prepare($sql);
//    $query->bindValue(':id', $id, PDO::PARAM_INT);
//    $query->execute();
//    return $query->fetch();
//}
//
