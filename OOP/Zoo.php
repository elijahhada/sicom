<?php

abstract class Animal
{
    public function breathe(): bool
    {
        return true;
    }
}

abstract class Fish extends Animal implements IMovable, IEatable
{
    public function moves(): string
    {
        return 'Swims';
    }

    public function eats(): string
    {
        return 'Eats meat';
    }
}

class Trout extends Fish
{

}

class Shark extends Fish
{

}

abstract class Insect extends Animal implements IMovable, IEatable
{
    public function moves(): string
    {
        return 'Crawles';
    }

    public function eats(): string
    {
        return 'Eats herbs';
    }
}

abstract class Terrestrial extends Animal implements IMovable
{
    public function moves(): string
    {
        return 'Runs';
    }
}

abstract class Aquatic extends Animal implements IMovable
{
    public function moves(): string
    {
        return 'Swims';
    }
}

abstract class Herbivorous extends Terrestrial implements IEatable
{
    public function eats(): string
    {
        return 'Eats herbs';
    }
}

abstract class Predator extends Terrestrial implements IEatable
{
    public function eats(): string
    {
        return 'Eats meat';
    }
}

abstract class Cat extends Predator
{

}

class Cougar extends Cat
{

}

class Lion extends Cat
{

}

class Antilopa extends Herbivorous
{

}

class Elephant extends Herbivorous
{

}

abstract class Dog extends Predator
{

}

class Wolf extends Dog
{

}

interface IMovable
{
    public function moves(): string;
}

interface IEatable
{
    public function eats(): string;
}

$obj = new Shark();
echo $obj->eats() . PHP_EOL;
echo $obj->moves() . PHP_EOL;
echo $obj->breathe() . PHP_EOL;

?>