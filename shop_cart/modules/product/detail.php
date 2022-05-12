<?php get_header()?>
<div id="main-content-wp" class="detail-product-page clearfix">
   <?php get_sibar()?>
        <div id="content" class="fl-right">
            <?php 
            $idItem = $_GET['id'];
              $item = get_item_by_id($idItem);
              if(!empty($item))
              {

              
             ?>
            <div class="section" id="info-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb fl-left">
                        <img src="<?php echo $item["product_thumb"] ?>" alt="">
                    </div>
                    <div class="detail fl-right">
                        <h3 class="title"><?php echo $item["product_name"]?></h3>
                        <p class="price"><?php  convert_price_to_string($item["product_price"])?></p>
                        <p class="product-code">Mã sản phẩm: <span><?php echo $item["code"]?></span></p>
                        <div class="desc-short">
                            <h5>Mô tả sản phẩm:</h5>
                            <p><?php echo $item["product_desc"]?></p>
                        </div>
                        <div class="num-order-wp">
                            <span>Số lượng:</span>
                            <input type="text" id="num-order" name="num-order" value="1">
                            <a href="<?php  echo "?module=cart&act=add&id=".$item["id"]?>" title="" class="add-to-cart">Thêm giỏ hàng</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="section" id="desc-wp">
                <div class="section-head">
                    <h3 class="section-title">Chi tiết sản phẩm</h3>
                </div>
                <div class="section-detail">
                    <?php  echo $item["product_content"]?>
                </div>
            </div>
            <?php }
            else{
                echo "sản phẩm này không tồn tại";
            }?>
        </div>
    </div>
</div>
<?php  get_footer()?>