<?php
require_once 'php/config/connect.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="main-menu">
                <ul class="main-menu_wrapper main-menu_section">
                    <li class="main-menu_list"><a href="about_us.php" class="main-menu_link">О нас</a></li>
                    <li class="main-menu_list"><a href="products.php" class="main-menu_link">Товары</a></li>
                </ul>
                <ul class="main-menu_wrapper">
                    <li class="main-menu_list"><a href="index.php" class="main-menu_logo"><img src="image/logo.svg"
                                alt="logo"></a></li>
                </ul>
                <ul class="main-menu_wrapper main-menu_info">
                    <li class="main-menu_list"><p class="main-menu_link">+7(995)877-85-66</p></li>
                    <li class="main-menu_list"><p class="main-menu_link">pcheliniu_ray@mail.ru</p></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="container products">
        <div class="products_button-box">
            <button class="products_button" data-id-type="1">Жидкий мёд</button>
            <button class="products_button" data-id-type="2">Мёд мармелад</button>
            <button class="products_button" data-id-type="3">Мёд-суфле</button>
            <button class="products_button" data-id-type="4">Мёд в сотах</button>
            <button class="products_button" data-id-type="5">Медомиксы</button>
            <button class="products_button" data-id-type="6">Фиточай</button>
            <button class="products_button" data-id-type="7">Продукты пчеловодства</button>
        </div>  
        <div class="products_results-box" id="result" >
        <?php 
            $sql = "SELECT * FROM products;";
            $result = mysqli_query($link, $sql);

            while($products = mysqli_fetch_assoc($result))
            {
                $type = $products["id_type"];
                switch ($type) {
                    case 1:
                        $suffix = "кг.";
                        $imagePath = "image/products/liquid-honey/";
                        break;
                    case 2:
                        $suffix = "кг.";
                        $imagePath = "image/products/honey-marmelad/";
                        break;
                    case 3:
                        $suffix = "кг.";
                        $imagePath = "image/products/Honey-soufflé/";
                        break;
                    case 4:
                        $suffix = "шт.";
                        $imagePath = "image/products/honey-in-sots/";
                        break;
                    case 5:
                        $suffix = "кг.";
                        $imagePath = "image/products/honey-mixes/";
                        break;
                    case 6:
                        $suffix = "шт.";
                        $imagePath = "image/products/phytotea/";
                        break;
                    case 7:
                        $suffix = "шт.";
                        $imagePath = "image/products/bee-products/";
                        break;
                    default:
                        $suffix = "";
                        $imagePath = "image/products/"; 
                }
        ?>

            <div class="products_box-card" data-id-type="<?= $products['id_type'] ?>">
                <p class="products_price"><span class="products_price-bold"><?= $products['price']; ?> ₽</span> / <?= $suffix ?></p>
                <img src="<?= $imagePath . $products['img']; ?>" alt="foto product" class="products_foto-product">
                <h2 class="products_name-product"><?= $products['name']; ?></h2>
                <button class="products_button-more">Подробнее</button>
            </div>
            <?php 
                }
            ?>
        </div>
    </section>
    <footer class="footer">
        <div class="container footer_main">
            <ul class="footer_main-wrapper footer_main-wrapper-info">
                <li class="footer_main-list">г. Москва, ул. Проспект Вернадского, д.6</li>
                <li class="footer_main-list">Email: pcheliniu_ray@mail.ru</li>
                <li class="footer_main-list">Tel: +7 996 895-73-66</li>
            </ul>
            <ul class="footer_main-wrapper">
                <li class="footer_main-list"><a href="#" class="footer_main-link"><img src="image/logo.svg" alt="logo"
                            class="footer_main-wrapper-logo"></a></li>
            </ul>
            <ul class="footer_main-wrapper footer_main-wrapper-apps">
                <li class="footer_main-list"><a href="#" class="footer_main-link"><img src="image/logo_telegram.svg"
                            alt="telegram"></a></li>
                <li class="footer_main-list"><a href="#" class="footer_main-link"><img src="image/logo_vk.svg"
                            alt="vk"></a></li>
                <li class="footer_main-list"><a href="#" class="footer_main-link"><img src="image/logo_pinterest.svg"
                            alt="pinterest"></a></li>
            </ul>
        </div>
    </footer>
    <script src="js/filter.js"></script>
</body>
</html>