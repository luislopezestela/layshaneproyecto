<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a">Sistema Pro</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Configurar sistema pro</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configurar sistema</h6>
                    <div class="pro-settings-alert"></div>
                    <form class="pro-settings" method="POST">

                      <div class="float-left">
                          <label for="pro" class="main-label">Sistema pro</label>
                          <br><small class="admin-info">Si desactiva el Modo Pro, <br>Todas las funciones seran gratuitas y se activaran sin la funcion de impulso.</small>
                      </div>
                      <div class="form-group float-right switcher">
                          <input type="hidden" name="pro" value="0" />
                          <input type="checkbox" name="pro" id="chck-pro" value="1" <?php echo ($wo['config']['pro'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('pro')) ?>>
                          <label for="chck-pro" class="check-trail <?php echo(EnableForMode('pro',true)) ?>" <?php echo(EnableForMode('pro',false,true)) ?>><span class="check-handler"></span></label>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                      
                      <div class="float-left">
                          <label for="recurring_payment" class="main-label">Pago recurrente</label>
                          <br><small class="admin-info">Habilitar pagos automaticos (cronjob)</small>
                      </div>
                      <div class="form-group float-right switcher">
                          <input type="hidden" name="recurring_payment" value="0" />
                          <input type="checkbox" name="recurring_payment" id="chck-recurring_payment" value="1" <?php echo ($wo['config']['recurring_payment'] == '1') ? 'checked': '';?> <?php echo(EnableForMode('recurring_payment')) ?>>
                          <label for="chck-recurring_payment" class="check-trail <?php echo(EnableForMode('recurring_payment',true)) ?>" <?php echo(EnableForMode('recurring_payment',false,true)) ?>><span class="check-handler"></span></label>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                      
                      <div class="float-left">
                          <label for="refund_system" class="main-label">Sistema de reembolso</label>
                          <br><small class="admin-info">Permitir a los usuarios solicitar reembolso.</small>
                      </div>
                      <div class="form-group float-right switcher">
                          <input type="hidden" name="refund_system" value="off" />
                          <input type="checkbox" name="refund_system" id="chck-refund_system" value="on" <?php echo ($wo['config']['refund_system'] == 'on') ? 'checked': '';?> <?php echo(EnableForMode('refund_system')) ?>>
                          <label for="chck-refund_system" class="check-trail <?php echo(EnableForMode('refund_system',true)) ?>" <?php echo(EnableForMode('refund_system',false,true)) ?>><span class="check-handler"></span></label>
                      </div>
                      <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="weekly_price" name="weekly_price" class="form-control" value="<?php echo $wo['config']['weekly_price'];?>">
                                <label class="form-label">Precio Semanal (USD)</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="monthly_price" name="monthly_price" class="form-control" value="<?php echo $wo['config']['monthly_price'];?>">
                                <label class="form-label">Precio mensual (USD)</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="yearly_price" name="yearly_price" class="form-control" value="<?php echo $wo['config']['yearly_price'];?>">
                                <label class="form-label">Precio anual (USD)</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="lifetime_price" name="lifetime_price" class="form-control" value="<?php echo $wo['config']['lifetime_price'];?>">
                                <label class="form-label">Precio de por vida (USD)</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="monthly_boosts" name="monthly_boosts" class="form-control" value="<?php echo $wo['config']['monthly_boosts'];?>">
                                <label class="form-label">Aumentos mensuales <pequeño> Aumentos máximos mensuales de publicaciones/páginas permitidos.</small></label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="yearly_boosts" name="yearly_boosts" class="form-control" value="<?php echo $wo['config']['yearly_boosts'];?>">
                                <label class="form-label">Impulsos anuales <pequeño> Aumentos máximos anuales de publicaciones/páginas permitidos.</small></label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="lifetime_boosts" name="lifetime_boosts" class="form-control" value="<?php echo $wo['config']['lifetime_boosts'];?>">
                                <label class="form-label">Impulsos de por vida <small>Se permiten impulsos máximos de publicaciones/páginas de por vida.</small></label>
                            </div>
                        </div> 
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Caracteristicas de la membresia profesional</h6>
                    <form class="pro-settings" method="POST">
                         <div class="float-left">
                            <label for="membership_system" class="main-label">Membresia Pro al registrarse</label>
                            <br><small class="admin-info">Requiere membresia Pro de los usuarios en la pagina de registro.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="membership_system" value="0" />
                            <input type="checkbox" name="membership_system" id="chck-membership_system" value="1" <?php echo ($wo['config']['membership_system'] == 1) ? 'checked': '';?>>
                            <label for="chck-membership_system" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                         <div class="clearfix"></div>
                        <hr>
                        <label for="who_upload">Sistema de carga</label>
                        <select class="form-control show-tick" id="who_upload" name="who_upload">
                          <option value="all" <?php echo ($wo['config']['who_upload'] == 'all') ? 'selected': '';?> >Todos los usuarios</option>
                          <option value="pro" <?php echo ($wo['config']['who_upload'] == 'pro') ? 'selected': '';?> >Solo usuarios PRO</option>
                        </select>
                        <small class="admin-info">¿Quién puede subir imágenes, videos y otros datos?</small> -->
                      
                        <label for="Who_call">Llamadas de video y audio</label>
                        <select class="form-control show-tick" id="Who_call" name="Who_call">
                          <option value="all" <?php echo ($wo['config']['Who_call'] == 'all') ? 'selected': '';?> >Todos los usuarios</option>
                          <option value="pro" <?php echo ($wo['config']['Who_call'] == 'pro') ? 'selected': '';?> >Solo usuarios pro</option>
                        </select>
                        <small class="admin-info">¿Quién puede hacer llamadas de video/audio?</small> 
                       
                        
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Editar paquetes profesionales</h6>
                    <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="AddNewPackage()">Agregar nuevo paquete</button>
                    <div class="clearfix"></div>
                    <br>
                  <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Nombre</th>
                              <th width="150">Estado</th>
                              <th width="150">Accion</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($wo["pro_packages"] as $key => $value) { ?>
                                <tr class="setting-userlist">
                                    <td style="color:<?php echo (!empty($value['color']) ? $value['color'] : '') ?>">
                                        <div class="pro-pack-name">
                                            <?php if (!empty($value['image']) || !empty($value['night_image'])) { ?>
                                                <img src="<?php echo(!empty($value['image']) ? $value['image'] : $value['night_image']) ?>" class="pro_packages_icon_inline">
                                            <?php }elseif ($value['id'] == 1) { ?>
                                                <span style="background-color:<?php echo !empty($value['color']) ? $value['color'] : '#4c7737' ?>"><i class="fa fa-star fa-fw"></i> </span>
                                            <?php }elseif ($value['id'] == 2) { ?>
                                                <span style="background-color:<?php echo !empty($value['color']) ? $value['color'] : '#ffbb42' ?>"><i class="fa fa-fire fa-fw"></i> </span>
                                            <?php }elseif ($value['id'] == 3) { ?>
                                                <span style="background-color:<?php echo !empty($value['color']) ? $value['color'] : '#e13c4c' ?>"><i class="fa fa-bolt fa-fw"></i> </span>
                                            <?php }elseif ($value['id'] == 4) { ?>
                                                <span style="background-color:<?php echo !empty($value['color']) ? $value['color'] : '#3f4bb8' ?>"><i class="fa fa-rocket fa-fw"></i> </span>
                                            <?php } ?>
                                            &nbsp;<?php echo $value['name'] ?>
                                            <?php if ($value['time_count'] == 0 && $value["time"] != 'unlimited') { ?>
                                                <div class="alert alert-warning m-0 mt-2 p-2 text-capitalize">Por favor actualice el tiempo del paquete</div>
                                            <?php } ?>
                                            <td><?php echo ($value['status'] == 1) ? '<span class="label label-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="green" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg> Enabled</span>': '<span class="label label-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="red" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg> Desactivado</span>';?></td>
                                            <td>
                                                <a class="btn bg-info admn_table_btn" href="javascript:void(0)" onclick="ShowEditPro(this)" data_pro_type="<?php echo $value['id'] ?>">Editar</a>
                                                <?php if (!in_array($value["id"], array(1,2,3,4))) { ?>
                                                    <a class="btn bg-danger admn_table_btn" href="javascript:void(0)" onclick="DeleteProPackage('<?php echo $value['id'] ?>','hide')">Eliminar</a>
                                                <?php } ?>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                  </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        
    </div>
    <!-- #END# Vertical Layout -->
<div class="modal fade" id="addProModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar paquete profesional</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-2">
                <div id="addProModalAlert"></div>
                <form class="addProModalForm" method="POST">
                    <div class="form-group">
                        <label for="status" class="main-label">Estado</label>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="status" value="0" />
                            <input type="checkbox" name="status" id="status-enabled" value="1" checked>
                            <label for="status-enabled" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" name="name" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <label class="form-label">Precio</label>
                                    <input type="number" name="price" class="form-control" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Color</label>
                                    <input type="color" name="color" class="form-control" value="#fafafa">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <hr>
                    
                    <div class="form-group">
                        <label for="featured_member" class="main-label">Miembro destacado</label>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="featured_member" value="0" />
                            <input type="checkbox" name="featured_member" id="featured_member-enabled" value="1">
                            <label for="featured_member-enabled" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile_visitors" class="main-label">Ver los visitantes del perfil</label>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="profile_visitors" value="0" />
                            <input type="checkbox" name="profile_visitors" id="profile_visitors-enabled" value="1">
                            <label for="profile_visitors-enabled" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_seen" class="main-label">Mostrar/Ocultar visto por última vez</label>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="last_seen" value="0" />
                            <input type="checkbox" name="last_seen" id="last_seen-enabled" value="1">
                            <label for="last_seen-enabled" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="verified_badge" class="main-label">Insignia verificada</label>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="verified_badge" value="0" />
                            <input type="checkbox" name="verified_badge" id="verified_badge-enabled" value="1">
                            <label for="verified_badge-enabled" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <label class="form-label">Promocion de paginas</label>
                                    <input type="number" name="pages_promotion" class="form-control" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <label class="form-label">Promoción de publicaciones</label>
                                    <input type="number" name="posts_promotion" class="form-control" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <label class="form-label">Tamaño máximo de carga</label>
                                    <select class="form-control show-tick" name="max_upload">
                                        <option value="2000000">2 MB</option>
                                        <option value="6000000">6 MB</option>
                                        <option value="12000000">12 MB</option>
                                        <option value="24000000">24 MB</option>
                                        <option value="48000000">48 MB</option>
                                        <option value="96000000">96 MB</option>
                                        <option value="256000000">256 MB</option>
                                        <option value="512000000">512 MB</option>
                                        <option value="1000000000">1 GB</option>
                                        <option value="5000000000">5 GB</option>
                                        <option value="10000000000">10 GB</option>
                                        <option value="1000000000000">Unlimited</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <label class="form-label">Descuento %</label>
                                    <input type="number" name="discount" class="form-control" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <label class="form-label">Pagado cada</label>
                                    <input type="number" name="count" class="form-control" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <label class="d-block mt-4"></label>
                                    <select class="form-control show-tick" name="time">
                                        <option value="day">Dia</option>
                                        <option value="week">Semana</option>
                                        <option value="month">Mes</option>
                                        <option value="year">Año</option>
                                        <option value="unlimited">Ilimitado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-file d-flex align-items-center mb-3">
                                <input type="file" id="pro-icon" name="icon" class="hidden">
                                <div class="mr-3 change-file-ico">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z"></path></svg>
                                </div>
                                <div>
                                    <b>Icono</b>
                                    <div class="mt-1 hidden" id="pro-icon-i">
                                        <input type="text" class="change-file-input" readonly="">
                                    </div>
                                </div>
                            </div>
                            <small>El tamaño del icono (ancho = 32px y alto: 32px y .png)</small>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-file d-flex align-items-center mb-3">
                                <input type="file" id="pro-night-icon" name="night_icon" class="hidden">
                                <div class="mr-3 change-file-ico">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z"></path></svg>
                                </div>
                                <div>
                                    <b>Icono de la noche</b>
                                    <div class="mt-1 hidden" id="pro-night-icon-i">
                                        <input type="text" class="change-file-input" readonly="">
                                    </div>
                                </div>
                            </div>
                            <small>El tamaño del icono (ancho = 32px y alto: 32px y .png)</small>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    <hr>
                    
                    <div class="form-group form-float">
                        <div class="form-line focused">
                            <label class="form-label">Descripcion</label>
                            <textarea class="form-control show-tick" name="description"></textarea> 
                        </div>
                    </div>

                    <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" onclick="Wo_SubmitAddProForm(this);" class="btn btn-primary waves-effect" id="add_pro_btn">Agregar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="DeleteProModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">¿Eliminar paquete profesional?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar este paquete Pro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<script>
$("#pro-icon").change(function () {
    var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#pro-icon-i input").val(filename);
    $("#pro-icon-i").removeClass('hidden');
});
$("#pro-night-icon").change(function () {
    var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#pro-night-icon-i input").val(filename);
    $("#pro-night-icon-i").removeClass('hidden');
});

function DeleteProPackage(id,type = 'show') {
    if (type == 'hide') {
        $('#DeleteProModal').find('.btn-primary').attr('onclick', "DeleteProPackage('"+id+"')");
        $('#DeleteProModal').modal('show');
        return false;
    }
    hash_id = $('#hash_id').val();
    $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'delete_pro_package', id: id, hash_id: hash_id},function(data) {
        if (data.status == 200) {
            location.reload();
        }
    });
}
function Wo_SubmitAddProForm(self) {
    $(self).text('Espere..');
    $('.addProModalForm').submit();
}
function AddNewPackage() {
    $('#addProModal').modal('show');
}
function ShowEditPro(self) {
    $(self).text('Espere..');
    type = $(self).attr('data_pro_type');
    $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_pro', {type: type}, function(data, textStatus, xhr) {
        $(self).text('Editar');
        if (data.status == 200) {
            $('#pro_form_data').html(data.html);
            $('#proModal').modal('show');
        }
    });
}

