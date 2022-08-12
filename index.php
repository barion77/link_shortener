<?php 

if ($_SERVER['REQUEST_URI'] != '/') {
    require 'redirect.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link shortener</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        .link {
            border: none;
            border-bottom: 1px solid #333;
            outline: none;
            margin-top: 10px;
            width: 250px;
        }

        .btn {
            background-color: #10BB60;
            border: none;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
        }

    </style>

</head>

<body>

    <div class="main">
        <div class="result">
            
        </div>
        <input type="text" class="link" name="link" placeholder="Link...">
        <input type="submit" class="btn" value="Submit">
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <script>
        
        $(document).ready(function() {
            $('.btn').on('click', function() {
                var link = $('.link').val();

                $.ajax({
                    method: 'GET',
                    url: 'save_link.php',
                    data: {link},
                    success: function(response) {
                        $('.result').html(response);
                    }
                });
            });
        });

    </script>

</body>

</html>