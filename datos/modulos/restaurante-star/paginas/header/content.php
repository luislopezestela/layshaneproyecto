<nav class="nav <?php if(isset($_GET['link1'])=='home'){}else{echo('active luis_slid_open_box');} ?>">
	<div class="container">
		<h1 class="logo"><a href="<?=$wo['config']['site_url'];?>" data-ajax="?index.php?link1=home"><img src="<?=$wo['config']['theme_url'];?>/img/logo.<?=$wo['config']['logo_extension'];?>" width="50" height="50" alt="<?=$wo['config']['siteName'];?> Logo" id="logo" data-height-percentage="64"></a></h1>
		<ul class="luis_menu_mobil_container">
			<li><a class="<?=($wo['page'] == 'home') ? 'current': '';?>" data="home" href="<?=$wo['config']['site_url']; ?>" data-ajax="?index.php?link1=home">Inicio</a></li>
			<li><a class="<?=($wo['page'] == 'servicios') ? 'current': '';?>" data="servicios" href="<?=lui_SeoLink('index.php?link1=servicios');?>" data-ajax="?link1=servicios">Servicios</a></li>
			<li><a class="<?=($wo['page'] == 'blog') ? 'current': '';?>" data="blog" href="<?=lui_SeoLink('index.php?link1=blogs');?>" data-ajax="?link1=blogs">Blog</a></li>
			<li><a class="<?php echo($wo['page'] == 'carta') ? 'current': 'hh';?>" data="carta" href="<?=lui_SeoLink('index.php?link1=carta');?>" data-ajax="?link1=carta">Carta</a></li>
		</ul>
		<div class="luis_menu_mobil">
			<div class="menu_mobil_line">X</div>
		</div>
	</div>
	<div class="luis_menu_six"></div>
</nav>