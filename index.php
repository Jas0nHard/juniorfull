 <?php
  require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['title'] ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
 
  <form method="POST" action="">

  <input name="text" type="text" placeholder="введите текст" value="<?php echo $_POST['text']; ?>"/>
  <input type="submit" value="Отправить"/> 
 </form>
 <?php   
$text = $_POST['text'];
$language = '';
 
preg_match_all('/[a-z]/i', $text, $k);
preg_match_all('/[а-яА-ЯёЁ]/u', $text, $l);
if (count($l[0]) > count($k[0])) {
     $language= "кирилица";
} else {
     $language= "латиница";
}
$text="ajhkjwfnp";
//[АаВСсЕеНКкМмпОоРрТХх]ru
$str = preg_replace('/[AaBCcEeHKkMmnOoPpTXx]/', '<span style="font-weight: bold">$0</span>',$_POST['text'], -1, $count);
echo $str;
  

mysqli_query($connection, "INSERT INTO `text_bd` ( `text`,`language`,`pubdate` ) VALUES ('".$_POST['text']."', '".$language."', NOW() )" );
 
//вот и все что я смог сделать , я так понимаю дальше мне нужен Ajax я с ним еще не работал , ,буду дальше учиться спасибо за шанс 
?>

</body>
</html>