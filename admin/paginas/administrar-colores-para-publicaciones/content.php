<?php 
$colors = $db->get(T_COLORS);
 ?>
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Configuracion</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Publicaciones</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar colores</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Agregar colores</h6>
                    <div class="add-provider-settings-alert"></div>
                    <form class="add-provider-settings" method="POST">
						<div class="row">
							<div class="col-md-4">
							<div class="form-group form-float">
								<div class="form-line">
                                    <label class="form-label">Color 1</label>
									<input type="color" id="color_1" name="color_1" class="form-control" onchange="change_color()" value="#ffb0ff">
								</div>
							</div>
							</div>
							<div class="col-md-4">
							<div class="form-group form-float">
								<div class="form-line">
                                    <label class="form-label">Color 2</label>
									<input type="color" id="color_2" name="color_2" class="form-control" onchange="change_color()" value="#8080c0">
								</div>
							</div>
							</div>
							<div class="col-md-4">
							<div class="form-group form-float">
								<div class="form-line">
									<label class="form-label">Color texto</label>
									<input type="color" id="color_text" name="color_text" class="form-control" onchange="change_color()" value="#000">
								</div>
							</div>
							</div>
						</div>
                        <div style="height: 300px;width: 100%" id="color_preview">
                            <h2 style="text-align: center;padding-top: 140px" id="text_color">Hola luis !!</h2>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <br>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Eliminar Color</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Agregar imagen en publicacion</h6>
                    <div class="add-image-settings-alert"></div>
                    <div class="add-image-settings-alert-danger"></div>
                    <form class="add-image-settings" method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group form-float">
									<div class="form-line">
										<label class="form-label">Imagen</label>
										<div class="btn-file d-flex align-items-center border">
											<input type="file" id="image_" name="image" class="hidden" onchange="change_image()">
											<div class="mr-2 change-file-ico">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg>
											</div>
											<div>
												<div>Elija archivo de imagen</div>
												<div class="mt-1 hidden" id="image-i">
													<input type="text" class="change-file-input" readonly="">
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<div class="col-md-6">
							<div class="form-group form-float">
								<div class="form-line">
									<label class="form-label">Color texto</label>
									<input type="color" id="image_color" name="image_color" class="form-control" onchange="change_image()" value="#000000">
								</div>
							</div>
							</div>
						</div>
                        <div style="height: 300px;width: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;" id="image_preview">
                            <h2 style="text-align: center;padding-top: 140px" id="image_text_color">Hola luis !!</h2>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
						<br>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Eliminar Color</button>
                    </form>
                </div>
            </div>
        </div>
	</div>
	<div class="row">
		<?php foreach ($colors as $key => $color) { ?>
			<?php if (!empty($color->color_1) && !empty($color->color_2) && !empty($color->text_color)) { ?>
				<div class="col-md-3" id="list_<?php echo $color->id; ?>">
					<div class="wo_colrd_post_sample" style="background-image: linear-gradient(45deg, <?php echo $color->color_1; ?> 0%, <?php echo $color->color_2; ?> 100%)">
						<span onclick="DeleteColorById(<?php echo $color->id; ?>,'hide')"><i class="material-icons">close</i></span>
						<h3 style="color: <?php echo $color->text_color; ?>">Hello World !!</h3>
					</div>
				</div>
			<?php }elseif (!empty($color->image) && !empty($color->text_color)) { ?>
				<div class="col-md-3" id="list_<?php echo $color->id; ?>">
					<div class="wo_colrd_post_sample" style="background-image:url('<?php echo lui_GetMedia($color->image); ?>');">
						<span onclick="DeleteColorById(<?php echo $color->id; ?>,'hide')"><i class="material-icons">close</i></span>
						<h3 style="color: <?php echo $color->text_color; ?>">Hello World !!</h3>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1Label">Eliminar Color?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar este color?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
<script>
    c1 = $('#color_1').val();
    c2 = $('#color_2').val();
    tc = $('#color_text').val();
    itc = $('#image_color').val();
    $('#color_preview').css({'background-image':'linear-gradient(45deg, '+c1+' 0%, '+c2+' 100%)' });
    $('#text_color').css({'color': tc });
    $('#image_text_color').css({'color': itc });

    function change_color() {
        c1 = $('#color_1').val();
        c2 = $('#color_2').val();
        tc = $('#color_text').val();
        $('#color_preview').css({'background-image':'linear-gradient(45deg, '+c1+' 0%, '+c2+' 100%)' });
        $('#text_color').css({'color': tc });
    }
    function change_image() {
        itc = $('#image_color').val();
        $('#image_preview').css({'background-image':'url('+window.URL.createObjectURL($('#image_')[0].files[0])+')' });
        $('#image_text_color').css({'color': itc });
    }

    function DeleteColorById(id,type = 'show') {
        if (type == 'hide') {
            $('#DeleteModal').find('.btn-primary').attr('onclick', "DeleteColorById('"+id+"')");
            $('#DeleteModal').modal('show');
            return false;
        }
        $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=delete_color', {id: id}, function(data, textStatus, xhr) {
            $('#list_'+id).remove();
        });
    }


    $(function () {

        var form_add_site_settings = $('form.add-provider-settings');
        form_add_site_settings.ajaxForm({
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_color',
            beforeSend: function() {
                form_add_site_settings.find('.waves-effect').text('Please wait..');
            },
            success: function(data) {
                if (data.status == 200) {
                    form_add_site_settings.find('.waves-effect').text('Add');
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('.add-provider-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Color successfully added</div>');
                    setTimeout(function () {
                        $('.add-provider-settings-alert').empty();
                        location.reload();
                    }, 2000);
                }
            }
        });


        var form_add_image_settings = $('form.add-image-settings');
        form_add_image_settings.ajaxForm({
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_image_post',
            beforeSend: function() {
                form_add_image_settings.find('.waves-effect').text('Please wait..');
            },
            success: function(data) {
                if (data.status == 200) {
                    form_add_image_settings.find('.waves-effect').text('Add');
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('.add-image-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Image successfully added</div>');
                    setTimeout(function () {
                        $('.add-image-settings-alert').empty();
                        location.reload();
                    }, 2000);
                }
                else{
                    form_add_image_settings.find('.waves-effect').text('Add');
                    $('.add-image-settings-alert-danger').html('<div class="alert alert-danger">'+data.error+'</div>');
                    setTimeout(function () {
                        $('.add-image-settings-alert-danger').empty();
                    }, 2000);
                }
            }
        });

        
    });
</script>

<style type="text/css">
	.btn-file { position: relative; overflow: hidden;cursor: pointer;border-radius: 0.2rem;padding: 6px;}
	.btn-file input[type=file] { position: absolute; top: 0; right: 0; min-width: 100%; min-height: 100%; font-size: 100px; text-align: right; opacity: 0; outline: none; background: #fff; cursor: inherit; display: block; }
	.change-file-ico svg {color: <?php echo $wo['config']['btn_background_color'];?>;width: 20px;height: 20px;}
	.change-file-input {padding: 3px 6px;border: 0;line-height: 1;background: rgb(0 0 0 / 10%);border-radius: 2em;font-size: 13px;width: 100%;}
	.colorpicker {z-index: 0 !important;}
</style>