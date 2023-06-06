<?php
if ($wo['loggedin'] == false) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}
if ($wo['config']['forum'] == 0) {
	header("Location: " . $wo['config']['site_url']);
    exit();
}
$wo['description']   = $wo['config']['siteDesc'];
$wo['keywords']      = $wo['config']['siteKeywords'];
$wo['page']          = 'forum';
$wo['active']        = null;
$wo['threads']       = lui_GetForumThreads(array('user' => $wo['user']['id'], 'limit' => 10 ));
$wo['forums']        = lui_GetForums();
$wo['title']         = $wo['config']['siteTitle'];
$wo['content']       = lui_LoadPage('forum/mythreads');


