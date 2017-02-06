<?php

/*
** Liskov Substitution principle
** All this is stating is that every subclass/derived class should be substitutable for their base/parent class. 
*/

Class Circle{
	public $radius;

	public function __construct($radius) {
		$this->radius = $radius;
	}

	public function area() {
		return 3.1416 * pow($this->radius, 2);
	}
}

Class Square{
	public $length;

	public function __construct($length) {
		$this->length = $length;
	}

	public function area() {
		return pow($this->length, 2);
	}
}

Class Triangle{
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

Class AreaCalculator{
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

class VolumeCalculator extends AreaCalulator {
    public function __construct($shapes = array()) {
        parent::__construct($shapes);
    }

    public function sum() {
        return $summedData;
    }
}

class SumCalculatorOutputter {
    protected $calculator;

    public function __constructor(AreaCalculator $calculator) {
        $this->calculator = $calculator;
    }

    public function JSON() {
        $data = array(
            'sum' => $this->calculator->sum();
        );

        return json_encode($data);
    }

    public function HTML() {
        return implode('', array(
            '<h1>',
                'Sum of the areas of provided shapes: ',
                $this->calculator->sum(),
            '</h1>'
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
$volumes = new VolumeCalculator($shapes);

$output = new SumCalculatorOutputter($areas);
$output2 = new SumCalculatorOutputter($volumes);