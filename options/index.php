<html>
<?php
include '../lib/hexicon/hexicon.php';

function decrypt($cipher, $pin)
{
    $data = explode('/', $cipher);
    $plain = '';
    for ($x = 0; $x < count($data); $x++) {
        $plain .= chr($data[$x] - $pin - ($x * $pin));
    }
    return $plain;
}
$log = md5('log');
if (isset($_COOKIE[$log])){
    header('Location: '. decrypt($_COOKIE[$log]));
}

?>

<head>
    <title>Code zero Uploader</title>

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" href="../lib/hexicon/css/hexicon.css" />
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../lib/themify-icons/themify-icons.css" />
    <link rel="stylesheet" href="../src/css/main.css" />
</head>
<nav>
    <!-- Nav -->
    <div class="dd">
        <button class="dd-btn ti-menu"></button>
        <div class="dd-content">
            <a b mark class="a" href="../index.php"> <i class="home-icon ti-rocket"></i> Uploder </a>
            <a b class="a pccon" href="signup.php">
                    <i class="dashboard-icon ti-desktop"></i> Create a Account
            </a>
            <a b class="a" href="#">
                <i class="envelope-icon ti-comments-smiley"></i> How to use
            </a>
            <a b class="a" href="#">
                <i class="bell-icon ti-settings"></i> Delete a file
            </a>
        </div>
    </div>
</nav>

<body center>

    <h1 underline center>Options</h1>


    <div>
        <img src="../Code Zero.png" topico rel='Code Zero' />
    </div>

    <!-- Options -->




    <!-- Delete -->
    <hr />

    <h3 mute>Delete a file</h3>

    <br/>

    <form  method='post' action='index.php' enctype='multipart/form-data'>

        <!-- Form -->

        <div center form>
            <div>
                <div class="mb-3">
                    <label for="username">Files suplex:</label>
                    <input id="username" type='text' name="suplex" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid suplex is required.
                    </div>
                </div>
            </div>
        </div>
        <button class="dd-btn hover" type="submit">Delete</button>
        <br />
        <?php
        if (isset($_POST['suplex'])) {
            include 'validate.php';
        }
        ?>

    </form>


    <hr />
    <!-- JS -->
    <?php echo '<script src="lib/jquery/jquery.min.js"></script>' . "\n"; ?>
    <?php echo '<script src="lib/bootstrap/js/bootstrap.min.js"></script>' . "\n"; ?>
    <?php echo '<script src="src/js/main.js"></script>' . "\n"; ?>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>