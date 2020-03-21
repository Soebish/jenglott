<?php
date_default_timezone_set('Asia/Jakarta');
include "data.php";

$filel2 = "lokasi.txt";
$blokasi2 = file_get_contents($filel2);
$clokasi2 = fetch_value($blokasi2, 'Kota:', ';');

$filename = "readme/data.ini";
$urlvoucher = "http://www.hj-travels.com/data/files/v3.html";
$isiv = file_get_contents($urlvoucher);
$codevoucher = fetch_value($isiv, 'food1:', ';');
$codevoucher2 = fetch_value($isiv, 'food2:', ';');
$codevoucher3 = fetch_value($isiv, 'food3:', ';');
$ridev = fetch_value($isiv, 'ride:', ';');
$carv = fetch_value($isiv, 'car:', ';');
 
if (file_exists($filename)){
    
   if (preg_match("/food1:/i", $isiv)) {

echo "\n";
echo "\n";

echo color("purple","
𝐏𝐫𝐨𝐝𝐮𝐜𝐭  : ﾌ乇几Ꮆㄥㄖㄒ
𝐕𝐞𝐫𝐬𝐢𝐨𝐧  : ㄥ丨爪丨ㄒ乇ᗪ
𝐅𝐮𝐧𝐜𝐭𝐢𝐨𝐧 : 丨几ﾌ乇匚ㄒ ᐯㄖㄩ匚卄乇尺
  ___            _                     
 / __| ___  ___ | |__                  
 \__ \/ _ \/ -_)| '_ \                 
 |___/\___/\___||_.__/                 
  _   _                         _    _ 
 | | | | ___ _  _  _ __   __ _ | |__(_)
 | |_| ||_ /| || || '  \ / _` || / /| |
  \___/ /__| \_,_||_|_|_|\__,_||_\_\|_|
                                         
    𝐂𝐨𝐩𝐲𝐫𝐢𝐠𝐡𝐭©𝟐𝟎𝟐𝟎 𝐀𝐥𝐥 𝐑𝐢𝐠𝐡𝐭 𝐑𝐞𝐬𝐞𝐫𝐯𝐞𝐝
  
\n");

echo "\n";
echo "\n";
	   

// function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("white","[📲] Masukkan Nomor HP : ");
        // $no = trim(fgets(STDIN));
        $nohp = trim(fgets(STDIN));
        $nohp = str_replace("62","62",$nohp);
        $nohp = str_replace("(","",$nohp);
        $nohp = str_replace(")","",$nohp);
        $nohp = str_replace("-","",$nohp);
        $nohp = str_replace(" ","",$nohp);

        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            if (substr(trim($nohp),0,3)=='62') {
                $hp = trim($nohp);
            }
            else if (substr(trim($nohp),0,1)=='0') {
                $hp = '62'.substr(trim($nohp),1);
        }
         elseif(substr(trim($nohp), 0, 2)=='62'){
            $hp = '6'.substr(trim($nohp), 1);
        }
        else{
            $hp = '1'.substr(trim($nohp),0,13);
        }
    }
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$hp.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("purple","[✔️] Kode OTP sudah di kirim")."\n";
        otp:
	echo "\n";
        echo color("white","[💬] Masukkan Kode OTP : ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo "\n";
	echo color("purple","[✔️] Berhasil Registrasi Akun\n");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo color("purple","[+] Token : ".$token."\n\n");
        save("token.txt",$token);
	echo color("grey","Lokasi : ".$clokasi2);
        //echo "\n";
        echo color("white","\n■■■■■■■■■■■■■■( INJECT VOUCHER )■■■■■■■■■■■■■■");
	echo "\n";
	echo "\n";
	sleep(1);
	echo "Time:".date('[d-m-Y] [H:i:s]');
	echo "\n";
        echo color("white","[!] Coba Masukkan Voucher 1");
        echo "\n".color("white","[⏳] Tunggu dulu");
        for($a=1;$a<=7;$a++){
        echo color("white",".");
        sleep(3);
        }
	sleep(1);
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"'.$codevoucher.'"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        	echo "\n".color("purple","[✔️] Berhasil Bray : ".$message);
       		goto lanjut;
        }else{
        echo "\n".color("red","×] Gagal Bray : ".$message);
	echo "\n";
	echo "\n";
		
	lanjut:
	echo "Time:".date('[d-m-Y] [H:i:s]');
		echo "\n";
	echo color("white","[!] Coba Masukkan Voucher 2");
        echo "\n".color("white","[⏳] Tunggu dulu");
        for($a=1;$a<=7;$a++){
        echo color("white",".");
        sleep(8);
        }
        sleep(1);
        $boba10 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"'.$codevoucher2.'"}');
        $messageboba10 = fetch_value($boba10,'"message":"','"');
        if(strpos($boba10, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("purple","[✔️] Berhasil Bray : ".$messageboba10);
        goto cekk;
        }else{
        echo "\n".color("red","[×] Gagal Bray : ".$messageboba10);
	echo "\n";
	echo "\n";
		
		
	echo "Time:".date('[d-m-Y] [H:i:s]');
	echo "\n";
        echo color("white","[!] Coba Masukkan Voucher 3");
        echo "\n".color("white","[⏳] Tunggu dulu");
        for($a=1;$a<=7;$a++){
        echo color("white",".");
        sleep(5);
        }
        sleep(1);
        $boba19 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"'.$codevoucher2.'"}');
        $messageboba19 = fetch_value($boba19,'"message":"','"');
        if(strpos($boba19, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("purple","[✔️] Berhasil Bray : ".$messageboba19);
        goto cekk;
        }else{
        echo "\n".color("red","[×] Gagal Bray : ".$messageboba19);
        
	echo "\n";
	echo "\n";
	 
	
	echo "Time:".date('[d-m-Y] [H:i:s]');
	echo "\n";
        //echo color("yellow","[!] Peluang terakhir Injek Voucher.....!!");
        //echo "\n";
        echo color("white","[!] Coba Masukkan Voucher 4");
        echo "\n".color("yellow","[⏳] Yang ini Tunggu 5 Menit");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(1);
        }
        sleep(30);
	sleep(30);	
	sleep(30);
	sleep(30);
	sleep(30);
	sleep(30);
	sleep(30);
	sleep(30);
	sleep(30);
	sleep(30);
        $goride = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"'.$codevoucher2.'"}');
        $message1 = fetch_value($goride,'"message":"','"');
	      if(strpos($goride, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("purple","[✔️] Berhasil Bray : ".$message1);
      	}else{
        echo "\n".color("red","[×] Gagal Bray : ".$message1);
      	}
        sleep(2);
      	echo "\n";
        
        cekk:	
	      echo "\n";	
	      echo "\n";
	      echo color("white","[!] Coba Masukkan Voucher Lain 1");
              echo "\n".color("white","[⏳] Tunggu dulu");
	      	for($a=1;$a<=7;$a++){
                echo color("white",".");
                sleep(3);
                }
              $code2 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"'.$codevoucher3.'"}');
              $message2 = fetch_value($code2,'"message":"','"');
              if(strpos($code2, 'Promo kamu sudah bisa dipakai.')){
        	echo "\n".color("purple","[✔️] Berhasil Bray : ".$message2);
      	      }else{
        	echo "\n".color("red","[×] Gagal Bray : ".$message2);
		//$carv = $ridev;
      	      }
			  
              echo "\n";	
	            echo "\n";
              echo color("white","[!] Coba Masukkan Voucher Lain 2");
              echo "\n".color("white","[⏳] Tunggu dulu");
	      	for($a=1;$a<=7;$a++){
                echo color("white",".");
                sleep(2);
                }
              $code2 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"'.$ridev.'"}');
              $message2 = fetch_value($code2,'"message":"','"');
              if(strpos($code2, 'Promo kamu sudah bisa dipakai.')){
        	echo "\n".color("purple","[✔️] Berhasil Bray : ".$message2);
      	      }else{
        	echo "\n".color("red","[×] Gagal Bray : ".$message2);
      	      }
	      
		    echo "\n";	
	      echo "\n";
	      echo color("white","[!] Coba Masukkan Voucher Lain 3");
              echo "\n".color("white","[⏳] Tunggu dulu");
	      	for($a=1;$a<=7;$a++){
                echo color("white",".");
                sleep(2);
                }
              $code2 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"'.$carv.'"}');
              $message2 = fetch_value($code2,'"message":"','"');
              if(strpos($code2, 'Promo kamu sudah bisa dipakai.')){
        	echo "\n".color("purple","[✔️] Berhasil Bray : ".$message2);
      	      }else{
        	echo "\n".color("red","[×] Gagal Bray : ".$message2);
      	      }
	   

	    echo "\n";
	    echo "\n";
		
		sleep(3);
	
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
		$voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
        $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
        $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
		
		
	    $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
        $expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
		$expired8 = getStr1('"expiry_date":"','"',$cekvoucher,'8');
		$expired9 = getStr1('"expiry_date":"','"',$cekvoucher,'9');
		$expired10 = getStr1('"expiry_date":"','"',$cekvoucher,'10');
		
        echo "\n".color("white","[🎫] Total voucher ada ".$total." : ");
	echo "\n";
	echo "\n";
        echo color("purple","1. ".$voucher1);
