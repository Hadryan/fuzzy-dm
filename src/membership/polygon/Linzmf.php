<?php

namespace ketili\membership\polygon;

use ketili\membership\MembershipFunction;


class Linzmf implements MembershipFunction
{
    public $a, $b;

    /**
     * Trapmf constructor.
     * @param $a
     * @param $b
     * @throws \Exception
     */
    public function __construct($a, $b)
    {
        $is_correct = $a <= $b;
        if (!$is_correct)
            throw new \Exception("Incorrect abc");
        $this->a = $a;
        $this->b = $b;
    }

    function call($x)
    {
        $x = (float)$x;
        $a = (float)$this->a;
        $b = (float)$this->b;

        if ($x < $a)
            return 1;
        else if ($a <= $x && $x <= $b)
            return ($a - $x) / ($a - $b);
        return 0;

    }
}