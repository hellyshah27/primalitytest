<?php ini_set("memory_limit" , "-1"); ?>
<?php ini_set("max_execution_time" , "50000"); ?>
<?php
    $primeForLoop = array();
    $compositeForLoop = array();

    for ($n=5; $n<=100000000 ; $n++) {
        $start_time = microtime(true);
        if ($n % 2 == 0 || $n % 3 == 0) { 
            $compositeForLoop[] = $n;
            $end_time = microtime(true);
            $final_time[$n] = ($end_time - $start_time);
            continue; 
        }
        for($i = 5; $i * $i <= $n; $i = $i + 6) {
            if ($n % $i == 0 || $n % ($i + 2) == 0) {
                $compositeForLoop[] = $n;
                $end_time = microtime(true);
                $final_time[$n] = ($end_time - $start_time);
                continue 2; 
            }
        }
        $primeForLoop[] = $n;
        $end_time = microtime(true);
        $final_time[$n] = ($end_time - $start_time);
    }

    file_put_contents('primebankq3.txt', var_export($primeForLoop, true));

    file_put_contents('compositebankq3.txt', var_export($compositeForLoop, true));

    file_put_contents('timebankq3.txt', var_export($final_time, true));
?>