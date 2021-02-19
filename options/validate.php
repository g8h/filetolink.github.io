<?php
if (isset($_POST['suplex'])){
$suplex = $_POST['suplex'];

if (isset($_COOKIE[$suplex])) {
    
    $do = deleteF(sldr($_COOKIE[$suplex]));
    if (!$do) {
        echo "<br/><massege lightgreen>" . sldr($_COOKIE[$suplex]) . " deleted for a while.</massege><br/>";
        setcookie($suplex, 'The file has benn ', time() + 60, "/");
    }
    else {
        echo "<br/><massege lightred> Failed to delete " . sldr($_COOKIE[$suplex]) . "</massege><br/>";
    }
}
else {
    echo "<br/><massege lightred> Please enter the right suplex number</massege><br/>";
}
}
