<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body
        {
            display: grid;
            place-items: center;
            height: 100dvh;
            font-family: timesnewroman;
        }
    </style>
</head>
<body>
 
    <?php 
        $Author = "Carl Sagan";
        $read = true;

        if($read)
            {
                $message = "You have read about " . $Author;
            }
    ?>


    <h1>
        <?php echo $message;?>
        <?= $message?> <!-- Same as above, using shorthand -->
    </h1>

    
</body>
</html>