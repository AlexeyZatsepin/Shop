<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4"><?php
foreach ($products as $item):
?>
    <li><a href="index.php?view=product&id=<? echo $item['id'];?>"><?echo $item['title'];?></a>
    <img src="static/img/<? echo $item['image'] ?>">
    <p><? echo $item['price']; ?></p>
    <p><? echo $item['category']; ?></p>
    </li>
<? endforeach
?>

</ul>