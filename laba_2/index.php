<?php
//if (!empty($_GET["count"])) {
//    if ($_GET["count"] == 1) {
//        ?>
<!--        <style>-->
<!--            #one {-->
<!--                background-color: red;-->
<!--            }-->
<!--        </style>-->
<!--        --><?php
//    } elseif ($_GET["count"] == 2) {
//        ?>
<!--        <style>-->
<!--            #two {-->
<!--                background-color: red;-->
<!--            }-->
<!--        </style>-->
<!--        --><?php
//    } elseif ($_GET["count"] == 3) {
//        ?>
<!--        <style>-->
<!--            #three {-->
<!--                background-color: red;-->
<!--            }-->
<!--        </style>-->
<!--        --><?php
//    } elseif ($_GET["count"] == 4) {
//        ?>
<!--        <style>-->
<!--            #four {-->
<!--                background-color: red;-->
<!--            }-->
<!--        </style>-->
<!--        --><?php
//    }
//}
//?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>

<div class="menu">
    <a href="index.php?count=1" class="elem" id="<?php if(!empty($_GET['count'])){if($_GET['count']==1){echo "red";}} ?>">О компании</a>
    <a href="index.php?count=2" class="elem" id="<?php if(!empty($_GET['count'])){if($_GET['count']==2){echo "red";}} ?>">Услуги</a>
    <a href="index.php?count=3" class="elem" id="<?php if(!empty($_GET['count'])){if($_GET['count']==3){echo "red";}} ?>">Прайс</a>
    <a href="index.php?count=4" class="elem" id="<?php if(!empty($_GET['count'])){if($_GET['count']==4){echo "red";}} ?>">Контакты</a></div>
<form action="index.php" method="get">
    <input class="input_text" type="text" name="rows" placeholder="Введите количество строк"><br><br>
    <input type="submit" value="Отправить">
</form>
<?php

if (!empty($_GET['rows'])) {
    $row = settype($_GET['rows'], "integer");
    if ($_GET['rows'] < 10) {
        echo "Введите число от 10";
    } else {
        ?>
        <table border="1" width="600" height="600">
            <?php
            $gray_color = "000";
            //  echo $gray_color . "<br>";
            $count_green = (int)($_GET['rows'] / 5);
            // echo $count_green . "<br>";
            for ($i = 1; $i <= $_GET['rows']; $i++) {
                //  echo $gray_color . "<br>";
                if ($i % 5 == 0) {
                    ?>
                    <tr style="background-color: green ">
                        <td>

                        </td>

                    </tr>
                    <?php
                } else {
                    ?>
                    <tr style="background-color: <?php echo "#" . $gray_color ?>">
                        <td>

                        </td>

                    </tr>
                    <?php
                    if (hexdec($gray_color[0]) < 15) {
                        $number = hexdec($gray_color[0]);
                        $number++;
                        $number = dechex($number);
                        $gray_color = substr_replace($gray_color, $number, 0, 1);
                        $gray_color = substr_replace($gray_color, $number, 1, 1);
                        $gray_color = substr_replace($gray_color, $number, 2, 1);
                    }

                }
            }
            ?>
        </table>
        <?php
    }
}
?>

</body>
</html>