<?php 
$data = $db->where('name','unusual_login')->getOne(T_HTML_EMAILS);
$html = $data->value;
$replaces = array('USERNAME' => $wo['email']['username'],
                  'SITE_NAME' => $wo['config']['siteName'],
                  'CODE' => $wo['email']['code'],
                  'DATE' => $wo['email']['date'],
                  'EMAIL' => $wo['email']['email'],
                  'COUNTRY_CODE' => $wo['email']['countryCode'],
                  'IP_ADDRESS' => $wo['email']['ip_address'],
                  'CITY' => $wo['email']['city']);
$html = lui_ReplaceText($html,$replaces);
echo $html;
 ?>