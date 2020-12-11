<?php
session_start();
if(isset($_SESSION['screen_width']) AND isset($_SESSION['screen_height'])){
    echo 'User resolution: ' . $_SESSION['screen_width'] . 'x' . $_SESSION['screen_height'];
    print_r($_GET);
    
    
    
    
    ///////////Write your code here
    
    
    
    
    
} else if(isset($_GET['width']) AND isset($_GET['height'])) {
    $_SESSION['screen_width'] = $_GET['width'];
    $_SESSION['screen_height'] = $_GET['height'];
$x=$_SERVER["REQUEST_URI"];    
    $parsed = parse_url($x);
$query = $parsed['query'];
parse_str($query, $params);
unset($params['width']);
unset($params['height']);
$string = http_build_query($params);
$domain=$_SERVER['PHP_SELF']."?".$string;
        header('Location: ' . $domain);
} else {
$x=$_SERVER["REQUEST_URI"];    
    $parsed = parse_url($x);
$query = $parsed['query'];
parse_str($query, $params);
unset($params['width']);
unset($params['height']);
$string = http_build_query($params);
$domain=$_SERVER['PHP_SELF']."?".$string;
    echo '<script type="text/javascript">window.location = "' . $domain . '&width="+screen.width+"&height="+screen.height;</script>';
}
?>
