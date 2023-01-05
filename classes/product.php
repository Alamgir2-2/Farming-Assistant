<?php


class Product
{
    public $db;
    public $table = "product";
    function __construct()
    {
        $this->db = EDatabase::getInstance();
    }


    function addProduct($product_info)
    {


        if ($this->db->insert($this->table, $product_info)) {


            return true;
        }
    }


    public function deleteProduct($where)
    {

        $sql = "SELECT COUNT(*) FROM orders WHERE product_id=$where AND is_recieved='no'";
        $res = $this->db->connection->query($sql);
        $count = $res->fetchColumn();
        if ($count > 0) {
            $_SESSION['message'] = "এই পণ্যের পেন্ডিং অর্ডার থাকার কারণে পণ্যটি রিমুভ করা সম্ভব নয়!";

            $sql1 = "update product set quantity=0 where product_id=$where";
            $statement = $this->db->connection->prepare($sql1);
            $statement->execute();
            if ($statement->execute()) {

                return true;
            }
        } else {
            $sql = "DELETE FROM $this->table WHERE product_id=$where";
            $statement = $this->db->connection->prepare($sql);
            $statement->execute();
            if ($statement->execute()) {

                return true;
            } else {

                return false;
            }
        }
    }
    function viewAllproducts()
    {
        $product_list = array();
        $product = array();
        $result = array();
        if ($_SESSION['user_type'] == 'farmer') {
            $farmer_info["farmer_id"] = $_SESSION['user_id'];
            $result = $this->db->fetch_data_with_one_column_check($farmer_info, $this->table, "farmer_id");
        }
        if ($_SESSION['user_type'] == 'admin') {
            $result = $this->db->fetch_all_data($this->table);
        }

        if (count($result)) {
            foreach ($result as $r) {
                $sql = "SELECT name from user where user_id={$r['farmer_id']}";
                $stmnt = $this->db->connection->prepare($sql);
                $stmnt->execute();
                $product['seller'] = '';
                while ($row = $stmnt->fetch()) {
                    $product['seller'] = $row['name'];
                }
                $product['product_img'] = $r['product_img'];
                $product['name'] = $r['name'];
                $product['category'] = $r['category'];
                $product['quantity'] = converter::en2bn($r['quantity']);
                $product['quantity_type'] = $r['quantity_type'];
                $product['price'] = converter::en2bn($r['quantity'] * $r['unit_price']);
                $product['product_id'] = $r['product_id'];
                $product_list[] = $product;
            }
        }

        return $product_list;
    }
    public function countProducts()
    {
        return (count($this->db->fetch_all_data($this->table)));
    }
}