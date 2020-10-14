<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require __DIR__ . "/vendor/autoload.php";

    use App\TestDBConn;

    $tdb = new TestDBConn();
    $tdb->fetchByTitle("new title", "this is body");
    $tdb->addPost("my new title", "new body", "test url");
    ?>
</body>

</html>