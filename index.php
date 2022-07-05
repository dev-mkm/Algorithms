<?php
require_once './Matrix.php';
require_once './Knapsack.php';
require_once './Graph.php';
//-----#ّFunctions#-----
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
                $LCS[$i][$j] = $LCS[$i - 1][$j - 1].$X[$i - 1];
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
//-----#API#-----
$method = $_GET['m'];
if ($method == "Strassen" && isset($_POST['FirstMatrix']) && isset($_POST['SecondMatrix'])) {
    $matrix = new Strassen();
    $matrix->setmatrix(1, $_POST['FirstMatrix']);
    $matrix->setmatrix(2, $_POST['SecondMatrix']);
    echo json_decode($matrix->solve());
}
elseif ($method == "Lcs" && isset($_POST['FirstString']) && isset($_POST['SecondString'])) {
    echo lcs($_POST['FirstString'], $_POST['SecondString']);
}
elseif ($method == "JobSchedule" && isset($_POST['jobs'])) {
    echo json_encode(JobScheduling($_POST['jobs']));
}
elseif ($method == "Backtrack" && isset($_POST['list']) && isset($_POST['max'])) {
    $knap = new Knapsack();
    $knap->set($_POST['list'], $_POST['max']);
    $knap->Backtrack([], 0);
    echo json_encode($knap->result());
}
elseif ($method == "BranchandBound" && isset($_POST['list']) && isset($_POST['max'])) {
    $knap = new Knapsack();
    $knap->set($_POST['list'], $_POST['max']);
    $knap->Branchandbond([], 0);
    echo json_encode($knap->result());
}
elseif ($method == "DFS" && isset($_POST['graph'])) {
    $matrix = $_POST['graph'];
    $graph = new DFS();
    for ($i=0; $i < count($matrix); $i++) { 
        for ($j=0; $j < count($matrix[0]); $j++) { 
            if ($matrix[$i][$j] == 1) {
                $graph->addEdge($i, $j);
            }
        }
    }
    echo $graph->start();
}
elseif ($method == "BellmanFord" && isset($_POST['graph']) && isset($_POST['start'])) {
    $matrix = $_POST['graph'];
    $graph = new BellmanFord();
    for ($i=0; $i < count($matrix); $i++) { 
        for ($j=0; $j < count($matrix[0]); $j++) { 
            if ($matrix[$i][$j] != 0) {
                $graph->addEdge($i, $j, $matrix[$i][$j]);
            }
        }
    }
    echo json_encode($graph->solve($_POST['start']));
}
?>