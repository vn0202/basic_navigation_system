<?php 

if(isset($_POST['btn_update']))
{
  
    update($_POST["qty"]);
    redirect_to("?module=cart&act=show");

}
?>