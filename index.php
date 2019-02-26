<?php
  function select_news(){
require 'connect.php'; // Подключает файл с логином/паролем и именем БД
mysql_set_charset('utf8'); // Устанавливает кодировку клиента
$sql_select = "SELECT * FROM system_news"; // Выбираем таблицу из которой читать данные
$result = mysql_query($sql_select); // Запрос к БД
$row = mysql_fetch_array($result); // Разбираем полученый массив 
do
{
	 //  $option .= '<option value = "'.$row['name'].'">'.$row['body'].'</option>';
  // printf("");
echo "<div class='column sm-1-3'>";						
echo "<div class='wrap-col'>";
echo "<div class='box-entry'>";
echo "<div class='box-entry-inner'>";
echo "<img src='".$row['urlpict']."' class='img-responsive'/>";
echo "<div class='entry-details'>";
echo "<div class='entry-des'>";
printf("<span><a href='#'>".date_format(new DateTime($row['putdate']),'Y-m-d')."</a></span>");
printf("<h3><a href='#'>".print_page($row['name'])."</a></h3>");
echo print_page("[p]".$row['body']."[/p]");
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
}
while($row = mysql_fetch_array($result));
}
  function print_page($postbody) 
  { 
    // Разрезаем слишком длинные слова 
    $postbody = preg_replace_callback( 
              "|([a-zа-я\d!]{35,})|i", 
              "split_text", 
              $postbody); 
    // Предотвращаем XSS-инъекции 
    $postbody = htmlspecialchars($postbody, ENT_QUOTES); 
    // Тэги 
    $pattern = "#\[b\](.+)\[\/b\]#isU"; 
    $postbody = preg_replace($pattern,  
                             '<b>\\1</b>',  
                             $postbody); 
    $pattern = "#\[p\](.+)\[\/p\]#isU"; 
    $postbody = preg_replace($pattern,  
                             '<p>\\1</p>',  
                             $postbody); 
    $pattern = "#\[i\](.+)\[\/i\]#isU"; 
    $postbody = preg_replace($pattern,  
                             '<i>\\1</i>',  
                             $postbody); 
    $pattern = "#\[u\](.+)\[\/u\]#isU"; 
    $postbody = preg_replace($pattern,  
                             '<u>\\1</u>',  
                             $postbody); 
    $pattern = "#\[sup\](.+)\[\/sup\]#isU"; 
    $postbody = preg_replace($pattern,  
                             '<sup>\\1</sup>',  
                             $postbody); 
    $pattern = "#\[sub\](.+)\[\/sub\]#isU"; 
    $postbody = preg_replace($pattern,  
                             '<sub>\\1</sub>',  
                             $postbody); 
    $pattern = "#\[url\][\s]*([\S]*)[\s]*\[\/url\]#si"; 
    $postbody = preg_replace_callback($pattern, 
               "url_replace", 
                $postbody); 
    $pattern = "#\[url[\s]*=[\s]*([\S]+)[\s]*\][\s]*([^\[]*)\[/url\]#isU"; 
    $postbody = preg_replace_callback($pattern, 
               "url_replace_name", 
                $postbody); 
    return $postbody; 
  } 
  function url_replace($matches) 
  { 
    if(substr($matches[1], 0, 7) != "http://") $matches[1] = "http://".$matches[1]; 
    return "<a href='$matches[1]' class=news_txt_lnk>$matches[1]</a>"; 
  } 
  function url_replace_name($matches) 
  { 
    if(substr($matches[1], 0, 7) != "http://") $matches[1] = "http://".$matches[1]; 
    return "<a href='$matches[1]' class=news_txt_lnk>$matches[2]</a>"; 
  } 
  function split_text($matches)  
  { 
    return wordwrap($matches[1], 35, ' ',1); 
  } 
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>zTravel - Туристическая компания</title>
	<meta name="description" content="Free Responsive Html5 Css3 Templates | zerotheme.com">
	<meta name="author" content="www.zerotheme.com">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
	
	<!-- Owl Carousel Assets -->
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/menu.css">
	
	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/script.js"></script>

	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
		<script src="js/html5.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->
    
</head>
<body class="index-page">
<div class="wrap-body">

<!--////////////////////////////////////Header-->
<!---Top Menu--->
<div id="cssmenu" >
	<ul>
	   <li class="active"><a href="index.php"><span>zTravel</span></a></li>
	   <li><a href="archive.html"><span>Архив статей</span></a></li>
	   <li><a href="single.html"><span>О компании</span></a></li>
	   <li class="last"><a href="contact.html"><span>Контакты</span></a></li>
	</ul>
