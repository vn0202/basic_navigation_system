<?php
get_header();

?>

<div id="main-content-wp" class="home-page">
    <div class="wp-inner clearfix">
       <?php  get_sibar()?>
        <div id="content" class="fl-right">
        <?php foreach($list_cat as $cat ){
                $list=get_list_product_by_id($cat['id']);
                if($list){?>
            <div class="section list-cat">
            
                <div class="section-head">
                    <h3 class="section-title"><?php echo $cat["cat_title"]?></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach( $list as $item){?>
                        <li>
                            
                            <a href="<?php echo "?module=product&act=detail&id=".$item['id']?>" title="" class="thumb">
                                <img src="<?php echo $item["product_thumb"]?>" alt="">
                            </a>
                            <a href="?module=product&act=detail" title="" class="title"><?php echo $item["product_name"]?></a>
                            <p class="price"><?php  convert_price_to_string($item["product_price"])?></p>
                        </li>
                    <?php };?>
                    </ul>
                </div>
            </div>
            <div style="clear:both ;"></div>
           <?php }}?>
        </div>
    </div>
</div>
    
</div>

<?php
get_footer();
?>