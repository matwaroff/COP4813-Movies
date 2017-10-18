<?php
/**
 * Created by PhpStorm.
 * User: matwa
 * Date: 10/16/2017
 * Time: 6:22 PM
 */
$mysql = new mysqli('localhost', 'group11', 'fall2017184443','group11', 3306);
$id = isset($_GET['id']) ? $_GET['id'] : null;
echo $id;

//Get Movie Data
$sql = "SELECT Movies.MovieName, Movies.Synopsis, Movies.ReleaseDate, Multimedia.Trailer FROM Movies
LEFT JOIN Multimedia ON Multimedia.MovieID = Movies.MovieID 
WHERE Movies.MovieID = $id;";

if($result = $mysql->query($sql)){
    $array = $result->fetch_array(MYSQLI_ASSOC);
    $name = $array['MovieName'];
    $synopsis = $array['Synopsis'];
    $releaseDate = $array['ReleaseDate'];
    $trailerURL = $array['Trailer'];
    $rating = $array['Rating'];
}
else
    echo $mysql->error;

//Get Ratings
$sql = "SELECT Ratings.Rating FROM Ratings WHERE Ratings.MovieID = $id;";
$result = $mysql->query($sql);
$count = 0;
$sum = 0;
while($row = $result->fetch_assoc()){
    $count++;
    $sum += $row['Rating'];
}
$avg = $sum / $count;
?>

<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1><?= $name; ?></h1>
        </div>
        <div class="col-md-6">
            <p><?= $synopsis; ?></p>
            <b><?= $releaseDate; ?></b>
        </div>
        <div class="col-md-12">
            <button class="btn">Test Button</button>
        </div>
    </div>
</div>


</body>
</html>
