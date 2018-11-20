<?php
    require_once 'Function.php';
    function connect($host, $dbname, $user, $password)
        {
            $conn_string = "host={$host} dbname={$dbname} user={$user} password={$password}";
            return pg_connect($conn_string);
        }

        /*
            Use for this array format:
                $values = array (
                    array(a1, a2, a3, ..., an),
                    ...
                    array(z1, z2, z3, ..., zn)
                );
            or $values = array(a1, a2, a3, ..., an);
        */

?>