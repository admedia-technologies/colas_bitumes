<?php
namespace App\Utilities;

Use Datetime;

Class Date{
    public function isWeekend(){
        return (new Datetime)->format('N') >= 6;
    }
}

?>
