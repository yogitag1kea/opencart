<?php
class ControllerApiCustomer extends Controller
{
    public function index()
    {

        $this->load->language('api/cart');
        $this->load->model('account/customer');
        $this->load->model('tool/image');
        
        $allUserData = $this->model_account_customer->getAllCustomersList();
       print_r ($allUserData);
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

            foreach((array)$allUserData as $data){
                
                // foreach((array) $data as $key=>$value)
                // {
                //     $userList[] = array("label"=>$key,"value"=>$value);        
                // }
            // }
        }
        
        // $this->response->addHeader('Content-Type: application/json');
        // $this->response->setOutput(json_encode($userList));


    }
}