<!--start-breadcrumbs-->
<div class="container-fluid p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= PATH ?>">Home</a></li>
            <li class="breadcrumb-item">Cart</li>
        </ol>
    </nav>
</div>
<!--end-breadcrumbs-->

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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th><span class="sr-only">Remove</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($_SESSION['cart'] as $id => $item): ?>
                                    <tr>
                                        <td><a href="product/<?=$item['alias'];?>"><img src="images/<?= $item['img'];?>" alt="<?=$item['title'];?>"></a></td>
                                        <td><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></td>
                                        <td><?=$item['qty'];?></td>
                                        <td><?=$item['size'];?></td>
                                        <td><?=$item['price'];?></td>
                                        <td class="text-center"><a href="cart/delete/?id=<?=$id ?>"><span data-id="<?=$id;?>" class="fa fa-times text-danger del-item" aria-hidden="true"></span></a></td>
                                    </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td>Total:</td>
                                    <td colspan="5" class="text-right cart-qty"><?=$_SESSION['cart.qty']; ?></td>
                                </tr>
                                <tr>
                                    <td>Total price:</td>
                                    <td colspan="5" class="text-right cart-sum"><?= $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . " {$_SESSION['cart.currency']['symbol_right']}" ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 account-left">
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