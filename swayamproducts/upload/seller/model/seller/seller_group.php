<?php
class ModelSellerSellerGroup extends Model {
	public function getSellerGroup($seller_group_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "customer_group cg LEFT JOIN " . DB_PREFIX . "customer_group_description cgd ON (cg.customer_group_id = cgd.customer_group_id) WHERE cg.customer_group_id = '" . (int)$customer_group_id . "' AND cgd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
// $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seller_group where name = seller");
		return $query->row;
	}

	public function getSellerGroups() {
		// $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seller_group cg LEFT JOIN " . DB_PREFIX . "customer_group_description cgd ON (cg.customer_group_id = cgd.customer_group_id) WHERE cgd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY cg.sort_order ASC, cgd.name ASC");
	$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seller_group where name = seller");
		return $query->rows;
	}
} 