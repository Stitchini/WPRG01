<?php
require_once 'movie.php';
require_once 'funkcje.php';
$movies[] = MoviesArray();
$_SESSION["movies"] = $movies;
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
    <?php foreach ($movies as $movie) : ?>
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
<form action="handle.php" method="post">
    <button type="submit" name="operation" value="YearAsc">Sort by Year ascending</button>
</form>
<form action="handle.php" method="post">
    <button type="submit" name="operation" value="YearDesc">Sort by Year descending</button>
</form>
<form action="handle.php" method="post">
    <button type="submit" name="operation" value="RatingAsc">Sort by Rating ascending</button>
</form>
<form action="handle.php" method="post">
    <button type="submit" name="operation" value="RatingDesc">Sort by Rating descending</button>
</form>

</body>
</html>
