<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dwh_film");

// Generate data dummy untuk dim_users
include('data_dummy/users_data.php');

foreach ($users as $user) {
    $user_id = $user[0];
    $first_name = $user[1];
    $last_name = $user[2];
    $gender = $user[3];
    $age = $user[4];
    $occupation = $user[5];
    $maritalstatus = $user[6];
    $salary = $user[7];
    $state = $user[8];
    $zip = $user[9];

    $sql = "INSERT INTO dim_users (user_id, first_name, last_name, gender, age, occupation, maritalstatus, salary, state, zip)
            VALUES ('$user_id', '$first_name', '$last_name', '$gender', '$age', '$occupation', '$maritalstatus', '$salary', '$state', '$zip')";

    mysqli_query($conn, $sql);
}

echo "Data dummy untuk dim_users berhasil diinputkan ke database";