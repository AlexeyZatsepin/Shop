<?php
if ($_SESSION['cart']){
?>
<form action="index.php?view=update_cart" method="post">
    <fieldset>
        <legend>My cart</legend>
        <div class="row">
            <div class="medium-3 columns">Product</div>
            <div class="medium-3 columns">Price</div>
            <div class="medium-3 columns">Quantity</div>
            <div class="medium-3 columns">At all</div>
        </div>
        <? foreach($_SESSION['cart'] as $id => $quantity):
            $product=getProduct($id);
                        ?>
        <div class="row">
            <div class="medium-3 columns"><? echo $product['title'];?></div>
            <div class="medium-3 columns"><? echo $product['price'];?>$</div>
            <div class="medium-3 columns"><label><input type="text" name="<? echo $id;?>" value="<?echo $quantity;?>"></label></div>
            <div class="medium-3 columns"><? echo  $product['price']*$quantity; ?>$</div>
        </div>
        <?php endforeach; ?>

        <p>Total price:<? echo $_SESSION['total_price']?> $</p>
        <input type="submit" class="button round success" name="update" value="Refactor">
        <a href="index.php?view=order"><input  class="button round success" name="buy" value="Buy"></a>

    </fieldset>
</form>
<?
}
else
    echo "Cart is empty";
?>