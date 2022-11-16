# CabrilloDecoder
Decode File Cabrillo to array PHP.

# Installation
To install this package, you have to write like this:
```php
composer require guszandy/cabrillo-decoder
```
# Add an example file
Make sure that you have created a PHP-extension file and example cabrillo file (in this example folder) for this example and write like this:
```php
<?php
require_once 'vendor/autoload.php';

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

$file = fopen("example-cab.cab", "r");

$cd = new \Guszandy\CabrilloDecoder\CabrilloDecoder($file, $QSO_data_head);

$decoded_data = $cd->decode();

print("<pre>".print_r($decoded_data,true)."</pre>");

```
