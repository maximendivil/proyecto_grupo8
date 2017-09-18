<?php
require_once('../Twig/vendor/autoload.php');
$loader = new Twig_Loader_Filesystem('../vista');
$twig = new Twig_Environment($loader);
    
$twig->addExtension(new Twig_Extension_Debug());
?>