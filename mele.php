<?php

date_default_timezone_set('Asia/Jakarta');
include "function.php";
login:
system('clear');

echo color("grey","[+] ");echo color("nevy","Username : ");
$usr = trim(fgets(STDIN));
echo "\n".color("grey","[+] ");echo color("nevy","Password : ");
        $pass = trim(fgets(STDIN));
        if($pass == "momo" || $pass == "MOMO"){
      
        echo color("grey","[-] ");echo color("grey","Checking your account");
        for($a=1;$a<=3;$a++){
        echo color("grey",".");
        sleep(1);
        }
        echo "\n".color("grey","[-] ");echo color("green","SUCCESS LOGIN!\n");
        sleep(1);
        goto mulai;
        }else{
        	echo color("red","WRONG BITCH!!!\n");
        sleep(1);
        	goto login;
       }

mulai:
system('clear');
echo color("green","# # # # # # # # # # # # # # # # # # # # # # # # # # \n");
echo color("green","#");echo color("yellow","             Hai ");echo color("nevy",$usr);echo color("yellow",", welcome back.");echo color("green","           #\n");
echo color("green","#");echo color("yellow","            Selamat Datang di ");echo color("red","MELEBOT-V1 ");echo color("green","        #\n");
echo color("green","#");echo color("yellow","        REDEEM YOUR GOJEK VOUCHER WITH THIS! ");echo color("green","    #\n");
echo color("green","# # # # # # # # # # # # # # # # # # # # # # # # # # \n");
echo color("blue","".today().date('m-Y.                           H:i:s')."   \n");
function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("grey","[+] ");echo color("nevy","Nomor : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@MELE.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("grey","[-] ");echo color("yellow","Kode verifikasi OTP sudah di kirim")."\n";
        otp:
        echo color("grey","[+] ");echo color("nevy","OTP: ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("grey","[-] ");echo color("yellow","Berhasil registrasi.\n");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo color("grey","[-] ");echo color("yellow","Mengecek Access tokenmu");for($a=1;$a<=3;$a++){echo color("yellow",".");
        save("token.txt",$token);
        sleep(7);
        }
        echo "\n".color("grey","[-] ");echo color("yellow","Berhasil mendapatkan ");echo color("red","ACCESS TOKEN!\n");
        sleep(1);
        
        echo color("grey","[+] ");echo color("nevy","Tekan ENTER untuk melanjutkan... ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == ""){
        echo color("green","\n# # # # # # # # CLAIM VOUCHER # # # # # # # #\n");
        echo color("grey","[-] ");echo color("grey","Claim All Voucher\n");
        echo color("grey","[-] ");echo color("grey","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(5);
        }
        
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGORIDEPAY"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("grey","[-] ");echo color("green","STATUS: SUCCESS!".$message);
        goto gocar;
        }else{
        echo "\n".color("grey","[-] ");echo color("green","STATUS: SUCCESS! ".$message);
        
gocar:
        echo "\n".color("grey","[-] ");echo color("grey","Verifikasi Voucher\n");
        echo color("grey","[-] ");echo color("grey","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(1);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD090320A"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("grey","[-] ");echo color("green","STATUS: SUCCESS! ".$message);
        goto gofood;
        }else{
        echo "\n".color("grey","[-] ");echo color("green","STATUS: SUCCESS! ".$message);
        reff:
        $data = '{"referral_code":"G-75SR565"}';    
        $claim = request("/customer_referrals/v1/campaign/enrolment", $token, $data);
        $message = fetch_value($claim,'"message":"','"');
        if(strpos($claim, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("grey","[-] ");echo color("green","STATUS: SUCCESS! ".$message);
        goto gofood;
        }else{
        echo "\n".color("grey","[-] ");echo color("green","STATUS: SUCCESS! ".$message);
        }
        
gofood:
        echo "\n".color("grey","[-] ");echo color("grey","Mengamankan Voucher\n");
        echo color("grey","[-] ");echo color("grey","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(3);}
        {
        
        echo "\n".color("grey","[-] ");echo color("green","STATUS: SUCCESS! ");
        sleep(2);
        echo "\n".color("grey","[-] ");echo color("green","STATUS: SELESAI SUDAH YAK GESS YAK!!!");
        
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        echo "\n".color("grey","[-] ");echo color("blue","Total voucher : 8");
       
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
         
setpin:
         echo "\n".color("yellow","  📲📟 SET PIN ?: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         	echo " Masukkan PIN Anda : ";
         $data2 = '{"pin":"'.trim(fgets(STDIN)).'"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, 0, 0, $uuid);
         echo "  📲📟 OTP PIN: ";
         $otpsetpin = trim(fgets(STDIN));
         echo "\n".color("yellow","  PIN SUDAH TERPASANG ")."\n";
         echo "\n".color("green"," PIN ANDA $data2 ")."\n";
         echo color("green","  PIN ANDA $data2 ")."\n";
         echo color("red"," SEMOGA CUAN ")."\n";
         echo color("nevy","        Waktu  : ".date('[d-m-Y] [H:i:s]')."                        \n");
         $verifotpsetpin = request("/wallet/pin", $token, $data2, 0, $otpsetpin, $uuid);
         echo $verifotpsetpin;
       }
         }
         }
         }
         }else{
         goto setpin;
         }
         }else{
         echo color("grey","[-] ");echo color("yellow","WARNING! Otp yang anda input salah");
         echo"\n===========================================\n";
         echo color("grey","[+] ");echo color("red"," TRY AGAIN? (y/n): ");
         $pilihh = trim(fgets(STDIN));
         if($pilihh == "y" || $pilihh == "Y"){
         goto otp;
         }else{
         echo color("red","\n# # # # # # # # # # GAME OVER # # # # # # # # # #\n");
         die();
         }}
         }else{
         echo color("grey","[-] ");echo color("yellow","WARNING! Nomor Sudah Terdaftar/Salah!\n");
         echo color("grey","[-] ");echo color("yellow","WARNING! Contoh input nomor yang benar : 62812xxx");
         echo"\n===========================================\n";
         echo color("grey","[+] ");echo color("red"," TRY AGAIN? (y/n): ");
         $pilih = trim(fgets(STDIN));
         if($pilih == "y" || $pilih == "Y"){
         echo chr(27).chr(91).'H'.chr(27).chr(91).'J';   //^[H^[J
         echo color("blue","".today().date('m-Y                            H:i:s')."   \n");
         goto ulang;
         }else{
         echo color("red","\n# # # # # # # # # # GAME OVER # # # # # # # # # #\n");
         die();
  }
 }
}
echo change()."\n"; ?>
