<?php
include_once('includes/session.php');

	/*$q = "SELECT v.* FROM vehiculos v WHERE v.veh_id = '".addslashes($_GET['cod'])."'";
	$datos = mysql_fetch_array($database->query($q));*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>TOYOCOSTA | MONTACARGAS</title>
	<base href="http://www.toyocosta.com/" />
	<link href="css/estilo_montacargas.css" rel="stylesheet" type="text/css" />
	<script language="javascript" src="js/jquery-1.5.min.js"></script>
	<!--Galeria-->
	<link rel="stylesheet" type="text/css" href="css/galeria.css" />

	<!--Submenus-->
	<link href="css/superfish.css" rel="stylesheet" media="screen">
	<script type="text/javascript"  src="js/hoverIntent.js"></script>

	<link rel="stylesheet" type="text/css" href="js/bjs-1.3/bjqs.css" />
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/bjs-1.3/bjqs-1.3.min.js"></script> 
	
	<!--Submenus-->
	<script type="text/javascript"  src="js/superfish.js"  ></script>
	<script type="text/javascript"  src="js/menu.js"  ></script>
	<!-- fin the plugin -->
	
	<style>
		.back_section {
			background:#f4f4f4 url(img/bg_section/image.jpeg) repeat;
		}
		#sample-menu-1 {
			z-index: 999;
		}
		.menuContenedor{
			position: absolute;
			z-index: 999;
			margin: -15px 0 0 0px;
		}
		.sf-arrows .sf-with-ul {
		    padding-right: 0;
		}

		.sf-menu a {
		    border: 1px solid black ;
		    padding: 10px;
		    line-height:14px;
		    color: #ffffff;
		    font-size: 11px;
		    font-weight: bold;
		}
		.sf-menu a:hover{
			color: #000;

		}
		.sf-menu ul li{

			background: #ff730d;
		}
		.sf-menu ul{
			min-width: 11.7em;
		}
		.sf-menu ul ul li{
			background: #d34d04;

		}
		.flecha{
			background: url('img/montacargas/sprite.png') no-repeat scroll -108px 3px transparent !important;
			height: 10px;
			width:46px;
			margin-left: 65px;
		}
		.img_producto{
			padding: 0 !important;
		}
		.bjqs li.bjqs-slide img{
			height: auto;
		}
		ul.bjqs-controls.v-centered li.bjqs-prev a{
			background: url('../img/montacargas/sprite.png') left -40px no-repeat;
			width: 32px;
			height: 41px;
		}
		ul.bjqs-controls.v-centered li.bjqs-prev a:hover{
			background: url('../img/montacargas/sprite.png') left 1px no-repeat;
		}
		ul.bjqs-controls.v-centered li.bjqs-next a{
			background: url('../img/montacargas/sprite.png') -32px -39px no-repeat;
			width: 31px;
			height: 41px;	
		}
		ul.bjqs-controls.v-centered li.bjqs-next a:hover{
			background: url('../img/montacargas/sprite.png') -31px 2px no-repeat;
		}
		#banner-fade,
		#banner-slide{
			margin-left: 15px;
		}
		.toyota{
			background: url('../img/montacargas/to.jpg') no-repeat;
			height: 40px;
			border: 1px solid #CCC8C8;
		}
		.raymond{
			background: url('../img/montacargas/ray.jpg') no-repeat;
			height: 40px;	
			border: 1px solid #CCC8C8;
		}
		.bt{
			background: url('../img/montacargas/bt1.jpg') no-repeat;
			height: 40px;	
			border: 1px solid #CCC8C8;
		}
		.categorias{
			height: 40px; 
			top: 143px;
			overflow:hidden;
			position:absolute; 
			width:191px; 
			padding:0px;
		}
		.grid{
			float:left;
			padding: 14px;
		}
		.cat{
			opacity: 0.7;
			background-color: #ff730d;
			height: 172px;
			margin-top: 28px;
		}
	</style>
</head>
<body>
	<div id="wrap" class="back_section clearfix">
		<div class="cont">
			<?php include("inc/header2.php") ?>
			<?php include("inc/navy.php") ?>
			<!-- CONTENIDO -->
			<div id="container" class="clearfix">
				<div class="modulo_3 clearfix">
					<!--Header Montacargas-->
					<?php include("inc/menu_header.php") ?>
					<!--FIN Header Montacargas-->
					<div class="content">
						<!--Galeria-->								
						<div id="post-images">
							<div id="banner-slide">
								<ul class="bjqs">
										<li>
											<img src="img/montacargas/slider.jpg" title="">						
										</li>
										<li>
											<img src="img/montacargas/slider.jpg" title="">						
										</li>
								</ul>
							</div>
							<script type="text/javascript">
								jQuery(document).ready(function($) {
									$('#banner-slide').bjqs({
										animtype      : 'slide',
										height        : 362,
										width         : 649,
										responsive    : false,
										randomstart   : true,
										showmarkers   : false,
										prevtext      : '',
										nexttext      : '',
										usecaptions   : false
									});
								});
							</script>
						</div>
						<!--Fin Galeria-->
						<br />
						<h1>Toyota equipos industriales</h1>
						<div class="" style="margin-left:15px;">
							<p>
								El Liderazgo no es una coincidencia.<br />
								Es un logro que solo es posible gracias al trabajo en equipo
								de las 3 marcas lideres en Logística Industrial.<br /><br />
								Toyota, BT y Raymond ponen a tu alcance la más completa oferta
								de equipos para el movimiento de materiales, con convenientes
								planes de financiación y la mayor calidad en servicios.<br /><br />
							</p>
						</div>
						<div class="" style="width:684px; height:210px;">
							<div class="grid-box grid">
								<div id="module" style="min-height:200px;">
									<script>
										var $j = jQuery.noConflict();
										$j(document).ready(function() {

										  $j("#div2").hover(
											//on mouseover
											function() {
											  $j("#div1").animate({
												  height: '120px', top:'62', overflow:'hidden'//adds 250px
												}, 'slow' //sets animation speed to slow
											  );
											},
											//on mouseout
											function() {
											  $j("#div1").animate({
												  height: '40px', top:'143px' //changes back to 50px
											   }, 'slow'
											  );
											}
										  );

										});
									</script>
									<div id="div2" style="position:relative;">
										<img src="/img/montacargas/toyota.jpg" alt="">
										<!--<img src="http://placehold.it/191x183" class="img-polaroid" alt="" />-->
											<div id="div1" class="categorias">
												<span class="nombre toyota"></span><br />
												<div class="cat">
												<a style="text-decoration:none;"><span class="ver">Combusti&oacute;n Interna</span><br /><br /></a>
												<a style="text-decoration:none;"><span class="ver">El&eacute;ctricos Contrabalanceado</span><br /><br /></a>
												</div>
											</div>
									</div>
								</div>
							</div>
							<div class="grid-box grid">
								<div id="module" style="min-height:200px;">
									<script>
										var $j = jQuery.noConflict();
										$j(document).ready(function() {

										  $j("#div4").hover(
											//on mouseover
											function() {
											  $j("#div3").animate({
												  height: '160px', top:'23', overflow:'hidden'//adds 250px
												}, 'slow' //sets animation speed to slow
											  );
											},
											//on mouseout
											function() {
											  $j("#div3").animate({
												  height: '40px', top:'143px' //changes back to 50px
											   }, 'slow'
											  );
											}
										  );

										});
									</script>
									<div id="div4" style="position:relative;">
										<img src="/img/montacargas/raymond.jpg" alt="">
										<!--<img src="http://placehold.it/191x183" class="img-polaroid" alt="" />-->
											<div id="div3" class="categorias">
												<span class="nombre raymond"></span><br />
												<div class="cat">
													<a style="text-decoration:none;"><span class="ver">Traspaleta el&eacute;ctrica</span><br /><br /></a>
													<a style="text-decoration:none;"><span class="ver">Reach</span><br /><br /></a>
													<a style="text-decoration:none;"><span class="ver">Order Picker</span><br /><br /></a>
													<a style="text-decoration:none;"><span class="ver">Triloader</span><br /><br /></a>
												</div>
											</div>
									</div>
								</div>
							</div>
							<div class="grid-box grid">
								<div id="module" style="min-height:200px;">
									<script>
										var $j = jQuery.noConflict();
										$j(document).ready(function() {

										  $j("#div6").hover(
											//on mouseover
											function() {
											  $j("#div5").animate({
												  height: '184px', top:'1', overflow:'hidden'//adds 250px
												}, 'slow' //sets animation speed to slow
											  );
											},
											//on mouseout
											function() {
											  $j("#div5").animate({
												  height: '40px', top:'143px' //changes back to 50px
											   }, 'slow'
											  );
											}
										  );

										});
									</script>
									<div id="div6" style="position:relative;">
										<img src="/img/montacargas/toyota.jpg" alt="">
										<!--<img src="http://placehold.it/191x183" class="img-polaroid" alt="" />-->
											<div id="div5" class="categorias">
												<span class="nombre bt"></span><br />
												<div class="cat">
													<a style="text-decoration:none;"><span class="ver">Traspalete el&eacute;ctrica manual</span><br /><br /></a>
													<a style="text-decoration:none;"><span class="ver">Traspaleta el&eacute;ctrica conductor a bordo</span><br /><br /><br /></a>
													<a style="text-decoration:none;"><span class="ver">Apilador el&eacute;ctrico</span><br /><br /></a>
													<a style="text-decoration:none;"><span class="ver">Order picker</span><br /><br /></a>
													<a style="text-decoration:none;"><span class="ver">Triloader</span><br /><br /></a>
												</div>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--BANNERS-->
				<div class="modulo_1 clearfix">
					<a href="http://www.edina.com.ec/guia-telefonica/llamar_gratis.aspx?r=Toyocosta+S.A.&i=62&c=1&p=9" class="llamargratis" style="position: relative; top: -10px;"><img src="img/img-llama_gratis.png" alt="Llame Ya" style="width: 154px;"/></a>
					<?php include("banner.php"); ?>
					<div style="margin-top:30px;">
						<?php
						$q = "SELECT * FROM noticias_publicidades ORDER BY id ASC";
						$resupubli = $database->query($q);
						while ($rowpubli = mysql_fetch_array($resupubli)) {
						?>
						<div class="mod clearfix">
							<a href="<?php echo stripslashes($rowpubli['url']); ?>"><img src="uploads/<?php echo stripslashes($rowpubli['imagen']);?>" width="220" height="153" alt="<?php echo stripslashes($rowpubli['titulo']); ?>"/></a>
						</div>
						<?php
						}
						?>
					</div>
				</div>
				<!--FIN BANNERS-->
			</div>
			<!-- FIN CONTENIDO -->
		</div>
	  
	  <div id="special">
		  <div class="tit_special"></div>
		  <?php include("inc/navy_foot.php"); ?>
	  </div>
	</div>
<?php include("inc/footer.php") ?>
</body>
</html>