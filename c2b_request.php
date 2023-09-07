<?php
    $generated_hash = "";
    $fields = array();

    // This function will return a random
    // string of specified length
    function random_strings($length_of_string)
    {

        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shuffle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result),
                        0, $length_of_string);
    }

    

    if (isset($_POST['pay_btn'])) {
        // $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $amount = explode(" ", $_POST['amount']);

        

        $fields = array(
            "live"=> "1",
            "oid"=> random_strings(6),
            "inv"=> "123456789",
            "ttl"=> $amount[1],
            "tel"=> $phone_number,
            "eml"=> $email,
            "vid"=> "demo",
            "curr"=> $amount[0],
            "p1"=> '',
            "p2"=> "",
            "p3"=> "",
            "p4"=> "",                        
            "cbk"=> "http://example.com",     
            "cst"=> "1",
            "crl"=> "2"           
                     

        );
        $datastring =  $fields['live'].$fields['oid'].$fields['inv'].$fields['ttl'].$fields['tel'].$fields['eml'].$fields['vid'].$fields['curr'].$fields['p1'].$fields['p2'].$fields['p3'].$fields['p4'].$fields['cbk'].$fields['cst'].$fields['crl'];
        $hashkey ="demoCHANGED";//use "demoCHANGED" for testing where vid is set to "demo"
        $generated_hash = hash_hmac('sha1',$datastring , $hashkey);

        header("Location:https://payments.ipayafrica.com/v3/ke?live={$fields['live']}&oid={$fields['oid']}&inv={$fields['inv']}&ttl={$fields['ttl']}&tel={$fields['tel']}&eml={$fields['eml']}&vid={$fields['vid']}&curr={$fields['curr']}&p1={$fields['p1']}&p2={$fields['p2']}&p3={$fields['p3']}&p4={$fields['p4']}&cbk={$fields['cbk']}&cst={$fields['cst']}&crl={$fields['crl']}&hsh={$generated_hash}");
        //https://payments.elipa.co.ug/v3/ug
        //https://payments.ipayafrica.com/v3/ke
    }

    

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="" method="POST">
        <!-- <input type="text" name="name" placeholder="Name"><br/> -->
        <input type="text" name="phone_number" placeholder="Phone"><br/>
        <input type="text" name="email" placeholder="email"><br/>
        <select name="amount">
            <option value="KES 1">KES 1</option>
            <option value="USD 1">USD 1</option>            
        </select>
                
        
        <button type="submit" name="pay_btn">Pay now</button>
    </form>

</body>
</html>