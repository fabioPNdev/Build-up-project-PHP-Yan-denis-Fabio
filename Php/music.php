<?php include   'navbar.php'; ?>
<?php

// Working With Database

// 1. Connect to the DB Spotify
$conn = mysqli_connect('localhost', 'denis', 'denis', 'spotify_db', 4306);

// True if connected, false if not
if ($conn) {
    echo '<br>';
    // (if connection successfull, it will be empty area)


    // 2. Prepare the query
    $listsongs = 'SELECT * FROM songs';

    // 3. Ask DB to run/execute the query 
    $results = mysqli_query($conn, $listsongs);

    // I retrieved my results but I need to fetch before using them

    // 4. Fetch the results as an associative array
    $songs = mysqli_fetch_all($results, MYSQLI_ASSOC);

    // echo '<pre>';
    // var_dump($results);
    // echo '</pre>';
    foreach ($songs as $song) {
        echo $song['title'] . '<hr>';
    }
} else {
    echo 'Problem connecting with the database';
}
?>
