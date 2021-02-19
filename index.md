<?php
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
if (isset($_COOKIE[$log])) {
    header('Location: '. decrypt($_COOKIE[$log], 678));
}

include 'lib/hexicon/hexicon.php';

ini_set('post_max_size', '0M');
?>
<html>

    <head>
        <title>Code zero | File to link</title>

        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description"
            content="Code Zero's Uploder makes it easy to share files with a friend from far away. It's really easy, you just follow these steps:  1. Upload the file you want to send to your friend. 2. Give your file a username 3. Press the Button [Upload to the Internet] 4. Copy your files link and send it to your friend. When your friend opens the link the file will automatically download the file. Created By Bonginkosi Khumalo, Code zero" />
        <meta name="keywords"
            content="codezero,file,filesharing,code,zero,bonginkosi,khumalo,extension,bonginkosikhumalo,file,to,link,filetolink,file to link,send,a,file,sed a file,online" />

        <!-- CSS -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <?php echo "<link rel=\"stylesheet\" href=\"lib/hexicon/css/hexicon.css\"/>\n"; ?>
        <?php echo "<link rel=\"stylesheet\" href=\"lib/themify-icons/themify-icons.css\" />\n"; ?>
        <?php echo "<link rel=\"stylesheet\" href=\"lib/bootstrap/css/bootstrap.min.css\"/>\n"; ?>
        <?php echo "<link rel=\"stylesheet\" href=\"src/css/main.css\"/>\n"; ?>
    </head>

    <body center>


        <!-- logsun -->

        <div class="logsun">
            <a href="signup.php"><button class="dd-btn hover bt">Create an Account</button></a>
        </div>
        <!-- Top image -->

        <img topheading src="Code ZERO.png" />
        <img topheading2 src="w.png" />

        <!-- Nav -->
        <div class="dd">
            <button class="dd-btn ti-menu"></button>
            <div class="dd-content">
                <a b mark class="a" href="#"> <i class="home-icon ti-rocket"></i> Uploder </a>
                <a b class="a pccon" href="signup.php">
                    <i class="dashboard-icon ti-desktop"></i> Create a Account
                </a>
                <a b class="a" href="#">
                    <i class="envelope-icon ti-comments-smiley"></i> How to use
                </a>
                <a b class="a" href="options">
                    <i class="bell-icon ti-settings"></i> Delete a file
                </a>
            </div>
        </div>

        <!-- Medals -->

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cookies</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Please note this website uses cookies.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dd-btn" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div topico>
            <img src="Code Zero.png" rel='Code Zero' />
        </div>
        <?php
    if (isset($_POST['username'])) {
        $name = $_FILES['filename']['name'];
        $g = $_POST['username'];
        $inner = s_user($g) . "" . randomN(1, 90) . randomN(1, 900) . randomN(1, 900000) . ".";
        $n = "options/uploded/" . $inner . $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], $n);
        move_uploaded_file($_FILES['filename']['tmp_name'], $name);
        echo "<div center><br/><br/>Uploaded file($name) link: <textarea  id='content'>http://filetolink.rf.gd/$n</textarea><br/>\n<br/>\n
        <button  class='dd-btn hover' id='copyID' first>Copy link</button></a><br/><br/><br/><br/>\n"; ?>
        <script>
        var button = document.getElementById("copyID"),
            input = document.getElementById("content");
        button.addEventListener("click", function(event) {
            event.preventDefault();
            input.select();
            document.execCommand("copy");
        });
        </script>
        <?php

        require 'set.php';
    }
    if (!isset($_POST['username'])) { ?>
        <br />
        <br />
        <br />
        <form center method='post' action='index.php' enctype='multipart/form-data'>

            <!-- Form -->

            <div  form>
                <div file class="mb-3">
                    <label for="firstName">Select File:</label>
                    <input type='file' name='filename' size='10' multiple placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid file is required.
                    </div>
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <label for="username">Files username:</label>
                    <a href="#" class="tooltip-show" data-toggle="tooltip"
                        title="This input will be used to give your file a username, so it can not be replaced by another file on the system, because you're not logged in.">
                        <input id="username" type='text' name="username" placeholder="" value="" required>
                    </a>
                    <div class="invalid-feedback">
                        Valid username is required.
                    </div>
                </div>
            </div>
            <button class="dd-btn hover" type="submit">Upload to the Internet</button>
            <br />


            <!-- details -->

            <p center class='mute ex'>
                Code Zero's Uploder makes it easy to share files with a friend
                from far away. It's really easy, you just follow these steps:<br />
                <br />
                1. Upload the file you want to send to your friend.<br />
                2. Give your file a username<br />
                3. Press the Button [Upload to the Internet]<br />
                4. Copy your files link and send it to your friend<br />
                <br />
                When your friend opens the link the file will automatically download.<br />
                For More visit the <a href="how-to/">How to</a> page.
            </p>

            </div>

            <!-- JS -->
            <?php echo '<script src="lib/jquery/jquery.min.js"></script>' . "\n"; ?>
            <?php echo '<script src="lib/bootstrap/js/bootstrap.min.js"></script>' . "\n"; ?>
            <?php echo '<script src="src/js/main.js"></script>' . "\n"; ?>

            <script>
            $(function() {
            $('#myModal').modal('show')
            })
            });
            $(function() {
                $('.tooltip-show').tooltip('show');
            });
            </script>
            <?php
            $lastmod = date("F d, Y", getlastmod());
            echo "<t>Page last modified on $lastmod</t>"; 
            ?>
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
        </form>
        <?php
    }
    echo "</body>\n</html>";
