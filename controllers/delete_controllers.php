<?php

$hostname = "127.0.0.1";
$hostuser = "root";
$hostpass = "";
$database = "univa";

$connection = mysqli_connect($hostname,$hostuser,$hostpass,$database);

if ($connection) {
    
$sqlquery = "SELECT * FROM users";
$result = mysqli_query($connection,$sqlquery);

if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
    $user_name = $_GET['user_name'];
    $delete = $_GET['delete'];

if ($row['name']==$user_name && $row['status'] == 0) {
   echo "User found";
   echo "User found, do you want to delete it? (Y / N)";
   $resp = $delete;
   if($resp == 'Y'){
   $row['status'] = 1;
   }else{
       echo 'User not deleted';
   }
}else{
echo 'Username does not exist';
} 

}
}else{
echo "Empty table";
}
}
?>



