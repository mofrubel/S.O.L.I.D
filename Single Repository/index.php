<?php
/*
** Single Repository Example
** One Class will serve only one purpose
** A class should have one and only one reason to change, meaning that a class should have only one job
** Here Square, Circle and AreaCalculator Class serve their own purposes
*/

Class Circle {
	public $radius;

	public function __construct($radius) {
		$this->radius = $radius;
	}
}

Class Square {
	public $length;

	public function __construct($length) {
		$this->length = $length;
	}
}

Class AreaCalculator {
	protected $shapes;

	public function __construct($shapes = array()) {
		$this->shapes= $shapes;
	}

	public function sum() {
		foreach($this->shapes as $shape) {
	        if(is_a($shape, 'Square')) {
	            $area[] = pow($shape->length, 2);
	        } else if(is_a($shape, 'Circle')) {
	            $area[] = pi() * pow($shape->radius, 2);
	        }
	    }

	    return array_sum($area);
	}

	public function output() {
		return implode("", array(
			"<h1>", 
				"Sum of the areas of provided shapes: ",
				$this->sum(),
            "</h1>"
			));
	}
}

$shapes = array(
    new Circle(2),
    new Square(5),
    new Square(6)
);

$areas = new AreaCalculator($shapes);

echo $areas->output();