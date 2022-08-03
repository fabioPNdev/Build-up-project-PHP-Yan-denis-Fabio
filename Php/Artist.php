<?php include   'navbar.php'; ?>

<?php


$conn = mysqli_connect('localhost', 'root', '', 'spotify_db');
if ($conn) {
    echo 'Connected successfully<br>';


    $query = 'SELECT * FROM artists';


    $results = mysqli_query($conn, $query);

    $totalmusic = 'SELECT artist_id,COUNT(title) FROM songs GROUP BY artist_id';

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

    <nav>
        <ul style="
          display: flex;
          justify-content: space-around;
          align-items: center;
        ">
            <li><a href="index.html">Home</a></li>
            <li><a href="Artist.html">Artist</a></li>
            <li><a href="songs.html">Song</a></li>
            <li><a href="playlist.html">Playlist</a></li>
            <li><a href="register.html">Register/Login</a></li>
            <li><a href="account.html">Account</a></li>
        </ul>
    </nav>
    <?php foreach ($artists as $artist) : ?>

        <p>
            <strong>Name : </strong>
            <?= $artist['name']; ?>
        </p>

        <p>
            <strong>Bio : </strong>
            <?= $artist['bio'];
            $small = substr($big, 0, 50) ?>
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