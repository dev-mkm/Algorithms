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
    public $v = 0;

    function create($v) {
        $this->graph = [];
        $this->v = $v;
    }

    function addEdge($u, $v, $w) {
        if (!isset($this->graph[$u])) {
            $this->graph[$u] = [];
        }
        $this->graph[$u][] = $v;
    }
}
?>