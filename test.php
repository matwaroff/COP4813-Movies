<?php
 $mysql = new mysqli('localhost', 'group11', 'fall2017184443','group11', 3306);
?>
<html>
<head>
    <style type="text/css">
        table{
            width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
    <script>
        window.onload = function(){
            $('.add-open').on("click", function(){
                $('#add-form').show();

            });
        }
    </script>
</head>
<table border="1">
    <thead>
        <th>Rating</th>
        <th>Title</th>
        <th>Synopsis</th>
        <th>Release Date</th>
    </thead>
 <?php
 $sql = "SELECT Ratings.Rating, Movies.MovieID, Movies.MovieName, Movies.Synopsis, Movies.ReleaseDate FROM Movies ".
        "LEFT JOIN Ratings ON Movies.MovieID=Ratings.MovieID;";
 $result = $mysql->query($sql);
 while($row = $result->fetch_assoc()){
  echo "<tr class='movie-".$row['MovieID']."'>" .
      "<td class='rating'>".$row['Rating']."</td>".
      "<td class='movieName'>" . $row['MovieName'] . "</td>" .
      "<td class='synopsis'>" . $row['Synopsis'] . "</td>".
      "<td class='releaseDate'>" . $row['ReleaseDate'] . "</td>".
      "</tr>";
 }

 $variable = 2;

?>
</table>
<form id="add-form" method="post">
    <label for="rating"></label>
</form>
</html>