<?php
if ($wo['loggedin'] == false || $wo['config']['pro'] == 0) {
	header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = 'oops';
$wo['title']       = 'Oops! | ' . $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('oops/content');