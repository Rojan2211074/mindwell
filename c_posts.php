
<?php 
    class posts{
        private $conn;
        

        public function connect_db(){
            $this->conn =mysqli_connect("localhost","root","","mindwell");

            if(mysqli_connect_error()){
                die("DatabaseConnectionFailed...").mysqli_connect_error();
            };

        }

        public function addPost($uid,$cid,$title,$description,$image,$tmpname,$uploadlocation){
            $sql="INSERT INTO `article`(`category_id`, `user_id`, `title`,`description`,`featureimg`, `status`) VALUES ('$cid','$uid','$title','$description','$image','1')";
            if(move_uploaded_file($tmpname, $uploadlocation))
            {
                echo "POST Pic and the post is goint to be live soon.lsllr0a nskr0skdnnci uploaded";
                $res=mysqli_query($this->conn,$sql);
                if($res){
                    ECHO "NEW POST UPLOADED";
                    header("location:postsmgmt.php");    
                    return true;
                    
                }else{
                    return false;
                }
                }
                else{
                echo "UNABLE TO";
                }  
        

        }
        public function viewPostAdmin(){
            $sql="SELECT * from article";
            $posts=mysqli_query($this->conn,$sql);
            return $posts;
        }
        public function viewPost($uid){
            $sql="SELECT * from article where user_id=$uid ";
            $posts=mysqli_query($this->conn,$sql);
            return $posts;
        }

        public function editPost($pid,$ntitle,$ndescription,$noldphoto,$nuploadlocation,$nimgname,$ntmpname){
            $sql ="UPDATE article SET title='$ntitle', description='$ndescription', featureimg='$nimgname' WHERE id=$pid";
            if(move_uploaded_file($ntmpname, $nuploadlocation))
            {
                echo "Profile Pic uploaded";
                $res=mysqli_query($this->conn,$sql);
                if($res){
                    unlink("uploads/posts/".$noldphoto);

        
                    return true;
                    
                }else{
                    return false;
                }
                }
                else{
                echo "UNABLE TO";
                }  


        }
        public function editPostNoFile($pid,$ntitle,$ndescription){
            $sql ="UPDATE article SET title='$ntitle', description='$ndescription'WHERE id=$pid";

            $res=mysqli_query($this->conn,$sql);
            if($res){
                echo"UPDATED";
                header("location:postsmgmt.php");    
                   

            }

                

        }
        public function deletePost($id){
            $sql="DELETE from article where id ='$id'";
            $epost=mysqli_query($this->conn,$sql);
            return $epost;
        }

            

        }
    


    $posts = new posts();
    $posts->connect_db();

    


?>