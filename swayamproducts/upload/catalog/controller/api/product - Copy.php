<?php
class ControllerApiProduct extends Controller
{
    public function index()
    {
        $this->load->language('api/cart');
        $this->load->model('catalog/product');
        $this->load->model('tool/image');
        $json = array();
        $json['products'] = array();
        $filter_data = array();
        $allUserData = $this->model_catalog_product->getProducts($filter_data);
        // print_r($allUserData);
        // echo json_encode($allUserData);
        // foreach($allUserData as $allData) {
            foreach((array)$allUserData as $data){
                foreach((array) $data as $key=>$value)
                {
                    $userList[] = array("label"=>$key,"value"=>$value);        
                }
            // }
        }
        
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($allUserData));

        // $this->response->addHeader('Content-Type: application/json');
        // $this->response->setOutput(json_encode($userList));

        // foreach ($results as $result) {
         
        //     if ($result['image']) {
        //         $image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
        //     } else {
        //         $image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
        //     }
        //     if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
        //         $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
        //     } else {
        //         $price = false;
        //     }
        //     if ((float) $result['special']) {
        //         $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
        //     } else {
        //         $special = false;
        //     }
        //     if ($this->config->get('config_tax')) {
        //         $tax = $this->currency->format((float) $result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
        //     } else {
        //         $tax = false;
        //     }
        //     if ($this->config->get('config_review_status')) {
        //         $rating = (int) $result['rating'];
        //     } else {
        //         $rating = false;
        //     }
        //     $data['products'][] = array(
        //         'product_id' => $result['product_id'],
        //         'thumb' => $image,
        //         'name' => $result['name'],
        //         'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
        //         'price' => $price,
        //         'special' => $special,
        //         'tax' => $tax,
        //         'minimum' => $result['minimum'] > 0 ? $result['minimum'] : 1,
        //         'rating' => $result['rating'],
        //         'href' => $this->url->link('product/product', 'product_id=' . $result['product_id']),
        //     );
        //     $dataApi= array(
        //         'product_id' => $result['product_id'],
        //         'thumb' => $image,
        //         'name' => $result['name'],
        //         'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
        //         'price' => $price,
        //         'special' => $special,
        //         'tax' => $tax,
        //         'minimum' => $result['minimum'] > 0 ? $result['minimum'] : 1,
        //         'rating' => $result['rating'],
        //         // 'href' => $this->url->link('product/product', 'product_id=' . $result['product_id']), . $result['product_id'] . $url, true),
		// 	);
        // }
     
        // $dataApiJson =   json_encode($dataApi);

		// $jsArray = json_decode($dataApiJson,true);
		// $result = array();
		// foreach($jsArray as $key=>$value)
		// {
		// 	$products[] = array("label"=>$key,"value"=>$value);		
		// }
        // // echo json_encode ($result);
        // $this->response->addHeader('Content-Type: application/json');
        // $this->response->setOutput(json_encode($products));
    }
}