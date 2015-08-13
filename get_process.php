<?php
//cURL send function:POST DATA
	function send($url,$result){
	$ch = curl_init(); 
	curl_setopt($ch,CURLOPT_URL,$url); 
	curl_setopt($ch,CURLOPT_POSTFIELDS,"result=$result"); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
	$res = curl_exec($ch); 
	curl_close($ch); 
	return $res; 
	}


function fibonacci ($n)
{
  if ($n == 1 || $n == 2)
  {
    return 1;
  }
  else
  {
    return fibonacci( $n - 1)+fibonacci( $n - 2 );
  }
}
$un=$_POST['un'];
$pw=$_POST['pw'];
$red=$_POST['red'];
$fib=$_POST['fib'];

if($un == "mzs" && $pw == "mzs"){
$result_fib = fibonacci($fib);
	//send result to callback.php
	//send($red,$result_fib);
	echo $result_fib;
}
else{
	//send($red,0);
	echo 0;
}