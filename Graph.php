<?php
class DFS {

    public $graph = [];
    public $road = "";
    public $visited = [];

    function addEdge($u, $v) {
        if (!isset($this->graph[$u])) {
            $this->graph[$u] = [];
        }
        $this->graph[$u][] = $v;
    }

    function solve($v) {
        $this->visited[] = $v;
        $this->road .= $v." ";

        foreach ($this->graph[$v] as $z) {
            if (!in_array($z, $this->visited)) {
                $this->solve($z, $this->visited);
            }
        }
    }

    function start() {
        $this->visited = [];
        $this->road = "";

        foreach ($this->graph as $v) {
            if (!in_array($v, $this->visited)) {
                $this->solve($v);
            }
        }
        
        return $this->road;
    }
}
class BellmanFord {

    public $graph = [];
    public $d = [];

    function addEdge($u, $v, $w) {
        $this->graph[] = [$u, $v, $w];
    }

    function relax($u, $v, $w) {
        if ($this->d[$v] > $this->d[$u] + $w) {
            $this->d[$v] = $this->d[$u] + $w;
        }
    }

    function printArr() {
        $dist = [];
        foreach ($this->d as $key => $value) {
            $dist[] = ['vertex'=>$key, 'DistancefromSource'=>$value];
        }
        return $dist;
    }

    function solve($start) {
        $this->d = [];
        $this->d[$start] = 0;

        for ($i=0; $i < count($this->graph) - 1; $i++) { 
            foreach ($this->graph as $edge) {
                $this->relax($edge[0], $edge[1], $edge[2]);
            }
        }

        foreach ($this->graph as $edge) {
            if ($this->d[$edge[1]] > $this->d[$edge[0]] + $edge[2]) {
                return False;
            }
        }
        return $this->printArr();
    }
}
?>