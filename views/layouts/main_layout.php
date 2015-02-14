<!DOCTYPE html>
<html>
<head>
    <link href="static/css/foundation.css" type="text/css" rel="stylesheet">
    <link href="static/css/foundation.min.css" type="text/css" rel="stylesheet">
    <link href="static/css/normalize.css" type="text/css" rel="stylesheet">
    <link href="static/css/style.css" type="text/css" rel="stylesheet">
    <link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="static/js/vendor/modernizr.js"></script>
</head>
<body>
<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="index.php?view=about" target="_blank">Apollo</a></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">

            <li class="active"><a href="index.php?view=cart"> In cart (<? echo $_SESSION['total_items'];?>)-<?echo $_SESSION['total_price'];?>$</a></li>
            <li class="has-form">
                <div class="row collapse">
                    <form action="index.php?view=search" method="get">
                    <div class="large-8 small-9 columns">
                        <input type="text" name="search" placeholder="What you want?">
                    </div>
                    <div class="large-4 small-3 columns">
                        <input type="submit" class="alert button expand" value=" Search">
                    </div>
                    </form>
                </div>
            </li>
        </ul>

        <!-- Left Nav Section -->
        <ul class="left">
            <? $categories = getCategory();
            foreach ($categories as $item):?>
                <li><a href="index.php?view=cat&id=<? echo $item['cat_id'];?>"><? echo $item['name'];?></a> </li>
            <?endforeach;
            ?>
            <li><a href="http://localhost/shop">Main</a></li>
        </ul>
    </section>
</nav>

<?php include 'views/pages/'.$view.'.php';
?>

</body>
</html>