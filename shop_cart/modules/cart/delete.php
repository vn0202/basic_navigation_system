<?php 
$idItem= (int)$_GET['id'];
delete_item_by_id($idItem);

redirect_to("?module=cart&act=show");

?>