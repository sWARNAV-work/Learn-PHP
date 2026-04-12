<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <h1>Books That I have Read</h1>

    <?php   
    /* =========================================
           Array in php
           =========================================
        */
        $books = [
            "The Big Bang Theory",
            "The Treasure Island",
            "Love, Rosie"
        ];
        /* =========================================
           Nested Array(Key-Value Pair)
           =========================================
        */
        $booksKV = [
            [
                'name' => 'The Big Bang Theory',
                'author' => 'Stephen Hawking',
                'yearofrelease' => '1968',
                'purchase' => 'http://duckduckgo.com'
            ],
            [
                'name' => 'The Treasure Island',
                'author' =>'Robert Louis Stevenson',
                'yearofrelease' => '1883',
                'purchase' => 'http://duckduckgo.com'
            ],
            [
                'name' => 'Love, Rosie',
                'author' => 'Cecelia Ahern',
                'yearofrelease' => '2004',
                'purchase' => 'http://duckduckgo.com'
            ],
            [
                'name' => 'A Place Called Here',
                'author' => 'Cecelia Ahern',
                'yearofrelease' => '2006',
                'purchase' => 'http://duckduckgo.com'
            ]
        ];
        /* =========================================
           Functions
           =========================================
        */
        function filter($items, $fn)
        {
            $filter = [];
            foreach($items as $item)
            {
                if($fn($item))
                $filter[] = $item;
            } 
            return $filter;
        }
    ?>

    <ul>
        <!-- =========================================
           loop
           =========================================
        --><h3>loop</h3>
        <?php   
            foreach ($books as $book)
            {
                echo "<li>{$book}™</li>"; # The wrapper '{}' is used to enclose the $book variable, only that is rendered as a variable, rest( the ™ sign) is shown just as a string.
            }
        ?>


        <hr>


        <!-- =========================================
           loop shorthand
           =========================================
        --><h3>loop shorthand</h3>
        <?php foreach($books as $book) : ?>
            <?php echo "<li> {$book} </li>" ?>
            <li> <?= $book ?> </li> <!-- shorthand of the above same -->
        <?php endforeach; ?>


        <hr>


        <!-- =========================================
           loop with KV pairs
           =========================================
        --><h3>loop with KV pairs</h3>
        <?php foreach($booksKV as $books) : ?>
            <?php if($books['author'] === 'Cecelia Ahern') : ?>
            <li>
                <a href="<?= $books['purchase']?>">
                    <?= $books['name'] . ", " . $books['yearofrelease']; ?>
                </a>
            </li>
            <?php  endif; ?>
        <?php endforeach; ?>


        <hr>

        <!-- =========================================
        Functions
           =========================================
        --><h3>Functions</h3>
        <?php $filter = array_filter($booksKV, function($book){         #the 'array_filter is a predefined function in PHP, that does almost the same thing as our function filter().
            return $book['yearofrelease'] >= 2000; 
        }); ?>
            <?php foreach($filter as $book) : ?>
            <li>
                <?= $book['name'] . " by " . $book['author']; ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>