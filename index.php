<?php
require_once 'php/config/connect.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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
    <section class="section-slider">
        <div class="section-slider_slider">
            <div class="section-slider_slider-line">
                <div class="section-slider_advertisement-boxs">
                    <div class="section-slider_advertisement-box">
                        <img src="image/slider_image/image-one.png" alt="advertisement foto" class="section-slider_img">
                        <div class="section-slider_advertisement-box-text">
                            <h2 class="section-slider_title">Бесплатная доставка</h2>
                            <p class="section-slider_text">При заказе на определенную сумму (например, от 1000 рублей)
                                мы предоставляем бесплатную доставку мёда прямо к вам домой.</p>
                        </div>
                    </div>
                    <div class="section-slider_advertisement-box">
                        <img src="image/slider_image/image-two.png" alt="advertisement foto" class="section-slider_img">
                        <div class="section-slider_advertisement-box-text">
                            <h2 class="section-slider_title">Подарочные наборы</h2>
                            <p class="section-slider_text">Создаем эксклюзивные подарочные наборы, включающие различные
                                виды меда, прополис и другие пчелопродукты. Отличный вариант для подарка близким и
                                друзьям.</p>
                        </div>
                    </div>
                    <div class="section-slider_advertisement-box">
                        <img src="image/slider_image/image-three.png" alt="advertisement foto"
                            class="section-slider_img">
                        <div class="section-slider_advertisement-box-text">
                            <h2 class="section-slider_title">Скидка для постоянных клиентов</h2>
                            <p class="section-slider_text">Постоянные клиенты имеют уникальную возможность получать
                                скидки на следующую покупку в размере 10% от стоимости предыдущих покупок.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-slider_scroll">
                <button class="section-slider_button-left" onclick="slidePrew();"><img src="image/arrow_left.svg"
                        alt="prew"></button>
                <button class="section-slider_button-right" onclick="slideNext();"><img src="image/arrow_right.svg"
                        alt="next"></button>
            </div>
        </div>
    </section>
    <section class="container hits">
        <h2 class="hits_title">Хиты продаж</h2>
        <div class="hits_boxs">
        <?php 
            $sql = "SELECT * FROM products WHERE sold > 460;";
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

            <div class="hits_box">
                <p class="hits_price"><span class="hits_price-bold"><?= $products['price']; ?> ₽</span> / <?= $suffix ?></p>
                <img src="<?= $imagePath . $products['img']; ?>" alt="foto product" class="hits_foto-product">
                <h2 class="hits_name-product"><?= $products['name']; ?></h2>
                <button class="hits_button-more">Подробнее</button>
            </div>
            <?php 
                }
            ?>
        </div>
        <button class="hits_button" onclick="location.href='products.php'">Смотреть больше</button>
    </section>
    <section class="about-as">
        <div class="container about-as_boxs">
            <div class="about-as_box-img">
                <img src="image/element/page-one_about-us.png" alt="foto" class="about-as_image">
            </div>
            <div class="about-as_box-text">
                <h2 class="about-as_title">Немного о нас</h2>
                <p class="about-as_text">Наша компания обрела свое начало благодаря тому, что основатель увлекался
                    пчеловодством и столкнулся с изобилием меда. Именно в этот момент его сын выдвинул идею создания
                    компании, занимающейся продажей меда. Так родился наш проект, который стал воплощением любви к
                    природе и стараниям нескольких поколений пчеловодов.</p>
            </div>
        </div>
    </section>
    <section class="container consultation-form">
        <div class="consultation-form_box">
            <div class="consultation-form_main">
                <div class="consultation-form_text-box">
                    <h2 class="consultation-form_title">Получите консультацию по нашему мёду</h2>
                    <p class="consultation-form_text">Заполните форму, чтобы получить бесплатную консультацию от нашей
                        команды по выбору подходящего мёда и всех вопросах, которые у вас могут возникнуть.</p>
                </div>
                <div class="consultation-form_formbox">
                    <form action="php/handler/application_for_consultation.php" method="post" class="consultation-form_form-main" id="forma_consult">
                        <div class="consultation-form_input-box">
                            <input type="text" name="name" id="name" placeholder="Введите ваше имя">
                            <input type="email" name="email" id="email" placeholder="Введите ваш email">
                            <input type="tel" id="phone" name="tel" placeholder="Введите ваш телефон">
                        </div>
                        <div class="consultation-form_personal-data">
                            <input type="checkbox" class="consultation-form_personal-data-checkbox" name="personal-data" id="personal-data"/>
                            <label class="consultation-form_personal-data-label" for="personal-data">Нажимая, вы даете
                                согласие на обработку своих персональных данных</label>
                        </div>
                        <button class="consultation-form_personal-data-button consultation-form_personal-data-button-text" type="submit" name="consult">Получить консультацию</button>
                    </form>
                    <script>
                        $(document).ready(function(){
                        $('#phone').mask("+7 (999) 999-99-99");

                        $('#forma_consult').submit(function(event) {
                            var phoneInput = $('#phone').val();
                            var phoneNumber = phoneInput.replaceAll(/\D+/g, '');
                            $('#phone').val(phoneNumber);         
                        });
                        });

                    </script>
                </div>
            </div>
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
    <script src="js/slider.js"></script>
</body>
</html>