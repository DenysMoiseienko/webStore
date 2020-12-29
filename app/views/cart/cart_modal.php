<?php if(!empty($_SESSION['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover">
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
                        <td><a href="product/<?=$item['alias'];?>"><img class="cart-img img-fluid" src="images/<?=$item['img'];?>" alt=""></a></td>
                        <td><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></td>
                        <td><?=$item['size']?></td>
                        <td>
                            <span class="quantity-input">
                                <input data-id="<?=$id;?>" id="quantity-input" class="cart-quantity" type="number" size="4" value="<?=$item['qty'];?>" name="quantity" min="1" step="1">
                            </span>
                        </td>
                        <td><?=$item['price'];?></td>
                        <td><span data-id="<?=$id;?>" class="fa fa-times text-danger del-item cursor-pointer" aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td class="text-center cart-qty">
                            <?=$_SESSION['cart.qty'];?>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                <tr>
                    <td>Total price</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-left cart-sum">
                        <?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

<?php else: ?>
    <h3>Cart is Empty</h3>

<?php endif; ?>