</div>
<header id="header">
	<div class="wrap-header" >
		<!---Main Header--->
		<div class="main-header">
			<div class="zerogrid">
				<div class="row">
					<div class="hero-heading">
						<span>zTravel</span>
						<div class="tl"></div>
						<div class="tr"></div>
						<div class="br"></div>
						<div class="bl"></div>
					</div>
					<div class="heading-text">
						<h2>Туристическая компания</h2>
						<p>zTravel - Отдых, отличный от других.<br> Бронируйте Online. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>


<!--////////////////////////////////////Container-->
<section id="container">
	
	<div class="wrap-container">
		<!-----------------content-box-1-------------------->
		<section class="content-box box-1">
			<div class="">
				<div class="row wrap-box"><!--Start Box-->
					<div class="header">
						<h2>О компании</h2>
						<p class="intro">Туристская фирма zTravel занимается такими популярными направлениями как Чехия, Эстония, Латвия, Литва, Италия, Израиль, Греция, Кипр, Испания, Тунис, Андорра, Тайланд, ОАЭ.<br>Мы предлагаем туры на любой вкус: экскурсионные, свадебные и индивидуальные. <br>Кроме того, постоянным клиентам мы всегда стараемся предоставить скидку, потому что дорожим теми, кто однажды уже доверил нам организацию своего отдыха.</p>
					</div>
					<div class="content">
						<div id="owl-slide" class="owl-carousel">
							<div class="item">
								<img src="images/12.jpg" />
								<div class="carousel-caption">
									<div class="carousel-caption-inner">
										<p class="carousel-caption-title"><a href="#">Организация походов</a></p>
										<!-- <p class="carousel-caption-category"><a href="#" rel="category tag">Wheat</a>,  -->
										<!-- <a href="#" rel="category tag">Seeds</a>, <a href="#" rel="category tag">Field</a> -->
										</p>
									</div>
								</div>
							</div>
							<div class="item">
								<img src="images/11.jpg" />
								<div class="carousel-caption">
									<div class="carousel-caption-inner">
										<p class="carousel-caption-title"><a href="#">Организация экскурсионных туров</a></p>
										<!-- <p class="carousel-caption-category"><a href="#" rel="category tag">Vegetables</a>,  -->
										<!-- <a href="#" rel="category tag">Potatoes</a>, <a href="#" rel="category tag">Garden</a> -->
										</p>
									</div>
								</div>
							</div>
							<div class="item">
								<img src="images/13.jpg" />
								<div class="carousel-caption">
									<div class="carousel-caption-inner">
										<p class="carousel-caption-title"><a href="#">Организация индивидуальных туров</a></p>
										<!-- <p class="carousel-caption-category"><a href="#" rel="category tag">Fruit</a>,  -->
										<!-- <a href="#" rel="category tag">Berries</a>, <a href="#" rel="category tag">Vitamin</a> -->
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-----------------content-box-2-------------------->
		<section class="content-box box-2">
			<div class="zerogrid">
				<div class="row wrap-box"><!--Start Box-->
					<div class="column sm-1-2">
						<div class="wrap-col">
							<img src="images/about.png" />
						</div>
					</div>
					<div class="column sm-1-2">
						<div class="wrap-col">
							<p>"Как реализовать мечту?"
Принцип первый: родись путешественником и реализуй свою мечту детства, путешествуй по горам и весям.
Принцип второй: найди друзей-единомышленников – таких же любителей путешествий.
Принцип третий: инициатива в твоих руках, не жди предложений для путешествий, организуй его сам.
Принцип четвертый: в путешествии будь активен и любознателен, старайся получить максимум географических знаний о местности, по которой путешествуешь.
Принцип пятый: поделись своими впечатлениями о путешествии со своими друзьями, постарайся сделать хорошую презентацию или написать очерк.
Принцип шестой: не останавливайся на достигнутом, планируй новое путешествие.
Ю.В. Ефремов

</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-----------------content-box-3-------------------->
		<section class="content-box box-3 boxstyle-2">
			<div class="zerogrid">
				<div class="row wrap-box"><!--Start Box-->
					<div class="row clearfix">
						<div class="column md-1-2 sm-1-2 xs-1-2"><img src="images/11.jpg" alt=""></div>
						<div class="column md-1-3 sm-1-2 xs-1-2">
							<a class="button button-skin button-service">Наши услуги</a>
							<img src="images/12.jpg" alt="" class="hidden-xs" style="margin: 0 0 0 -80px;">
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-----------------content-box-4-------------------->
		<section class="content-box box-4">
			<div class="zerogrid">
				<div class="row wrap-box"><!--Start Box-->
					<div class="header">
						<h2>Последние новости</h2>
						<p class="intro">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor <br>invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
					</div>
					<div class="content">
