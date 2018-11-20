<?php
    require_once('../phpmailer/class.phpmailer.php');
	
    $mail= new PHPMailer();                             //建立新物件                  
    $mail->IsSMTP();                                    //設定使用SMTP方式寄信
    $mail->SMTPAuth = true;                        //設定SMTP需要驗證
    $mail->SMTPSecure = "ssl";                    // Gmail的SMTP主機需要使用SSL連線
    $mail->Host = "smtp.gmail.com";             //Gamil的SMTP主機
    $mail->Port = 465;                                 //Gamil的SMTP主機的埠號(Gmail為465)。
    $mail->CharSet = "utf-8";                       //郵件編碼
    $mail->Username = "107503cztkj@gmail.com";       //Gamil帳號
    $mail->Password = "hipHop107503";                 //Gmail密碼
    $mail->From = "yixunaiiii";        //寄件者信箱
    $mail->FromName = "益尋愛";                  //寄件者姓名
   
    
?>