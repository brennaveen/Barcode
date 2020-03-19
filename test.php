<?php

require_once('Barcode.php');

echo 'GIVE US A ROAR (BOOK) - 13' . PHP_EOL;
$barcode = new Barcode('09780736430401');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('9780736430401');     // 12
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo 'PUR GUM POMEGRANATE MINT - 11' . PHP_EOL;
$barcode = new Barcode('00830028000849');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('830028000849');     // 12
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('83002800084');      // 11
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo 'ROTISSERIE NAT CHKN/NO SEASONING (SCALE) - 11' . PHP_EOL;
$barcode = new Barcode('00205812006992');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('205812006992');     // 12
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('20581200000');      // 11
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo '3PC ROCKER SET - 10' . PHP_EOL;
$barcode = new Barcode('00020972426806');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('020972426806');     // 12
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('2097242680');       // 10
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo 'DOVE BAR SOAP - 10' . PHP_EOL;
$barcode = new Barcode('00011111076259');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('011111076259');     // 12
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('1111107625');      // 11
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo 'MT OLIVE PICKLES - 9' . PHP_EOL;
$barcode = new Barcode('00009300000864');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('009300000864');     // 12
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('0930000086');      // 10
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('930000086');      // 9
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo 'NIAGARA WATER - 6' . PHP_EOL;
$barcode = new Barcode('00027541000054');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('02754154');     // 8
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('275415');      // 6
echo $barcode->getBarcode() . "\t\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo 'UPC E EXAMPLE - 6' . PHP_EOL;
$barcode = new Barcode('00042100005464');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('04252614');     // 8
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('425261');      // 6
echo $barcode->getBarcode() . "\t\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo 'MESQUITE GRILL LOGS - 5' . PHP_EOL;
$barcode = new Barcode('00000000111500');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('11150');     // 8
echo $barcode->getBarcode() . "\t\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo 'BANANAS - 4' . PHP_EOL;

$barcode = new Barcode('00000000040110');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo 'BANANAS - 4 - Without Checkdigit or Leading Zeros' . PHP_EOL;
$barcode = new Barcode('4011');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin(true, true) . PHP_EOL;

echo PHP_EOL;

echo 'CANDY - 3' . PHP_EOL;
$barcode = new Barcode('00000000006190');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('619');     // 8
echo $barcode->getBarcode() . "\t\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo 'PLU - 3' . PHP_EOL;
$barcode = new Barcode('00000000000120');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('120');     // 8
echo $barcode->getBarcode() . "\t\t" . $barcode->getGtin() . PHP_EOL;

echo PHP_EOL;

echo 'PLU - 2.' . PHP_EOL;
$barcode = new Barcode('00000000000050');   // 14
echo $barcode->getBarcode() . "\t" . $barcode->getGtin() . PHP_EOL;
$barcode = new Barcode('5');     // 8
echo $barcode->getBarcode() . "\t\t" . $barcode->getGtin() . PHP_EOL;
