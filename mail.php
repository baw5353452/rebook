<?php
require("class.phpmailer.php"); //下载的文件必须放在该文件所在目录
$mail = new PHPMailer(); //建立邮件发送类
$address =$email;
$mail->IsSMTP(); // 使用SMTP方式发送
$mail->Host = "smtp.163.com"; // 您的企业邮局域名
$mail->SMTPAuth = true; // 启用SMTP验证功能
$mail->Username = "huaxiazhicaiwang@163.com"; // 邮局用户名(请填写完整的email地址)
$mail->Password = "hxzcw123456"; // 邮局密码
$mail->Port=25;
$mail->From = "huaxiazhicaiwang@163.com"; //邮件发送者email地址
$mail->FromName = "baw";
$mail->AddAddress("$address");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
//$mail->AddReplyTo("", "");

//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
//$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
$mail->CharSet = "utf-8"; // 这里指定字符集
$mail->Subject = "交大二手书交易平台激活邮件"; //邮件标题
$mail->Body = "点击链接激活账号: http://ree-go.com/activate.php?".md5('email')."=".md5($email); //邮件内容

if(!$mail->Send())
{
echo "邮件发送失败. <p>";
echo "错误原因: " . $mail->ErrorInfo;
exit;
}

//echo "邮件发送成功";
?>