<?php
function db_connect(){
    mysql_connect("localhost", "Alex", "qwerty")
    or die("<p>Ошибка подключения к базе данных! " . mysql_error() . "</p>");

    mysql_select_db("lp_shop")
    or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");

    return true;
}
function result_to_array($result){
    $array=array();
    $count = 0;
    while ($row=mysql_fetch_array($result)){
        $array[$count] = $row;
        $count++;
    }
    return $array;
}

function getProducts(){
    db_connect();

    $query ="SELECT * FROM lp_products";

    $result = mysql_query($query);
    $result = result_to_array($result);
    return $result;
}

function getCategory(){
    db_connect();

    $query ="SELECT * FROM lp_categories";

    $result = mysql_query($query);
    $result = result_to_array($result);
    return $result;
}
function getProduct($id){
    db_connect();
    $query ="SELECT * FROM lp_products WHERE id ='$id'";

    $result = mysql_query($query);
    $result = mysql_fetch_array($result);
    return $result;
}

function getProductsByCat($cat_id){
    db_connect();

    $query ="SELECT * FROM lp_products WHERE category='$cat_id'";

    $result = mysql_query($query);
    $result = result_to_array($result);
    return $result;
}
function add_to_cart($id){
    if (isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]++;
        return true;
    }
    else{
        $_SESSION['cart'][$id]=1;
        return true;
    }
}
function update_cart(){
    foreach($_SESSION['cart'] as $id => $qty):
        if($_POST[$id]==0){
            unset($_SESSION['cart'][$id]);
        }
        else{
            $_SESSION['cart'][$id]= $_POST[$id];
        }

    endforeach;
}
function total_items($cart){
    $num_items = 0;
    if (is_array($cart)){
        foreach($cart as $id => $quantity){
            $num_items=$num_items+$quantity;
        }
    }
    return $num_items;
}
function total_price($cart)
{
    $price = 0.00;
    db_connect();
    if (is_array($cart)) {
        foreach ($cart as $id => $qty) {
            $query = "SELECT price FROM lp_products WHERE id='$id'";
            $result=mysql_query($query);
            if($result){
                $item=mysql_result($result,0,'price');
                $price=$price+$qty*$item;
            }
        }
    }
    return $price;
}
function search($q){
    db_connect();
    $query = "SELECT * FROM lp_products WHERE title LIKE '%$q%' OR category LIKE '%$q%'";
    $result=mysql_query($query);
    $result = result_to_array($result);
    return $result;
}