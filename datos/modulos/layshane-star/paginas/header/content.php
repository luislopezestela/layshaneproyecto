<style type="text/css">
	.lang_conf_d{position:fixed;top:0;max-width: 1920px;margin:auto;width:100%;left:0;right:0;z-index:1030;background-color:var(--header-fondo);text-align:right;color:#FFF;display:flex;flex-wrap:wrap;}

	.lang_conf_d:after{
		content: "";
		position:fixed;
		display: block;
		width:100%;
		left:0;
		height:60px;
		z-index:-1;
		background:var(--header-fondo);
	}
	.lang_conf_d a{cursor:pointer;text-decoration:none;padding:8px 17px;position:relative;text-transform:uppercase;display:inline-block;}
	.lang_conf_d a img{display:inline-block;padding-right:2px;margin-left:5px;}
	.head_data_left_go{display:flex;width:50%;height:60px;justify-content:flex-start;color:var(--header-fondo);}
	.head_data_left_go h3{display: block;
    padding: 0 18px;
    margin-left:60px;
    color:#165dba;
    font-family: cursive;
    font-weight: 900;}
	.head_data_rigt_go{width:50%;color:var(--header-fondo);}
	.count_items_carrito{
		position:absolute;
    top:-1px;
    right:0px;
    display:flex;
    flex-wrap:wrap;
    font-size:10px;
    background:var(--header-color);
    color:var(--header-fondo);
    border-radius:15px;
    text-align:center;
    justify-content:center;
    align-items:center;
    line-height:10px;
    height:16px;
    letter-spacing:0;}
    .count_items_carrito p{padding:3px;}
    @media (max-width:1299px) {
			.count_items_carrito{
				top:6px;
		    right:5px;
			}
		}
		.header_no_ap_go_lie{
			bottom: -6px;
			background-size: 1px 7px;
			background-repeat:repeat-x;
			right:0;
			box-sizing:border-box;
			pointer-events:none;
			z-index:0;
			left:0;
			height:7px;
			position:absolute;
			background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAAOBAMAAAD3WtBsAAAAFVBMVEUAAAAAAAAAAAAAAAAAAAAAAAD29va1cB7UAAAAB3RSTlMCCwQHGBAaZf6MKAAAABpJREFUCNdjSGNIY3BhCGUQBEJjIFQCQigAACyJAjLNW4w5AAAAAElFTkSuQmCC);
		}
		@media (max-width: 488px){
			.lang_conf_d a span{display:none;}
			.head_data_left_go h3{margin-left:20px;}
		}
		@media (max-width: 410px){
			.head_data_rigt_go{width:30%;}
			.head_data_left_go{width:70%;}
			.lang_conf_d a{padding:5px;}
			.lang_conf_d a span{display:none;}
			.head_data_left_go h3{margin-left:0px;}
			.lang_conf_d a img{margin:0;}
		}
		@media (max-width: 300px){
			.head_data_left_go{width:80%;}
			.head_data_left_go h3{font-size:20px;}
			.lang_conf_d a{padding:0px;}
			.blpoupda{display:none!important;}

			.head_data_rigt_go {
				width: 28px;
				display: flex;
				flex-direction: column;
				justify-content: space-evenly;
			}
		}
</style>
<div class="lang_conf_d navbar-fixed-top">
	<div class="head_data_left_go"><h3>Layshane Peru</h3></div>
	<div class="head_data_rigt_go">
		<a class="dropdown-toggle" data-toggle="modal" data-target="#select-language">
			<img width="28px" height="28px" src="<?php echo $wo['config']['theme_url'];?>/img/sidebar/idioma.svg"><span><?php echo $wo['lang']['language'];?></span>
		</a>
		<?php  if ($wo['config']['blogs'] == 1) { ?>
			<a class="blpoupda" href="<?php echo lui_SeoLink('index.php?link1=blogs');?>" data-ajax="?link1=blogs"><img width="28px" height="28px" src="<?php echo $wo['config']['theme_url'];?>/img/sidebar/blog.svg"><span><?php echo $wo['lang']['blog'];?></span></a>
		<?php } ?>
	</div>
	
