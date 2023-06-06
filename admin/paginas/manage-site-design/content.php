<link href="<?php echo lui_LoadAdminLink('vendors/colorpicker/css/bootstrap-colorpicker.css'); ?>" rel="stylesheet">
<script src="<?php echo lui_LoadAdminLink('vendors/colorpicker/js/bootstrap-colorpicker.js'); ?>"></script>
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
                <li class="breadcrumb-item active" aria-current="page">Cambiar el diseño del sitio</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Cambiar el diseño del sitio</h6>
                    
                    <form class="d-settings" method="POST">
						<div class="btn-file d-flex align-items-center">
							<input type="file" id="favicon" accept="image/x-png, image/gif, image/jpeg" name="favicon" class="hidden">
							<div class="mr-3 change-file-ico">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z"></path></svg>
							</div>
							<div>
								<b>Favicon</b>
								<div class="mt-1 hidden" id="favicon-i">
									<input type="text" class="change-file-input" readonly="">
								</div>
							</div>
						</div>
						<div class="clearfix"></div><br>
						<div class="btn-file d-flex align-items-center">
							<input type="file" id="logo" accept="image/x-png, image/gif, image/jpeg" name="logo" class="hidden">
							<div class="mr-3 change-file-ico">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg>
							</div>
							<div>
								<b>Logo (470x75)</b>
								<div class="mt-1 hidden" id="logo-i">
									<input type="text" class="change-file-input" readonly="">
								</div>
							</div>
						</div>
						<div class="clearfix"></div><br><br>
                        <h5>Encabezamiento</h5><hr>
						<div class="alert alert-info">
						Este sistema solo es compatible con el tema predeterminado y el tema Layshane_go, para el sol puede editar los colores a través de archivos CSS:
						<br><code>./temas/layshane_ind/css/style.css<br>./temas/layshane_ind/layout/style.php</code>
						</div>
						<br>
                    	<div class="bold">Color de fondo del encabezado</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['header_background'] ?>" name="header_background">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <div class="bold">Iconos de encabezado/color de texto</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['header_color'] ?>" name="header_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <div class="bold">Color de fondo de buscador de Header</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['header_search_color'] ?>" name="header_search_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>

                        <div class="bold">Color de texto de buscador de Header</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['header_search_color_text'] ?>" name="header_search_color_text">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>

                        <div class="bold">Iconos de encabezado Color de sombra</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['header_button_shadow'] ?>" name="header_button_shadow">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <br><h5>Body</h5><hr>
                        <div class="bold">Color de fondo del Body</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['body_background'] ?>" name="body_background">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <br><h5>Botones</h5><hr>
                        <div class="bold">Color de texto</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['btn_color'] ?>" name="btn_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <div class="bold">Color de fondo</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['btn_background_color'] ?>" name="btn_background_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <div class="bold">Color del texto flotante</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['btn_hover_color'] ?>" name="btn_hover_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <div class="bold">Color de fondo flotante</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['btn_hover_background_color'] ?>" name="btn_hover_background_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <div class="bold">Color de fondo deshabilitado</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['btn_disabled'] ?>" name="btn_disabled">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <br>
                        <div class="alert alert-info">Asegurese de limpiar la memoria cache de su navegador despues de cambiar la configuracion de diseño.</div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <div class="d-settings-alert"></div>
                        <br>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
$(function() {
	$('.colorpicker').colorpicker();
	$("#background-image").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $("#background-image-i input").val(filename);
         $("#background-image-i").removeClass('hidden');
    });
    $("#favicon").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $("#favicon-i input").val(filename);
         $("#favicon-i").removeClass('hidden');
    });
    $("#logo").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $("#logo-i input").val(filename);
         $("#logo-i").removeClass('hidden');
    });
    var form_d_settings = $('form.d-settings');
    form_d_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_design_setting',
        beforeSend: function() {
            form_d_settings.find('.waves-effect').text('Espere por favor..');
        },
        success: function(data) {
            if (data.status == 200) {
                form_d_settings.find('.waves-effect').text('Guardar');
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.d-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Configuracion actualizada con exito</div>');
                setTimeout(function () {
                    $('.d-settings-alert').empty();
                }, 2000);
            }
        }
    });
});
</script>
<style type="text/css">
	.btn-file { position: relative; overflow: hidden;cursor: pointer;}
	.btn-file input[type=file] { position: absolute; top: 0; right: 0; min-width: 100%; min-height: 100%; font-size: 100px; text-align: right; opacity: 0; outline: none; background: #fff; cursor: inherit; display: block; }
	.change-file-ico svg {border-radius: 50%;background: rgb(168 72 73 / 15%);color: <?php echo $wo['config']['btn_background_color'];?>;padding: 10px;width: 50px;height: 50px;}
	.change-file-input {padding: 3px 6px;border: 0;line-height: 1;background: rgb(0 0 0 / 10%);border-radius: 2em;font-size: 13px;width: 100%;}
	.colorpicker {z-index: 0 !important;}
</style>