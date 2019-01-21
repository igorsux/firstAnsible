<?php

if(is_file('/proc/cpuinfo')) {
    $cpuinfo = file_get_contents('/proc/cpuinfo');
    preg_match_all('/^processor/m', $cpuinfo, $matches);
    $ncpu = count($matches[0]);
}

if(is_file('/proc/meminfo')) {
    $meminfo = file_get_contents('/proc/meminfo');
    preg_match('/^MemTotal:(\s+)(\d+)(\s)kB/s', $meminfo, $matches);
    $ram = round($matches[2]/1024/1024, 2);
}
$disk = round(disk_total_space("/")/1024/1024/1024,2);

echo "Колличество ядер: $ncpu<br>";
echo  "Объем памяти: $ram GB<br>";
echo "Общее место на диске: $disk GB<br>";
