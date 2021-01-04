<?php if(!empty($_SESSION['cart'])): ?>
    <div>
        <?php foreach($_SESSION['cart'] as $id => $item): ?>
            <div class="d-flex justify-content-between cart-modal-item">
                <div class="d-flex">
                    <a href="product/<?=$item['alias'];?>"><img class="cart-img img-fluid" src="images/<?=$item['img'];?>" alt=""></a>
                    <div class="ml-3">
                        <a class="d-block bold" href="product/<?=$item['alias'];?>"><?=$item['title'];?></a>
                        <div>
                            <span>Size: </span>
                            <span class="bold"><?=$item['size']?></span>
                        </div>
                        <div>
                            <label for="quantity-input">Quantity:</label>
                            <span class="quantity-input">
                                <input data-id="<?=$id;?>" id="quantity-input" class="cart-quantity" type="number" size="4" value="<?=$item['qty'];?>" name="quantity" min="1" step="1">
                            </span>
                        </div>
                        <div class="bold">
                            <?=$_SESSION['cart.currency']['symbol_left'].$item['price'].$_SESSION['cart.currency']['symbol_right'];?>
                        </div>                    
                    </div>
                </div>
                <span data-id="<?=$id;?>" class="fa fa-times text-danger del-item cursor-pointer" aria-hidden="true"></span>
            </div>
        <?php endforeach; ?>
            <div class="cart-modal-item">
                <div>
                    <span>Total: </span>
                    <span class="text-center cart-qty"><?=$_SESSION['cart.qty'];?></span>
                </div>
                <div>
                    <span>Total price: </span>
                    <span class="text-left cart-sum">
                        <?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?>
                    </span>
                </div>
            </div>
    </div>

<?php else: ?>
    <h3>Cart is Empty</h3>

<?php endif; ?>