# Barcode

## Usage

```php
<?php
$barcode = new Barcode('09780736430401');
```

If the check digit is included on the provided barcode, any leading zero digit must also be included. Likewise, if the leading zero is included, the check digit must also be provided. If the leading digit is not a zero, it should always be included.

Failure to adhere to these rules, may result in an invalid upc.

```
<?php

// All Digits
$barcode = new Barcode('020972426806');
echo $barcode->isValid(); // true

// Missing Check Digit
$barcode = new Barcode('20972426806');
echo $barcode->isValid(); // false

// Missing Leading Zero
$barcode = new Barcode('02097242680');
echo $barcode->isValid(); // true
```

### Methods

**isValid** - Determine if barcode is a valid format

```php
<?php
$barcode->isValid();
```

**getBarcode** - Get original barcode

```php
<?php
$barcode->getBarcode();
```

**getGTIN** - Get GTIN version of the barcode

```php
<?php
$barcode->getGtin(); // returns 14 digit barcode
$barcode->getGtin(true); // returns 13 digit barcode with checkdigit excluded
$barcode->getGtin(false, true); // returns barecode excluding leading zeros
$barcode->getGtin(true, true); // returns barecode excluding leading zeros and checkdigit
```
