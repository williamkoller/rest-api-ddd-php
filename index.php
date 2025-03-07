<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Domain\Address\Address;
use App\Domain\User\User;

$validUsers = [];
$invalidUsers = [];
$validAddresses = [];
$invalidAddresses = [];

try {
  $userValid = new User('William Koller', 'william@mail.com', 35);
  $validUsers[] = $userValid;
} catch (\InvalidArgumentException $e) {
  $invalidUsers[] = $e->getMessage();
}

try {
  $userInvalid = new User('William Koller', 'william-mail.com', 35);
  $validUsers[] = $userInvalid;
} catch (\InvalidArgumentException $e) {
  $invalidUsers[] = $e->getMessage();
}

try {
  $addressValid = new Address('2804:14c:87b0:96f8::2000');
  $validAddresses[] = $addressValid;
} catch (\InvalidArgumentException $e) {
  $invalidAddresses[] = $e->getMessage();
}

try {
  $addressInvalid = new Address('999.999.999.999');
  $validAddresses[] = $addressInvalid;
} catch (\InvalidArgumentException $e) {
  $invalidAddresses[] = $e->getMessage();
}

foreach ($validUsers as $user) {
  echo 'Valid User:' . PHP_EOL;
  echo 'Name: ' . $user->getUsername() . PHP_EOL;
  echo 'Email: ' . $user->getEmail() . PHP_EOL;
  echo 'Age: ' . $user->getAge() . PHP_EOL;
  echo '------------------------' . PHP_EOL;
}

foreach ($invalidUsers as $error) {
  echo 'Invalid User:' . PHP_EOL;
  echo 'Error: ' . $error . PHP_EOL;
  echo '------------------------' . PHP_EOL;
}

foreach ($validAddresses as $address) {
  echo 'Valid Address:' . PHP_EOL;
  echo 'Address IP: ' . $address->ip . PHP_EOL;
}

foreach ($invalidAddresses as $error) {
  echo 'Invalid Address:' . PHP_EOL;
  echo 'Error: ' . $error . PHP_EOL;
  echo '------------------------' . PHP_EOL;
}
