<?php
    include "conf.php";

    $id = $_GET['id'];
    $sql = "DELETE FROM `user` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: index.php?msg=deleted data.");
    }else{
        echo "Faild." . mysqli_error($conn);
    }
?>