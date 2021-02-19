<?php

/**
 * Hexicon
 * Copyright 2021-2024
 * A set of tools for quick development.
 *
 * @package   Hexicon
 * @author    Bonginkosi
 * @version   1.0.0
 */



/* Define */

define('PACKAGE', 'Hexicon');
define('AUTHOR', 'Bonginkosi Khumalo');
define('VERSION', '1.0.0');
define ('PROGRAM', 'PHP');

// pluralize(word)

function pluralize(&$word)
{                                                  // Use:
    if (substr($word, -1) == 'y') {                // $n = 'hello';
        $word = substr($word, 0, -1) . 'ies';     // pluralize($n);
    } else {                                     // echo $n;
        $word .= 's';                           //
    }                                          // Output:
}                                             // hellos


// Square(number)

function square(int $number)                     // Use:
{                                           // $n = square(99);
    return $number * $number;              // echo $n;
}

// js(js)

function js($matches, $inner = '', $id = 'none')
{                                                                    // Use:
    switch ($matches) {                                             // $pp = js('alert', 'hello');
        case 'alert':                                              // echo $pp; 
            echo "<script>\n alert('$inner')\n</script>";
            break;
        case 'console.log()':
            echo "<script>\nconsole.log('$inner')\n</script>";
            break;
        case 'console':
            echo "<script>\nconsole.log('$inner')\n</script>";
            break;
        case 'document.write()':
            echo "<script>\ndocument.write('$inner')\n</script>";
            break;
        case 'document.write':
            echo "<script>var $id =\nprompt('$inner');\n</script>";
            break;
        case 'prompt':
            echo "<script>\ndocument.write('$inner')\n</script>";
            break;
        case 'create-dom':
            echo "\n<script>\nvar element = document.createElement('$id');\nelement.textContent = '$inner';\ndocument.body.appendChild(element);\n</script>\n";
            break;
        case 'print':
            echo "\n<script>\nwindow.print();\n</script>\n";
            break;
        default:
            'Not found';
    }
}

// download file

function downloadF($path)                                                                // Use:
{                                                                                           // download_file('example.ext')
    $file = "$path";
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
}

// replaceF()

function replaceF($first, $second, $file)
{
    $path = $file;
    $contents = file_get_contents($path);
    $contents = str_replace("$first", "$second", $contents);
    file_put_contents($path, $contents);
}

// file_text()

function file_text($path)                // Use:              
{                                       // file_text($path)
    $top = file_get_contents("$path");
    return $top;
}


// deleteF()  

function deleteF($path)                                      // Use:
{                                                           // deleteF('example.ext');
    if (file_exists($path)) {
        $success = unlink($path);

        if (!$success) {
            throw new Exception("Cannot delete $path");
        }
    }
}

// Unicode

function unicode_encode($str)
{                                                      // Use:
    return substr(json_encode($str), 1, -1);          // $job = unicode_decode('\\u6211\\u597d');
}                                                    // echo "Decode(\\u6211\\u597d): $job<br/>";
function unicode_decode($str)
{                                                   // Output:
    return json_decode(sprintf('"%s"', $str));     // 我好
}

// exe()

function exe($a)
{                                                   // Use:
    echo $a;                                       // $this = "hello";
}                                                 // exe($this)


// conn()

function conn($hostname, $username, $password, $database = '')
{                                                                                              // Use:
    $n = new mysqli("$hostname", "$username", "$password", "$database");                       // conn('localhost', 'root', 'pass', 'test');
    return $n;
}

// play

function play($v, $n)
{                                                           // Use:
    for ($i = $v; $i < $n; $i++) {                         // $count = play(1, 5)
        echo $i;                                          // exe($count)
    }                                                    // Output      
}                                                       // 12345

// dirray

function dirray($array, $b = " ")
{                        // Use:
    $var = implode($b, $array);
    return $var;
}

// toupper() tolower() capitalize()

function toupper($text)
{                                    // Use:
    return strtoupper($text);       // exe(toupper('hello'))
};
function tolower($text)
{                                    // Use:
    return strtolower($text);       // exe(tolower('HELLO'))
};
function capitalize($text)
{                                    // Use:
    return ucwords($text);       // exe(capitalize('hello'))
};

// add() 

function add($v, $b)
{               // Use:
    return $v + $b;                 // $up = add($upe, $upo);
}                                  // exe($up);

// SANITIZE

function s_email($v)
{
    $upe = filter_var("$v", FILTER_SANITIZE_EMAIL);
    return $upe;
}

