<?php
require_once 'movie.php';
require_once 'funkcje.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $movies = MoviesArray();
    $_SESSION["movies"] = $movies;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['operation'])){
        switch ($_POST['operation']){
            case "YearAsc":
                sortMovies($_SESSION["movies"], "releaseYear", "asc");
                break;
            case "YearDesc":
                sortMovies($_SESSION["movies"], "releaseYear", "desc");
                break;
            case "RatingAsc":
                sortMovies($_SESSION["movies"], "rating", "asc");
                break;
            case "RatingDesc":
                sortMovies($_SESSION["movies"], "rating", "desc");
                break;
        }
        //echo print_r($_SESSION["movies"], true);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table id="moviesTable">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Director</th>
        <th>Release Year</th>
        <th>Genre</th>
        <th>Rating</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($_SESSION['movies'] as $movie) : ?>
        <tr>
            <td><?= $movie->getId(); ?></td>
            <td><?= $movie->getTitle(); ?></td>
            <td><?= $movie->getDirector(); ?></td>
            <td><?= $movie->getReleaseYear(); ?></td>
            <td><?= $movie->getGenre(); ?></td>
            <td><?= $movie->getRating(); ?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<form action="" method="post">
    <button type="submit" name="operation" value="YearAsc">Sort by Year ascending</button>
</form>
<form action="" method="post">
    <button type="submit" name="operation" value="YearDesc">Sort by Year descending</button>
</form>
<form action="" method="post">
    <button type="submit" name="operation" value="RatingAsc">Sort by Rating ascending</button>
</form>
<form action="" method="post">
    <button type="submit" name="operation" value="RatingDesc">Sort by Rating descending</button>
</form>

</body>
</html>
