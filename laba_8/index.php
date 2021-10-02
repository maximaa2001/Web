<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    $browser = getBrowser();
   // echo var_dump($browser);
    $host = "localhost";
    $user = "root";
    $password = "root";
    $dbName = "clients";

$connection = mysqli_connect($host,$user,$password,$dbName) or die(mysqli_error($connection));
mysqli_query($connection,"SET NAMES 'utf8'");

$query = "SELECT browser.count FROM browser WHERE browser.name = '" . $browser . "'";

$result = mysqli_query($connection,$query);

$row = mysqli_fetch_assoc($result);

$count = $row['count'];

$count++;

$query = "UPDATE browser SET count = " . $count . " WHERE browser.name = '" . $browser . "'";

$result = mysqli_query($connection,$query);

$query = "SELECT * FROM browser ORDER BY browser.count DESC";

$result = mysqli_query($connection,$query);

$rows = mysqli_num_rows($result);
?>

<table border="1">
    <tr>
        <th>Браузер</th>
        <th>Количество посещений</th>
    </tr>

<?php
for ($i = 0; $i < $rows; $i++){
    $row = mysqli_fetch_assoc($result);
?>
    <tr>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['count']?></td>
    </tr>
    <?php
}
?>

</table>


<?php
function getBrowser()
{
    $str = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($str, "Opera") || strpos($str, "OPR/")) {
        return "Opera";
    } elseif (strpos($str, "Edge") || strpos($str, "Edg")) {
        return "Edge";
    } elseif (strpos($str, "Chrome")) {
        return "Chrome";
    } elseif (strpos($str, "Safari")) {
        return "Safari";
    } elseif (strpos($str, "MSIE") || strpos($str, "Trident/7")) {
        return "Internet Explorer";
    } elseif (strpos($str, "Firefox")) {
        return "Firefox";
    } else {
        return "Another";
    }
}
?>
</body>
</html>
