<?php 
function get_page_by_id($id)
{
 global $list_pages;
 if(array_key_exists($id,$list_pages))
 {
     return $list_pages[$id];
 }
 return False;
}
?>