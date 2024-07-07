<?php

function MoviesArray() : array
{
    $file = fopen("movies.csv", "r");
    if ($file !== FALSE) {
        $movies = [];
        fgetcsv($file);
        while (($data = fgetcsv($file, 1000)) !== FALSE) {
            if (count($data) == 6) {
                $nextMovie = new Movie(intval($data[0]), $data[1], $data[2], intval($data[3]), $data[4], floatval($data[5]));
                $movies[] = $nextMovie;
            } else {
                echo "Error in data format";
                fclose($file);
                return [];
            }
        }
        fclose($file);
        return $movies;
    } else {
        echo "Error in opening file";
        return [];
    }
}
function sortMovies(&$movies, $sortBy, $order) {
    usort($movies, function ($a, $b) use ($sortBy, $order) {
        if ($a->$sortBy == $b->$sortBy) {
            return 0;
        }
        if ($order === 'asc') {
            return ($a->$sortBy < $b->$sortBy) ? -1 : 1;
        } else {
            return ($a->$sortBy > $b->$sortBy) ? -1 : 1;
        }
    });
}
function sortChoice(&$movies)
{
    $options = $_POST['operation'];
    switch ($options){
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