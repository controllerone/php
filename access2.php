<?php
require("./weixin_oop_api.php");

$wx = new weixinApi();
$xx_url = "http://1.yzc10.applinzi.com/access2.php";
$result = $wx->snsapi_userinfo($xx_url);
print_r($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<style>
*{ padding: 0; margin: 0; list-style: none;}
img{ width: 100px; display: block; margin:  0 auto;}
span{ display: block; width: 100%; text-align: center;}
</style>
<body>
	<img src=<?php echo $result["headimgurl"]; ?>>
	<span><?php echo $result["nickname"]; ?></span>
    <span>你的性别：<?php 
	if($result["sex"]==1){echo '男';}else{echo '女';	};?></span>
    <span>你的地区：<?php echo $result["country"]; ?></span>
    
</body>
</html>