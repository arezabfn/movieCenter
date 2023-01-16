<?php
$movie_center_path = $_SERVER['DOCUMENT_ROOT'] . '/movieCenter/';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/View.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>View Movies</title>
</head>

<body>
<!-- Start NavBar-->
<nav class="navbar navbar-dark navbar-expand-lg bg-dark ">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Movie Center</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " id="home" aria-current="page" href="../index.php">UploadMovie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="view-movie" href="view.php">View Movies</a>
                </li>
        </div>
    </div>
</nav>
<!-- End NavBar-->

<!-- Start Section Title Above Cards-->
<div class="title-view">
    <h2>View Movies</h2>
    <hr>
</div>
<!-- End Section Title Above Cards-->

<!-- Start Section View All Movie Card-->
<div class="all-cards">
    <div class="row" id="data-panel">
        <?php

        include $movie_center_path.'db/db.php';
        $sql = "SELECT * FROM `video` ORDER BY id DESC "; // Query To Fetch All Files From Database
        $res = mysqli_query($con,$sql);
        if(mysqli_num_rows($res) > 0){
            while($video = mysqli_fetch_assoc($res)){
                ?>
                <div class="col-sm-4">
                    <img src="" alt="">
                    <div class="card mb-2 w-100">
<!--                        <img class="card-img-top " src=--><?//= $_SERVER['DOCUMENT_ROOT'] ?><!--'/movieCenter/upload/cover/--><?//= $video['cover_url']?><!--' alt="Card image cap">-->
                        <img class="card-img-top " src="../upload/cover/<?=$video['cover_url']?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $video['title'] ?></h5>
                            <p class="text-center text-muted">Name in Upload : <br/> <?=  $video['video_url'] ?></p>
                        </div>
                        <div class="card-footer mx-auto my-0">
                            <a href="watch_movie.php?movie_id=<?= $video['id'] ?>"><button class="btn btn-info">Watch</button></a>
                            <a href="delete.php?movie_id=<?= $video['id'] ?>"><button class="btn btn-danger text-dark">Delete</button></a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        else{
            echo "<h1 style='margin: auto;text-align: center'>Empty</h1>";
        }
        ?>
    </div>
<!-- End Section View All Movie Card-->

</div>
</body>
</html>
