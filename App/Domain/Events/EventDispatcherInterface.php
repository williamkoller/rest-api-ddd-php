<?php

namespace App\Domain\Events;

interface EventDispatcherInterface
{
  public function subscribe(string $event, callable $listener): void;
  public function dispatch(object $event): void;
}