<?php select_news(); ?>
					</div>
				</div>
			</div>
		</section>
		
		<!-----------------content-box-6-------------------->
		<section class="content-box box-6 box-style-3">
			<div class="zerogrid">
			<div class="row wrap-box"><!--Start Box-->
				<div class="">
					<div class="box-text">
						<div class="header">
							<h2>Обратная связь</h2>
							<p class="intro">Есть вопросы? Тогда можете воспользоваться формой обратной связи: </p>
						</div>
						<div class="content">
							<div class="subscribe-form">
								<form role="form" id="contactForm" data-toggle="validator">
									<div class="row">
										<div class="column sm-1-3">
											<div class="wrap-col">
												<input type="text" name="name" id="name" placeholder="Введите ваше имя" required="required" />
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="column sm-1-3">
											<div class="wrap-col">
												<input type="email" name="email" id="email" placeholder="Введите ваш Email" required="required" />
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="column sm-1-3">
											<div class="wrap-col">
												<input type="text" name="subject" id="subject" placeholder="Введите тему письма" />
												<div class="help-block with-errors"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="column full">
											<div class="wrap-col">
												<textarea id="message" placeholder="Ваш вопрос"></textarea>
												<div class="help-block with-errors"></div>
											</div>
										</div>
									</div>	
									<div class="row">
										<div class="column full">
											<div class="wrap-col">
												<button class="button button-skin button-subscribe" type="submit" name="Отправить" >Send</button>
												<div id="msgSubmit" class="h3 text-center hidden"></div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</section>
		
	</div>
	
</section>


<!--////////////////////////////////////Footer-->
<footer id="footer">
	<div class="zerogrid wrap-footer">
		<div class="row">
			<div class="column sm-2-4 column footer-1">
				<div class="wrap-col">
					<h3 class="widget-title">О сайте</h3>
					<p>Сайт разработан в рамках курсового проекта по дисциплине Основы построения защищенных баз данных</p>
					<p>Макаренко А.А. - 2019</p>
					<ul class="quicklinks">
						<li><a href="https://github.com/dronky">Github</a></li>
					</ul>
				</div>
			</div>
			<div class="column sm-1-4 column footer-2">
				<div class="wrap-col">
					<h3 class="widget-title">Свяжитесь с нами</h3>
					<p>Call us:</p>
					<strong style="font-size: 25px;">0123-456-789</strong>
					<p>Address:</p>
					<strong>123, New Lenox Chicago, IL 60606</strong>
					<p>Email:</p>
					<strong>info@ztour.com</strong>
				</div>
			</div>
			<div class="column sm-1-4 column footer-3">
				<div class="wrap-col">
					<h3 class="widget-title">Ссылки</h3>
					<ul class="social-buttons">
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.facebook.com/ZerothemeDotCom/"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
</footer>
	
	
	<!-- Google Map -->
	<script src="js/google-map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7V-mAjEzzmP6PCQda8To0ZW_o3UOCVCE&callback=initMap" async defer></script>
	
	<!-- Owl Carusel JavaScript -->
	<script src="owlcarousel/owl.carousel.js"></script>
	<script>
	$(document).ready(function() {
	  $("#owl-slide").owlCarousel({
		autoplay:true,
		autoplayTimeout:3000,
		loop: true,
		lazyLoad : true,
		items: 1,
		dots: true,
		stagePadding: 300,
		responsive : {
			0 : {stagePadding: 0},
			600 : {stagePadding: 100},
			900 : {stagePadding: 200},
			1199 : {}
		},
	  });
	});
	</script>
	<script>
	$(document).ready(function(){
		$(window).resize(function(){
			var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
			if (width >= '768') { 
				var footerHeight = $('#footer').outerHeight();
				$('#container').css({'marginBottom': footerHeight + 'px'});
			}else{
				$('#container').css({'marginBottom': '0px'});
			}
		});
		$(window).resize();
	});
    </script>
	
	<script type="text/javascript" src="js/validator.min.js"></script>
	<script type="text/javascript" src="js/form-scripts.js"></script>
	
</div>
</body></html>