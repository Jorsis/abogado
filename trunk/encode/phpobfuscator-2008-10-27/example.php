<?php
include_once("PhpObfuscator.inc.php");

$fileName="info.php";

$obfuscator=new PhpObfuscator();
$obfuscatedFile=$obfuscator->obfuscate($fileName);

//debug mode
if($obfuscator->hasErrors()){
    $errors=$obfuscator->getAllErrors();
    echo "<pre>";
    print_r($errors);
}
else {
    print("<p><u>$fileName</u> was successfully obfuscated as <a href='$obfuscatedFile'><strong>$obfuscatedFile</strong></a></p>");
}
?>