<?php 

    class TodoDataManager{
        
       
        
        function __construct( private mysqli $conn)
        {
            $this->conn = $conn;           
        }

        public function create_table() {
            $sql_create = "CREATE TABLE tbl_todos (id INTEGER AUTO_INCREMENT PRIMARY KEY, title VARCHAR(50), isComp leted BOOL DEFAULT 0, date_created DATETIME DEFAULT CURRENT_TIMESTAMP);";

            if($this->conn->query($sql_create)){
                echo "Таблица Todos успешно создана";
            } else{
                echo "Ошибка: " . $this->conn->error;
            }
        }

        public function insert_table(string $title) {

            $data = $this->conn->real_escape_string($title);
            $sql = "INSERT INTO tbl_todos (title) VALUES ('$data')";

            if($this->conn->query($sql)){
                return true;
            } else{
                echo "Ошибка: " . $this->conn->error;
                return false;
            }
        }

        public function update_task(int $id) {

            $sql = "UPDATE tbl_todos SET isCompleted = 1 WHERE id = '$id'";
            
            if ($this->conn->query($sql)) {
                return true;
            } else {
                echo "Ошибка: " . $this->conn->error;
                return false;
            }
        }

        public function delete_task(int $id) {

            $todoid = $this->conn->real_escape_string($id);
            $sql = "DELETE FROM tbl_todos WHERE id = $todoid";

            if($this->conn->query($sql)){
                return true;
            } else{
                echo "Ошибка: " . $this->conn->error;
                return false;
            }
        }

        public function select_all()
        {
            $sql = "SELECT * FROM tbl_todos";

            if($result = $this->conn->query($sql)) {
                $data = [];
                foreach($result as $row){
                    $tmp_row = [
                        'id' => $row['id'],
                        'title' => $row['title'],
                        'isCompleted' => $row['isCompleted'],
                        'date_created' => $row['date_created']
                    ];
                    $data[] = $tmp_row;
                }
                $result->free();
                return $data;
            } else{
                echo "Ошибка: " . $this->conn->error;
                return [];
            }
        }

        function __destruct()
        {
            $this->conn->close();
        }
    }

    
?>