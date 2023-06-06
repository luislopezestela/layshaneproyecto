<?php

if ($wo['loggedin'] == true) {
	if (!empty($_COOKIE['last_sidebar_update'])) {
        if ($_COOKIE['last_sidebar_update'] < (time() - 120)) {
            lui_CleanCache();
        }
    }
}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'home';
$wo['title']       = $wo['config']['siteTitle'];
$pg = 'home/content';
if ($wo['config']['website_mode'] == 'instagram') {
    $pg = 'mode_instagram/home/content';
}
$wo['content']     = lui_LoadPage($pg);
