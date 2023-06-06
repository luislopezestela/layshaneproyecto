<?php 
$page                = (!empty($_GET['page-id'])) ? $_GET['page-id'] : 1;
$db->pageLimit       = 20;
$total_requests      = $db->getValue(T_VERIFICATION_REQUESTS, 'COUNT(*)');
$link = "";
$sort_link = $link;
$sort_array = array('DESC_i' => array('id' , 'DESC'),
                    'ASC_i'  => array('id' , 'ASC'),
                    'DESC_t' => array('type' , 'DESC'),
                    'ASC_t'  => array('type' , 'ASC'));
if (!empty($_GET['sort']) && in_array($_GET['sort'], array_keys($sort_array))) {
    $db->orderBy($sort_array[$_GET['sort']][0],$sort_array[$_GET['sort']][1]);
    $link .= "&sort=".lui_Secure($_GET['sort']);
}
else{
    $_GET['sort'] = 'DESC_i';
    $db->orderBy('id', 'DESC');
}
$verif_requests      = $db->paginate(T_VERIFICATION_REQUESTS,$page);

if (($page > $db->totalPages) && !empty($_GET['page-id'])) {
    header("Location: " . lui_LoadAdminLinkSettings('manage-verification-reqeusts'));
    exit();
}
$db->where('recipient_id',0)->where('admin',1)->where('seen',0)->where('type','verify')->update(T_NOTIFICATION,array('seen' => time()));
?>

<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Usuarios</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar solicitudes de verificacion</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Administrar solicitudes de verificacion</h6>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                      <th>ID 
                                        <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_i') { ?>
                                            <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-verification-reqeusts?page-id=1').$sort_link."&sort=ASC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                        <?php }else{ ?>
                                            <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-verification-reqeusts?page-id=1').$sort_link."&sort=DESC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                        <?php } ?></th>
					                  <th>Usuario</th>
									  <th>Informacion</th>
					                  <th>Tipo 
                                        <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_t') { ?>
                                            <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-verification-reqeusts?page-id=1').$sort_link."&sort=ASC_t") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                        <?php }else{ ?>
                                            <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-verification-reqeusts?page-id=1').$sort_link."&sort=DESC_t") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                        <?php } ?></th>
					                  <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
				                foreach ($verif_requests as $value) {
                          $wo['verification'] = ToArray($value);
                          if (!empty($wo['verification']['user_id'])) {
                              $wo['verification']['request_from']       = lui_UserData($wo['verification']['user_id']);
                              $wo['verification']['request_from']['id'] = $wo['verification']['user_id'];
                          } else if (!empty($wo['verification']['page_id'])) {
                              $wo['verification']['request_from']       = lui_PageData($wo['verification']['page_id']);
                              $wo['verification']['request_from']['id'] = $wo['verification']['page_id'];
                          } else {
                              return false;
                          }
                          $wo['verification']['type'] = ($wo['verification']['type'] == 'User') ? 'User' : 'Page';
				                    echo lui_LoadAdminPage('manage-verification-reqeusts/list');
				                }
				                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="wo-admincp-feturepager">
                      <div class="pull-left">
                        <span>
                          <?php echo "Mostrar $page de " . $db->totalPages; ?>
                        </span>
                      </div>
                      <div class="pull-right">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="<?php echo lui_LoadAdminLinkSettings('manage-verification-reqeusts?page-id=1').$link; ?>" data-ajax="?path=manage-verification-reqeusts&page-id=1<?php echo($link); ?>" class="waves-effect" title='First Page'>
                                  <i class="material-icons">first_page</i>
                              </a>
                            </li>
                            <?php if ($page > 1) {  ?>
                              <li>
                                  <a href="<?php echo lui_LoadAdminLinkSettings('manage-verification-reqeusts?page-id=' . ($page - 1)).$link; ?>" data-ajax="?path=manage-verification-reqeusts&page-id=<?php echo($page - 1) ?><?php echo($link); ?>" class="waves-effect" title='Previous Page'>
                                      <i class="material-icons">chevron_left</i>
                                  </a>
                              </li>
                            <?php  } ?>

                            <?php 
                              $nums       = 0;
                              $nums_pages = ($page > 4) ? ($page - 4) : $page;

                              for ($i=$nums_pages; $i <= $db->totalPages; $i++) { 
                                if ($nums < 20) {
                            ?>
                              <li class="<?php echo ($page == $i) ? 'active' : ''; ?>">
                                <a href="<?php echo lui_LoadAdminLinkSettings('manage-verification-reqeusts?page-id=' . ($i)).$link; ?>" data-ajax="?path=manage-verification-reqeusts&page-id=<?php echo($i) ?><?php echo($link); ?>" class="waves-effect">
                                  <?php echo $i ?>   
                                </a>
                              </li>

                            <?php } $nums++; }?>

                            <?php if ($db->totalPages > $page) { ?>
                              <li>
                                  <a href="<?php echo lui_LoadAdminLinkSettings('manage-verification-reqeusts?page-id=' . ($page + 1)).$link; ?>" data-ajax="?path=manage-verification-reqeusts&page-id=<?php echo($page + 1) ?><?php echo($link); ?>" class="waves-effect" title="Next Page">
                                      <i class="material-icons">chevron_right</i>
                                  </a>
                              </li>
                            <?php } ?>
                            <li>
                              <a href="<?php echo lui_LoadAdminLinkSettings('manage-verification-reqeusts?page-id=' . ($db->totalPages)).$link; ?>" data-ajax="?path=manage-verification-reqeusts&page-id=<?php echo($db->totalPages) ?><?php echo($link); ?>" class="waves-effect" title='Last Page'>
                                  <i class="material-icons">last_page</i>
                              </a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                      <div class="clearfix"></div>
                      <div class="row">
                          <div class="col-lg-2 col-md-2">
                              <span>Accion</span>
                              <select class="form-control show-tick" id="action_type">
                                  <option value="verify">Verificar</option>
                                  <option value="delete">Eliminar</option>
                              </select>
                          </div>
                          <div class="col-lg-3 col-md-3">
                              <span>&nbsp;</span>
                              <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Confirmar<span></span></button>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>
    <!-- #END# Vertical Layout -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar solicitud?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que deseas eliminar la solicitud?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="DeleteModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Verificar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea verificar esta solicitud?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Verificar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="SelectedDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">¿Borrar solicitud?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro de que desea eliminar la solicitud seleccionada?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>
