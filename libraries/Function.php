<?php
    function is_multiple_array(array $arr) 
    {
        foreach ($arr as $rows) {
            if(!is_array($rows)) 
                return false;
        }
        return true;
    }

    function check_valid_values($fields, $values) 
    {
        $numFields = count($fields);
        foreach($values as $rows) {
            if(count($rows) != $numFields) {
                return false;
            }
        } 
        return true;
    }

?>