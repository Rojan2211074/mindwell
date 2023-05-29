<?php
class categories{
    private $conn;
        


        public function connect_db(){
            $this->conn =mysqli_connect("localhost","root","","mindwell");

            if(mysqli_connect_error()){
                die("DatabaseConnectionFailed...").mysqli_connect_error();
            };

        }

        public function addCategory($catname,$description){
            
            $sql="INSERT INTO `category`(`name`, `description`, `status`) VALUES ('$catname','$description','1')";
            


            $res=mysqli_query($this->conn,$sql);
            if($res){
            echo"CATAGORY INSERTED";
            return true;
        }else{
            echo"error";

            return false;
        }
        }
    

        }
        $categories = new categories();
        $categories->connect_db();

       

?>