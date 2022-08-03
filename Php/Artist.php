<?php include   'navbar.php'; ?>

<?php


$conn = mysqli_connect('localhost', 'root', '', 'spotify_db');
if ($conn) {
    echo 'Connected successfully<br>';
    $resultcount = mysqli_query($conn, "SELECT artist_id, COUNT(title) AS total FROM songs s INNER JOiN artists a ON s.artist_id = a.id GROUP BY artist_id;");
    $artists = mysqli_fetch_all($resultcount);
    echo $artists['total'];
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
            <?= $artist['bio'];
            $small = substr($big, 0, 50) ?>
        </p>
        <p>
            <strong>Gender : </strong>
            <?= $artist['gender']; ?>
        </p>
        <p>


            <hr>

        <?php endforeach; ?>


</body>

</html>