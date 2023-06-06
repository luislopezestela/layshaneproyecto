<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Diseño</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Temas</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
		<div class="pro-settings-alert"></div>
		<form action="#" method="post" class="setting-themes-container">
			<div class="row">
                       <?php
                 foreach (lui_GetThemes() as $theme_url) {
                            if (file_exists($theme_url . '/info.php')) {
                                include($theme_url . '/info.php');
                                $theme = str_replace('datos/modulos/', '', $theme_url);
                 ?>
                 <div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<div class="d-flex align-items=center theme <?php echo ($theme == $wo['config']['theme']) ? ' active' : '';?>">
								<div class="mr-3">
									<img src="<?php echo $wo['config']['site_url'].'/datos/modulos/'.$themeImg;?>" alt="" width="100">
								</div>
								<div>
									<h5 class="card-title mb-2 themeName"><?php echo $themeName;?> <span class="badge badge-secondary themeVirsion" style="vertical-align: text-bottom;">v<?php echo $themeVirsion;?></span></h5>
									<p class="card-text themeAuthor"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M17.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,9A1.5,1.5 0 0,1 19,10.5A1.5,1.5 0 0,1 17.5,12M14.5,8A1.5,1.5 0 0,1 13,6.5A1.5,1.5 0 0,1 14.5,5A1.5,1.5 0 0,1 16,6.5A1.5,1.5 0 0,1 14.5,8M9.5,8A1.5,1.5 0 0,1 8,6.5A1.5,1.5 0 0,1 9.5,5A1.5,1.5 0 0,1 11,6.5A1.5,1.5 0 0,1 9.5,8M6.5,12A1.5,1.5 0 0,1 5,10.5A1.5,1.5 0 0,1 6.5,9A1.5,1.5 0 0,1 8,10.5A1.5,1.5 0 0,1 6.5,12M12,3A9,9 0 0,0 3,12A9,9 0 0,0 12,21A1.5,1.5 0 0,0 13.5,19.5C13.5,19.11 13.35,18.76 13.11,18.5C12.88,18.23 12.73,17.88 12.73,17.5A1.5,1.5 0 0,1 14.23,16H16A5,5 0 0,0 21,11C21,6.58 16.97,3 12,3Z"></path></svg> <?php echo $wo['lang']['author'];?> <a href="<?php echo $themeAuthorUrl;?>"><?php echo $themeAuthor;?></a></p>
									<?php if($theme == $wo['config']['theme']) { ?>
										<div class="active"><button type="button" class="btn btn-primary" disabled="" style="box-shadow: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="mr-1"><path fill="currentColor" d="M10,17L5,12L6.41,10.58L10,14.17L17.59,6.58L19,8M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg> <?php echo $wo['lang']['activeted'];?></button></div>
									<?php } else { ?>
										<div class="active"><a href="#" id="active" value="<?php echo $theme; ?>" class="btn btn-primary">Activar tema</a></div>
									<?php } ?>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
                 </div>
                 <?php } }?>
			</div>			
			
			<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
			<input type="hidden" name="theme" value="" id="theme_name" />
		</form>
        <div class="clearfix"></div>
    <!-- #END# Vertical Layout -->
<script>


$(function() {
   $('a#active').click(function() {
    $('#theme_name').val($(this).attr('value'));
     $('form.setting-themes-container').submit();
   });
   $('form.setting-themes-container').ajaxForm({
     url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=updateTheme',
     success: function(data) {
       if (data.status == 200) {
         window.location = "<?php echo lui_LoadAdminLinkSettings('manage-themes'); ?>";
       } 
     }
  });
});
</script>