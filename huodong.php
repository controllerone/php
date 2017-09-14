<?php 

$appid="wxd4218bd4c85ec1fa";
$appsecret="990d7a3e2d9ecc91e2449df17eaeb679";
$redirect_uri="http://1.yzc10.applinzi.com/huodong.php";


$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";

if(!$_GET){

	header('localtion:'.$url);
}
$code=$_GET["code"];


$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$appsecret}&code={$code}&grant_type=authorization_code";

$arr=https_request($url);


$access_token=$arr['access_token'];
$openid=$arr['openid'];

$url="https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN";

$userInfo=https_request($url);
var_dump($userInfo);

 function https_request($url,$data=""){

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
if($data){

curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

}

$request=curl_exec($ch);
$tmpArr=json_decode($request,TRUE);
if(is_array($tmpArr)){

return $tmpArr;

}else{
return $request;

}
curl_close($ch);




}



 ?>