function s_num($v)
{
    $upe = filter_var("$v", FILTER_SANITIZE_NUMBER_INT);
    return $upe;
}

function s_url($v)
{
    $upe = filter_var("$v", FILTER_SANITIZE_URL);
    return $upe;
}

function s_user($v)
{
    $upe = filter_var("$v", FILTER_SANITIZE_URL);
    $upe = filter_var("$v", FILTER_SANITIZE_EMAIL);
    return $upe;
}

// Validate

function v_email($v)
{
    $upe = filter_var("$v", FILTER_VALIDATE_EMAIL);
    return $upe;
}
function v_num($v)
{
    $upe = filter_var("$v", FILTER_VALIDATE_INT);
    return $upe;
}
function v_url($v)
{
    $upe = filter_var("$v", FILTER_VALIDATE_URL);
    return $upe;
}
function v_ip($v)
{
    $upe = filter_var("$v", FILTER_VALIDATE_IP);
    return $upe;
}

// get_user_ip()

function get_user_ip()
{
    if (!isset($_SERVER['REMOTE_ADDR'])) {
        return NULL;
    }

    $proxy_header = "HTTP_X_FORWARDED_FOR";
    $trusted_proxies = array("2001:db8::1", "192.168.50.1");
    if (in_array($_SERVER['REMOTE_ADDR'], $trusted_proxies)) {

        if (array_key_exists($proxy_header, $_SERVER)) {

            $client_ip = trim(end(explode(",", $_SERVER[$proxy_header])));

            if (filter_var($client_ip, FILTER_VALIDATE_IP)) {
                return $client_ip;
            } else {
            }
        }
    }
    return $_SERVER['REMOTE_ADDR'];
}

// now_time()

function now_time($fomat = "h:i:s A")
{
    $date = new DateTime();
    $time = $date->format("$fomat");
    return $time;
}

// delHTML()

function delHTML($var)
{
    $hop = strip_tags($var);
    return $hop;
}

// deleteD()

function deleteD($dir)
{
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) != false) {
            if (($file == ".") || ($file == "..")) continue;
            if (is_dir($dir . '/' . $file))
                deleteD($dir . '/' . $file);
            else
                unlink($dir . '/' . $file);
        }
        closedir($dh);
        rmdir($dir);
    }
}

// readD()

function readD($dir = "/")
{
    $dh = opendir($dir);
    while ($file = readdir($dh))
        echo "$file <br />";
    closedir($dh);
}

// wordno()

function wordno($var)                       // Use:
{                                         // $word = 'Hello World';
    $vop = str_word_count($var);         // exe(wordno($word), "words written");
    return $vop;                        // Output:
}                                      // 2 words written

// bong()

function bong($var, $type = 'mailto:')
{                                                                         // file.txt                                   
    $users = file($var);                                                // Ale ale@example.com
    foreach ($users as $user) {                                        // Nicole nicole@example.com
        list($name, $email) = explode(' ', $user);                /// use:
        $email = trim($email);                                   /// bong('file.txt');
        echo "<a href=\"$type$email\">$name</a> <br /> ";       /// output:
    }                                                      /// <a href="mailto:ale@gmail.com">Ale</a> <br /> 
}

// getpost()

function getPost($key)
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    }
    return 'No key';
}

// uploadF()

function uploadF($name, $to = '')
{
    if (isset($_FILES["$name"]['tmp_name'])) {
        define("FILEREPOSITORY", "$to");
        $result = move_uploaded_file(
            $_FILES["$name"]['tmp_name'],
            FILEREPOSITORY . $_FILES["$name"]['name']
        );
        if ($result == 1) return true;
        else return false;
    }
}

// randomN()

function randomN(int $length, int $last = 100)
{
    $array = [];

    for ($i = 0; $i < $length; $i++) {
        $array[] = mt_rand(1, $last);
    }

    return dirray($array, '');
}

// newWindow()

function newWindow($url)
{
    echo "\n<script>\nwindow.open('$url');\n</script>";
}

// use()

function rule($matches, $link)
{
    switch ($matches) {
        case 'css':
            echo "<link rel='stylesheet' href='$link'/>\n";
            break;
        case 'js':
            echo "<script type='javascript' src='$link'/>\n";
            break;
        case 'favicon':
            echo "<link rel=\"shortcut icon\" href=\"$link\">\n";
            break;
        default:
            '';
    }
}

// open()

