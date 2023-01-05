<?php
class EDatabase
{

    private static $db;
    public  $connection;

    private function __construct()
    {

        $dns = "mysql:host=localhost;dbname=farming_assistant;charset=utf8";
        $user = "root";
        $password = "";
        try {
            $this->connection = new PDO($dns, $user, $password);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "connection failed";
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$db)) {
            self::$db = new EDatabase();
            return self::$db;
        } else {

            return self::$db;
        }
    }


    function fetch_all_data($table)
    {

        $sql = "select * from ${table}";



        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $row = $statement->fetchAll();
        return $row;
    }

    //pass an associative array 
    function fetch_data_with_two_column_check($data_array, $table, $col1, $col2)
    {

        $row = array();
        $sql = "select * from ${table} Where ${col1}=? and ${col2}=?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([$data_array[$col1], $data_array[$col2]]);

        if ($statement->rowCount()) {
            $row = $statement->fetchAll();
        }
        return $row;
    }

    function fetch_data_with_one_column_check($data_array = array(), $table, $col)
    {
        // echo "$data_array[$col]";

        $row = array();
        $sql = "select * from ${table} Where ${col}=?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([$data_array[$col]]);
        if ($statement->rowCount()) {
            $row = $statement->fetchAll();
            // print_r($row);
        }
        return $row;
    }

    //pass an associative array
    public function insert($table, $params = array())
    {

        if ($this->tableExists($table)) {

            $cols = [];

            foreach ($params as $k => $v) {
                $cols[':' . $k] = $v;
            }

            $table_columns = implode(', ', array_keys($params));
            $table_values = implode(", ", array_keys($cols));

            $sql = "INSERT INTO $table ($table_columns) VALUES($table_values)";
            $statement = $this->connection->prepare($sql);

            if ($statement->execute($cols)) {

                return true;
            } else {

                return false;
            }
        } else {
            echo "table not found";
        }
    }



    public function tableExists($table)
    {


        try {
            $result = $this->connection->query("SELECT 1 FROM {$table} LIMIT 1");
        } catch (Exception $e) {

            return FALSE;
        }

        // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
        return $result !== FALSE;
    }


    public function tableISeMPTY($table)
    {
        if (count($this->fetch_all_data($table)) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
   

//    $arr=['user_id'=>24,
//    'username'=>'ishratrintu'];
//    $db2=database::getInstance("irfat");
//    $db=database::getInstance("rintu");
//    $db->fetch_all_data("empty");
   
//    $db2->fetch_data_with_two_column_check($arr,"user",'user_id','username');
// $new_data= ['user_id' => 700 ,
// 'first_name' => "'bushra'",
//  'last_name' =>  "'jahan '",
//  'username' => "'sadia '",
//   'password' => "'57c9ca61df6aabcb7c9a5a3aeb4a8775'" ,
//   'role' => 0];
// //    $db2->tableExists("user");
// // print ($db2->tableExists("user")) ?"table found":  "table not found";

//  $db2->insert("user",$new_data)