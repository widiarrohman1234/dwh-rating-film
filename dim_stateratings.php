<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dwh_film");

// Data dummy untuk dim_stateratings
include('data_dummy/ratings_data.php');

$ratings = array(
    array("1", "Excellent", "Highest rating"),
    array("2", "Good", "Above average rating"),
    array("3", "Fair", "Average rating"),
    // Tambahkan data dummy lainnya sesuai kebutuhan
);


// Generate data dummy untuk dim_stateratings
foreach ($ratings as $rating) {
    $rating_id = $rating[0];
    $rating_name = $rating[1];
    $description = $rating[2];

    $sql = "INSERT INTO dim_stateratings (rating_id, rating_name, description)
            VALUES ('$rating_id', '$rating_name', '$description')";

    mysqli_query($conn, $sql);
}

echo "Data dummy untuk dim_stateratings berhasil diinputkan ke database";