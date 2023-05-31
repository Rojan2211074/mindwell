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
            $catname = mysqli_real_escape_string($this->conn, $catname);
    $description = mysqli_real_escape_string($this->conn, $description);

    $checkQuery = "SELECT * FROM `category` WHERE `name`='$catname'";
    $checkResult = mysqli_query($this->conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "Category already exists.";
        return false;
    }
            
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

        public function viewCategory(){
            $sql="SELECT * from category";
            $cats=mysqli_query($this->conn,$sql);
            return $cats;
        }
        public function editCategory($id){
            $sql="SELECT * from category where id ='$id'";
            $ecats=mysqli_query($this->conn,$sql);
            return $ecats;
        }

        public function updateCatagory($id,$name,$description){
            $sql="UPDATE category SET name='$name',description='$description' where id ='$id'";
            $res=mysqli_query($this->conn,$sql);
                if($res){
                    
                    echo"UPDATED";
                    return true;
                    
                }else{
                    return false;
                }
                
            
        }
        public function deleteCategory($id){
            $sql="DELETE from category where id ='$id'";
            $ecats=mysqli_query($this->conn,$sql);
            return $ecats;
        }

        }
        

        $categories = new categories();
        $categories->connect_db();

       

?>