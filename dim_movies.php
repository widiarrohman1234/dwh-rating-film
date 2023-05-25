<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dwh_film");

// Data dummy untuk dim_movies
include('data_dummy/movies_data.php');

// Generate data dummy untuk dim_movies
foreach ($movies as $movie) {
    $movie_id = $movie[0];
    $title = $movie[1];
    $genre = $movie[2];
    $release_year = $movie[3];
    $director = $movie[4];

    $sql = "INSERT INTO dim_movies (movie_id, title, genre, release_year, director)
            VALUES ('$movie_id', '$title', '$genre', '$release_year', '$director')";

    mysqli_query($conn, $sql);
}

echo "Data dummy untuk dim_movies berhasil diinputkan ke database";