<?php
        // echo($charge['status']);  
    function checkpaying($token, $total) {
      if(isset($token)){
          // echo "{$_POST['omiseToken']}";
    $public_key = 'pkey_test_5x5y20p7x8ck664erv7';
    $secret_key = 'skey_test_5x5y21pgtcsuiqiwj0x';
    include(app_path().'\OmiseFunc\omise-php\lib\Omise.php');

    define('OMISE_API_VERSION', '2015-11-17');
    define('OMISE_PUBLIC_KEY', $public_key);
    define('OMISE_SECRET_KEY', $secret_key);

    $charge = OmiseCharge::create(array(
    'amount' => $total."00",
    'currency' => 'thb',
    'card' => $token
    ));
    }
    echo "Test";
    }
    $token = $_POST['omiseToken'];
    $money = $total;
    checkpaying($token, $money); 
?>
