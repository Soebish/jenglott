<?php
include "data.php";

$filel = "lokasi.txt";

ulangi:
echo "\n";
echo "\n";
echo color("grey","1. MEDAN");
echo "\n";
echo color("grey","2. JAKARTA");
echo "\n";
echo color("grey","3. BANDUNG");
echo "\n";
echo color("grey","4. SURABAYA");
echo "\n";
echo color("grey","5. BALI");
echo "\n";
echo "\n";
echo color("white","Pilih Lokasi (1-5) ? : ");
$lokasi = trim(fgets(STDIN));
echo "\n";
//echo "\n";

if ($lokasi == "1" ){
  $code = "Lokasi:1; Kota:MEDAN;";
  file_put_contents($filel, $code);
  echo color("green", "[✓] Lokasi Berhasil dipilih...!!");
  echo "\n";
  //$x= 'X-Location: 3.610'.rand(2500,3500).',98.63'.rand(60000,75000);
  //echo $x;
  echo "\n";
  echo "\n";
  die();
}else if ($lokasi == "2" ){
  $code = "Lokasi:2; Kota:JAKARTA;";
  file_put_contents($filel, $code);
  echo color("green", "[✓] Lokasi Berhasil dipilih...!!");
  echo "\n";
  //$x= 'X-Location: -6.1999'.rand(500,900).',106.84'.rand(30000,36000);
  //echo $x;
  echo "\n";
  echo "\n";
  die();
}else if ($lokasi == "3" ){
  $code = "Lokasi:3; Kota:BANDUNG;";
  file_put_contents($filel, $code);
  echo color("green", "[✓] Lokasi Berhasil dipilih...!!");
  echo "\n";
  //$x= 'X-Location: -6.913'.rand(4000,6500).',107.617'.rand(5000,8000);
  //echo $x;
  echo "\n";
  echo "\n";
  die();
}else if ($lokasi == "4" ){
  $code = "Lokasi:4; Kota:SURABAYA;";
  file_put_contents($filel, $code);
  echo color("green", "[✓] Lokasi Berhasil dipilih...!!");
  echo "\n";
  //$x= 'X-Location: -7.2600'.rand(100,999).',112.744'.rand(1000,55000);
  //echo $x;
  echo "\n";
  echo "\n";
  die();
}else if ($lokasi == "5" ){
  $code = "Lokasi:5; Kota:BALI;";
  file_put_contents($filel, $code);
  echo color("green", "[✓] Lokasi Berhasil dipilih...!!");
  echo "\n";
  //$x= 'X-Location: -8.12'.rand(30000,45000).',115.11'.rand(10000,25000);
  //echo $x;
  echo "\n";
  echo "\n";
  die();
}else{
echo color("red","Pilih 1 atau 5 aja, jgn yang lain njirrr..!");
echo "\n";
goto ulangi;
}

?>
