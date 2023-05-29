<?php 
    class users{
        private $conn;
        


        public function connect_db(){
            $this->conn =mysqli_connect("localhost","root","","mindwell");

            if(mysqli_connect_error()){
                die("DatabaseConnectionFailed...").mysqli_connect_error();
            };

        }


        public function registerUser($username,$password,$email,$imgname,$vericode,$tmpname,$uploadlocation){
            
            $sql="INSERT INTO `users`(`username`, `password`, `email`,`image`,`vcode`) VALUES ('$username','$password','$email','$imgname','$vericode')";
            

            if(move_uploaded_file($tmpname, $uploadlocation))
    {
        echo "Profile Pic uploaded";
        $res=mysqli_query($this->conn,$sql);
        if($res){
            return true;
        }else{
            return false;
        }
        }
        else{
        echo "unable to upload the file";
        }      

        }

        public function updateUser($uid,$nusername,$nemail,$noldphoto,$nuploadlocation,$nimgname,$ntmpname){
            $sql ="UPDATE users SET username='$nusername', email='$nemail', image='$nimgname' WHERE id=$uid";
            if(move_uploaded_file($ntmpname, $nuploadlocation))
            {
                echo "Profile Pic uploaded";
                $res=mysqli_query($this->conn,$sql);
                if($res){
                    unlink("uploads/profiles/".$noldphoto);
                    echo"UPDATED";
                    header("location:admin/logout.php");    
                    return true;
                    
                }else{
                    return false;
                }
                }
                else{
                echo "UNABLE TO";
                }  


        }
        public function updateUserNoFile($uid,$nusername,$nemail){
            $sql ="UPDATE users SET username='$nusername', email='$nemail' WHERE id=$uid";
            $res=mysqli_query($this->conn,$sql);
            if($res){
                echo"UPDATED";
                    header("location:admin/logout.php");    

            }

                

        }

    }
    

    $users = new users();
    $users->connect_db();

    


?>