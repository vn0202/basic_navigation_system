<style>
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }
  #content {
    min-height: 400px;
  }
</style>

<?php
#include data
require "data/data.php";
require "data/pages.php";
require "data/products.php";
#include lib
require "lib/validate_data.php";
require "lib/validate_login.php";
require "lib/components.php";
require "lib/page.php";
require "lib/product.php";
require "lib/url.php";

?>

<?php
if(!empty($_COOKIE['id']))
{
  $_SESSION["is_login"]=true;
  $_SESSION['id'] = $_COOKIE['id'];

}
if (!isset($_SESSION["is_login"]) && $_GET['module']!="login") {
  // $_GET['page'] = "login";
  header("Location: ?module=login&act=main");
}
else{
  if(!isset($_SESSION["cart"]["buy"]))
  {
$_SESSION["cart"]["buy"]=array();
  
  }
  if(!isset($_SESSION["cart"]["checkout"]))
  {
 $_SESSION["cart"]['checkout']= array();
  }
}

$module= $_GET["module"] ??"home";
$act = $_GET["act"] ?? "main";
$path = "modules/".$module."/".$act.".php";
if(file_exists($path))
{
  require $path;
}
else{
  require "components/404.php";
}

?>