<?php
namespace Guszandy\CabrilloDecoder;

class CabrilloDecoder {
    private $file = null;
    private $QSO_data_head = array();
    private $decoded_data = array();

    function __construct($file, $head) {
        $this->file = $file;
        $this->QSO_data_head = $head;
      }

    private function decode_QSO_cabrillo($data_head, $data) {
        $temp = [];
        $buffer = [];
    
        $buffer = preg_split('/\s+/', $data);
    
        for($x = 0; $x < count($data_head); $x++) {
            $temp[$data_head[$x]] = $buffer[$x];
        }
        return $temp;
    }

    function decode() {
        if ($this->file) {
            while (($line = fgets($this->file)) !== false) {
                $d = explode(":", $line);
        
                if (count($d) > 1) {
                    if ($d[0] != "QSO") {
                        $this->decoded_data[$d[0]] = ltrim(str_replace(["\n"],"", $d[1]));
                    } else if ($d[0] == "QSO") {
                        if(!array_key_exists("QSO", $this->decoded_data)) {
                            $this->decoded_data["QSO"] = array();
                        }
                        array_push($this->decoded_data["QSO"], $this->decode_QSO_cabrillo($this->QSO_data_head, ltrim(str_replace(["\\", "\n", ""], "", $d[1]))));
                    }
                } else $this->decoded_data[$d[0]] = "";
            }
            // var_dump(json_encode($decoded_data));
            return $this->decoded_data;
        }
    }
    
}