<?php
$file = fopen("example-cab.cab", "r");
$decoded_data = [
    "QSO" => array()
];
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

if ($file) {
    while (($line = fgets($file)) !== false) {
        $d = explode(": ", $line);

        if (count($d) > 1) {
            if ($d[0] != "QSO") {
                $decoded_data[$d[0]] = str_replace(["\\", "\n"],"", $d[1]);
            } else if ($d[0] == "QSO") {
                array_push($decoded_data["QSO"], decode_QSO_cabrillo($QSO_data_head, str_replace(["\\", "\n", ""], "", $d[1])));
            }
        } else $decoded_data[$d[0]] = "";
    }

    fclose($file);

    var_dump(json_encode($decoded_data));
}

function decode_QSO_cabrillo($data_head, $data) {
    $temp = [];
    $buffer = [];

    $buffer = preg_split('/\s+/', $data);

    for($x = 0; $x < count($data_head); $x++) {
        $temp[$data_head[$x]] = $buffer[$x];
    }
    return $temp;
}
?>