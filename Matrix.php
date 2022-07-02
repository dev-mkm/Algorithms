<?php
class Strassen {

    public $FirstMatrix;
    public $SecondMatrix;

    function setmatrix($num, $matrix) {
        switch ($num) {
            case 1:
                $this->FirstMatrix = $matrix;
                break;
            
            case 2:
                $this->SecondMatrix = $matrix;
                break;
        }
    }

    function split($matrix) {
        $row = intdiv(count($matrix), 2);
        $col = intdiv(count($matrix[0]), 2);

        $matrix2 = [];
        $matrix2['a'] = [];
        $matrix2['b'] = [];
        $matrix2['c'] = [];
        $matrix2['d'] = [];
        foreach (array_slice($matrix, 0, $row) as $value) {
            $matrix2['a'][] = array_slice($value, 0, $col);
            $matrix2['b'][] = array_slice($value, $col);
        }
        foreach (array_slice($matrix, $row) as $value) {
            $matrix2['c'][] = array_slice($value, 0, $col);
            $matrix2['d'][] = array_slice($value, $col);
        }
        return $matrix2;
    }

    function solve($x = [], $y = []) {
        if ($x == [] || $y == []) {
            $x = $this->FirstMatrix;
            $y = $this->SecondMatrix;
        }
        if (count($x) == 1) {
            return $x[0][0] * $y[0][0];
        }

        $x2 = $this->split($x);
        $y2 = $this->split($y);
        
        $a = $x2['a'];
        $b = $x2['b'];
        $c = $x2['c'];
        $d = $x2['d'];
        $e = $y2['a'];
        $f = $y2['b'];
        $g = $y2['c'];
        $h = $y2['d'];

        $p1 = $this->solve($a, $this->sub($f, $h));
        $p2 = $this->solve($this->add($a, $b), $h);
        $p3 = $this->solve($this->add($c, $d), $e);
        $p4 = $this->solve($d, $this->sub($g, $e));
        $p5 = $this->solve($this->add($a, $d), $this->add($e, $h));
        $p6 = $this->solve($this->sub($b, $d), $this->add($g, $h));
        $p7 = $this->solve($this->sub($a, $c), $this->add($e, $f));

        $c11 = $this->add($this->add($p5, $p4), $this->sub($p6, $p2));
        $c12 = $this->add($p1, $p2);
        $c21 = $this->add($p3, $p4);
        $c22 = $this->sub($this->add($p1, $p5), $this->add($p3, $p7));

        $z = [];
        if (is_int($c11)) {
            return [[$c11, $c12],[$c21, $c22]];
        }
        for ($i=0; $i < count($c11); $i++) { 
            $z[] = array_merge($c11[$i], $c12[$i]);
        }
        for ($i=0; $i < count($c21); $i++) { 
            $z[] = array_merge($c21[$i], $c22[$i]);
        }
        return $z;
    }

    function add ($x , $y) {
        if (is_int($x)) {
            return $x + $y;
        }
        for ($i=0; $i < count($x); $i++) { 
            for ($j=0; $j < count($x[0]); $j++) { 
                $x[$i][$j] += $y[$i][$j];
            }
        }
        return $x;
    }

    function sub ($x, $y) {
        if (is_int($x)) {
            return $x - $y;
        }
        for ($i=0; $i < count($x); $i++) { 
            for ($j=0; $j < count($x[0]); $j++) { 
                $x[$i][$j] -= $y[$i][$j];
            }
        }
        return $x;
    }
}
?>