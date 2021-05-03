<?php

require_once "data/Student.php";

$student1 = new Student();
$student1->id = "1";
$student1->name = "Angga";
$student1->value = 100;

$student2 = new Student();
$student2->id = "1";
$student2->name = "Angga";
$student2->value = 100;

// regular equal comparison
var_dump($student1 == $student2);

// identity (will compare object, property value and data type - strict mode for object equality)
var_dump($student1 === $student2); // will false because different object
var_dump($student1 === $student1);