echo "\n";
	echo color("white"," EXP ~> ".$expired1);
	echo "\n";	
        echo "\n".color("purple","2. ".$voucher2);
echo "\n";
	echo color("white"," EXP ~> ".$expired2);
	echo "\n";
        echo "\n".color("purple","3. ".$voucher3);
echo "\n";
	echo color("white"," EXP ~> ".$expired3);
	echo "\n";
        echo "\n".color("purple","4. ".$voucher4);
echo "\n";
	echo color("white"," EXP ~> ".$expired4);
	echo "\n";
        echo "\n".color("purple","5. ".$voucher5);
echo "\n";
	echo color("white"," EXP ~> ".$expired5);
	echo "\n";
        echo "\n".color("purple","6. ".$voucher6);
echo "\n";
	echo color("white"," EXP ~> ".$expired6);
	echo "\n";
        echo "\n".color("purple","7. ".$voucher7);
echo "\n";
	echo color("white"," EXP ~> ".$expired7);
	echo "\n";
		echo "\n".color("purple","8. ".$voucher8);
echo "\n";
	echo color("white"," EXP ~> ".$expired8);
	echo "\n";
		echo "\n".color("purple","9. ".$voucher9);
echo "\n";
	echo color("white"," EXP ~> ".$expired9);
	echo "\n";
		echo "\n".color("purple","10. ".$voucher10);
