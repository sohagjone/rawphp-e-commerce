<?php 
require('connection.inc.php');
require('functions.inc.php');


$type = get_safe_value($con, $_POST['type']);

if($type=='email'){
	$email = get_safe_value($con, $_POST['email']);
	$check_user=mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email='$email'"));
	if($check_user>0){
		echo "email_present";
		die();
	}
	$otp = rand(1111, 9999);
	$_SESSION['EMAIL_OTP']=$otp;
	$html = "This is Current $otp"; 

	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="mamunjone@gmail.com";
	$mail->Password="qhxrzqevopjnzuhp";
	$mail->SetFrom("mamunjone@gmail.com");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject="Current One Time Password(OTP)";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "done";
	}else{
		//echo "Error occur";
	}
}


?>