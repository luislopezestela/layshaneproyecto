<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Herramientas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Copia de seguridad de SQL y archivos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Copia de seguridad de SQL y archivos</h6>
					<svg class="mb-3 rounded-circle" height="80" viewBox="0 0 32 32" width="80" xmlns="http://www.w3.org/2000/svg"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#e3f8fa"></path><path d="m20 16c-.737 0-1.435.205-2.05.577l-.43-.43c-.143-.143-.358-.186-.545-.108-.187.077-.309.26-.309.462v1.667c0 .276.224.5.5.5h1.667c.202 0 .385-.122.462-.309s.035-.402-.109-.545l-.252-.252c.331-.145.689-.228 1.065-.228 1.471 0 2.667 1.196 2.667 2.667 0 1.47-1.196 2.667-2.667 2.667-1.268 0-2.364-.895-2.606-2.128-.071-.361-.423-.598-.783-.526-.361.071-.597.421-.526.783.367 1.855 2.012 3.203 3.916 3.203 2.206 0 4-1.794 4-4s-1.794-4-4-4z" fill="#8ce1eb"></path><g fill="#26c6da"><path d="m8 14v4h7.334v-1.5c0-.747.447-1.407 1.133-1.693.58-.24 1.227-.16 1.727.18.573-.207 1.18-.32 1.807-.32v-.667z"></path><path d="m14.78 21.053c-.127-.64.073-1.267.48-1.72h-7.26v2.833c0 1.014.82 1.834 1.833 1.834h6.654c-.86-.747-1.474-1.767-1.707-2.947z"></path><path d="m18.167 8h-8.334c-1.013 0-1.833.82-1.833 1.833v2.833h12v-2.833c0-1.013-.82-1.833-1.833-1.833zm-7.834 3.333c-.553 0-1-.447-1-1s.447-1 1-1 1 .447 1 1c0 .554-.447 1-1 1zm3.334 0c-.553 0-1-.447-1-1s.447-1 1-1 1 .447 1 1c0 .554-.447 1-1 1zm3.333 0c-.553 0-1-.447-1-1s.447-1 1-1 1 .447 1 1c0 .554-.447 1-1 1z"></path></g></svg>
					<p><b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12S17.5 2 12 2M14 17L11 11.8V7H12.5V11.4L15.3 16.3L14 17Z"></path></svg> Ultima copia de seguridad:</b> <span class="last_backup"><?php echo $wo['config']['last_backup'];?></span></p>
					<p><b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M10,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V8C22,6.89 21.1,6 20,6H12L10,4Z"></path></svg> Directorio de copias de seguridad:</b> ./script_backups/</p>
					<p><b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M13,9V3.5L18.5,9M6,2C4.89,2 4,2.89 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2H6Z"></path></svg> Tipo de copia de seguridad:</b> todos los archivos incluyendo ./upload carpeta y copia de seguridad completa de su base de datos.</p>
					<p><b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M17,3A2,2 0 0,1 19,5V15A2,2 0 0,1 17,17H13V19H14A1,1 0 0,1 15,20H22V22H15A1,1 0 0,1 14,23H10A1,1 0 0,1 9,22H2V20H9A1,1 0 0,1 10,19H11V17H7C5.89,17 5,16.1 5,15V5A2,2 0 0,1 7,3H17M12,14.5L16.5,10H13V6H11V10H7.5L12,14.5Z"></path></svg> Se recomienda descargar las copias de seguridad a traves de FTP.</b></p>
					<br>
                    <form id="backup" class="mb-3"><button type="submit" class="btn btn-warning waves-effect waves-light m-t-20">Crear nueva copia de seguridad completa</button></form>
					<span class="text-muted">Tenga en cuenta que puede tardar varios minutos.</span>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
$(function() {
    $('form#backup').ajaxForm({
      url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=new_backup',
      beforeSend: function() {
      	$('form#backup').find('button').text('Por favor espere..');
      },
      success: function(data) {
        if (data.status == 200) {
         $('.last_backup').text(data.date);
         $('form#backup').find('button').text('¡Copia de seguridad completa!');
         setTimeout(function () {
         	$('form#backup').find('button').text('Crear nueva copia de seguridad completa');
         }, 2000);
        } 
      }
    });
});
</script>