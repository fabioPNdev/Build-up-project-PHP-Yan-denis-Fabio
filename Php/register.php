<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <?php if (isset($_POST['submitBtn'])) {
        $error = false;

        $user = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $submitBtn = $_POST['submitBtn'];

        if (empty($_POST['name'])) {
            echo 'Name is mandatory' . '<br>';
            $error = true;
        };
        if (strpos($_POST['email'], "@") != false) {
            echo "<div style='color: green; font-weight:bold;'>valid email</div>";
        } else {
            echo "<div style='color:red; font-weight:bold; '>invalid e-mail</div>";
        }

        if ($_POST['password'] === ($_POST['confirm'])) {
            echo "<div style='color: green; font-weight:bold;'>Password OK</div>";
        } else {
            echo "<div style='color: red; font-weight:bold;'>Password DONT MATCH</div>";
        }

        $conn = mysqli_connect('localhost', 'root', '', 'spotify_db');

        // Insert new User when register was successful

        if ($error == false) {
            if ($conn) {
                $query = "INSERT INTO users(id, username, email, password)
                VALUES(NULL, '$user', '$email', '$password')";
                $result = mysqli_query($conn, $query);

                if ($result)
                    echo 'Registration was successfully';
            } else {
                echo 'Problem connecting with the database';
            }
        }
    }
    ?>

    <div>
        <form method="post">
            <input type="text" name="name" placeholder="Name"> <br>
            <input type="email" name="email" placeholder="Email Address"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="confirm" name="confirm" placeholder="Confirm your password"><br>
            <button type="submit" name="submitBtn" value="register">Register</button>
        </form>
    </div>
</body>

</html>