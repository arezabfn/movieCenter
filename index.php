<?php
require 'head_foot/header.php';
?>

<div class="upload-box">
    <?php  if(isset($_GET['msg']))
    {
        echo "<p class='status'>".$_GET['msg']."</p>";
    }
    else{
        echo "";
    }
    ?>
    <h2>Upload Your Movie</h2>
    <form action="Actions/upload.php" method="post" enctype="multipart/form-data">

        <!-- Start Section Select Movie  -->
        <div class="item-box">
            <input id="movies" class="button-33" style="visibility:hidden;" role="button" type="file" accept="video/mpeg,video/mp4,video/mkv" name="movie" required>
            <label for="movies" class="button-33">Click To Select Movie</label> <!--  View Select Movie      -->
            <p class="status" id="movie-status"></p>  <!-- Text For Show Status File Selected/UnSelected  -->
            <span></span>
        </div>
        <!-- End Section Select Movie  -->

        <!-- Start Section Select Cover  -->
        <div class="item-box">
            <input id="cover" class="button-33" accept="image/heic,image/jpeg,image/png" name="cover" type="file">
            <label for="cover" class="button-33">Click To Select Cover</label> <!--  View Select Cover      -->
            <p class="status" id="cover-status"></p> <!-- Text For Show Status File Selected/UnSelected  -->
        </div>
        <!-- End Section Select Cover  -->

        <!-- Start Section Title  -->
        <div class="item-box">
            <label id="title" for="title">Title</label>
            <input id="title" type="text" placeholder="Enter Title Of Movie" style="text-align: center" name="title" required >
        </div>
        <!-- End Section Title  -->

        <div class="submit">
            <input type="submit" class="button-33" role="button" name="submit">
            <p class="text-muted my-2 h6 text-center"><span class="text-warning">Notice!</span><br>
                When You Press 'Submit' We save your movie both in the Local memory(upload) and in the Database</p>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#movies').change(function(e) {
            var status = e.target.files[0].name;
            $("#movie-status").text(status);

        });

        $('#cover').change(function(e) {
            var status = e.target.files[0].name;
            $("#cover-status").text(status);

        });
    });
</script>

<?php
require 'head_foot/footer.php'
?>

