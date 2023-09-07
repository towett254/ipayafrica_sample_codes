<?php 


$amount = '';
$phone = '0790330331';
$email = 'test@gmail.com'; 
$hashkey = 'demo';
$vid = 'demoCHANGED';

$order_id = 'FKJEEJEDJD';

$fields = array(
    "live"=> '0',  /// 0 is for test environment and 1 is for live environment
    "oid"=> '1fhhjjhhjdkdfk',
    "inv"=> '4sjslkklklksjdjsds',
    "vid"=> $vid,
    "curr"=> 'KES',
    "ttl"=> $amount,
    "tel"=> $phone,
    "eml"=> $email,
    "p1"=> $order_id,
    "p2"=> '', 
    "p3"=>'', 
    "p4"=> "",
    "cbk"=>  'https://yoursampledomain.com',
    "autopay"=> "1",
    "cst" => "1",
    "crl" => "2"

);

/* generating a hash */
$dataString =  $fields['live'].$fields['oid'].$fields['inv'].$fields['ttl'].$fields['tel'].$fields['eml'].$fields['vid'].$fields['curr'].$fields['p1'].$fields['p2'].$fields['p3'].$fields['p4'].$fields['cbk'].$fields['cst'].$fields['crl'];

$generated_hash = hash_hmac('sha1',$dataString , $hashkey);



 $url = "https://payments.ipayafrica.com/v3/ke?autopay=1&live={$fields['live']}&oid={$fields['oid']}&inv={$fields['inv']}&ttl={$fields['ttl']}&tel={$fields['tel']}&eml={$fields['eml']}&vid={$fields['vid']}&curr={$fields['curr']}&p1={$fields['p1']}&p2={$fields['p2']}&p3={$fields['p3']}&p4={$fields['p4']}&cbk={$fields['cbk']}&cst={$fields['cst']}&crl={$fields['crl']}&hsh={$generated_hash}";


$URL= $url; /// base_url('index.php/generatemyapikey');
echo "<script
type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

// die();

return $url;