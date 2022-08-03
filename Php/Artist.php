<?php


$conn = mysqli_connect('localhost', 'root', '', 'spotify_db');

// True if connected, false if not
if ($conn) {
    echo 'Connected successfully<br>';

    // 2. Prepare the query
    $query = 'SELECT * FROM artists';

    // 3. Ask DB to run/execute the query 
    $results = mysqli_query($conn, $query);

    // I retrieved my results but I need to fetch before using them
    // 4. Fetch the results as an associative array
    $artists = mysqli_fetch_all($results, MYSQLI_ASSOC);
} else {
    echo 'Problem connecting with the database';
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist</title>
</head>





<body>
    <?php foreach ($artists as $artist) : ?>

        <p>
            <strong>Name : </strong>
            <?= $artist['name']; ?>
        </p>

        <p>
            <strong>Bio : </strong>
            <?= $artist['bio']; ?>
        </p>
        <p>
            <strong>Gender : </strong>
            <?= $artist['gender']; ?>
        </p>
        <p>
            <strong>Number of Music Written.: </strong>
            <?= $artist['NofM ']; ?>
        </p>

        <hr>

    <?php endforeach; ?>


</body>

</html>