<?php
include '../config.php';
include '../connection.php';

if (!isset($_GET['prod_id']) || empty($_GET['prod_id']) || !is_numeric($_GET['prod_id'])) {
    $errors[] = 'You must select a product in order to see its details!';
} else {
    $productId = $_GET['prod_id'];

    $sql = 'SELECT * 
            FROM products 
            WHERE prod_id = ? 
            LIMIT 1';

    $statement = $connection->prepare($sql);

    $statement->bind_param('i', $productId);

    $statement->execute();

    
    $result = $statement->get_result();

    
    $products = $result->fetch_all(MYSQLI_ASSOC);

    $result->close();

    $statement->close();

    if (!$products) {
        $errors[] = 'No product found.';
    } else {
        $product = $products[0];

        $productName = $product['prod_name'];
        $productQuantity = $product['prod_q'];
        $productPrice = $product['prod_price'];
        $productDescription = $product['prod_desc'];

        
        $sql = 'SELECT * 
                FROM products_images 
                WHERE prod_id = ?';

        $statement = $connection->prepare($sql);

        $statement->bind_param('i', $productId);

        $statement->execute();

        $result = $statement->get_result();

        $images = $result->fetch_all(MYSQLI_ASSOC);

        $result->close();

        $statement->close();

        $connection->close();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
        <meta charset="UTF-8" />

        <title>Product details</title>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
        <style type="text/css">
            body {
                padding: 30px;
            }

            .product-details tr td {
                padding: 5px;
            }

            .product-details .label {
                font-weight: 700;
            }

            .product-images {
                margin-top: 30px;
            }

            .product-images tr td {
                padding: 10px;
                font-weight: 700;
                background-color: #eee;
            }

            .product-images .label {
                color: #fff;
                font-weight: 700;
                background-color: #8daf15;
            }

            .product-images img {
                max-width: 400px;
                display: inline-block;
                float: left;
            }
        </style>
    </head>
    <body>

        <div class="page-container">
            <h2>Product details</h2>

            <?php
            if (isset($errors)) {
                echo implode('<br/>', $errors);
                exit();
            }
            ?>

            <table class="product-details">
                <tr>
                    <td class="label">ID</td>
                    <td><?php echo $productId; ?></td>
                </tr>
                <tr>
                    <td class="label">Name</td>
                    <td><?php echo $productName; ?></td>
                </tr>
                <tr>
                    <td class="label">Description</td>
                    <td><?php echo $productDescription; ?></td>
                </tr>
                <tr>
                    <td class="label">Price</td>
                    <td><?php echo $productPrice; ?></td>
                </tr>
                <tr>
                    <td class="label">Quantity</td>
                    <td><?php echo $productQuantity; ?></td>
                </tr>
            </table>

            <table class="product-images">
                <tr>
                    <td class="label">Images</td>
                </tr>
                <?php
                foreach ($images as $image) {
                    $imageId = $image['prod_id'];
                    $imageFilename = $image['file_name'];
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo $imageFilename; ?>" alt="" />
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

    </body>
</html>