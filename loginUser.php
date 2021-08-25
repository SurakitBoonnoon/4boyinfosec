<?php
	//BEGIN FUNCTION 
		
	function random_password($length,$validchars) {
	$numchars = mb_strlen ($validchars,'utf-8');
	$password = '';

	// each loop random 1 character
	for ($i = 0; $i < $length; $i++) {
		mt_srand();
		// random index of valid characters
		$index = mt_rand(0, $numchars - 1);
		// get character at index and append to password
		$password .= mb_substr($validchars, $index, 1,'utf-8');
		if(mb_strlen($password,'utf-8')==$length){
			break;	
		}
	}
	return $password;
}

?>
<?php 

$n=4; 
    function getName($n) { 
        $characters = '0123456789'; 
        $randomString = ''; 
      
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
      
        return $randomString; 
    }
 $pinlogin = getName($n);

?>


<div class="container">
  <div class="row">
    <div class="col-sm">
      
    </div>
    <div class="col-sm">
    <br>
    <div class="card mt-2 border border-primary shadow-lg">
  <div class="card-body">
  <br>
<center><h3>4Boy Infosec</h3></center>

<form class="was-validated" action="" method="POST">

<div class="input-group mt-5">
        <div class="input-group-prepend">
          <div class="input-group-text border border-dark"><i class="fa fa-user" style="font-size:24px"></i></div>
        </div>
        <input type="text" class="form-control border border-dark" placeholder="ชื่อผู้ใช้" name="username" id="username" autocomplete="off" required>
      </div>


<div class="input-group mt-3">
        <div class="input-group-prepend">
          <div class="input-group-text border border-dark"><i class="fa fa-key" style="font-size:17px"></i></div>
        </div>
        <input type="password" class="form-control border border-dark" placeholder="รหัสผ่าน" name="password" id="password" autocomplete="off" required>
      </div>





<div class="row mt-5">

    
    <div class="col">
      <button type="submit" name="login" class="btn btn-block btn-outline-success">เข้าสู่ระบบ <i class="fa fa-sign-in"></i></button>
    </div>
 
  <div class="row mt-15">

  </div>
</div>
</form>
</div>
</div>
    </div>
    <div class="col-sm">

    </div>
  </div>
</div>