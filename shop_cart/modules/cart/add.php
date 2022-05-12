<?php 
$idItem= (int)$_GET["id"];
add_cart($idItem);

header("Location: ?module=cart&act=show");

?>