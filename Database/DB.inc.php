<?php
class DatabaseConnection {
    private $host = '161.246.127.24';
    private $username = 'cllg433zl000absmn01d5hf6z';
    private $password = 'Ts2TbGMNVHPN7GiR43hddtKL';
    private $database = 'YouSabuy';
    private $port = '9024';
    private $connection = "";

    public function __construct()//constructor
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function executeQuery($sql) {
        $result = $this->connection->query($sql);

        if (!$result) {
            die("Query execution failed: " . $this->connection->error);
        }

        return $result;
    }

    public function select($table, $columns = "*", $condition = "") {
        $sql = "SELECT $columns FROM $table";

        if (!empty($condition)) {
            $sql .= " WHERE $condition";
        }

        return $this->executeQuery($sql);
    }

    public function insert($table, $data) {
        // $data should be an associative array with column names as keys and values as values
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $result = $this->executeQuery($sql);

        if ($result) {
            return $this->connection->insert_id; // Return the ID of the inserted row
        } else {
            die("Insertion failed: " . $this->connection->error);
        }
    }

    public function close() {
        $this->connection->close();
    }
}
//Test
// $db = new DatabaseConnection();

// $sql = "INSERT INTO Tenant (Tenant_ID, Fname, Lname, Tel, Citizen_ID, Room_ID) VALUES ('A041', 'Jessada', 'Taengsuwan', '0870677230', '1130100068585', '313');";
// $inserted = $db->executeQuery($sql);
// if($inserted) {
//     echo "inserted success";
// } else {
//     echo "insert failed";
// }

// // Close the database connection when done
// $db->close();
?>