<?php

namespace App\Application\UseCases;

use App\Domain\Events\EventDispatcherInterface;
use App\Domain\Events\UserCreatedEvent;
use App\Domain\Repositories\UserRepositoryInterface;
use App\Domain\User\User;

class CreateUserUseCase 
{
  private UserRepositoryInterface $userRepository;
  private EventDispatcherInterface $eventDispatcher;

  public function __construct(UserRepositoryInterface $userRepository, EventDispatcherInterface $eventDispatcher)
  {
    $this->userRepository = $userRepository;
    $this->eventDispatcher = $eventDispatcher;
  }

  public function execute(string $username, string $email, int $age): User
  {
    if ($this->userRepository->findByEmail($email)) {
      throw new \InvalidArgumentException("E-mail already exists: $email");
    }

    $user = new User($username, $email, $age);
    $this->userRepository->save($user);
    $this->eventDispatcher->dispatch(new UserCreatedEvent($user));

    return $user;
  }
}