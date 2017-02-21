<?php
require_once("../../admin/include/session.php");
require_once("../../admin/include/connection.php");
require_once("../../admin/include/functions.php");
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<head>
    <div class="wrapper">
        <div>
            <button class="dropbtn" style="font-family:'Century Gothic', sans-serif;">GENRE</button>
            <div class="dropdown-content" style="text-align: left">
                <a href="comedySort.php" id='Comedy'>Comedy</a>
                <a href="documentarySort.php" id='Documentary'>Documentary</a>
                <a href="dramaSort.php" id='Drama'>Drama</a>
                <a href="fantasySort.php" id='Fantasy'>Fantasy</a>
                <a href="historySort.php" id='History'>History</a>
                <a href="horrorSort.php" id='Horror'>Horror</a>
                <a href="scifiSort.php" id='Science Fiction'>Science Fiction</a>
            </div>
        </div>
    </div>
    <h2 align="center">My Personal Movie DataBase <a href="../../index.php">| FRONTPAGE |</a></h2>
</head>
<title>My Movie DataBase</title>
<body>
<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>
<div class="around">
<?php
$query = "SELECT * FROM genres WHERE GENRE = 'Fantasy'";
mysqli_query($connection, $query) or die ('Error querying database.');
$result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($result)){
    $id=$row['MOVIE_ID'];
    $title=$row;
    $year=$row['YEAR'];
    $poster= "css/images/".$row['POSTER'];
    //$rating=$row['rating'];
    echo"<div class='poster'>
        <div>
            <div class='movie' >".$movie."</div>
                <img id='myImg' src='$poster' alt='$title' style='height: 450px; width: 300px;'>
            <div>".$title."(".$year.")</div>
        </div>
    </div>";
}
?>
</div>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>
</body>
</html>
<!--  <div class='rating'>".$rating."</div> div from echo above
<form action="rating.php" method="post" enctype="multipart/form-data">
<input class="rating" id="star-5" type="radio" name="star" value="1"/>
<input class="rating" id="star-4" type="radio" name="star" value="2"/>
<input class="rating" id="star-3" type="radio" name="star" value="3"/>
<input class="rating" id="star-2" type="radio" name="star" value="4"/>
<input class="rating" id="star-1" type="radio" name="star" value="5"/>
<input name="submit" type="submit" value="Rate">
</form> -->