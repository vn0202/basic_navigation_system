<?php
function check_login()
{
    global $list_users;

    foreach ($list_users as $user) {
        if ($user["userName"] == $_POST['userName'] && $user["password"] == md5($_POST["password"])) {

            $id = $user["id"];
            return $id;
        }
    }
    return -1;
}
function redirect($url)
{
    if (!empty($url)) {
        header("Location: {$url}");
    }
}
function set_avatar()
{
  
    if (empty($user["img"])) {
        $img_path = "asset/img/uploads/default_img.jpg";
    } else {
        $img_path = $user['img'];
    }
    echo $img_path;
}
function user_infor($field)
{
    global $list_users;
    $id = $_COOKIE['id'] ?? $_SESSION['id'];
    $user= $list_users[$id];
     if($field =="img")
     {
         if(empty($user[$field]))
         {
             echo "asset/img/uploads/default_img.jpg";
         }
         else{
             echo $user["img"];
         }
     }
     else{
         if(!empty($user[$field]))
         {
             echo $user[$field];
         }
     }
   
}
function show_data($data)
{

if(is_array($data))
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}}