<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dwh_film");

include('data_dummy/users_data.php');
include('data_dummy/movies_data.php');
include('data_dummy/ratings_data.php');


// Generate data dummy untuk fact_ratings
for ($i = 1; $i <= 1000; $i++) {
    $rating_id = rand(1, count($ratings));
    $movie_id = rand(1, count($movies));
    $user_id = rand(1, count($users));
    $rating = rand(1, 5);
    $timestamp = date('Y-m-d H:i:s');

    $sql = "INSERT INTO fact_ratings (rating_id, movie_id, user_id, rating, timestamp)
            VALUES ('$rating_id', '$movie_id', '$user_id', '$rating', '$timestamp')";

    mysqli_query($conn, $sql);
}


echo "Data dummy berhasil diinputkan ke database";
?>
