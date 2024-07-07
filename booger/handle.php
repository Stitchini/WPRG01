<?php
require_once "funkcje.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['operation'])){
        switch ($_POST['operation']){
            case "YearAsc":
                sortMovies($movies, "releaseYear", "asc");
                break;
            case "YearDesc":
                sortMovies($movies, "releaseYear", "desc");
                break;
            case "RatingAsc":
                sortMovies($movies, "rating", "asc");
                break;
            case "RatingDesc":
                sortMovies($movies, "rating", "desc");
                break;
        }
    }
    header("Location: 1.php");
}