<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SendMailController extends Controller
{
	public function SendMailController()
	{
		$user = User::all();

		$now = getdate(); 
		$currentDate = $now["year"]."-".$now["mon"] ."-".$now["mday"];
		$b =  strtotime($currentDate);
		
		//echo $today = date("Y-m-d").'<br>';
		//echo $another_date = "2017-04-02".'<br>';
		//echo $d = strtotime($today = date("Y-m-d")).'<br>';
		// Please specify your Mail Server - Example: mail.example.com.
		ini_set("SMTP","mail.example.com");
		ini_set("smtp_port","25");
		ini_set('sendmail_from', 'example@YourDomain.com');
		foreach($user as $key=>$value){
			echo $email = $value['email'];
			echo $name = $value['full_name'];
			
			$ns = $value['birthday'];
			$t = strtotime($ns);
			if($t == $b)
			{
				

				$subject = 'Candy Shop';

				$headers = "From: chubinh996@gmail.com" . "\r\n";
				//$headers = "From: " . $email . "\r\n";
				$headers .= "Reply-To: ". $email . "\r\n";
				$headers .= "CC: test@gmail.com";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

				$message = nl2br("Chào ".$name.", \nCửa hàng chúng tôi được biết hôm nay là ngày sinh nhật của bạn. \nNên chúng tôi gửi tin nhắn này tới bạn để chúc mừng sinh nhật bạn ! \nCũng như thông báo cho bạn biết cửa hàng sẽ giảm giá 30% tất cả các loại bánh cho bạn vào ngày hôm nay . \nChúc bạn một ngày sinh nhật ý nghĩa !!! "
			);

				mail($email, $subject, $message, $headers);
			}
		}



	}
}