</div>
<div class="navbar navbar-default navbar-fixed-top">
	<nav class="header-fixed1000">
		<div class="container-fluid">
			<div class="wow_hdr_innr_left">
				<?php if($wo['loggedin'] == true): ?>
					<a class="brand header-brand" href="<?php echo $wo['config']['site_url']; ?>" data-ajax="?index.php?link1=home" style="display:none;">
						<img width="40" src="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>" alt="<?php echo $wo['config']['siteName'];?> Logo"/>
					</a>
				<?php else: ?>
					<a class="brand header-brand" href="<?php echo $wo['config']['site_url']; ?>" data-ajax="?index.php?link1=welcome_page" style="display:none;">
						<img width="40" src="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>" alt="<?php echo $wo['config']['siteName'];?> Logo"/>
					</a>
				<?php endif ?>
				
					<ul class="nav navbar-nav">
						
							<li>
								<?php if ($wo['loggedin'] == true): ?>
									<a class="sixteen-font-size home_display <?php echo ($wo['page'] == 'home') ? 'active': '';?>" href="<?php echo $wo['config']['site_url']; ?>" data="home_display" data-ajax="?index.php?link1=home" id="wo_home_btns">
										<svg viewBox="0 0 28 28" class="x1lliihq x1k90msu x2h7rmj x1qfuztq x5e5rjt" fill="currentColor" height="28" width="28"><path d="M25.825 12.29C25.824 12.289 25.823 12.288 25.821 12.286L15.027 2.937C14.752 2.675 14.392 2.527 13.989 2.521 13.608 2.527 13.248 2.675 13.001 2.912L2.175 12.29C1.756 12.658 1.629 13.245 1.868 13.759 2.079 14.215 2.567 14.479 3.069 14.479L5 14.479 5 23.729C5 24.695 5.784 25.479 6.75 25.479L11 25.479C11.552 25.479 12 25.031 12 24.479L12 18.309C12 18.126 12.148 17.979 12.33 17.979L15.67 17.979C15.852 17.979 16 18.126 16 18.309L16 24.479C16 25.031 16.448 25.479 17 25.479L21.25 25.479C22.217 25.479 23 24.695 23 23.729L23 14.479 24.931 14.479C25.433 14.479 25.921 14.215 26.132 13.759 26.371 13.245 26.244 12.658 25.825 12.29"></path></svg><span>&nbsp;<?php echo $wo['lang']['home'] ?></span>
									</a>
								<?php else: ?>
									<a class="sixteen-font-size welcome_page_display <?php echo ($wo['page'] == 'welcome_page') ? 'active': '';?>" href="<?php echo $wo['config']['site_url']; ?>" data="welcome_page_display" data-ajax="?index.php?link1=welcome_page" id="wo_home_btns">
										<svg viewBox="0 0 28 28" class="x1lliihq x1k90msu x2h7rmj x1qfuztq x5e5rjt" fill="currentColor" height="28" width="28"><path d="M25.825 12.29C25.824 12.289 25.823 12.288 25.821 12.286L15.027 2.937C14.752 2.675 14.392 2.527 13.989 2.521 13.608 2.527 13.248 2.675 13.001 2.912L2.175 12.29C1.756 12.658 1.629 13.245 1.868 13.759 2.079 14.215 2.567 14.479 3.069 14.479L5 14.479 5 23.729C5 24.695 5.784 25.479 6.75 25.479L11 25.479C11.552 25.479 12 25.031 12 24.479L12 18.309C12 18.126 12.148 17.979 12.33 17.979L15.67 17.979C15.852 17.979 16 18.126 16 18.309L16 24.479C16 25.031 16.448 25.479 17 25.479L21.25 25.479C22.217 25.479 23 24.695 23 23.729L23 14.479 24.931 14.479C25.433 14.479 25.921 14.215 26.132 13.759 26.371 13.245 26.244 12.658 25.825 12.29"></path></svg><span>&nbsp;<?php echo $wo['lang']['home'] ?></span>
									</a>
								<?php endif ?>
							</li>
							<?php if ($wo['loggedin'] == true) { ?>
							<li>
									<a class="sixteen-font-size products_display <?php echo ($wo['page'] == 'products') ? 'active': '';?>" href="<?php echo lui_SeoLink('index.php?link1=products'); ?>" data="products_display" data-ajax="?link1=products" id="wo_home_btns" title="<?php echo $wo['lang']['tienda'];?>">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path><line x1="5" y1="21" x2="5" y2="10.85"></line><line x1="19" y1="21" x2="19" y2="10.85"></line><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path></svg><span>&nbsp;<?php echo $wo['lang']['tienda'] ?></span>
									</a>
								</li>
								<?php } ?>
								<?php if ($wo['loggedin'] == true) { ?>
									<?php  $totalcarrito = 0;
			            $items = $db->where('user_id',$wo['user']['user_id'])->get(T_USERCARD);
			            if(!empty($items)) {
			                foreach($items as $key => $item) {
			                    $totalcarrito += $item->units;
			                }
			            }
			            $totalcomprasencarrito = $totalcarrito; ?>
								<li>
									<a href="<?php echo lui_SeoLink('index.php?link1=checkout'); ?>" class="sixteen-font-size checkout_display <?php echo ($wo['page'] == 'checkout') ? 'active': '';?>" data="checkout_display" data-ajax="?link1=checkout" id="wo_home_btns" title="<?php echo $wo['lang']['carrito'];?>">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
										<div class="count_items_carrito"><p class="count_items_carrito_cou"><?=$totalcomprasencarrito;?></p></div>
										<span>&nbsp;<?php echo $wo['lang']['carrito'] ?></span>
									</a>
									
								</li>
								<?php } ?>
								
					</ul>
			</div>
        <?php
        if ($wo['loggedin'] == true) {
        echo lui_LoadPage('header/loggedin-header');
        } else {
        echo lui_LoadPage('header/main-header');
        }
        ?>
      </div>
      <div class="header_no_ap_go_lie"></div>
    </div>
  </nav>
</div>
<div class="barloading"></div>
<script type="text/javascript">
function Wo_ChangeHomeButtonIcon() {
  $('.navbar-home #home-button').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
}
function smokeTheHash(str) {
  var n = str.search("#");
  if(n != "-1"){
    return true;
  } else {
    return false;
  }
}
</script>
