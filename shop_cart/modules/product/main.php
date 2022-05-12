<?php get_header()?>
<div id="main-content-wp" class="category-product-page">
    <div class="wp-inner clearfix">
      <?php  get_sibar()?>
      <?php 
      $productCatId=(int)$_GET["cat_id"];
      $listProduct= get_list_product_by_id($productCatId);
     

      ?>
        <div id="content" class="fl-right">
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $list_cat[$productCatId]["cat_title"]?></h3>
                    <p class="section-desc">Có <span><?php echo count($listProduct) ?></span> sản phẩm trong mục này</p>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php  foreach($listProduct as $product){ ?>
                        <li>
                            <a href="<?php echo '?module=product&act=detail&id='.$product['id']?>" title="" class="thumb">
                                <img src="<?php echo $product["product_thumb"] ?>" alt="">
                            </a>
                            <a href="<?php echo '?module=product&act=detail&id='.$product['id']?>" title="" class="title"><?php echo $product["product_name"] ?></a>
                            <p class="price"><?php  echo $product["product_price"]?></p>
                        </li>
                      <?php }?>
                    </ul>
                </div>
            </div>
            <div class="section" id="pagenavi-wp">
                <div class="section-detail">
                    <ul id="list-pagenavi">
                        <li class="active">
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                    <a href="" title="" class="next-page"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer()?>