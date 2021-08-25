<?php

$n=50; 
    function getName($n) { 
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; 
        $randomString = ''; 
      
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
      
        return $randomString; 
    }
 $randomtoken = getName($n);

 $sql = "SELECT * FROM member";
 $result = $conn->query($sql);

 



$token = $_GET["token"];
$showtoken = $conn->query("SELECT * FROM member WHERE token = '$token' ");
while ($row = $showtoken->fetch_array()) {
  $name = $row["name"];
  $lastname = $row["lastname"];
  $user_status = $row["user_status"];
}


$tokencheck = $conn->query("SELECT *FROM member WHERE token = '$token' ");
if($tokencheck->num_rows <= 0){
    $_SESSION["swal"] = "notify";
    $title ="Token ไม่ถูกต้อง";
    $text = "กรุณาลองใหม่อีกครั้ง";
    $icon ="error";
    $button = "ตกลง";
    $link = "./?app=home";
}else{
    if($user_status == "member"){
      $_SESSION["swal"] = "notify";
         $title ="ไม่มีสิทธิ์เข้าถึงหน้านี้..";
         $icon ="error";
         $link = "./?app=home";}
         else{
           
          $sql_list = $conn->query("SELECT count(user_status) as count,user_status FROM member GROUP BY user_status");
          while($row = $sql_list->fetch_array()){
          $user_status = $row["user_status"];
          $user_num = $row["count"];
          }


          $add = $_GET["add"];
          if($add == "logout"){
        $tokenupdate = $conn->query("UPDATE member SET token = '$randomtoken' WHERE token = '$token'");
                $_SESSION["swal"] = "notify";
                $title ="ออกจากระบบ";
                $text = "กรุณารอสักครู่...";
                $icon ="error";
                $button = "ตกลง";
               $link = "./?app=home";
            
            }



        
        }
}


?>

<div class="container">
<div class="row">
  <div class="col-12 bg-info text-white">
    <br>
    <center><h3>4boy Admin Setting</h3>
    <h6><?php echo $name;?> <?php echo $lastname;?></h6><center>
  
  <br>
  </div>
  </div>

<div class="row">
  <div class="col-2 bg-info" style="height:800px">
  <br>
  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active btn-outline-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
  <a class="nav-link btn-outline-light" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Member</a>
  <a class="nav-link btn-outline-light" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
  <a class="nav-link btn-outline-light" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
  <br><a href="./?admin=home&token=<?php echo $token;?>&add=logout" class="btn btn-danger btn-sm" role="button" aria-pressed="true">ออกจากระบบ</a></center><br>
</div>
  </div>
  <div class="col-10  bg-light text-black">
    <br>
  <div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
  
 


  <div class="container">
  <div class="row">
    <div class="col-2">
      
    <div class="card text-white bg-primary">
  <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
  <div>
  <div class="text-value-lg"><?php echo $user_num;?></div>
  <div>Members</div>
  <br>
  </div></div></div>
  
  
    </div>
    
    
    </div></div>
  
  
  
  
    </div>
  <!--หน้าที่2-->
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">


<center><h3>Members</h3></center>



  <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Status</th>
      <th scope="col">Setting</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php while($row = $result->fetch_assoc()): ?>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['lastname']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['user_status']; ?></td>
      <td>แก้ไข</td>
    </tr>
    <?php endwhile ?>
  </tbody>
</table>





  </div> <!--หน้าที่2-->
  <!--หน้าที่3-->
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Coming Soon</div><!--หน้าที่3-->
  <!--หน้าที่4-->
  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Coming Soon</div><!--หน้าที่4-->
</div>
  </div>
  </div>
</div>