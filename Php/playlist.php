<?php include   'navbar.php'; ?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'spotify_db');
if ($conn) {
    echo 'Connected successfully<br>';


    $query = 'SELECT * FROM playlists';


    $results = mysqli_query($conn, $query);

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
    <title>Playlist</title>
</head>

<body>
    <?php foreach ($artists as $artist) : ?>

        <p>
            <strong>Title : </strong>
            <?= $artist['title']; ?>
        </p>

        <p>
            <strong>Date of ceation : </strong>
            <?= $artist['creation_date']; ?>
        </p>

        <hr>

    <?php endforeach; ?>
</body>

</html>