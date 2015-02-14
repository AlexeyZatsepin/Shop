<?php
session_start();
include 'util/functions.php';
if (!isset($_SESSION['cart']))
{
    $_SESSION['cart']=array();
    $_SESSION['total_items'] = 0;
    $_SESSION['total_price'] = 0.00;
}

$view=(empty($_GET['view'])) ? 'index' : $_GET['view'];

switch($view)
{
    case ('index'):
        $products = getProducts();
        break;
    case ('cat'):
        $cat_id=$_GET['id'];
        $products=getProductsByCat($cat_id);
        $view = 'index';
        break;
    case ('cart'):
        break;
    case ('product'):
        $id = $_GET['id'];
        $product = getProduct($id);
        break;
    case ('add_to_cart'):
        $id=$_GET['id'];
        $add_item = add_to_cart($id);
        $_SESSION['total_items'] = total_items($_SESSION['cart']);
        $_SESSION['total_price'] = total_price($_SESSION['cart']);
        $view = 'product';
        $product = getProduct($id);
        break;
    case ('update_cart'):
        update_cart();
        $_SESSION['total_items'] = total_items($_SESSION['cart']);
        $_SESSION['total_price'] = total_price($_SESSION['cart']);
        echo("<script>location.href='index.php?view=cart'</script>");
        break;
    case ('order'):
        break;
    case ('about'):
        break;
    case ('search'):
        $word=$_GET['search'];
        $products = search($word);
        $view = 'index';
        break;
}
$arr=array('index','cat','product', 'add_to_cart','update_cart','order','cart','about','search','login','logout','register','intropage');
if(in_array($view,$arr)){
    include 'views/layouts/main_layout.php';
}
else{
    include 'views/layouts/404_layout.php';
}
