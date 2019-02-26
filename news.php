<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Все авторы</title>
</head>
<body>
<?php
require 'connect.php'; // Подключает файл с логином/паролем и именем БД
mysql_set_charset('utf8'); // Устанавливает кодировку клиента
$sql_select = "SELECT * FROM system_news"; // Выбираем таблицу из которой читать данные
$result = mysql_query($sql_select); // Запрос к БД
$row = mysql_fetch_array($result); // Разбираем полученый массив 
do
{
  printf("<p>".$row['name']."</p><p>".$row['body']."</p><p>Link: ".$row['url']
  ."</p>----------------------------------------<b>");
}
while($row = mysql_fetch_array($result));
?>
<form method='post' action='read.php'><b>
<input id="Nknig" type='text' name='nk' placeholder="Номер книги"><b><b>
<input id='submitread'  type='submit' value='Читать...'><b><b>
</form>
<form method="post" action="index.html">
<input id="submitback" type="submit" value="На главную">
</form>
</body>
</html>







!!!!!!!!!!

echo "<div class="column sm-1-3">";						
echo "<div class="wrap-col">";
echo "<div class="box-entry">";
echo "<div class="box-entry-inner">";
echo "<img src="images/2.jpg" class="img-responsive"/>";
echo "<div class="entry-details">";
echo "<div class="entry-des">";
echo "<span><a href="#">08th Apr 2017</a></span>";
echo "<h3><a href="#">Make Ahead Super Green Vegan Quinoa Sandwich.</a></h3>";
echo "<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";


<?php
require 'connect.php'; // Подключает файл с логином/паролем и именем БД
mysql_set_charset('utf8'); // Устанавливает кодировку клиента
$sql_select = "SELECT * FROM system_news"; // Выбираем таблицу из которой читать данные
$result = mysql_query($sql_select); // Запрос к БД
$row = mysql_fetch_array($result); // Разбираем полученый массив 
do
{
echo "<div class="column sm-1-3">";						
echo "<div class="wrap-col">";
echo "<div class="box-entry">";
echo "<div class="box-entry-inner">";
echo "<img src="images/2.jpg" class="img-responsive"/>";
echo "<div class="entry-details">";
echo "<div class="entry-des">";
echo "<span><a href="#">;.$row['name'].;"</a></span>";
echo "<h3><a href="#">Make Ahead Super Green Vegan Quinoa Sandwich.</a></h3>";
echo "<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
	  $option .= '<option value = "'.$row['name'].'">'.$row['body'].'</option>';
  printf("");
}
while($row = mysql_fetch_array($result));
?>