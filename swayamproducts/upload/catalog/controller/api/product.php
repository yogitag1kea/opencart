<?php
if (isset($_SERVER['HTTP_ORIGIN']))
    {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        // header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }


    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
    
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

        foreach($allUserData as $data)
        {
            $datalist[]=$data;
        }
        
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($datalist));

     
    }
}