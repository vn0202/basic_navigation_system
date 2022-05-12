<?php  get_header()?>
<?php 
$pageId = (int)$_GET['id'];
$page= get_page_by_id($pageId);
if(!$page)
{
 header("Location: components/404.php");
}
?>
<div id="main-content-wp" class="detail-news-page">
   <?php  get_sibar()?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-news-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $page["page_title"]?></h3>
                </div>
                <div class="section-detail">
                    <p class="create-date"><?php echo $page["create_at"]?></p>
                    <div class="content-news">
                       <?php echo $page["page_content"]?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer()?>