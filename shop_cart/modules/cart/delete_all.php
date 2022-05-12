<?php 
unset($_SESSION['cart']);
redirect_to("?module=cart&act=show");
?>