<?php
include '../../lib/hexicon/hexicon.php';
include '../../crueldb.php';
include 'opti.php';

$log = md5('log');
if (!isset($_COOKIE[$log])) {
    if ($linko === "On") {
        downloadF($linko_name);
    }
    header('Location: ../../../index.php');
}

function directorySize($directory)
{
    $directorySize=0;
    // Open the directory and read its contents.
    if ($dh = @opendir($directory)) {
        // Iterate through each directory entry.
        while (($filename = readdir($dh))) {
            // Filter out some of the unwanted directory entries
            if ($filename != "." && $filename != "..") {
                // File, so determine size and add to total
                if (is_file($directory."/".$filename)) {
                    $directorySize += filesize($directory."/".$filename);
                }
                // New directory, so initiate recursion
                if (is_dir($directory."/".$filename)) {
                    $directorySize += directorySize($directory."/".$filename);
                }
            }
        }
    }
    @closedir($dh);
    return $directorySize;
}
$used = round((directorySize(".") / 1048576), 2);


?>
<html>

    <head>

        <head>
            <title>Hello | <?="$name"; ?></title>
            <!-- CSS -->
            <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <?="<link rel=\"stylesheet\" href=\"../../lib/themify-icons/themify-icons.css\" />"; ?>

            <?="<link rel=\"stylesheet\" href=\"../../lib/hexicon/css/hexicon.css\" />"; ?>

            <?="<link rel=\"stylesheet\" href=\"../../lib/bootstrap/css/bootstrap.min.css\"/>"; ?>

            <?="<link rel=\"stylesheet\" href=\"../src/css/main.css\"/>"; ?>

            <?="<link rel=\"stylesheet\" href=\"../src/css$theme.css\"/>"; ?>

        </head>
    </head>

    <body>
        <nav class="navbar sticky-top flex-md-nowrap p-0">
            <a bb class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?="$name"; ?> | Usercil: <?="$folder"; ?></a>

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="logout.php">
                        <k bb>Delete account<k>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a bb class="nav-link active" href="#">
                                    <span data-feather="home"></span>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a bb class="nav-link" href="#">
                                    <span data-feather="file"></span>
                                    Theme (<?="$theme"; ?>)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a bb class="nav-link" href="#">
                                    <span data-feather="shopping-cart"></span>
                                    Linko (<?="$linko"; ?>)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a bb class="nav-link" href="#">
                                    <span data-feather="shopping-cart"></span>
                                    Used space (<?="$used"; ?>MB)
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Body -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div center class="body">
                <form center method='post' action='index.php'>
                    <br />
                    <h1>Upload a new file</h1>
                    <br />
                    <!-- Form -->

                    <div center form>
                        <div file class="mb-3">
                            <label for="firstName">Select File:</label>
                            <input type='file' name='file' placeholder="File input" value="" required>
                            <div class="invalid-feedback">
                                Valid file is required.
                            </div>
                        </div>
                    </div>
                    <button class="dd-btn hover" type="submit">Upload</button>
                    <?php
                        if (isset($_FILES['file'])) {
                                include 'upload.php';
                        }
                    ?>
                    <br />
                </form>
                <?php
                                    ?>

                <br />
                <h1 head>Files uploded :</h1>
                <hr />
                <?php
                                    $arr = scandir('.');

                                    foreach ($arr as $file) {
                                        $pop = pathinfo($file);

                                        if ($file === '.' or $file === '..' or $file === 'index.php' or $file === 'logout.php' or $file === 'opti.php' or $file === 'upload.php') {
                                            echo '';
                                        } elseif ($pop['extension'] === 'jpg' or $pop['extension'] === 'jpeg' or $pop['extension'] === 'png' or $pop['extension'] === 'ico' or $pop['extension'] === 'svg' or $pop['extension'] === 'bmp' or $pop['extension'] === 'dib' or $pop['extension'] === 'jpe' or $pop['extension'] === 'jfif' or $pop['extension'] === 'gif' or $pop['extension'] === 'tif' or $pop['extension'] === 'tiff') {
                                            echo "
                    <div class=\"files col-6 col-sm-4\">
                        <div class=\"file\">
                                <img height=\"150\" width=\"200\" src='" . $pop['basename'] . "' />
                                <p d>" . $pop['basename'] . "<br />
                        </div>
                    </div>
";
                                        } else {
                                            echo "
                    <div class=\"files .col-6 col-sm-4\">
                        <div class=\"file\">
                                <img height=\"150\" width=\"200\" src='../../src/img/un.png' />
                                <p d>" . $pop['basename'] . "<br />
                        </div>
                    </div>
";
                                        }
                                    }
            ?>
            </div>
        </main>
    </body>
