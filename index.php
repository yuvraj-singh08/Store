<?php
$title = "Cool Books";
$page = "home";

require_once $_SERVER['DOCUMENT_ROOT']."/php/Store/functions/db_functions.php";
require_once $_SERVER['DOCUMENT_ROOT']."/php/Store/templates/header.php";
$conn = db_connect();

?>

<head>
    <link rel="stylesheet" href="CSS/home.css">
</head>

<body>
    
    <div class="content">
        <table class="table contains">
            <thead>
                <tr>
                    <th scope="col">Book</th>
                    <th scope="col">Info</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $books = latestBooks($conn);
                $count = 4;
                foreach ($books as $row) {
                    if ($count == 0)
                        exit;
                    $count--;
                    $src = "sources/images/" . $row['book_image'];
                ?>
                    <tr>
                        <td>
                            <div class="book_image">
                                <img src=<?php echo $src ?> alt="Image not found">
                            </div>
                        </td>
                        <td>
                            <div class="book_info">
                                <div class="book_title"><strong><?php echo $row['book_title']; ?></strong></div>
                                <div class="secondary_data">
                                    by <?php echo $row['book_author']; ?> | <?php echo $row['date']; ?>
                                </div>
                                <div class="secondary_data">
                                    FREE Delivery over ₹499. Fulfilled by Amazon
                                </div>
                                <a href="item.php/?book_isbn=<?php echo $row['book_isbn']; ?>">
                                    <div style="font-size: 25px;" class="badge bg-primary my-4">$ <?php echo $row['book_price']; ?></div>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
<?php
require_once "templates/footer.php";
?>