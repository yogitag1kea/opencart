<?php
class ControllerApiSearch extends Controller
{
    public function index()
    {

        // $this->load->language('api/cart');
        $this->load->model('catalog/product');
        // $this->load->model('tool/image');
        $json = array();

        // $this->request->get['search'] = $this->load->controller( 'controller/product/search' );
        // print_r($this->request->get['search']);
        $search=array();
        $allUserData = $this->model_catalog_product->searchData($search);
        print_r($allUserData);   

        // $userList = array();
        // foreach($allUserData as $allData) 
        // {            
        //     foreach((array)$allData as $data)
        //     {
        //         foreach((array) $data as $key=>$value)
        //         {
        //             $userList[] = array("label"=>$key,"value"=>$value);        
        //         }
        //     }
        // }

        // $sample_data = json_encode($userList);
        // $raw_data = json_decode($sample_data, true);
        // $page = !isset($_GET['page']) ? 1 : $_GET['page'];
        // $limit = 2; // five rows per page
        // $offset = ($page - 1) * $limit; // offset
        // $total_items = count($raw_data); // total items
        // $total_pages = ceil($total_items / $limit);
        // $final = array_splice($raw_data, $offset, $limit);
        
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
        echo "hello";
    }
}