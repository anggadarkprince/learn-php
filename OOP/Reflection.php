<?php

require_once "exception/ValidationException.php";
require_once "data/LoginRequest.php";
require_once "helpers/ValidationUtil.php";

$request = new LoginRequest();
$request->username = "angga";
$request->password = "rahasia";

// ValidationUtil::validate($request);

ValidationUtil::validateReflection($request);

class RegisterUserRequest
{
    public ?string $name;
    public ?string $address;
    public ?string $email;
}

$register = new RegisterUserRequest();
$register->name = "Angga";
$register->address = "Surabaya";
$register->email = null;

ValidationUtil::validateReflection($register);

//ValidationUtil::validate($register);