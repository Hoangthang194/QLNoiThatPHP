<?php 
class Database {
    private $db;
    private $localhost = "localhost:3307";
    private $dbname = "hethongbandonoithat";
    private $username = "root";
    private $password = "";
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=$this->localhost;dbname=$this->dbname", $this->username, $this-> password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->db;
    }

    public function insert($tablename, $data){
        try{
            $columns = implode(', ', array_keys($data));//Lấy các key của data
        $placeholders = ':' . implode(', :', array_keys($data));// Tạo placeholders để insert vào bảng
        $sql = "INSERT INTO $tablename ($columns) VALUES ($placeholders)";
        $stmt = $this->db->prepare($sql);
    
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        
        }
        catch(PDOException $e){
            die("Lỗi thêm dữ liệu vào bảng: ".$e->getMessage());
        }

    }

    public function getInfo($tablename,$data){
        try {
            $sql = "SELECT * FROM $tablename WHERE email = :email "; // Thay thế your_table bằng tên bảng thực tế của bạn
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email',$data);
            $stmt->execute();
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            // Xử lý dữ liệu hoặc hiển thị nó
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function update(){

    }

    public function delete(){

    }
}

?>