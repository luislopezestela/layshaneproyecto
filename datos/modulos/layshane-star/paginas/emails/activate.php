<?php 
$data = $db->where('name','activate')->getOne(T_HTML_EMAILS);
$html = $data->value;
$replaces = array('USERNAME' => $wo['user']['username'],
                 'SITE_URL' => $wo['config']['site_url'],
                 'EMAIL' => $wo['user']['email'],
                 'CODE' => $wo['code'],
                 'SITE_NAME' => $wo['config']['siteName']);
$html = lui_ReplaceText($html,$replaces);
echo $html;
 ?>