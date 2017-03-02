<?php

/**
 * Created by PhpStorm.
 * User: grodas.p35
 * Date: 02.03.2017
 * Time: 22:33
 */
class CircleData {
	private $radius;
	private $color;
	private $origin;

	public function __construct( $radius, $color, $origin ) {
		$this->radius = $radius;
		$this->color  = $color;
		$this->origin = $origin;
	}

	public function getRadius() {
		return $this->radius;
	}

	public function getColor() {
		return $this->color;
	}

	public function getOrigin() {
		return $this->origin;
	}

}

class Circle {
	private $circleData;

	public function __construct( $radius, $color, $origin ) {
		$this->circleData = new CircleData( $radius, $color, $origin );
	}

	public function getCircumference() {
		return $this->circleData->getRadius() * 3.1415926;
	}

	public function getDiameter() {
		return $this->circleData->getRadius() * 2;
	}

	public function Draw( $graphics ) {
		//...
	}
}

writeln('BEGIN TESTING PRIVATE CLASS DATA PATTERN');
writeln();
$circle = new Circle(3,'black','origin');
writeln();
writeln('Circumference');
writeln($circle->getCircumference());
writeln();
writeln('Diameter');
writeln($circle->getDiameter());
writeln();
writeln('END TESTING PRIVATE CLASS DATA PATTERN');

function writeln($line_in = '') {
	echo $line_in."<br/>";
}