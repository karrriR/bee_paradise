<?php
require_once '../config/connect.php';


if(isset($_POST['consult']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $personalData = isset($_POST['personal-data']) ? $_POST['personal-data'] : null;
    $currentDate = date('Y-m-d H:i:s');

        if(!empty($email) and !empty($tel) and !empty($name)) {
            if(preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)) {
                if(!empty($personalData)) {
                    mysqli_query($link, "INSERT INTO `application_for_consultation` (`name`, `email`, `telephone`, `sending_date`) VALUES ('$name', '$email', '$tel', '$currentDate')") or die(mysqli_error($link));
                    echo "<script type='text/javascript'>alert('Ваша заявка принята. Наша команда свяжется с вами в ближайшее время');</script>";
                    echo "<script type='text/javascript'>window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Дайте согласие на обработку персональных данных.');</script>";
                    echo "<script type='text/javascript'>window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Email должен содержать символ @. Введите правильный email.');</script>";
                echo "<script type='text/javascript'>window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
            } 
        } else {
            echo "<script type='text/javascript'>alert('Сначала введите все данные в поля.');</script>";
            echo "<script type='text/javascript'>window.location.href = '".$_SERVER['HTTP_REFERER']."';</script>";
        }
}
?>