echo "\n";
	echo color("white"," EXP ~> ".$expired10);
	echo "\n";
        echo"\n";
        
                
         //echo "\n";
		 //echo "\n";
	 sleep(1);
	 echo color("white","\n■■■■■■■■■■■■■■( SET PIN )■■■■■■■■■■■■■■");
	 echo "\n";
         setpin:	 
	 echo "\n";
         echo color("white","[?] Mau Buat PIN Bray ? (y/n) : ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         echo "\n";
	 //echo "\n";
	 //echo color("nevy","[?] Masukkan PIN : "); 
	 //$nopin = trim(fgets(STDIN));
	 kirimotp:
         $pin = '{"pin":"112233"}';
	 //echo "\n";
         $getotpsetpin = request("/wallet/pin", $token, $pin);
	 //$getotpsetpin = request("/wallet/pin", $pin,"POST",$token,$uuid);
	 echo color("purple","[✔️] Kode OTP PIN sudah di kirim")."\n";
		 
	 setotp:
         echo color("white","[💬] Masukkan Kode OTP PIN : ");
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $pin, null, $otpsetpin, $uuid);
	 //$verifotpsetpin = request("/wallet/pin", $pin,"POST",$token,$uuid,"",$otpsetpin);
	 //$pesanpin = get_between($verifotpsetpin,'{"success":',',"');
	 //if (strpos($verifotpsetpin, 'OTP kamu tidak berlaku.')){\
	 if (preg_match("/OTP tidak berlaku/i", $verifotpsetpin)) {
                echo "\n";
		echo color("red","[×] OTP PIN Salah Njirr...!!");
		echo "\n";
		echo "\n";
		echo color("white","[?] Mau Kirim Ulang Kode OTP PIN ? (y/n) : ");
         	$pilih2 = trim(fgets(STDIN));
		echo "\n";
		//echo "\n";
        	if($pilih2 == "y" || $pilih2 == "Y"){ 
		     goto kirimotp;		
		//echo $verifotpsetpin;
		//echo "\n";
		}else{
		     //echo "\n";
		     goto setotp; 
		}
	 }else{		 
		echo "\n";
		echo color("white","[✔️] Berhasil Buat PIN....!!");
	 	echo "\n";
    echo "\n";
		echo color("purple","[!] PIN ANDA : 112233");
	 	echo "\n";
	 	echo "\n";
		echo color("white","■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■");
		//echo $verifotpsetpin;
		echo "\n";
		echo "\n";
		echo "\n";
		
	 }	 
         }else if($pilih1 == "n" || $pilih1 == "N"){
		 echo "\n";
		 echo color("white","■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■");
		 echo "\n";
	 	 echo "\n";
         die();
         }else{
         echo color("red","[×] GAGAL Njirr...!!!\n");
	 echo "\n";
         goto setpin;
	 }	 
	 }
	 }
         }
         }else{
            echo color("red","[×] Kode OTP yang dimasukkan salah Njirr !!");
            echo "\n";
	    echo "\n";
            echo color("white","[?] Mau Kirim Ulang Kode OTP ? (y/n) : ");
            $pilih3 = trim(fgets(STDIN));
	    //echo "\n";
        	if($pilih3 == "y" || $pilih3 == "Y"){ 
		  echo "\n"; 
		  goto ulang;
		}else{
		  //echo"\n";
  	          goto otp;
		}
            }
         }else{
         echo color("red","[×] Nomor sudah teregistrasi");
         echo"\n";
         echo color("white","[!] Silahkan registrasi kembali\n");
	 echo"\n";
         goto ulang;
         }
//  }
	   
} else {
	   
    echo"\n";
    echo"\n";
    echo color("red","■■■■■■■■■■■■■■■■■■■■■■■■■■\n");
    echo color("red","■   SERVER SEDANG DOWN   ■\n");
    echo color("red","■■■■■■■■■■■■■■■■■■■■■■■■■■\n");
    echo"\n";
    echo"\n";   
	   
  }

} else {
    echo"\n";
    echo"\n";
    echo color("red","■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■\n");
    echo color("red","■ PERANGKAT ANDA BELUM TERDAFTAR ■\n");
    echo color("red","■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■\n");
    echo"\n";
    echo"\n";
}

?>
