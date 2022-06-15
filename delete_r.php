<?php 
    session_start();
    include("connect.php");

    if($_GET['id']){
        $id = $_GET['id'];
        $query = $db->prepare('DELETE FROM reservation WHERE id = ?');
        $query->bindParam(1,$id);
        $res = $query->execute();
        if($res) {
            header('Location: admin.php');
        }
        else{
            echo "Suppression non réussie";
        }
    }else{
        header('location:admin.php');
    }
?>