<script>
  $('.check-all').on('click', function(event) {
      $('input:checkbox').not(this).prop('checked', this.checked);
  });
  $('.delete-checkbox, .check-all').change(function(event) {
      $('.delete-selected').attr('disabled', false);
      $('.delete-selected').find('span').text(' (' + $('.delete-checkbox:checked').length + ')');
  });

  $('.delete-selected').on('click', function(event) {
      event.preventDefault();
      action_type = $('#action_type').val();
      $('#SelectedDeleteModal').find('.modal-body').html('¿Estas seguro de que quieres '+action_type+' la(s) solicitud(es) seleccionada(s)?');
      $('#SelectedDeleteModal').find('#exampleModal1Label').html(action_type+' request(s)');
      $('#SelectedDeleteModal').modal('show');
  });
  function DeleteSelected() {
      action_type = $('#action_type').val();
      data = new Array();
      $('td input:checked').parents('tr').each(function () {
          data.push($(this).attr('data_selected'));
      });
      $('.delete-selected').attr('disabled', true);
      $('.delete-selected').text('Please wait..');
      $.post(Wo_Ajax_Requests_File()+"?f=admin_setting&s=remove_multi_verification", {ids: data,type: action_type}, function () {
          $.each( data, function( index, value ){
              $("#VerificationID_"+value+"").remove();
          });
          $('.delete-selected').text('Delete Selected');
      });
  }

function Wo_DeleteVerification(id,type = 'show') {
  if (type == 'hide') {
    $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteVerification('"+id+"')");
    $('#DeleteModal').modal('show');
    return false;
  }
  var delete_icon = $('.setting-verification-container').find('#VerificationID_' + id).find('.delete-verification');
  $('#review-verif-request-info-'+id).slideUp(function(){
        $(this).remove();
        $('#VerificationID_' + id).fadeOut(300, function() {
          $(this).remove();
        });
      })
  $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s:'delete_verification', id:id});
}

function Wo_Verify(id,verification_id,type,type2 = 'show') {
  if (type2 == 'hide') {
    $('#DeleteModal2').find('.btn-primary').attr('onclick', "Wo_Verify('"+id+"','"+verification_id+"','"+type+"')");
    $('#DeleteModal2').modal('show');
    return false;
  }
  var verify_icon = $('.setting-verification-container').find('#VerificationID_' + verification_id).find('.verify');
  $('#review-verif-request-info-'+verification_id).slideUp(function(){
    $(this).remove();
  })
$('#VerificationID_' + verification_id).fadeOut(300, function() {
  $(this).remove();
});
  $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s:'verify_user', id:id, verification_id:verification_id, type:type});
}
$(document).ready(function() {
  $('.review-verif-request-cont a').magnificPopup({type:'image'});
});

jQuery(document).ready(function($) {
  $(document).on('click', '.toggle-verification-request', function(event) {
    event.preventDefault();
    $(this).find('i').toggleClass('rotate-90d');
  });
});
</script>

<style>
	.mfp-bg {
    z-index: 1052;
}
.mfp-wrap {
    z-index: 1053;
}
  .review-verif-request-cont{
    width: 100%;
    overflow: hidden;
    margin: 5px 0;
  }
  .review-verif-request-cont div{
    width: 200px;
    height: 150px;
    float: left;
    cursor: pointer;
    margin: 0 5px 5px 0;
  }

  .review-verif-request-cont h4{
    width: 100%;
    color: #666;
    font-size: 14px;
    font-weight: 600;
  }

  .toggle-verification-request{
    padding: 3px 5px;
  }
</style>