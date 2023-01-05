<?php
// 

//implements ExistingCheckable
class order
{

    public $table = "orders";
    public $db;
    function __construct()
    {
        $this->db = EDatabase::getInstance();
    }


    // public function checkExisting(ExistingChecker $ex, $category_info = array())
    // {
    //     if ($ex->checkExistingCategory($category_info)) {
    //         echo "category existing";
    //     } else {
    //         echo "no existing found";
    //     }
    // }

    function countOrders()
    {
        return (count($this->db->fetch_all_data($this->table)));
    }

    function countPendingOrders()
    {
        $sql = "select * from $this->table where is_delivered='no'";



        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        $row = $statement->fetchAll();
        return count($row);
    }
    function addOrder($order_info)
    {


        if ($this->db->insert($this->table, $order_info)) {
            $sql = "update product set quantity=quantity-
{$order_info['quantity']} where product_id={$order_info['product_id']}";

            $statement = $this->db->connection->prepare($sql);
            $statement->execute() or die("quantity decrease error");

            return true;
        }
    }




    public function deleteOrder($where)
    {

        $sql = "DELETE FROM $this->table WHERE order_id=$where";
        $statement = $this->db->connection->prepare($sql);
        $statement->execute();
        if ($statement->execute()) {

            return true;
        } else {

            return false;
        }
    }

    public function editOrder($edit_info = array())
    {
        $update_query =  "UPDATE $this->table SET  is_recieved='{$edit_info["is_recieved"]}',is_delivered='{$edit_info["is_delivered"]}' WHERE order_id={$edit_info["order_id"]}";
        $stmnt = $this->db->connection->prepare($update_query);
        $stmnt->execute() or die("update query failed");
    }

    public function viewOrder()
    {

        $result = array();
        $order_list = array();
        if ($_SESSION['user_type'] == 'farmer') {
            $farmer_info["farmer_id"] = $_SESSION['user_id'];
            $result = $this->db->fetch_data_with_one_column_check($farmer_info, $this->table, "farmer_id");
        }
        if ($_SESSION['user_type'] == 'admin') {
            $result = $this->db->fetch_all_data($this->table);
        }
        if ($_SESSION['user_type'] == 'customer') {
            $customer_info["customer_id"] = $_SESSION['user_id'];
            $result = $this->db->fetch_data_with_one_column_check($customer_info, $this->table, "customer_id");
        }


        if (count($result)) {
            foreach ($result as $r) {
                $order['e_order_id'] = $r['order_id'];
                $order['order_id'] = Converter::en2bn($r['order_id']);

                $sql1 = "SELECT * from user where user_id={$r['customer_id']}";
                $stmnt1 = $this->db->connection->prepare($sql1);
                $stmnt1->execute();

                while ($row = $stmnt1->fetch()) {
                    $order['customer'] = $row['name'];
                    $order['customer_no'] = Converter::en2bn($row['phone_number']);
                    $order['customer_address'] = $row['address'];
                }

                $sql2 = "SELECT * from user where user_id={$r['farmer_id']}";
                $stmnt2 = $this->db->connection->prepare($sql2);
                $stmnt2->execute();

                while ($row = $stmnt2->fetch()) {
                    $order['seller'] = $row['name'];
                    $order['farmer_no'] = Converter::en2bn($row['phone_number']);
                    $order['farmer_address'] = $row['address'];
                }

                $sql3 = "SELECT * from product where product_id={$r['product_id']}";
                $stmnt3 = $this->db->connection->prepare($sql3);
                $stmnt3->execute();

                while ($row = $stmnt3->fetch()) {

                    $order['quantity_type'] = $row['quantity_type'];
                }

                $order['product'] = $r['product_name'];
                $order['price']
                    = Converter::en2bn($r['price']);
                $order['quantity'] =
                    Converter::en2bn($r['quantity']) . " " . $order['quantity_type'];
                $order['order_date']
                    = Converter::en2bn($r['order_date']);
                $order['transaction_id'] = $r['transaction_id'];
                $order['is_recieved'] = $r['is_recieved'];
                $order['is_delivered'] = $r['is_delivered'];

                $order_list[] = $order;
            }
        }
        return $order_list;
    }
}