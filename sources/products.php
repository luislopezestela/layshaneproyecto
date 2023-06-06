<?php
if ($wo['config']['product_visibility'] == 1) {
}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'products';
$wo['title']       = $wo['lang']['latest_products'];
if (!empty($wo['category']['category_id'])) {
    $wo['title']       = FilterStripTags(lui_Secure($wo['story']['product']['name']));
}

$category_id = (!empty($_GET['c_id'])) ? (int) $_GET['c_id'] : 0;
foreach ($wo['products_categories'] as $key => $category) {
    if (!empty($category_id == $key)) {
        $wo['title']       = FilterStripTags(lui_Secure($category));
    }
}
$wo['content']     = lui_LoadPage('products/content');
