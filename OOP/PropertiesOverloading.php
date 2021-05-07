<?php

class Zero
{
    private array $properties = [];

    /**
     * Get called when no property exist tried to be called.
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->properties[$name];
    }

    /**
     * Get called when no property exist tried to be set.
     *
     * @param $name
     * @param $value
     * @return mixed
     */
    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    /**
     * Get called when no property exist tried to be checked.
     *
     * @param $name
     * @return bool
     */
    public function __isset($name): bool
    {
        return isset($this->properties[$name]);
    }

    /**
     * Get called when no property exist tried to be unset.
     *
     * @param $name
     */
    public function __unset($name)
    {
        unset($this->properties[$name]);
    }

    /**
     * Get called when no function exist tried to be executed.
     *
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        $join = join(",", $arguments);
        echo "Call function $name with arguments $join" . PHP_EOL;
    }

    /**
     * Get called when no static function exist tried to be executed.
     *
     * @param $name
     * @param $arguments
     */
    public static function __callStatic($name, $arguments)
    {
        $join = join(",", $arguments);
        echo "Call static function $name with arguments $join" . PHP_EOL;
    }

}

$zero = new Zero();
$zero->firstName = "Angga";
$zero->middleName = "Ari";
$zero->lastName = "Wijaya";

echo "First Name : $zero->firstName" . PHP_EOL;
echo "Middle Name : $zero->middleName" . PHP_EOL;
echo "Last Name : $zero->lastName" . PHP_EOL;

$zero->sayHello("Angga", "Ari");
Zero::sayHello("Angga", "Ari");