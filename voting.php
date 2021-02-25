<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Vote for your fovourite person</h1>
    <hr>
    <h3>Retusl of the popular votes are</h3>
    <hr>
    <ul>
        <?php
        foreach (file('vote.txt') as $vote) {
            $vote_array = explode("___", $vote);
            echo "<li> Name: $vote_array[0], Point: $vote_array[1]</li>";
        }
        ?>
    </ul>
</body>

</html>