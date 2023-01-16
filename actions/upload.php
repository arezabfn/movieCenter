<?php

    $movie_center_path = $_SERVER['DOCUMENT_ROOT'] . '/movieCenter/';

    include $movie_center_path.'db/db.php';

    if(isset($_POST['submit']) && $_FILES['movie']['size'] != 0 ) {

            $title = htmlspecialchars($_POST['title']);  // Title Entered By User & function 'htmlSpecialChar Prevents Xss Attacks
            $temp = round(microtime(true)); //Use For Rename File Befor Upload

            $file_name = $_FILES['movie']['name'];
            $file_fullpath = $_FILES['movie']['full_path'];
            $file_temp = $_FILES['movie']['tmp_name'];
            $file_error = $_FILES['movie']['error'];

            $video_url = "";
            $cover_url = "";


            if ($file_error === 0) {
                $video_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $lower_name = strtolower($video_ext);
                $allowed = array('mp4', 'flv', 'mkv', 'webm', '3gp');
                if (in_array($lower_name, $allowed)) {
                    $video_url = "video-".$temp . '.' . $video_ext;
                    $video_path = $movie_center_path.'upload/movie/' . $video_url; // Upload Movie In Local Storage
                    move_uploaded_file($file_temp, $video_path);
                } else {

                    $msg = "You Can Upload Only : mp4 , flv , mkv , webm , 3gp";
                    header("Location:../index.php?msg=$msg");
                }


                // Start Upload & Checking Cover & Save In DATABASE
                if(isset($_FILES['cover']))
                {
                    $cover_name = $_FILES['cover']['name'];
                    $cover_fullpath = $_FILES['cover']['full_path'];
                    $cover_temp = $_FILES['cover']['tmp_name'];
                    $cover_error = $_FILES['cover']['error'];

                    if($cover_error === 0)
                    {
                        $cover_ext = pathinfo($cover_name,PATHINFO_EXTENSION);
                        $lower_name = strtolower($cover_ext);
                        $allowed = array('png','jpg','jpeg',);

                        if(in_array($lower_name,$allowed)){
                            $cover_url = "cover-".$temp.'.'.$cover_ext;
                            $cover_path = $movie_center_path.'upload/cover/'.$cover_url; // Upload Cover In Local Storage

                            $sql = "INSERT INTO `video` (`cover_url`, `video_url`,`title`) VALUES ('$cover_url','$video_url','$title')"; // Insert In Database
                            mysqli_query($con,$sql);

                            move_uploaded_file($cover_temp,$cover_path);
                            header("Location:view.php");
                        }
                        else{

                            $msg = "You Can Upload Only : png , jpg , jpeg ";
                            header("Location:../index.php?msg=$msg");

                        }

                    }

                }
                // End Upload & Checking Cover and Insert Database

            }

    }
        else{
            $msg = "Check Size Your Movie , Cover !!";
            header("Location:../index.php?msg=$msg");
        }



?>