<!--
This Section Play Target Movie
-->
<?php
$movie_center_path = $_SERVER['DOCUMENT_ROOT'] . '/movieCenter/';

if(isset($_GET['movie_id'])) {
        include $movie_center_path.'db/db.php';

        $sql = "SELECT * FROM `video` WHERE id = " . $_GET['movie_id'];
        $res = mysqli_query($con, $sql);
        $result = mysqli_fetch_assoc($res);
    }else{
        header("Location:view.php");
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/watch.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Watch : <?= $result['title'] ?></title>
</head>

<body>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Movie Center</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link "  aria-current="page" href="../index.php">UploadMovie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view.php">View Movies</a>
                </li>

        </div>
    </div>
</nav>
    <div class="title-view">
        <h2><?= $result['title'] ?></h2>
        <hr>
    </div>

    <div class="watching">
        <video src="../upload/movie/<?=$result['video_url']?>" controls > </video>
    </div>

    </div>
</body>
</html>
