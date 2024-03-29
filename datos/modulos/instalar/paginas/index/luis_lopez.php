<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
@ini_set("max_execution_time", 0);
@ini_set("memory_limit", "-1");
@set_time_limit(0);
if (!isset($_COOKIE['src'])) {
    @setcookie('src', '1', time() + 31556926, '/');
}
header("Expires: Sun, 22 Jun 1997 04:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");


$cache             = new Cache();
if (!is_dir("cache")) {
    $cache->lui_OpenCacheDir();
}
$ServerErrors = array();
$config_file_name = 'luisincludes/config.php';
$node_file_name = 'luisincludes/nodejs/config.json';
function check_($check){
  $siteurl = urlencode(Layshane::getBaseUrl());
  return array('status' => 'SUCCESS', 'url' => $siteurl, 'code' => $check);
}
function check_success($check){
  $siteurl = urlencode(Layshane::getBaseUrl());
  return array('status' => 'SUCCESS', 'url' => $siteurl, 'code' => $check);
}


if(!empty($_POST['install'])){
  $con = mysqli_connect($_POST['sql_host'], $_POST['sql_user'], $_POST['sql_pass'], $_POST['sql_name']);
  if(mysqli_connect_errno()){
    $ServerErrors[] = "No se pudo conectar a MySQL: " . mysqli_connect_error();
  }
  if($con){
    $sql = mysqli_query($con, "SELECT @@sql_mode as modes;");
    $sql_sql = mysqli_fetch_assoc($sql);
    if(count($sql_sql) > 0) {
      $results = @explode(',', strtolower($sql_sql['modes']));
      if(in_array('strict_trans_tables', $results)) {
        $ServerErrors[] = "El sql-mode <b>strict_trans_tables</b> esta habilitado en su servidor comuniquese con su proveedor para deshabilitarlo.";
      }
      if(in_array('only_full_group_by', $results)) {
        $ServerErrors[] = "El sql-mode <b>only_full_group_by</b> esta habilitado en su servidor comuniquese con su proveedor para deshabilitarlo.";
      }
    }
  }
  if(!filter_var($_POST['site_url'], FILTER_VALIDATE_URL)) {
    $ServerErrors[] = "Url no valido";
  }
  if(empty($_POST['admin_username']) || empty($_POST['admin_password'])) {
    $ServerErrors[] = "Proporcione el nombre de usuario/contraseña de administrador correcto";
  }

  $p = check_(trim($_POST['purshase_code']));
  if(isset($p['status'])) {
    if ($p['status'] == 'ERROR'){
      $ServerErrors[] = $p['ERROR_NAME'];
    }
  }else{
    $ServerErrors[] = 'No se pudo conectar al servidor, intente nuevamente más tarde o contáctenos.';
  }
  if(empty($ServerErrors)){
    $node_content = '{
      "sql_db_host": "' . $_POST['sql_host'] . '",
      "sql_db_user": "' . $_POST['sql_user'] . '",
      "sql_db_pass": "' . $_POST['sql_pass'] . '",
      "sql_db_name": "' . $_POST['sql_name'] . '",
      "site_url": "' . $_POST['site_url'] . '",
      "purchase_code": "' . trim($_POST['purshase_code']) . '"
    }';

    $file_content =
    '<?php
        // +------------------------------------------------------------------------+
        // | @author Luis lopez estela
        // | @author_url: http://www.layshane.com
        // | @author_email: layshanetecperu@gmail.com
        // +------------------------------------------------------------------------+
        // | Layshane - plataforma web
        // | Copyright (c) 2023 Layshane. Todos los derechos reservados.
        // +------------------------------------------------------------------------+
        // MySQL Hostname
        $host = "'  . $_POST['sql_host'] . '";
        // MySQL Database User
        $username = "'  . $_POST['sql_user'] . '";
        // MySQL Database Password
        $password = "'  . $_POST['sql_pass'] . '";
        // MySQL Database Name
        $dbase = "'  . $_POST['sql_name'] . '";

        // Site URL
        $site_url = "' . $_POST['site_url'] . '"; // e.g (http://example.com)

        // Purchase code
        $purchase_code = "' . trim($_POST['purshase_code']) . '";
        ?>';
    $success = '';
    $config_file = file_put_contents($config_file_name, $file_content);
    $node_file = file_put_contents($node_file_name, $node_content);
    if(file_exists('htaccess.txt')) {
      $htaccess = @file_put_contents('.htaccess', file_get_contents('htaccess.txt'));
    }
    if($config_file && $node_file){
      $filename = 'luisincludes/luis.sql';
      // Variable temporal, utilizada para almacenar la consulta actual
      $templine = '';
      // Leer todo el archivo
      $lines = file($filename);
      // Bucle a través de cada línea
      foreach ($lines as $line){
        // Sáltatelo si es un comentario.
        if(substr($line, 0, 2) == '--' || $line == '')
          continue;
          // Agregar esta línea al segmento actual
          $templine .= $line;
          $query = false;
          // If it has a semicolon at the end, it's the end of the query
          if(substr(trim($line), -1, 1) == ';') {
            // Realiza la consulta
            $query = mysqli_query($con, $templine);
            // Restablecer la variable temporal a vacío
            $templine = '';
          }
      }

      if($query){
        $p2 = check_success(trim($_POST['purshase_code']));
        if(isset($p2['status'])){
          if($p2['status'] == 'SUCCESS'){
            $can = 1;
          }
        }
        $con1 = mysqli_connect($_POST['sql_host'], $_POST['sql_user'], $_POST['sql_pass'], $_POST['sql_name']);
        if($can == 1) {
          $query_one = mysqli_query($con1, "UPDATE `lui_config` SET `value` = '" . mysqli_real_escape_string($con1, 1). "' WHERE `name` = 'is_ok'");
        }else{
          $query_one = mysqli_query($con1, "DROP TABLE lui_config");
          $query_one = mysqli_query($con1, "DROP TABLE lui_users");
          $ServerErrors[] = "Error encontrado durante la instalación, por favor contáctenos.";
        }
        $query_one = mysqli_query($con1, "UPDATE `lui_config` SET `value` = '" . mysqli_real_escape_string($con1, md5(microtime())). "' WHERE `name` = 'widnows_app_api_id'");
        $query_one = mysqli_query($con1, "UPDATE `lui_config` SET `value` = '" . mysqli_real_escape_string($con1, md5(time())). "' WHERE `name` = 'widnows_app_api_key'");
        $query_one  = mysqli_query($con1, "UPDATE `lui_config` SET `value` = '" . mysqli_real_escape_string($con1, $_POST['siteName']). "' WHERE `name` = 'siteName'");
        $query_one .= mysqli_query($con1, "UPDATE `lui_config` SET `value` = '" . mysqli_real_escape_string($con1, $_POST['siteTitle']). "' WHERE `name` = 'siteTitle'");
        $query_one .= mysqli_query($con1, "UPDATE `lui_config` SET `value` = '" . mysqli_real_escape_string($con1, $_POST['siteEmail']). "' WHERE `name` = 'siteEmail'");

        $query_onde = mysqli_query($con1, "INSERT INTO `lui_users` (`username`,`password`, `email`, `admin`, `active`, `verified`, `registered`, `start_up`, `start_up_info`, `startup_follow`, `startup_image`, `joined`)
          VALUES ('" . mysqli_real_escape_string($con1, $_POST['admin_username']). "', '" . mysqli_real_escape_string($con1, sha1($_POST['admin_password'])) . "','" . mysqli_real_escape_string($con1, $_POST['siteEmail']) . "'
              ,'1', '1', '1', '00/0000', '1', '1', '1', '1', '" . time() . "')");
          //$_SESSION['user_id'] = Wo_CreateLoginSession(1);
        if(function_exists('apache_get_modules')) {
          if(!in_array('mod_rewrite', apache_get_modules())) {
            $query_one .= mysqli_query($con1, "UPDATE `lui_config` SET `value` = '" . mysqli_real_escape_string($con, 0). "' WHERE `name` = 'seoLink'");
          }
        }
        $success = 'Layshane se instaló con éxito, por favor espere...';
      }else{
        $ServerErrors[] = "Error encontrado durante la instalación, por favor contáctenos.";
      }
    }
  }
}

