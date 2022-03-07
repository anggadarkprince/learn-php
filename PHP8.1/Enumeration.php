<?php


trait IndonesiaValue
{
    static function fromIndonesia(string $value): Gender
    {
        return match ($value) {
            "Tuan" => Gender::MALE,
            "Nyonya" => Gender::FEMALE,
            default => throw new Exception("Unsupported indonesian value")
        };
    }
}

enum Gender
{
    case MALE;
    case FEMALE;

    const INITIAL_MALE = 'M';
    const INITIAL_FEMALE = 'F';

    use IndonesiaValue;
}


interface Levelable
{
    function level(): int;
}

// backed enumeration (with type)
enum CustomerType: string implements Levelable
{
    case Silver = "SLV";
    case Gold = "GLD";
    case Platinum = "PLT";

    function isPremium(): bool
    {
        return $this->value == 'PLT';
    }

    function level(): int
    {
        return match ($this) {
            CustomerType::Silver => 1,
            CustomerType::Gold => 2,
            CustomerType::Platinum => 3,
        };
    }
}

class Customer
{
    public string $name;
    public Gender $gender;
    public CustomerType|null $customerType;

    public function __construct(string $name, Gender $gender, CustomerType|null $customerType = CustomerType::Silver)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->customerType = $customerType;
    }

}

function sayHello(Customer $customer): string
{
    if ($customer->gender == Gender::MALE) {
        return "Hello Mr. " . $customer->name;
    } else if ($customer->gender == Gender::FEMALE) {
        return "Hello Mrs. " . $customer->name;
    } else {
        return "Hello " . $customer->name;
    }
}

function getCustomerType(Customer $customer): string
{
    // get name and value of enumeration
    return $customer->customerType?->name . " ({$customer->customerType?->value})";
}

var_dump(sayHello(new Customer("Angga", Gender::MALE)));
var_dump(sayHello(new Customer("Anggi", Gender::FEMALE)));
var_dump(Gender::cases());


var_dump(getCustomerType(new Customer("Angga", Gender::MALE, CustomerType::Gold)));
var_dump(getCustomerType(new Customer("Ari", Gender::MALE, CustomerType::Platinum)));
var_dump(getCustomerType(new Customer("Wijaya", Gender::MALE, CustomerType::from("SLV"))));
var_dump(getCustomerType(new Customer("Will return null", Gender::MALE, CustomerType::tryFrom("UNK"))));

var_dump(CustomerType::Platinum->isPremium());
var_dump(CustomerType::Platinum->level());

var_dump(Gender::fromIndonesia("Tuan"));
var_dump(Gender::fromIndonesia("Nyonya"));
//var_dump(Gender::fromIndonesia("Banci"));

var_dump(Gender::INITIAL_MALE);