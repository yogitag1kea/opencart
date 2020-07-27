<?php
class ControllerApiLogin extends Controller 
{
	
	public function index() 
	{
		echo "1";
		$this->load->language('api/login');

		$json = array();

		$this->load->model('account/api');

		// Login with API Key
		$api_info = $this->model_account_api->login($this->request->post['username'], $this->request->post['key']);
		// $api_info = $this->model_account_api->login($this->request->post['default'], $this->request->post['unaAzyzmhQ4IJ4VuMXXIbzUpFheIdA2QMVRlhA2jaaakAsXQXeC2E4C74lDFWcMXj3S7u8HWOvRX3xIeENVtyuLQodzxTlb25RT7zyVaDexbFwUv5JAUIrKPw73ZBJbVCsQvrytp93YLB3eQdcclXd0L0DQ5cGdUMcfJBy7kkPOE2wORWAJNvkA07F7NYjibIlV1h5zgThFKDLMA0I2F4JtOat2xVNGcZPh91PZU5xARiEWNz7kGsEQTmf2lS1Rd']);
		print_r($api_info);
		// if (!isset($this->request->post['username']) || !isset($this->request->post['key'])) 
		// {
		// 	echo "2";
		// 	$json['error']['credentials'] = $this->language->get('error_credentials');
		// }

		if ($api_info) 
		{
			echo "2";
			// Check if IP is allowed
			$ip_data = array();

			$results = $this->model_account_api->getApiIps($api_info['api_id']);

			foreach ($results as $result) 
			{
				$ip_data[] = trim($result['ip']);
			}

			if (!in_array($this->request->server['REMOTE_ADDR'], $ip_data)) 
			{
				$json['error']['ip'] = sprintf($this->language->get('error_ip'), $this->request->server['REMOTE_ADDR']);
			}				

			if (!$json) 
			{
				$json['success'] = $this->language->get('text_success');
				if (!$json) 
				{
					// Login with API Key
					$api_info = $this->model_account_api->login($this->request->post['username'], $this->request->post['key']);

					if ($api_info) 
					{
						// Check if IP is allowed
						$ip_data = array();

						$results = $this->model_account_api->getApiIps($api_info['api_id']);

						foreach ($results as $result) 
						{
							$ip_data[] = trim($result['ip']);
						}

						if (!in_array($this->request->server['REMOTE_ADDR'], $ip_data)) 
						{
							$json['error']['ip'] = sprintf($this->language->get('error_ip'), $this->request->server['REMOTE_ADDR']);
						}				

						if (!$json) 
						{
							$json['success'] = $this->language->get('text_success');

							$session = new Session($this->config->get('session_engine'), $this->registry);
							$session->start();

							$this->model_account_api->addApiSession($api_info['api_id'], $session->getId(), $this->request->server['REMOTE_ADDR']);

							$session->data['api_id'] = $api_info['api_id'];

							// Create Token
		
						}
						else 
						{
							$json['error']['key'] = $this->language->get('error_key');
							$session = new Session($this->config->get('session_engine'), $this->registry);
							$session->start();

							$this->model_account_api->addApiSession($api_info['api_id'], $session->getId(), $this->request->server['REMOTE_ADDR']);

							$session->data['api_id'] = $api_info['api_id'];

							// Create Token
							$json['api_token'] = $session->getId();

						}
						} 
						else {
							$json['error']['key'] = $this->language->get('error_key');
						}
					}	
				}
		}
	}
}