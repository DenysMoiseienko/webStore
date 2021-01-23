<div class="container-fluid p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= PATH ?>">Home</a></li>
            <li class="breadcrumb-item">Cart</li>
        </ol>
    </nav>
</div>

<div class="prdt">
    <div class="container py-3">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one cart">
                    <div class="register-top heading">
                        <h2>Order</h2>
                    </div>
                    <br><br>
                    <?php if(!empty($_SESSION['cart'])):?>
                        <?php foreach($_SESSION['cart'] as $id => $item): ?>                                   
                            <div class="d-flex justify-content-between cart-modal-item">
                                <div class="d-flex">
                                    <a href="product/<?=$item['alias'];?>"><img class="cart-img img-fluid" src="images/<?=$item['img'];?>" alt="<?=$item['title'];?>"></a>
                                    <div class="ml-3">
                                        <a class="d-block bold" href="product/<?=$item['alias'];?>"><?=$item['title'];?></a>
                                        <div>
                                            <span>Size: </span>
                                            <span class="bold"><?=$item['size']?></span>
                                        </div>
                                        <div>
                                            <span>Quantity: </span>
                                            <span class="bold"><?=$item['qty'];?></span>
                                        </div>
                                        <div class="bold">
                                            <?=$_SESSION['cart.currency']['symbol_left'].$item['price'].$_SESSION['cart.currency']['symbol_right'];?>
                                        </div>                    
                                    </div>
                                </div>
                                <span data-id="<?=$id;?>" class="fa fa-trash-o text-danger del-item cursor-pointer" aria-hidden="true"></span>
                            </div>
                        <?php endforeach;?>
                            <div class="cart-modal-item">
                                <div>
                                    <span>Total: </span>
                                    <span class="text-center cart-qty bold"><?=$_SESSION['cart.qty'];?></span>
                                </div>
                                <div>
                                    <span>Total price: </span>
                                    <span class="text-left cart-sum bold">
                                        <?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-6 account-left p-0">
                            <form method="post" action="cart/checkout" role="form" data-toggle="validator">
                                <?php if(!isset($_SESSION['user'])): ?>
                                    <a class="btn custom-btn" href="user/login">Login</a>
                                    <a class="btn custom-btn" href="user/signup">Sign in</a>
                                <?php else: ?>
                                    <button type="submit" class="btn custom-btn-secondary">Checkout</button>
                                <?php endif; ?>
                            </form>
                            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                        </div>
                    <?php else: ?>
                        <h3>Cart is empty:(</h3>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>