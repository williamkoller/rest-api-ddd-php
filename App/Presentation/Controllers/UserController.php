<?php

namespace App\Presentation\Controllers;

use App\Application\UseCases\CreateUserUseCase;

class UserController
{
  private CreateUserUseCase $createUserUseCase;

  public function __construct(CreateUserUseCase $createUserUseCase)
  {
    $this->createUserUseCase = $createUserUseCase;
  }

  public function createUser(array $requestData)
  {
    try {
      if (
        empty($requestData['username']) ||
        empty($requestData['email']) ||
        empty($requestData['age'])
      ) {
        throw new \Exception(
          'All fields (username, email, age) are required and cannot be empty.',
        );
      }

      $user = $this->createUserUseCase->execute(
        $requestData['username'],
        $requestData['email'],
        $requestData['age'],
      );

      http_response_code(201);
      return json_encode([
        'status' => 'sucess',
        'user' => [
          'username' => $user->username,
          'email' => $user->email,
          'age' => $user->age,
        ],
      ]);
    } catch (\Throwable $e) {
      return json_encode([
        'status' => 'error',
        'message' => $e->getMessage(),
      ]);
    }
  }
}
