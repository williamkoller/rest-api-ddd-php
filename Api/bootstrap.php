<?php

use App\Application\UseCases\CreateUserUseCase;
use App\Domain\Events\UserCreatedEvent;
use App\Infra\Repositories\InMemoryUserRepository;
use App\Infra\EventDispatcher\EventDispatcher;
use App\Presentation\Controllers\UserController;

require_once __DIR__ . '/../vendor/autoload.php';

$repository = new InMemoryUserRepository();
$eventDispatcher = new EventDispatcher();

$eventDispatcher->subscribe(UserCreatedEvent::class, function (
  UserCreatedEvent $event
) {
  file_put_contents(
    'php://stdout',
    'User created: ' . $event->getUser()->getEmail() . PHP_EOL,
  );
});

$createUser = new CreateUserUseCase($repository, $eventDispatcher);
$userController = new UserController($createUser);
