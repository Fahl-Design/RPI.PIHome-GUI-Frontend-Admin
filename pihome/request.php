<?php /*
 * PiHome FS500S edition
 * http://pihome.harkemedia.de/
 *
 * PiHome Copyright (c) 2012, Sebastian Harke
 * Lizenz Informationen.
  *
 * This work is licensed under the Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 3.0 Unported License. To view a copy of this license,
 * visit: http://creativecommons.org/licenses/by-nc-sa/3.0/.
 *
*/

include("configs/dbconfig.inc.php");
include("configs/functions.inc.php");

$value = htmlentities($_GET["s"]);

if(htmlentities($_GET["s"])){

        $cutvalue=explode("_", $value);
        $lid  = $cutvalue[0];
        $stat = $cutvalue[1];

        setLightStatus($lid,$stat);
        $code = getCodeById($lid);

        $letter = $code['letter'];

        if($stat=="on"){
                $status = "ON";
        }elseif($stat=="off"){
                $status = "OFF";
        }

        $co = $code['code'];
shell_exec("/home/pilight/mumbiSet.sh {$letter} {$status}");
}
?>