?>

<?php
$page = 'terminos';
$pages_array = array(
  'requerimiento',
  'terminos',
  'instalar',
  'finalizar'
);
if(!empty($_GET['page'])){
  if (in_array($_GET['page'], $pages_array)){
    $page = $_GET['page'];
  }
}
$page_name = '';
if($page == 'terminos'){
  $page_name = 'Condiciones de uso';
}else if($page == 'requerimiento'){
  $page_name = 'Requerimientos';
}else if($page == 'instalar'){
  $page_name = 'Instalación';
}else if($page == 'finalizar'){
  $page_name = 'Tu sitio web está listo!';
}


$cURL = true;
$php = true;
$gd = true;
$disabled = false;
$mysqli = true;
$is_writable = true;
$is_lang_writable = true;
$is_node_json_writable = true;
$mbstring = true;
$is_htaccess = true;
$is_mod_rewrite = true;
$is_sql = true;
$zip = true;
$allow_url_fopen = true;
$exif_read_data = true;
$file_path_info = true;
if(!function_exists('curl_init')){
  $cURL = false;
  $disabled = true;
}
if (!function_exists('mysqli_connect')){
  $mysqli = false;
  $disabled = true;
}
if(!extension_loaded('mbstring')){
  $mbstring = false;
  $disabled = true;
}
if(!extension_loaded('gd') && !function_exists('gd_info')){
  $gd = false;
  $disabled = true;
}
if(!version_compare(PHP_VERSION, '8.1.0', '>=')){
  $php = false;
  $disabled = true;
}
if(!is_writable('luisincludes/config.php')){
  $is_writable = false;
  $disabled = true;
}
if(!is_writable('luisincludes/nodejs/config.json')) {
  $is_node_json_writable = false;
  $disabled = true;
}
if(!is_writable('luisincludes/nodejs/models/lui_langs.js')){
  $is_lang_writable = false;
  $disabled = true;
} 
if(!file_exists('.htaccess')){
  $is_htaccess = false;
  $disabled = true;
}
if(!file_exists('luisincludes/luis.sql')){
  $is_sql = false;
  $disabled = true;
}
if(!extension_loaded('zip')){
  $zip = false;
  $disabled = true;
}
if(!ini_get('allow_url_fopen') ){
  $allow_url_fopen = false;
  $disabled = true;
}
if(!function_exists('mime_content_type')){
  $file_path_info = false;
  $disabled = true;
}
?>
<body class="<?php if ($page == 'requerimiento') { ?>step_one_done<?php } ?><?php if ($page == 'instalar') { ?>step_two_done<?php } ?><?php if ($page == 'finalizar') { ?>step_three_done finished<?php } ?>">
    <div class="content-container">
        <div class="panel_datas_ad">
            <div class="lui_install_step">
                <ul class="install_steps">
                    <li class="step-one <?php echo ($page == 'terminos') ? 'active': '';?>">
                        <span>1<svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg></span>Terminos
                    </li>
                    <li class="step-two <?php echo ($page == 'requerimiento') ? 'active': '';?>">
                        <span>2<svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg></span>Requerimientos
                    </li>
                    <li class="step-three <?php echo ($page == 'instalar') ? 'active': '';?>">
                        <span>3<svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg></span>Instalación
                    </li>
                    <li class="step-four <?php echo ($page == 'finalizar') ? 'active': '';?>"><span>4</span>Finalizar</li>
                </ul>
                <div class="line"><div class="line_sec"></div></div>
            </div>
        </div>

        <div class="panel_datas_ad">
            <div class="lui_install_clar">
                <div>
                    <h2 class="light"><?php echo $page_name?></h2>
                    <div class="setting-well">
                        <?php if ($page == 'terminos') { ?>
                            <div class="terms">
                                <h5>ACUERDO DE LICENCIA: un (1) Dominio (sitio) Instalar</h5>
                                <br>
                                <b class="bold">Puede:</b><br> 1) Uso en un (1) dominio únicamente, se requiere la compra de una licencia adicional para cada dominio adicional.<br> 2) Publicar productos desde tu inventario.<br> 3) Modificar la pagina como mejor te paresca.<br> 4) Traduce a tu elección de idioma.<br>
                                <br><b class="bold">No puedes:</b> <br>1) Revender, distribuir, regalar o comercializar por cualquier medio a terceros o individuos sin permiso.<br> 2) Uso en más de un (1) dominio.
                                <br><br>Hay licencias ilimitadas disponibles.
                                <hr>
                                <form action="?page=requerimiento" method="post">
                                    <div class="lui_terms">
                                        <input type="checkbox" name="agree" id="agree">
                                        <label for="agree"> Acepto los términos de uso y política de privacidad</label>
                                    </div>
                                    <br><br>
                                    <button type="submit" class="btn btn-main" id="next-terms" disabled>Continuar <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
                                    <div class="setting-saved-update-alert milinglist"></div>
                                </form>
                            </div>
                        <?php } else if ($page == 'requerimiento') {  ?>
                            <div class="req">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="bold">Nombre</th>
                                            <th class="bold">Descripcion</th>
                                            <th class="bold">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>PHP 8.1+</td>
                                            <td>Requiere PHP versión 8.1 o mas</td>
                                            <td><?php echo ($php == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Instalado</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> No instalado</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>cURL</td>
                                            <td>Extensión PHP cURL requerida</td>
                                            <td><?php echo ($cURL == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Instalado</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> No instalado</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>MySQLi</td>
                                            <td>Extensión MySQLi PHP requerida</td>
                                            <td><?php echo ($mysqli == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Instalado</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> No instalado</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>GD Library</td>
                                            <td>Biblioteca GD necesaria para recortar imágenes</td>
                                            <td><?php echo ($gd == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Instalado</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> No instalado</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>Mbstring</td>
                                            <td>Extensión Mbstring requerida para cadenas UTF-8</td>
                                            <td><?php echo ($mbstring == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Instalado</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> No instalado</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>ZIP</td>
                                            <td>Extensión ZIP necesaria para realizar copias de seguridad de los datos</td>
                                            <td><?php echo ($zip == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Instalado</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> No instalado</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>allow_url_fopen</td>
                                            <td>Requerido allow_url_fopen</td>
                                            <td><?php echo ($allow_url_fopen == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Activado</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> Desactivado</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>FileInfo</td>
                                            <td>Extensión FileInfo requerida para FFMPEG</td>
                                            <td><?php echo ($file_path_info == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Activado</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> Desactivado</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>.htaccess</td>
                                            <td>Archivo .htaccess requerido para la seguridad del sistema <small>(Ubicado en ./page)</small></td>
                                            <td><?php echo ($is_htaccess == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Subido</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> No subido</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>luis.sql</td>
                                            <td>luis.sql requerido para la instalación <small>(Ubicado en ./page)</small></td>
                                            <td><?php echo ($is_sql == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Subido</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> No subido</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>config.php</td>
                                            <td>Se requiere que config.php se pueda escribir para la instalación</td>
                                            <td><?php echo ($is_writable == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Escribible</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> No se puede escribir</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>config.json</td>
                                            <td>Se requiere que config.json se pueda escribir para la instalación <small>(Ubicado en nodejs/config.json)</small></td>
                                            <td><?php echo ($is_node_json_writable == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Escribible</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> No se puede escribir</font>'?></td>
                                        </tr>
                                        <tr>
                                            <td>lui_langs.js</td>
                                            <td>Se requiere que lui_langs.js se pueda escribir para la instalación <small>(Ubicado en  nodejs/models/lui_langs.js)</small></td>
                                            <td><?php echo ($is_lang_writable == true) ? '<font color="green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M9.707 17.707l10-10-1.414-1.414L9 15.586l-4.293-4.293-1.414 1.414 5 5a.997.997 0 0 0 1.414 0z"/></svg> Escribible</font>' : '<font color="red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.707 18.707L12 13.414l5.293 5.293 1.414-1.414L13.414 12l5.293-5.293-1.414-1.414L12 10.586 6.707 5.293 5.293 6.707 10.586 12l-5.293 5.293z"/></svg> No se puede escribir</font>'?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <form action="?page=instalar" method="post">
                                    <button type="submit" class="btn btn-main" id="next-terms" <?php echo ($disabled == true) ? 'disabled': '';?>>Siguiente <svg viewBox="0 0 19 14" xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path fill="currentColor" d="M18.6 6.9v-.5l-6-6c-.3-.3-.9-.3-1.2 0-.3.3-.3.9 0 1.2l5 5H1c-.5 0-.9.4-.9.9s.4.8.9.8h14.4l-4 4.1c-.3.3-.3.9 0 1.2.2.2.4.2.6.2.2 0 .4-.1.6-.2l5.2-5.2h.2c.5 0 .8-.4.8-.8 0-.3 0-.5-.2-.7z"></path></svg></button>
                                    <div class="setting-saved-update-alert milinglist"></div>
                                </form>
                            </div>
                        <?php } else if ($page == 'finalizar') { ?>
                            <div class="req">
                                <p>¡Felicidades! El script de Layshane se instaló con éxito y su sitio web está listo.</p>
                                <p>Inicie sesión en su panel de administración para realizar cambios y modificar cualquier contenido predeterminado según sus necesidades.</p>
                                <br>
                                <p>Si tiene alguna pregunta, por favor <a href="mailto:layshanetecperu@gmail.com" class="main">Haznos saber</a>.</p>
                                <br><br>
                                <a href="<?=BASE_URL_A;?>" class="btn btn-main" style="line-height: 50px;">Empecemos !</a>
                            </div>
                        <?php } else if ($page == 'instalar') { ?>
                            <div class="req">
                                <?php if (!empty($ServerErrors)) { ?>
                                    <div class="alert alert-danger">
                                        <?php
                                        foreach ($ServerErrors as  $value) {
                                            echo '- ' . $value . "<br>";
                                        }
                                        ?>
                                    </div>
                                <?php } else if (!empty($success)) { ?>
                                    <div class="alert alert-success">
                                        <?php echo $success;?>
                                        <script type="text/javascript">
                                            var URL = '?page=finalizar';
                                            var delay = 1000; //Your delay in milliseconds
                                            setTimeout(function(){ window.location = URL; }, delay);
                                        </script>
                                    </div>
                                <?php } ?>
                                <form action="?page=instalar" method="post" class="install-site-setting">
                                    <div class="install_group_list">
                                        <input type="text" class="input_install_form" name="purshase_code" value="<?php echo (!empty($_POST['purshase_code'])) ? trim($_POST['purshase_code']) : '';?>" placeholder="Codigo de compra" autofocus>
                                    </div>
                                    <div class="install_group_list">
                                        <input type="text" class="input_install_form" name="sql_host" value="<?php echo (!empty($_POST['sql_host'])) ? $_POST['sql_host']: '';?>" placeholder="Nombre de host SQL">
                                    </div>
                                    <div class="install_group_list">
                                        <input type="text" class="input_install_form" name="sql_user" value="<?php echo (!empty($_POST['sql_user'])) ? $_POST['sql_user']: '';?>" placeholder="Nombre de usuario SQL">
                                    </div>
                                    <div class="install_group_list">
                                        <input type="text" class="input_install_form" name="sql_pass" value="<?php echo (!empty($_POST['sql_pass'])) ? $_POST['sql_pass']: '';?>" placeholder="Contrase&ntilde;a SQL">
                                    </div>
                                    <div class="install_group_list">
                                        <input type="text" class="input_install_form" name="sql_name" value="<?php echo (!empty($_POST['sql_name'])) ? $_POST['sql_name']: '';?>" placeholder="Nombre de la base de datos SQL">
                                    </div>
                                    <div class="install_group_list">
                                        <?php
                                        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                                        ?>
                                        <input type="text" class="input_install_form" name="site_url" value="<?php echo $actual_link?>">
                                        <span class="help-block">Ejemplos: <br>http://siteurl.com<br> http://www.siteurl.com<br> http://subdomain.siteurl.com<br> http://siteurl.com/subcarpeta<br>También puede usar https://.</span>
                                    </div>
                                    <hr>
                                    <div class="install_group_list">
                                        <input type="text" class="input_install_form" name="siteName" value="<?php echo (!empty($_POST['siteName'])) ? $_POST['siteName']: '';?>" placeholder="Nombre del sitio">
                                    </div>
                                    <div class="install_group_list">
                                        <input type="text" class="input_install_form" name="siteTitle" value="<?php echo (!empty($_POST['siteTitle'])) ? $_POST['siteTitle']: '';?>" placeholder="Titulo del sitio">
                                    </div>
                                    <div class="install_group_list">
                                        <input type="text" class="input_install_form" name="siteEmail" value="<?php echo (!empty($_POST['siteEmail'])) ? $_POST['siteEmail']: '';?>" placeholder="Correo electronico del sitio">
                                    </div>
                                    <hr>
                                    <div class="install_group_list">
                                        <input type="text" class="input_install_form" name="admin_username" value="<?php echo (!empty($_POST['admin_username'])) ? $_POST['admin_username']: '';?>" placeholder="Nombre de usuario del administrador">
                                    </div>
                                    <div class="install_group_list">
                                        <input type="text" class="input_install_form" name="admin_password" value="<?php echo (!empty($_POST['admin_password'])) ? $_POST['admin_password']: '';?>" placeholder="Clave de administrador">
                                    </div>
                                    <div class="install_group_list">
                                        Nota: El proceso de instalación puede tardar unos minutos.
                                    </div>
                                    <input type="hidden" name="install" value="install">
                                    <div class="install_group_list last-btn">
                                        <label class="col-md-2"></label>
                                        <div class="col-md-8">
                                            <button type="submit" onclick="Lui_SubmitButton();" class="btn btn-main" <?php echo ($disabled == true) ? 'disabled': '';?>>Instalar <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="19" height="19"><path fill="currentColor" d="M10,17L6.5,13.5L7.91,12.08L10,14.17L15.18,9L16.59,10.41M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z"></path></svg></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 800 800" class="finish_confetti"> <g class="confetti-cone"> <path class="conf0" d="M131.5,172.6L196,343c2.3,6.1,11,6.1,13.4,0l65.5-170.7L131.5,172.6z"/> <path class="conf1" d="M131.5,172.6L196,343c2.3,6.1,11,6.1,13.4,0l6.7-17.5l-53.6-152.9L131.5,172.6z"/> <path class="conf2" d="M274.2,184.2c-1.8,1.8-4.2,2.9-7,2.9l-129.5,0.4c-5.4,0-9.8-4.4-9.8-9.8c0-5.4,4.4-9.8,9.9-9.9l129.5-0.4 c5.4,0,9.8,4.4,9.8,9.8C277,180,275.9,182.5,274.2,184.2z"/> <polygon class="conf3" points="231.5,285.4 174.2,285.5 143.8,205.1 262.7,204.7 "/> <path class="conf4" d="M166.3,187.4l-28.6,0.1c-5.4,0-9.8-4.4-9.8-9.8c0-5.4,4.4-9.8,9.9-9.9l24.1-0.1c0,0-2.6,5-1.3,10.6 C161.8,183.7,166.3,187.4,166.3,187.4z"/> <ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -89.8523 231.0278)" class="conf2" cx="233.9" cy="224" rx="5.6" ry="5.6"/> <path class="conf5" d="M143.8,205.1l5.4,14.3c6.8-2.1,14.4-0.5,19.7,4.8c7.7,7.7,7.6,20.1-0.1,27.8c-1.7,1.7-3.7,3-5.8,4l11.1,29.4 l27.7,0l-28-80.5L143.8,205.1z"/> <path class="conf2" d="M169,224.2c-5.3-5.3-13-6.9-19.7-4.8l13.9,36.7c2.1-1,4.1-2.3,5.8-4C176.6,244.4,176.6,231.9,169,224.2z"/> <ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -119.0946 221.1253)" class="conf6" cx="207.4" cy="254.3" rx="11.3" ry="11.2"/> </g> <rect x="113.7" y="135.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -99.5348 209.1582)" class="conf7" width="178" height="178"/> <line class="conf7" x1="76.8" y1="224.7" x2="328.6" y2="224.7"/> <polyline class="conf7" points="202.7,350.6 202.7,167.5 202.7,98.9 "/><circle class="conf2" id="b1" cx="195.2" cy="232.6" r="5.1"/> <circle class="conf0" id="b2" cx="230.8" cy="219.8" r="5.4"/> <circle class="conf0" id="c2" cx="178.9" cy="160.4" r="4.2"/> <circle class="conf6" id="d2"cx="132.8" cy="123.6" r="5.4"/> <circle class="conf0" id="d3" cx="151.9" cy="105.1" r="5.4"/> <path class="conf0" id="d1" d="M129.9,176.1l-5.7,1.3c-1.6,0.4-2.2,2.3-1.1,3.5l3.8,4.2c1.1,1.2,3.1,0.8,3.6-0.7l1.9-5.5 C132.9,177.3,131.5,175.7,129.9,176.1z"/> <path class="conf6" id="b5" d="M284.5,170.7l-5.4,1.2c-1.5,0.3-2.1,2.2-1,3.3l3.6,3.9c1,1.1,2.9,0.8,3.4-0.7l1.8-5.2 C287.4,171.9,286.1,170.4,284.5,170.7z"/> <circle class="conf6" id="c3"cx="206.7" cy="144.4" r="4.5"/> <path class="conf2" id="c1" d="M176.4,192.3h-3.2c-1.6,0-2.9-1.3-2.9-2.9v-3.2c0-1.6,1.3-2.9,2.9-2.9h3.2c1.6,0,2.9,1.3,2.9,2.9v3.2 C179.3,191,178,192.3,176.4,192.3z"/> <path class="conf2" id="b4" d="M263.7,197.4h-3.2c-1.6,0-2.9-1.3-2.9-2.9v-3.2c0-1.6,1.3-2.9,2.9-2.9h3.2c1.6,0,2.9,1.3,2.9,2.9v3.2 C266.5,196.1,265.2,197.4,263.7,197.4z"/><path id="yellow-strip" d="M179.7,102.4c0,0,6.6,15.3-2.3,25c-8.9,9.7-24.5,9.7-29.7,15.6c-5.2,5.9-0.7,18.6,3.7,28.2 c4.5,9.7,2.2,23-10.4,28.2"/> <path class="conf8" id="yellow-strip" d="M252.2,156.1c0,0-16.9-3.5-28.8,2.4c-11.9,5.9-14.9,17.8-16.4,29c-1.5,11.1-4.3,28.8-31.5,33.4"/> <path class="conf0" id="a1" d="M277.5,254.8h-3.2c-1.6,0-2.9-1.3-2.9-2.9v-3.2c0-1.6,1.3-2.9,2.9-2.9h3.2c1.6,0,2.9,1.3,2.9,2.9v3.2 C280.4,253.5,279.1,254.8,277.5,254.8z"/> <path class="conf3" id="c4" d="M215.2,121.3L215.2,121.3c0.3,0.6,0.8,1,1.5,1.1l0,0c1.6,0.2,2.2,2.2,1.1,3.3l0,0c-0.5,0.4-0.7,1.1-0.6,1.7v0 c0.3,1.6-1.4,2.8-2.8,2l0,0c-0.6-0.3-1.2-0.3-1.8,0h0c-1.4,0.7-3.1-0.5-2.8-2v0c0.1-0.6-0.1-1.3-0.6-1.7l0,0 c-1.1-1.1-0.5-3.1,1.1-3.3l0,0c0.6-0.1,1.2-0.5,1.5-1.1v0C212.5,119.8,214.5,119.8,215.2,121.3z"/> <path class="conf3" id="b3" d="M224.5,191.7L224.5,191.7c0.3,0.6,0.8,1,1.5,1.1l0,0c1.6,0.2,2.2,2.2,1.1,3.3v0c-0.5,0.4-0.7,1.1-0.6,1.7l0,0 c0.3,1.6-1.4,2.8-2.8,2h0c-0.6-0.3-1.2-0.3-1.8,0l0,0c-1.4,0.7-3.1-0.5-2.8-2l0,0c0.1-0.6-0.1-1.3-0.6-1.7v0 c-1.1-1.1-0.5-3.1,1.1-3.3l0,0c0.6-0.1,1.2-0.5,1.5-1.1l0,0C221.7,190.2,223.8,190.2,224.5,191.7z"/> <path class="conf3" id="a2" d="M312.6,242.1L312.6,242.1c0.3,0.6,0.8,1,1.5,1.1l0,0c1.6,0.2,2.2,2.2,1.1,3.3l0,0c-0.5,0.4-0.7,1.1-0.6,1.7v0 c0.3,1.6-1.4,2.8-2.8,2l0,0c-0.6-0.3-1.2-0.3-1.8,0h0c-1.4,0.7-3.1-0.5-2.8-2v0c0.1-0.6-0.1-1.3-0.6-1.7l0,0 c-1.1-1.1-0.5-3.1,1.1-3.3l0,0c0.6-0.1,1.2-0.5,1.5-1.1v0C309.9,240.6,311.9,240.6,312.6,242.1z"/> <path class="conf8" id="yellow-strip" d="M290.7,215.4c0,0-14.4-3.4-22.6,2.7c-8.2,6.2-8.2,23.3-17.1,29.4c-8.9,6.2-19.8-2.7-32.2-4.1 c-12.3-1.4-19.2,5.5-20.5,10.9"/> </g> </svg>
</body>

<script>
function Lui_SubmitButton() {
    $('button').attr('disabled', true);
    $('button').text('Espere por favor..');
    $('form').submit();
}
    $(function() {
        $('#agree').change(function() {
            if($(this).is(":checked")) {
                $('#next-terms').attr('disabled', false);
            } else {
              $('#next-terms').attr('disabled', true);
            }
        });
    });
</script>
