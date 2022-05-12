<?php get_header() ?>
<?php if (!empty($_SESSION['cart']['buy'])) { ?>
    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <h3 class="title">Giỏ hàng</h3>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="info-cart-wp">
                <div class="section-detail table-responsive">
                    <form action="?module=cart&act=update" method="POST">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td colspan="2">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION["cart"]['buy'] as $item) {
                                if ($item["qty"] > 0) { ?>
                                    <tr>
                                        <td><?php echo $item["code"] ?></td>
                                        <td>
                                            <a href="" title="" class="thumb">
                                                <img src="<?php echo $item["product_thumb"] ?>" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo $item["url"] ?>" title="" class="name-product"><?php echo $item["product_name"] ?></a>
                                        </td>
                                        <td><?php convert_price_to_string($item["product_price"]) ?></td>
                                        <td>
                                            <input type="number"  min=1 max=10 name="qty[<?php echo $item['id']?>]" value="<?php echo $item["qty"] ?>" class="num-order" id="number-order">
                                        </td>
                                        <td><?php convert_price_to_string($item["sub_total"]) ?></td>
                                        <td>
                                            <a href="<?php echo "?module=cart&act=delete&id=" . $item['id'] ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span><?php convert_price_to_string($_SESSION["cart"]['checkout']['total_cost']) ?></span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <input type="submit" name="btn_update" value="Cập nhật giỏ hàng" id="update-cart">
                                            <a href="?module=cart&act=checkout" title="" id="checkout-cart">Thanh toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    </form>
                </div>
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                    <a href="?" title="" id="buy-more">Mua tiếp</a><br />
                    <a href="?module=cart&act=delete_all" title="" id="delete-cart">Xóa giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div id="cart--empty">
        <p>Giỏ hàng trống</p>
        <p> Click <a href='?'>vào đây </a> để quay lại trang chủ</p>
    </div>

<?php } ?>
<?php get_footer() ?>