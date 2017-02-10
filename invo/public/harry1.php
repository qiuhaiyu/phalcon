<?php

header('Content-type:text/html;charset=gb2312');



$url = 'http://money.finance.sina.com.cn/mac/api/jsonp.php/SINAREMOTECALLCALLBACK1484181837257/MacPage_Service.get_pagedata?cate=nation&event=0&from=0&num=64&condition=&_=1484181837257';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_TIMEOUT, 10);  //10秒超时
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($curl);
curl_close($curl);
$num = strpos($data,'{config');

$res = substr($data,$num);
$res = trim($res,'(())');//var_dump($res);exit;
//$res = json_decode($res,true);

$a = array('a'=>array(1,2,3,4),'b'=>array('y'=>'y1','x'=>'x1'));
var_dump(json_encode($a));

?>

