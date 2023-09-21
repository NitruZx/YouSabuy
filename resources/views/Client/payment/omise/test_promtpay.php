<?php session_start();
$public_key = 'pkey_test_5x5y20p7x8ck664erv7';
$secret_key = 'skey_test_5x5y21pgtcsuiqiwj0x';
if(!empty($_REQUEST['soure'])){    
//echo $_SESSION['charge_id'].'<br>';
     $url = 'https://api.omise.co/charges';
    //$url = 'https://api.omise.co/sources/'.$_REQUEST['soure'];
    require_once dirname(__FILE__) . '/omise-php/lib/Omise.php';
    define('OMISE_API_VERSION', '2019-05-29');
    define('OMISE_PUBLIC_KEY',$public_key);
    define('OMISE_SECRET_KEY', $secret_key);

    $event = OmiseCharge::retrieve($_SESSION['charge_id']);
    
   // var_dump($event);exit();
    if($event["source"]["charge_status"] == 'successful'){
         header( "location: ".$event['authorize_uri']);
         exit(0);
    }else{
         $img_qr = $event['source']['scannable_code']["image"]["download_uri"];
        $aa = $event['return_uri'];
        echo "<img src='".$img_qr."' style='width:600px;height:600px;' ><br><a href='./index.html' >กลับหน้าหลัก</a>";
        exit(0);
    }
   //$url = 'https://api.omise.co/events/'.$_REQUEST['chg'];
    
}else{
if(!empty($_REQUEST['omiseToken'])){
    $key_token = $_REQUEST['omiseToken'];
    $url = 'https://api.omise.co/charges';
    $type_omise = 1;
}else if(!empty($_REQUEST['omiseSource'])){
    $key_token = $_REQUEST['omiseSource'];
    $url = 'https://api.omise.co/sources/'.$key_token;
    $type_omise = 2;
}
require_once dirname(__FILE__) . '/omise-php/lib/Omise.php';
define('OMISE_API_VERSION', '2019-05-29');
define('OMISE_PUBLIC_KEY', $public_key);
define('OMISE_SECRET_KEY', $secret_key);
if(!empty($type_omise)){
        switch ($type_omise){ //Card
            case(1):
                 $charge = \OmiseCharge::create(array(
                                'amount' => 40000,
                                'currency' => 'THB',
                                'card' => $key_token,
                                'description' => 'ทดสอบ',

                    ));
            break;
            case(2): //PromtPay
                    /* เรียกใช้ Source API กับ Charge API เหมาะกับใช้ Payment type (รูปแบบชำระอื่นๆ) */
                     $source = \OmiseSource::create(array(
                                                           'amount' => 40000,
                                                           'currency' => 'THB',
                                                           'type' => 'promptpay'

                                               ));
                          //   var_dump($source);exit();              
                  /* เรียกใช้ Source API*/
                   $charge2 = \OmiseCharge::create(array(
                                                           'amount' => 40000,
                                                           'currency' => 'THB',
                                                           'return_uri' =>'http://localhost/omise-test/test_promtpay.php?soure='.$source['id'],
                                                           'source' => $source['id'],

                                               ));
                     $_SESSION['charge_id'] = $charge2['id'];
                    // var_dump($charge2['source']['scannable_code']['image']['download_uri']);exit();
                     $img_qr = $charge2['source']['scannable_code']['image']['download_uri'];
                   if($charge2['status'] == 'successful'){
                                   echo "<img src='".$img_qr."'  >";
                   }else if($charge2['status'] == 'pending'){
                             echo "<img src='".$img_qr."'  >";
                           header( "location: ".$charge2['authorize_uri'] );
                            exit(0);
                   }

            break;
        }
}
}
//echo $_REQUEST['soure'];exit();
?>