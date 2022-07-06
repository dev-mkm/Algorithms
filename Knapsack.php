<?php
class Knapsack {

    public $List = [];
    public $maxweight = 0;
    public $optx = [];
    public $optp = 0;

    function set($list, $maxweight) {
        $this->List = $list;
        $this->maxweight = $maxweight;
    }

    function Backtrack($x, $l) {
        if ($l == count($this->List)) {
            if ($this->weight($x) <= $this->maxweight) {
                if($this->price($x) >= $this->optp) {
                    $this->optp = $this->price($x);
                    $this->optx = $x;
                }
            }
        }
        else {
            $x[$l] = 1;
            $this->Backtrack($x, $l + 1);
            $x[$l] = 0;
            $this->Backtrack($x, $l + 1);
        }
    }

    function Branchandbond($x, $l) {
        $c = [];
        if ($l == count($this->List)) {
            if ($this->weight($x) <= $this->maxweight) {
                if($this->price($x) >= $this->optp) {
                    $this->optp = $this->price($x);
                    $this->optx = $x;
                }
            }
        }
        else {
            if($this->weight($x) + $this->List[$l]['w'] < $this->maxweight) {
                $c = [1,0];
            } else {
                $c = [0];
            }
        }
        foreach ($c as $i) {
            $x[$l] = $i;
            $this->Branchandbond($x, $l + 1);
        }
    }

    function weight($x) {
        $a = 0;
        $i = 0;
        foreach ($x as $v) {
            $a += $v * $this->List[$i]['w'];
            $i ++;
        }
        return $a;
    }

    function price($x) {
        $a = 0;
        $i = 0;
        foreach ($x as $v) {
            $a += $v * $this->List[$i]['p'];
            $i ++;
        }
        return $a;
    }

    function result() {
        $data = [];
        $data['optP'] = $this->optp;
        $data['optX'] = $this->optx;
        return $data;
    }

}
?>