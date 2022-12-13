<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        } else {
            echo
                "<script> alert('Senha incorreta'); </script>";
        }
    } else {
        echo
            "<script> alert('Usuário não registrado'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="usernameemail">Usuário ou Email : </label>
        <input type="text" name="usernameemail" id="usernameemail" required value=""> <br>
        <label for="password">Senha : </label>
        <input type="password" name="password" id="password" required value=""> <br>
        <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registration.php">Registrar-se</a>
</body>

</html>