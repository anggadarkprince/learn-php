<?php

// and: all value true true
var_dump(true && true);
var_dump(true && false);

// or: at least on of value is true
var_dump(true || false);
var_dump(true || true);

// exclusive or: similar to or except will return false if all value is false
var_dump(true xor false);
var_dump(true xor true);
var_dump(false xor true);

// negation
var_dump(!true);
var_dump(!false);