$(function() {
    let form_add_pro = $('.addProModalForm');
    form_add_pro.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_pro_package',
        beforeSend: function() {
            form_add_pro.find('.waves-effect').text('Espere..');
        },
        success: function(data) {
            form_add_pro.find('.waves-effect').text('Agregar');
            $('#addProModal').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
            if (data.status == 200) {
                $('#addProModalAlert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Package added successfully</div>');
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
            else{
                $('#addProModalAlert').html('<div class="alert alert-danger">'+data.message+'</div>');
            }
        }
    });

    $('.switcher input[type=checkbox]').click(function () {
        setToTrue = 0;
        if ($(this).is(":checked") === true) {
            if ($(this).attr('name') != 'refund_system') {
                setToTrue = 1;
            }
            else{
                setToTrue = 'on';
            }
            
        }
        var configName = $(this).attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = setToTrue;
        objData['hash_id'] = hash_id;
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData);
    });

    var setTimeOutColor = setTimeout(function (){});
    $('.card-body select').on('change', function() {
         clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = this.value;
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
            if (data.status == 200) {
                thisElement.removeClass('warning');
                thisElement.addClass('success');
            } else {
                thisElement.addClass('error');
            }
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('success');
                thisElement.removeClass('warning');
                thisElement.removeClass('error');
            }, 2000);
        });
    });
    $('.card-body input[type=text],.card-body input[type=number]').on('input', delay(function() {
            clearTimeout(setTimeOutColor);
            var thisElement = $(this);
            var configName = thisElement.attr('name');
            var hash_id = $('input[name=hash_id]').val();
            var objData = {};
            objData[configName] = this.value;
            objData['hash_id'] = hash_id;
            thisElement.addClass('warning');
            $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
                if (data.status == 200) {
                    thisElement.removeClass('warning');
                    thisElement.addClass('success');
                } else {
                    thisElement.addClass('error');
                }
                var setTimeOutColor = setTimeout(function () {
                    thisElement.removeClass('success');
                    thisElement.removeClass('warning');
                    thisElement.removeClass('error');
                }, 2000);
                //thisElement.focus();
            });
    }, 500));

    var form_pro = $('form.proModalForm');
    form_pro.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_pro_member',
        beforeSend: function() {
            form_pro.find('.waves-effect').text('Espere..');
        },
        success: function(data) {
            $('#proModal').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
            $('#save_pro_btn').text('SAVE CHANGES');
            if (data.status == 200) {
                form_pro.find('.waves-effect').text('Save');
                $('#proModalAlert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Settings updated successfully</div>');
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
            else{
                $('#proModalAlert').html('<div class="alert alert-danger">'+data.message+'</div>');
            }
        }
    });

    var form_lang_settings = $('form.edit-key-settings');
    form_lang_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_lang_key&hash=' + $('.main_session').val(),
        beforeSend: function() {
            $('.btn-save').text('Espere..');
        },
        success: function(data) {
            $('#defaultModal').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 10);
            setTimeout(function () {
                if (data.status == 200) {
                    $('.btn-save').text('Guardar');
                    var value_to_use = $('[data-editable=1]').val();
                    var id_of_key = $('#id_of_key').val();
                    $('#edit_' + id_of_key).text(value_to_use);
                    $('#defaultModal').modal('hide');
                    setTimeout(function () {
                        location.reload();
                    },1000);
                }
            },300);
        }
    });
  
});
function Wo_SubmitProForm(self) {
    $('#save_pro_btn').text('Espere..');
    $('.proModalForm').submit();
}
function Wo_SubmitLangForm() {
    $('.edit-key-settings').submit();
}
</script>
<div class="modal fade" id="proModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="proModalLabel">Editar paquete pro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-2">
                <div id="proModalAlert"></div>
                <form class="proModalForm" method="POST">
                    <div id="pro_form_data"></div>
                    <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" onclick="Wo_SubmitProForm(this);" class="btn btn-primary waves-effect" id="save_pro_btn">Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4>Por favor edita el paquede desde aqui.</h4>
                <h4 class="modal-title" id="defaultModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="edit-lang-settings-alert"></div>
                <form class="edit-key-settings" method="POST">
                    <div class="data"></div>
                    <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    <input type="hidden" name="id_of_key" id="id_of_key" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="Wo_SubmitLangForm();" class="btn btn-success waves-effect">Guardar</button>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .btn-file { position: relative; overflow: hidden;cursor: pointer;}
    .btn-file input[type=file] { position: absolute; top: 0; right: 0; min-width: 100%; min-height: 100%; font-size: 100px; text-align: right; opacity: 0; outline: none; background: #fff; cursor: inherit; display: block; }
    .change-file-ico svg {border-radius: 50%;background: rgb(168 72 73 / 15%);color: <?php echo $wo['config']['btn_background_color'];?>;padding: 10px;width: 50px;height: 50px;}
    .change-file-input {padding: 3px 6px;border: 0;line-height: 1;background: rgb(0 0 0 / 10%);border-radius: 2em;font-size: 13px;width: 100%;}
</style>