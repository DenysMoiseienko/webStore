<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/webStore/">
    <?=$this->getMeta();?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />    
    <link href="libs/megamenu/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fonts/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />


</head>
<body>
<header class="navbar navbar-light bg-light">
    <div>
        <button class="open-nav" onclick="openNav()">&#9776;</button>
        <a class="navbar-brand" href="<?=PATH;?>"><h1><?=\store\App::$app->getProperty('shop_name')?></h1></a>
        <nav id="sidebar-nav" class="sidebar-nav">  
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
            <?php new \app\widgets\menu\Menu(['tpl' => WWW . '/menu/menu.php']); ?>
            
            <ul class="menu navbar-nav">
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link">Account</a>
                    <button class="menu-has-items-toggle"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    <?php if (!empty($_SESSION['user'])): ?>
                        <ul>
                            <li><li><a href="user/myaccount" class="nav-link"><?=h($_SESSION['user']['name'])?></a></li></li>
                            <li><a href="user/logout">Logout</a></li>
                        </ul>
                    <?php else: ?>
                        <ul>
                            <li><a href="user/login">Login</a></li>
                            <a href="user/signup">Sign in</a></li>
                        </ul>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link">About us</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="box d-flex align-middle"> 
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control custom-input mr-sm-2 typeahead" type="text" id="typeahead" name="s" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>                   
        <!-- <select id="currency" tabindex="4" class="dropdown drop"> -->
            <?php// new \app\widgets\currency\Currency()?>
        <!-- </select> -->
        <div class="cart box_1">
            <a href="cart/show" onclick="getCart(); return false;">
                <div class="total">
                    <img src="images/cart-1.png" alt=""/>
                    <?php if (!empty($_SESSION['cart'])): ?>
                        <span class="simpleCart_total">
                            <?=$_SESSION['cart.qty'];?>
                        </span>
                    <?php else: ?>
                        <span class="simpleCart_total"></span>
                    <?php endif; ?>
                </div>
            </a>
            <div class="clearfix"> </div>
        </div>
    </div>  
</header>
<main>
<?=$content;?>
</main>
<footer>

</footer>

<!-- start Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Cart</h4>
            </div>

            <div class="modal-body">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Continue shopping</button>
                <a href="cart/view" type="button" class="btn btn-primary">Order</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()">Empty cart</button>
            </div>
        </div>
    </div>
</div>
<!-- end Modal -->
    
<?php  $curr = \store\App::$app->getProperty('currency');?>
<script>
    var path = '<?=PATH;?>',
        course = '<?=$curr['value'];?>',
        symbolLeft = '<?=$curr['symbol_left']?>',
        symbolRight = '<?=$curr['symbol_right']?>';
</script>

<script src="libs/jquery.min.js"></script>
<script src="libs/bootstrap/js/bootstrap.min.js"></script>
<script src="libs/validator.js"></script>
<script src="libs/typeahead.bundle.js"></script>
<script src="js/main.js"></script>

</body>
</html>