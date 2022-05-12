<!DOCTYPE html>
<html>
    <head>
        <title>Unitop Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="theme/public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="theme/public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="theme/public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="theme/public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="theme/public/style.css" rel="stylesheet" type="text/css"/>
        <link href="theme/public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="theme/public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="theme/public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="theme/public/js/main.js" type="text/javascript"></script>
        <script src="theme/public/js/remain.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp" class="clearfix">
                    <div class="wp-inner">
                        <a href="?page=home" title="" id="logo" class="fl-left">UNITOP STORE</a>
                        <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                        <div id="cart-wp" class="fl-right">
                            <a href="?module=cart&act=show" title="" id="btn-cart">
                                <span id="icon"><img src="theme/public/images/icon-cart.png" alt=""></span>
                                <span id="num"><?php if(!empty($_SESSION['cart']["checkout"]['number_order'])){echo $_SESSION['cart']['checkout']['number_order'];}?></span>
                            </a>
                        </div>
                    </div>
                </div>