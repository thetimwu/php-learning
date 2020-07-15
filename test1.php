<?php

if (isset($_POST['submit'])) {
    session_start();
    $_SESSION['email'] = $_POST['email'];
    setcookie('gender', $_POST['gender'], time() + 86400);
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>login</h2>


</body>

</html>