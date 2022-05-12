<?php
get_header();
require "data/data.php";
?>
<style>
    .post{
        display: flex;
        /* padding: 10px; */
        padding: 12px 0;
    }
    
    .post-thumb{
        flex-basis: 40%;       
        background-position: left;
        background-size: contain;
        background-repeat: no-repeat;
        background-clip: border-box;
        margin-right: 10px;
        min-height:150px;
      

    }
    .post-content{
        font-family:Arial, Helvetica, sans-serif;
       
    }
    .post-title{
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .post-desc{
        font-size: 1.4rem;

    }
</style>
<div id="content">
    <ul class="list-posts">
   
    <?php foreach ($list_posts as $post) { ?>
        <li class="post">
            <div class="post-thumb" style="background-image:url('<?php echo $post['post_thumb']?>');"></div>
            <div class="post-content">
                <h1 class="post-title"><?php echo $post['post_title']?></h1>
                <p class="post-desc"><?php echo $post['post_desc']?></p>
            </div>
        </li>
    <?php } ?>
    </ul>
</div>
<?php
get_footer() ?>