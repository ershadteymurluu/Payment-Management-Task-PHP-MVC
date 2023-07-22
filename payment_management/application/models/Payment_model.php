<?php
class Payment_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function getPayments()
    {
        $this->db->select('p.*,c.name as currencyName,pt.name as paymentTypeName');
        $this->db->from('payments p');
        $this->db->join('currencies c', 'c.id=p.currency_id');
        $this->db->join('payment_types pt', 'pt.id=p.category_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getFilteredPayments($currencyId, $categoryId)
    {
        $this->db->select('p.*, c.name as currencyName, pt.name as paymentTypeName');
        $this->db->from('payments p');
        $this->db->join('currencies c', 'c.id = p.currency_id');
        $this->db->join('payment_types pt', 'pt.id = p.category_id');

        if ($currencyId) {
            $this->db->where('p.currency_id', $currencyId);
        }

        if ($categoryId) {
            $this->db->where('p.category_id', $categoryId);
        }

        $query = $this->db->get();
        return $query->result_array();
    }




    public function getCategories()
    {
        return $this->db->get('payment_types')->result();
    }
    public function getCurrencies()
    {
        return $this->db->get('currencies')->result();
    }

    public function getPaymentTypes()
    {
        return $this->db->get('payment_types')->result();
    }


    public function addPaymentType($data)
    {
        $this->db->insert('payment_types', $data);
    }

    public function addCurrency($data)
    {
        $this->db->insert('currencies', $data);
    }

    public function addPayment($data)
    {
        $this->db->insert('payments', $data);
    }
}
