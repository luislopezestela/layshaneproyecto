
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Administrar</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Categorias</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Categorias de productos</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Agregar</h6>
                  <div class="row">
                       <div class="col-md-12" style="margin-bottom:0;">
                        <div class=" add_category_form_alert"></div>
                            <form method="POST" id="add_category_form">
                              <div class="row">
                                <?php foreach (lui_LangsNamesFromDB() as $wo['key_']) { ?>
                                    <div class="col-md-2" id="normal-query-form">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                            <label class="form-label"><?php echo ucfirst($wo['key_']); ?></label>
                                              <input type="text" class="form-control" name="<?php echo($wo['key_']) ?>">
                                          </div>
                                      </div>
                                    </div>
                                <?php } ?>
                                <div class="clearfix"></div>
                              <div class="col-md-2">
                                <div>&nbsp;</div>
                                  <button class="btn btn-info">Agregar</button>
                              </div>
                              </div>
                              <div class="clearfix"></div>
                           </form>
                       </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Categorias</h6>
                   <div class="clearfix"></div>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                      <th>ID</th>
					                  <th>Nombre</th>
					                  <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $categories_keys = lui_GetCategoriesKeys(T_PRODUCTS_CATEGORY);
                                foreach ($wo['products_categories'] as $category_id => $category_name) {
                                  $wo['category_key'] = $category_id;
                                  $wo['category_name'] = $category_name;
                                  $wo['category_lang_key'] = $categories_keys[$category_id];
                                	echo lui_LoadAdminPage('products-categories/list');
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <span>&nbsp;</span>
                                <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Eliminar seleccionado<span></span></button>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar esta categoría?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="SelectedDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres eliminar la categoría seleccionada?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_content_back">
      <div class="modal-header">
        <h5 class="modal-title" id="editcategoryModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="edit_category_form_alert"></div>
        <form class="edit_category_lang" method="POST" id="modal-body-langs">
          <div class="data_lang"></div>
          <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
          <input type="hidden" name="id_of_key" id="id_of_key" value="">
        </form>
        
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary modal_close_btn" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="save_edited_category">Guardar</button>
      </div>
    </div>
  </div>
</div>


<script>

var add_category_form = $('form#add_category_form');
var edit_category_form = $('form.edit_category_lang');

add_category_form.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_category&type=product',
    beforeSend: function() {
        add_category_form.find('.waves-effect').text("Por favor espere..");
    },
    success: function(data) {
        if (data.status == 200) {
            add_category_form.find('.waves-effect').text('Guardar');
            $('.add_category_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Categoria agregado con exito</div>');
            setTimeout(function () {
                $('.add_category_form_alert').empty();
            }, 2000);
            window.location.reload();
        }
        else{
          $('.add_category_form_alert').html('<div class="alert alert-danger"><i class="fa fa-check"></i> '+data.message+'</div>');
            setTimeout(function () {
                $('.add_category_form_alert').empty();
            }, 2000);
        }
    }
});

edit_category_form.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_lang_key&hash=' + $('.main_session').val(),
    beforeSend: function() {
        edit_category_form.find('.waves-effect').text("Por favor espere..");
    },
    success: function(data) {
        if (data.status == 200) {
            edit_category_form.find('.waves-effect').text('Guardar');
            $('.edit_category_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Categoria editada con exito</div>');
            setTimeout(function () {
                $('.edit_category_form_alert').empty();
            }, 3000);
            window.location.reload();
        }
        else{
          $('.edit_category_form_alert').html('<div class="alert alert-danger"><i class="fa fa-check"></i> '+data.message+'</div>');
            setTimeout(function () {
                $('.edit_category_form_alert').empty();
            }, 2000);
        }
    }
});

$(document).on('click','#save_edited_category', function(event) {
  event.preventDefault();
  $('.edit_category_lang').submit();
});

function edit_category(id) {
  $('#id_of_key').val(id);
  $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_category_langs', {lang_key: id}, function(data, textStatus, xhr) {
      if (data.status == 200) {
        $('.data_lang').html(data.html);
        $('#editcategoryModal').modal();
      }
  });
}

$('.check-all').on('click', function(event) {
    $('input:checkbox').not(this).prop('checked', this.checked);
});
$('.delete-checkbox, .check-all').change(function(event) {
    $('.delete-selected').attr('disabled', false);
    $('.delete-selected').find('span').text(' (' + $('.delete-checkbox:checked').length + ')');
});

$('.delete-selected').on('click', function(event) {
    event.preventDefault();
    $('#SelectedDeleteModal').modal('show');
});
function DeleteSelected() {
    data = new Array();
    $('td input:checked').parents('tr').each(function () {
        data.push($(this).attr('data_selected'));
    });
    $('.delete-selected').attr('disabled', true);
    $('.delete-selected').text('Por favor espere..');
    $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=remove_multi_category&type=product", {ids: data}, function () {
        $.each( data, function( index, value ){
            $('#list-' + value).remove();
        });
        $('.delete-selected').text('Eliminar seleccionado');
    });
}
function Wo_DeleteCat(id,type = 'show') {
  if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteCat('"+id+"')");
      $('#DeleteModal').modal('show');
      return false;
    }
  $('#list-' + id).fadeOut(300, function() {
    $(this).remove();
  });
  $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=delete_category&type=product', {lang_key: id}, function(data, textStatus, xhr) {});
}

</script>