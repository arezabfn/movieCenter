<!--
This Section For Find Target File And Delete It From
Local Storage And Database
-->
<?php

$movie_center_path = $_SERVER['DOCUMENT_ROOT'] . '/movieCenter/';

if(isset($_GET['movie_id'])) {

    include $movie_center_path.'db/db.php';

    $sql_find = "SELECT * FROM `video` WHERE id = ".$_GET['movie_id']; //sql for find file in local Storage
    $res_find = mysqli_query($con, $sql_find);
    $result_find= mysqli_fetch_assoc($res_find);

    if (unlink($movie_center_path.'upload/movie/'.$result_find['video_url']))  //IF Find File and Unlink It from local storage is successful , Delete From DATABASE
    {
        unlink($movie_center_path.'upload/cover/'.$result_find['cover_url']); //unlink cover of movie
        $sql_delete = "DELETE FROM `video` WHERE `id` = " . $_GET['movie_id'];
        $res = mysqli_query($con, $sql_delete);
        header('Location:view.php'); // At Final Go To 'view.php'
    }
}

?>