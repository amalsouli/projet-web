<?php
include '../config.php';
include '../connection.php';

$productSaved = FALSE;

if (isset($_POST['submit'])) {
    
    $productName = isset($_POST['prod_name']) ? $_POST['prod_name'] : '';
    $productDescription = isset($_POST['prod_desc']) ? $_POST['prod_desc'] : '';
    $productPrice = isset($_POST['prod_price']) ? $_POST['prod_price'] : 0;
    $productQuantity = isset($_POST['prod_q']) ? $_POST['prod_q'] : 0;
    
    
    if (empty($productName)) {
        $errors[] = 'Please provide a product name.';
    }

    if (empty($productDescription)) {
        $errors[] = 'Please provide a description.';
    }

    if ($productPrice == 0) {
        $errors[] = 'Please provide the price.';
    }

    if ($productQuantity == 0) {
        $errors[] = 'Please provide the quantity.';
    }

    
    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0777, true);
    }

    
    $filenamesToSave = [];

    $allowedMimeTypes = explode(',', UPLOAD_ALLOWED_MIME_TYPES);

    
    if (!empty($_FILES)) {
        if (isset($_FILES['file']['error'])) {
            foreach ($_FILES['file']['error'] as $uploadedFileKey => $uploadedFileError) {
                if ($uploadedFileError === UPLOAD_ERR_NO_FILE) {
                    $errors[] = 'You did not provide any files.';
                } elseif ($uploadedFileError === UPLOAD_ERR_OK) {
                    $uploadedFileName = basename($_FILES['file']['name'][$uploadedFileKey]);

                    if ($_FILES['file']['size'][$uploadedFileKey] <= UPLOAD_MAX_FILE_SIZE) {
                        $uploadedFileType = $_FILES['file']['type'][$uploadedFileKey];
                        $uploadedFileTempName = $_FILES['file']['tmp_name'][$uploadedFileKey];

                        $uploadedFilePath = rtrim(UPLOAD_DIR, '/') . '/' . $uploadedFileName;

                        if (in_array($uploadedFileType, $allowedMimeTypes)) {
                            if (!move_uploaded_file($uploadedFileTempName, $uploadedFilePath)) {
                                $errors[] = 'The file "' . $uploadedFileName . '" could not be uploaded.';
                            } else {
                                $filenamesToSave[] = $uploadedFilePath;
                            }
                        } else {
                            $errors[] = 'The extension of the file "' . $uploadedFileName . '" is not valid. Allowed extensions: JPG, JPEG, PNG, or GIF.';
                        }
                    } else {
                        $errors[] = 'The size of the file "' . $uploadedFileName . '" must be of max. ' . (UPLOAD_MAX_FILE_SIZE / 1024) . ' KB';
                    }
                }
            }
        }
    }

    
    if (!isset($errors)) {
        
        $sql = 'INSERT INTO products (
                    prod_name,
                    prod_desc,
                    prod_price,
                    prod_q
                ) VALUES (
                    ?, ?, ?, ?
                )';

       
        $statement = $connection->prepare($sql);

        
        $statement->bind_param('ssii', $productName, $productDescription, $productPrice, $productQuantity);

        $statement->execute();

        $lastInsertId = $connection->insert_id;

        
        $statement->close();

        
        foreach ($filenamesToSave as $filename) {
            $sql = 'INSERT INTO products_images (
                        prod_id,
                        file_name
                    ) VALUES (
                        ?, ?
                    )';

            $statement = $connection->prepare($sql);

            $statement->bind_param('is', $lastInsertId, $filename);

            $statement->execute();

            $statement->close();
        }

        
        $connection->close();

        $productSaved = TRUE;

        
        $productName = $productDescription = $productPrice = $productQuantity = NULL;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
        <meta charset="UTF-8" />

        <title>Save product details</title>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link rel='stylesheet' type='text/css' media='screen' href='../style.css'>
        <style type="text/css">
            body {
                padding: 30px;
            }

            .form-container {
                margin-left: 80px;
            }

            .form-container .messages {
                margin-bottom: 15px;
            }

            .form-container input[type="text"],
            .form-container input[type="number"] {
                display: block;
                margin-bottom: 15px;
                width: 150px;
            }

            .form-container input[type="file"] {
                margin-bottom: 15px;
            }

            .form-container label {
                display: inline-block;
                float: left;
                width: 100px;
            }

            .form-container button {
                display: block;
                padding: 5px 10px;
                background-color: #8daf15;
                color: #fff;
                border: none;
            }

            .form-container .link-to-product-details {
                margin-top: 20px;
                display: inline-block;
            }
        </style>

    </head>
    <body>
    <header>
            <!--<a class="logo" href="/"><img src="images/logo_aphrodite_tr.png" alt="logo"></a>-->
            <a class="logo" href="index.html"><img src="../assets/images/logo_aphrodite_tr.png" alt="logo" height="110px" width="110px">
            <nav>
                <ul class="nav__links">
                    <li><a href="#Soins">Soins</a></li>
                    <li><a href="#Produits">Produits</a></li>
                    <li><a href="#Propos">A propos</a></li>
                </ul>
            </nav>
            <a class="cta" href="#Contact">Contact</a>
    </header>
    <br><br>
        <div class="form-container">
            <h2>Add a product</h2>

            <div class="messages">
                <?php
                if (isset($errors)) {
                    echo implode('<br/>', $errors);
                } elseif ($productSaved) {
                    echo 'The product details were successfully saved.';
                }
                ?>
            </div>

            <form action="AddProd.php" method="post" enctype="multipart/form-data">
                <label for="prod_name">Name</label>
                <input type="text" id="prod_name" name="prod_name" value="<?php echo isset($productName) ? $productName : ''; ?>">

                <label for="prod_q">Quantity</label>
                <input type="number" id="prod_q" name="prod_q" min="0" value="<?php echo isset($productQuantity) ? $productQuantity : '0'; ?>">

                <label for="prod_price">Price</label>
                <input type="number" id="prod_price" name="prod_price" min="0" value="<?php echo isset($productPrice) ? $productPrice : '0'; ?>">

                <label for="prod_desc">Description</label>
                <input type="text" id="prod_desc" name="prod_desc" value="<?php echo isset($productDescription) ? $productDescription : ''; ?>">

                <label for="file">Images</label>
                <input type="file" id="file" name="file[]" multiple>

                <button type="submit" id="submit" name="submit" class="button">
                    Submit
                </button>
            </form>

            <?php
            if ($productSaved) {
                ?>
                <a href="getProduct.php?id=<?php echo $lastInsertId; ?>" class="link-to-product-details">
                    Click me to see the saved product details in <b>getProduct.php</b> (product id: <b><?php echo $lastInsertId; ?></b>)
                </a>
                <?php
            }
            ?>
        </div>

    </body>
</html>