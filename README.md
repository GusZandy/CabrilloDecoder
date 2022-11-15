# CabrilloDecoder
Decode File Cabrillo to array PHP.

## Simple Usage
```php
include("CabrilloDecoder.php");

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

$cb = new CabrilloDecoder($file, $head); 

$decoded_data = $cd->decode();

print("<pre>".print_r($decoded_data,true)."</pre>");

```
