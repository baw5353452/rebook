﻿<?php
include_once('function.php');
$book_name=addslashes(trim($_POST['book_name']));
$author=addslashes(trim($_POST['author']));
$publisher=addslashes(trim($_POST['publisher']));
$version=addslashes(trim($_POST['version']));
$price=addslashes(trim($_POST['price']));
$book_desc=$_POST['book_desc'];
$zone=$_POST['zone'];
$send_type=$_POST['send_type'];
$add_time=time();
$user_id=$_COOKIE['user_id'];
$academy_id=0;
$major_id=0;
$class_id=0;
$grade=0;
$class_1=$_POST['class_1'];
if($class_1=="专业书籍"){
   $academy_name=$_POST['class_2'];
   $academy_id=getIdByName('academy',$academy_name);
   $major=$_POST['class_3'];
   $major_id=getIdByName('major',$major);
   $grade_name=$_POST['class_4'];
}elseif($class_1=="公共课"){
   $academy_name=$_POST['class_1'];
   $academy_id=getIdByName('academy',$academy_name);
   $major=$_POST['class_2'];
   $major_id=getIdByName('major',$major);
   $book_class=$_POST['class_3'];
   if($book_class!=""){
   		$class_id=getIdByName('class',$book_class); 
   }
}elseif($class_1=="考研"||$class_1=="其它"){
   $academy_name=$_POST['class_1'];
   $academy_id=getIdByName('academy',$academy_name);
   $major=$_POST['class_2'];
   $major_id=getIdByName('major',$major);
}
if($grade_name=="大一"){
       $grade=1;
}elseif($grade_name=="大二"){
       $grade=2;
}elseif($grade_name=="大三"){
       $grade=3;
}elseif($grade_name=="大四"){
       $grade=4;
}

$insert="insert into book(book_name,author,publisher,version,book_price,zone,send_type,book_desc,add_time,user_id,academy_id,major_id,class_id,grade) values('$book_name','$author','$publisher','$version',$price,'$zone','$send_type','$book_desc',$add_time,$user_id,$academy_id,$major_id,$class_id,$grade)";
if(mysql_query($insert)){
    $book_id=mysql_insert_id();
	if(!is_dir("images/book_images")){
		mkdir("images/book_images");
	}
	$file=$_FILES['book_image']; 						
	if(is_uploaded_file($file['tmp_name'])){
	    $str=substr($file['name'],-4,4);
		$path="images/book_images/".$book_id.$str;
	    move_uploaded_file($file['tmp_name'],$path);			
	}
	$update="update book set book_image='$path' where book_id=$book_id";
	mysql_query($update);
	$sell_num=getSellNumById($user_id)+1;
	$update="update user set sell_num=$sell_num where user_id=$user_id";
	mysql_query($update);
    echo "<script>alert('发布成功！');location.href='index.php'</script>";
}
else{
    echo "<script>alert('发布失败！');location.href='add_book.php'</script>";
}
?>