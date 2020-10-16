<?php if(!empty($_SESSION['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['cart'] as $id => $item): ?>
                    <tr>
                        <td><a href="product/<?=$item['alias'];?>"><img src="images/<?=$item['img'];?>" alt=""></a></td>
                        <td><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></td>
                        <td><?=$item['size']?></td>
                        <td><input data-id="<?=$id;?>" class="cart-quantity" type="number" size="4" value="<?=$item['qty'];?>" name="quantity" min="1" step="1"></td>
                        <td><?=$item['price'];?></td>
                        <td><span data-id="<?=$id;?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td>Total</td>
                        <td colspan="4" class="text-right cart-qty">
                            <?=$_SESSION['cart.qty'];?>
                        </td>
                    </tr>
                <tr>
                    <td>Total price</td>
                    <td colspan="4" class="text-right cart-sum">
                        <?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

<?php else: ?>
    <h3>Cart is Empty</h3>

<?php endif; ?>