function Hopen($tagname)
{
    echo "<$tagname>\n";
}

function Hclose($tagname)
{
    echo "<$tagname/>\n";
}

function Htitle($title)
{
    echo "   <title>$title</title>\n";
}

function Himg($src, $asstribute = '')
{
    echo "   <img src='$src' $asstribute/>\n";
}

// newcook()

function newcook($name, $value)
{
    echo "<script>\nlocalStorage.setItem('$name', \"$value\");";
}
function delcook($name)
{
    echo "<script>\nlocalStorage.removeItem('$name');";
}

// random_r()

function random_r($array)
{
    if (is_array($array)) {
        shuffle($array);
        return $array[0];
    }
    else
       return "Array expected";
}

// SSS
// getlines()

function getlines($file, $start = 1, $lines = null)
{
    // open file
    $fp = fopen($file, 'r') or die('ERROR: Cannot find file');
    // initialize counters
    $linesScanned = 1;
    $linesRead = 0;
    $out = '';
    // loop until end of file
    while (!feof($fp)) {
        // get each line
        $line = fgets($fp);
        if ($linesScanned >= $start) {
            $out .= $line;
            $linesRead++;
            if (!is_null($linesRead) && $linesRead == ($lines)) {
                break;
            }
        }
        $linesScanned++;
    }
    return $out;
}

// xml()

function xml($file)
{
    $xml = simplexml_load_file("$file.xml") or die("Unable to load XML!");
    return $xml;
}

// notHTML()

function notHTML($var)
{
    $top = htmlspecialchars($var);
    return nl2br($top);
}


// xxx

function xxx(int $num = 3){
    $n = [
        'a',
        'ba', 'be', 'bi', 'bo', 'bu',
        'ca', 'ce', 'ci', 'co', 'cu',
        'da', 'de', 'di', 'do', 'du',
        'e',
        'fa', 'fe', 'fi', 'fo', 'fu',
        'ga', 'ge', 'gi', 'go', 'gu',
        'ha', 'he', 'he', 'ho', 'hu',
        'i',
        'ja', 'je', 'ji', 'jo', 'ju',
        'ka', 'ke', 'ki', 'ko', 'ku',
        'la', 'le', 'li', 'lo', 'lu',
        'ma', 'me', 'me', 'mo', 'mu',
        'na', 'ne', 'ni', 'no', 'nu',
        'o',
        'pa', 'pe', 'pi', 'po', 'pu',
        'qa', 'qe', 'qi', 'qo', 'qu',
        'ra', 're', 'ri', 'ro', 'ru',
        'sa', 'se', 'si', 'so', 'su',
        'ta', 'te', 'ti', 'to', 'tu',
        'u',
        'va', 've', 'vi', 'vo', 'vu',
        'wa', 'we', 'wi', 'wo', 'wu',
        'xa', 'xe', 'xi', 'xo', 'xu',
        'ya', 'ye', 'yi', 'yo', 'yu',
        'za', 'ze', 'zi', 'zo', 'zu',
        'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'
    ];
    switch ($num):
        case 3:
            return random_r($n) . random_r($n) . random_r($n);
            break;
        case 4:
            return random_r($n) . random_r($n) . random_r($n) . random_r($n);
            break;
        case 5:
            return random_r($n) . random_r($n) . random_r($n) . random_r($n) . random_r($n);
            break;
        case 6:
            return random_r($n) . random_r($n) . random_r($n) . random_r($n) . random_r($n) . random_r($n);
            break;
        case 7:
            return random_r($n) . random_r($n) . random_r($n) . random_r($n) . random_r($n) . random_r($n) . random_r($n);
            break;
        case 8:
            return random_r($n) . random_r($n) . random_r($n) . random_r($n) . random_r($n) . random_r($n) . random_r($n) . random_r($n);
            break;
    endswitch;
}

// sler()

function sler($var){ //encode
    str_replace('a', 'atra', $var);
    str_replace('e', 'yon', $var);
    str_replace('i', 'y/on', $var);
    str_replace('o', 'gopa', $var);
    str_replace('u', '/', $var);
    $var = str_replace('/', 'upovfb', $var);
    return $var;
}
function sldr($var){ //decode
    str_replace('atra', 'a', $var);
    str_replace('yon', 'e', $var);
    str_replace('y/on', 'i', $var);
    str_replace('gopa', 'o', $var);
    str_replace('/', 'u', $var);
    $var = str_replace('upovfb', '/', $var);
    return $var;
}
