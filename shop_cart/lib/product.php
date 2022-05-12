<?php

use Aws\Api\DocModel;

function get_list_product_by_id($id)
{
    global $list_products;
    global $list_cat;
    if (array_key_exists($id, $list_cat)) {
        return array_filter($list_products, function ($product) use (&$id) {
            $product['url'] = "?module=product&act=detail";
            return $product["cat_id"] == $id;
        });
    }
    return false;
}
function convert_price_to_string($price, $unit = "VNĐ")
{
    echo number_format($price, 0, ".", ".") . $unit;
}
function get_item_by_id($id)
{
    global $list_products;
    foreach ($list_products as $product) {
        if ($product['id'] == $id)
            return $product;
    }
    return false;
}
function check_item_in_cart($id)
{
    if (!empty($_SESSION['cart']["buy"])) {
        foreach ($_SESSION["cart"]["buy"] as $item) {
            if ($item['id'] == $id) {

                return true;
            }
        }
        return false;
    }
    return false;
}
function add_cart($id)
{
    global $list_products;
    $productAdd = $list_products[$id];
    if (!empty($productAdd)) {
        $url = "?module=product&act=detail&id=" . $id;
        $item_buy = [
            "id" => $id,
            "url" => $url,
            "product_name" => $productAdd["product_name"],
            "product_price" => $productAdd["product_price"],
            "product_thumb" => $productAdd["product_thumb"],
            "code" => $productAdd["code"],
            "qty" => 1,
            "sub_total" => $productAdd["product_price"],
        ];
        $flag = check_item_in_cart($id);
        if (!$flag) {
            if (isset($_SESSION['cart']['buy'])) {
                $_SESSION['cart']['buy'][$id] = $item_buy;
            }
        } else {
            $_SESSION['cart']['buy'][$id]['qty']++;
            $_SESSION['cart']['buy'][$id]['sub_total'] = $_SESSION['cart']['buy'][$id]['qty'] * $_SESSION['cart']['buy'][$id]['product_price'];
        }
    }
    update_cart();
}

function update_cart()
{
    $number_order = 0;
    $total_cost = 0;
    foreach ($_SESSION["cart"]["buy"] as $item) {
        $number_order += $item['qty'];
        $total_cost += $item["sub_total"];
    }
    $_SESSION["cart"]['checkout']["number_order"] = $number_order;
    $_SESSION['cart']['checkout']['total_cost'] = $total_cost;
}
function delete_item_by_id($id)
{
    if (check_item_in_cart($id)) {
        if ($_SESSION['cart']['buy'][$id]['qty'] > 1) {
            $_SESSION['cart']['buy'][$id]['qty']--;
            $_SESSION['cart']['buy'][$id]["sub_total"]= $_SESSION['cart']['buy'][$id]["qty"]*$_SESSION['cart']['buy'][$id]['product_price'];
        } else {
            unset($_SESSION['cart']['buy'][$id]);
          
        }
        update_cart();
    }
}
function update($new_value)
{

    foreach($new_value as $id=>$new)
    {
        $_SESSION['cart']['buy'][$id]['qty']= (int)$new;
        $_SESSION['cart']['buy'][$id]["sub_total"]= $_SESSION['cart']['buy'][$id]["qty"]*$_SESSION['cart']['buy'][$id]['product_price'];

    }
    update_cart();

}
function show_item()
{
    $result = "<p>Cảm ơn quý khách đã ủng hộ Shop chúng tôi.</p><p>Thông tin sản phẩm bạn đã mua:</p>". 
    "<table class='shop-table'>
                                        
    <thead>
        <tr>
            <td>Sản phẩm(<?php echo {$_SESSION['cart']['checkout']['number_order']} ?>)</td>
            <td>Tổng</td>
        </tr>
    </thead>
    <tbody>";
    foreach ($_SESSION['cart']['buy'] as $item){
        $result.= " <tr class='cart-item'>".
        "<td class='product-name'>{$item['product_name']}<strong class='product-quantity'> X {$item['qty']} </strong></td>".
       " <td class='product-total'> {$item['sub_total']}</td>
    </tr>";

    }
    return  $result;
}