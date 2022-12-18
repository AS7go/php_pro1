<?php

require __DIR__ . '/vendor/autoload.php';


class Contact1 //Contact
{

    private $name;
    private $surname;
    private $email;
    private $phone;
    private $address;

    public function __construct($name, $surname, $email, $phone, $address)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getAddress()
    {
        return $this->address;
    }
}

class Contact //ContactBuilder
{
    private $name = 'Unknown';
    private $surname = 'Unknown';
    private $email = 'Unknown';
    private $phone = 'Unknown';
    private $address = 'Unknown';

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function build():Contact1
    {
        $contact = new Contact1(
                $this->name,
                $this->surname,
                $this->email,
                $this->phone,
                $this->address
        );
        return $contact;
    }
}

$contact = (new Contact());
$newContact=$contact
    ->setPhone('000-555-000')
    ->setName("John")
    ->setSurname("Surname")
    ->setEmail("john@email.com")
    ->setAddress("Some address")
    ->build();

d($newContact);


// ============================ ДЗ 14. Contact Class ==============================
//
//Зробіть рефакторинг коду:
//
//class Contact {
//    private $name;
//    private $surname;
//    private $email;
//    private $phone;
//    private $address;
//
//    public function __construct($name, $surname, $email, $phone, $address)
//    {
//        $this->name = $name;
//        $this->surname = $surname;
//        $this->email = $email;
//        $this->phone = $phone;
//        $this->address = $address;
//    }
//}
//Так щоб нові об'єкти можна було б створювати таки способом:
//
//$contact = new Contact();
//$newContact = $contact->phone('000-555-000')
//    ->name("John")
//    ->surname("Surname")
//    ->email("john@email.com")
//    ->address("Some address")
//    ->build();
//==============================================================================
