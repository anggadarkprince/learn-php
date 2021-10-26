<?php

require_once "Exception/ValidationException.php";
require_once "Data/LoginRequest.php";
require_once "Helpers/ValidationUtil.php";

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