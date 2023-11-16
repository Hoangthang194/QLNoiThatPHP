<?php
    require_once "../db.conn.php";
    class Product{
        private $database;
        private $ProductId;
        private $Title;
        private $Material;
        private $Des;
        private $TypeID;
        private $RoomID;
        private $Priceold;
        private $SaleOff;
        private $Acreage;
        private $IsState;
        private $Images;
        private $Favourite;
        private $Rating;
        public function __construct($Title,
        $Material,
        $Des,
        $TypeProduct,
        $TypeRoom,
        $Price,
        $Saleoff,
        $Acreage,
        $State,
        $Images)
        {
            $this->database = new Database();
            $this->database->getConnection();
            $this->Title = $Title;
            $this->Material = $Material;
            $this->Des = $Des;
            $this->TypeID = $TypeProduct;
            $this->RoomID = $TypeRoom;
            $this->Priceold = $Price;
            $this->SaleOff = $Saleoff;
            $this->Acreage = $Acreage;
            $this->IsState = $State;
            $this->Images = $Images;
        }

        public function InsertProduct(){
            $tablename = "product";
            $data = array("Title"=> $this->Title,
            "Material"=> $this->Material,
            "Des"=> $this->Des,
            "TypeID"=> $this->TypeID,
            "RoomID"=> $this->RoomID,
            "Priceold"=> $this->Priceold,
            "SaleOff"=> $this->SaleOff,
            "Acreage"=> $this->Acreage,
            "IsState"=> $this->IsState
        );
            $this->database->insert($tablename, $data);
            echo "Thêm thành công";
    }

        public function UpdateProduct(){

        }

        public function DeleteProduct(){

        }
    }
 ?>