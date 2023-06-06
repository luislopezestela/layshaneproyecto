<?php
if ($wo['loggedin'] == true) {
  header("Location: " . $wo['config']['site_url']);
  exit();
}

if (!empty($_COOKIE['last_sidebar_update'])) {
    if ($_COOKIE['last_sidebar_update'] < (time() - 120)) {
        lui_CleanCache();
    }
}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'home';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('products/content');
