<?php

class Cat {

  private $weight = 0;
  private $age = 0;
  private $name;

  public function __construct($n) {
    printf('Die Katze %s ist geboren.', $n);
    $this->name = $n;
  }

  public function setName(string $n) {
    $this->name = $n;
  }

  public function getName() {
    return $this->name;
  }

  public function getWeight() {
    return $this->weight;
  }

  public function getAge() {
    return $this->age;
  }

  public function eat() {
    $this->calcWeight(1);
  }

  public function walk() {
    $this->calcWeight(-0.5);
  }

  public function run() {
    $this->calcWeight(-1);
  }

  private function calcWeight(float $kg) {
    $this->weight += $kg;
  }

  public function toAge() {
    $this->addYear(1);
  }

  private function addYear(int $amount) {
    $this->age += $amount;
  }

}
