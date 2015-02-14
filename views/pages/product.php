<div>
<p><?echo $product['title'];?></p>
<img src="static/img/<? echo $product['image'] ?>">
<p><? echo $product['price']; ?></p>
<p><? echo $product['category']; ?></p>
<p><? echo $product['description']; ?></p>
<a href="index.php?view=add_to_cart&id=<? echo $product['id'] ?>" class="button round success">Add in cart</a>
</div>