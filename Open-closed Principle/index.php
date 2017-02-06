<?php

/*
** Open for Extension and Close for Modification
** One Class should be extended rather than modifying it, 
** Objects or entities should be open for extension, but closed for modification
** Here Sum method of AreaCalculator Class should be extended rather than modifing it for another Area of different Shaped Class 
*/

Class Circle {
	public $radius;

	public function __construct($radius) {
		$this->radius = $radius;
	}

	public function area() {
		return 3.1416 * pow($this->radius, 2);
	}
}

Class Square {
	public $length;

	public function __construct($length) {
		$this->length = $length;
	}

	public function area() {
		return pow($this->length, 2);
	}
}

Class Triangle {
	public $base;
	public $height;

	public function __construct($base, $height) {
		$this->base = $base;
		$this->height = $height;
	}

	public function area() {
		return 0.5 * $this->base * $this->height;
	}
}

Class AreaCalculator {
	protected $shapes;

	public function __construct($shapes = array()) {
		$this->shapes= $shapes;
	}

	public function sum() {
		foreach($this->shapes as $shape) {
	        $area[] = $shape->area();
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
    new Square(6),
    new Triangle(4,5)
);

$areas = new AreaCalculator($shapes);

echo $areas->output();