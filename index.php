<?php 
    include_once "functions.php";
    $task = $_GET['task'] ?? 'encode';

    $mainKey = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $key = '';

    // Generate key
    if('key' == $task) {
        $key = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $arrayKey = str_split($key);
        shuffle($arrayKey);
        $key = join('', $arrayKey); 
    } else if(isset($_REQUEST['key']) && $_REQUEST['key'] !='') {
        $key = $_REQUEST['key'];
    }

    // Encryption
    $encryptedData = '';
    if('encode' == $task) {
        if(isset($_POST['text']) && $_POST['text'] != '') {
            $text = $_POST['text'];
            $encryptedData = encryptData($text,$key);
        }
    }

    // Decryption
    $decryptedData = '';
    if('decode' == $task) {
        if(isset($_POST['text']) && $_POST['text'] != '') {
            $text = $_POST['text'];
            $decryptedData = decryptData($text,$key);
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Data scrambler</title>

    <!-- milligram css style link -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">

    <!-- custom css style -->
    <style>
        body {
            margin-top: 50px;
        }
        .title {
            text-align: center;
        }
        .nav {
            text-align: center;
        }
        .form-container {
            margin-top: 50px;
        }
    </style>

</head>
<body>
    <!-- main section start -->
    <div class="container">
        <div class="row">
            <div class="column column-50 column-offset-20">
                <h2 class="title">Data scrambler</h2>
            </div>
        </div>

        <div class="row">
            <div class="column column-50 column-offset-20 nav">
                <a href="/?task=encode&key=<?php echo $key; ?>"><button>Encode</button></a>
                <a href="/?task=decode&key=<?php echo $key; ?>"><button>Decode</button></a>
                <a href="/?task=key"><button>Generate key</button></a>
            </div>
        </div>
        
        <div class="row form-container">
            <div class="column column-50 column-offset-20">
                <?php if('encode' == $task || 'key' == $task): ?>
                <form action="./index.php" method="POST">
                    <label for="key">Generated key</label>
                    <input type="text" name="key" id="key" value="<?php echo $key ?>" readonly>
                    <label for="text">Plain text</label>
                    <textarea name="text" id="text" cols="30" rows="10"><?php if(isset($_POST['text'])) echo $_POST['text'] ?></textarea>
                    <label for="encrdata">Encrypted data </label>
                    <textarea name="encrdata" id="encrdata" cols="30" rows="10" ><?php echo $encryptedData ?></textarea>
                    <input type="submit" value="submit">
                </form>
                <?php else: ?>
                    <form action="./index.php?task=decode" method="POST">
                    <label for="key">Generated key</label>
                    <input type="text" name="key" id="key" value="<?php echo $key ?>" readonly>
                    <label for="text">Encrypted data</label>
                    <textarea name="text" id="text" cols="30" rows="10"><?php if(isset($_POST['text'])) echo $_POST['text'] ?></textarea>
                    <label for="decrdata">Plain text </label>
                    <textarea name="decrdata" id="decrdata" cols="30" rows="10" ><?php echo $decryptedData ?></textarea>
                    <input type="submit" value="submit">
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- main section end -->
</body>
</html>