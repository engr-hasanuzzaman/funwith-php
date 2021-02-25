<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="home.php">home</a></li>
            <li><a href="about.php">about</a></li>
            <li><a href="voting.php">voting</a></li>
        </ul>
    </nav>
    <label>Well come to PHP world <?php echo $_POST['name'] ?></label>
    <form action="#" method="post">
        <input type="text" name="name" id="">
        <button type="submit">Submit</button>
    </form>
</body>

</html>