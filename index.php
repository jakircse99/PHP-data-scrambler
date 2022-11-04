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
                <a href="/?task=encode"><button>Encode</button></a>
                <a href="/?task=decode"><button>Decode</button></a>
                <a href="/?task=key"><button>Generate key</button></a>
            </div>
        </div>

        <div class="row form-container">
            <div class="column column-50 column-offset-20">
                <form action="" method="POST">
                    <label for="key">Generated key</label>
                    <input type="text" name="key" id="key" readonly>
                    <label for="text">Plain text</label>
                    <textarea name="text" id="text" cols="30" rows="10"></textarea>
                    <label for="encrdata">Encrypted data </label>
                    <textarea name="encrdata" id="encrdata" cols="30" rows="10" readonly></textarea>
                    <input type="submit" value="submit">
                </form>
            </div>
        </div>
    </div>

    <!-- main section end -->
</body>
</html>