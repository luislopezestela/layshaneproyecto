<?php 
if ($f == 'get_next_product_image') {
    $html = '';
    if (!empty($_GET['after_image_id'])) {
        $data_image  = array(
            'product_id' => $_GET['product_id'],
            'after_image_id' => $_GET['after_image_id']
        );
        $wo['image'] = lui_ProductImageData($data_image);
        if (!empty($wo['image'])) {
            $html = lui_LoadPage('lightbox/product-content');
        }
        $data = array(
            'status' => 200,
            'html' => $html
        );
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
