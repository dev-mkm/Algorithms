<?php
function lcs($X, $Y) {
    $L = [];
    $LCS = [];
    for ($i = 0; $i <= strlen($X); $i++)
    {
        $L[$i] = [];
        $LCS[$i] = [];
        for ($j = 0; $j <= strlen($Y); $j++)
        {
            if ($i == 0 || $j == 0) {
                $L[$i][$j] = 0;
                $LCS[$i][$j] = "";
            }
        
            else if ($X[$i - 1] == $Y[$j - 1]) {
                $L[$i][$j] = $L[$i - 1][$j - 1] + 1;
                $LCS[$i][$j] = $X[$i - 1].$LCS[$i - 1][$j - 1];
            }
        
            else {
                if ($L[$i - 1][$j] > $L[$i][$j - 1]) {
                    $LCS[$i][$j] = $LCS[$i - 1][$j];
                } else {
                    $LCS[$i][$j] = $LCS[$i][$j - 1];
                }
                $L[$i][$j] = max($L[$i - 1][$j] , $L[$i][$j - 1]);
            }
        }
    }
    return $LCS[strlen($X)][strlen($Y)];
}
function JobScheduling ($jobs) {
    asort($jobs);
    $job = "";
    $val = 0;
    $lval = 0;
    foreach ($jobs as $key => $value) {
        $job = $key." ".$job;
        $lval += $value;
        $val += $lval;
    }
    $data = [];
    $data['job'] = $job;
    $data['val'] = $val;
    return $data;
}
?>