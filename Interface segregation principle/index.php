<?php

/*
** Interface Segregation Principle
** Interfaces should be different for different purposes
*/

Interface ShapeInterface {
	public function area();
}

Interface SolidShapeInterface {
	public function volume();
}

Class Cuboid implements ShapeInterface, SolidShapeInterface {
	public function area() {
		// Calculate Area
	}
	public function volume() {
		// Calculate Volume
	}
}