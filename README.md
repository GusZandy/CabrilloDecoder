# CabrilloDecoder
Decode File Cabrillo to array PHP.

## Installation
To install this package, you have to write like this:
```php
composer require guszandy/cabrillo-decoder
```
## Add an example file
Make sure that you have created a PHP-extension file and example cabrillo file (in this example folder) for this example and write like this:
```php
<?php
require_once 'vendor/autoload.php';

$file = fopen("example-cab.cab", "r");

$cd = new \Guszandy\CabrilloDecoder\CabrilloDecoder($file);

$decoded_data = $cd->decode();

print("<pre>".print_r($decoded_data,true)."</pre>");

```
This example with default header QSO which is like this:
```php
$QSO_data_head = [
    "Freq",
    "Mode",
    "Date",
    "Time",
    "MyCall",
    "RSTSent",
    "SerialSent",
    "Call",
    "RSTReceived",
    "SerialReceived"
];
```

## Add an example with custom header QSO
To decode cabrillo file with customized header, We can pass a head parameter which is like this:
```php
$head = []; // You define this header qso parameter here

$cd = new \Guszandy\CabrilloDecoder\CabrilloDecoder($file, $head);
```
