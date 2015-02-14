<?php
if ($_SESSION['cart']){

    ?>
    <form action="index.php?view=order" method="post">
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
                    <div class="medium-3 columns"><?echo $quantity;?></div>
                    <div class="medium-3 columns"><? echo  $product['price']*$quantity; ?>$</div>
                </div>
            <?php endforeach; ?>
            <?php if (!isset($_POST['order'])){ ?>
            <p>Total price:<? echo $_SESSION['total_price']?> $</p>
            <p>Name:<input type="text" name="name"></p>
            <p>Surname:<input type="text" name="sname"></p>
            <p>Email:<input type="email" name="email"></p>

            <input type="submit" class="button round success" name="order" value="BUY">
            <?}
            else echo "Sucsess";?>
        </fieldset>
    </form>
<?
}
if (isset($_POST['order'])){
    $name = $_POST['name'];
    $sname = $_POST['sname'];
    $date=date('y-m-d');
    $time=date('h:m:s');
    db_connect();
    foreach($_SESSION['cart'] as $id => $quantity):
        $product=getProduct($id);
        $query = mysql_query("INSERT INTO lp_orders VALUES ('$name','$sname','$date','$time','{$product['title']}','{$product['price']}','{$product['id']}','{$product['qty']}')");
    endforeach;


}
?>
