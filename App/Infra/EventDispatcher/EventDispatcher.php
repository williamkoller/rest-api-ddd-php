<?php

namespace App\Infra\EventDispatcher;

use App\Domain\Events\EventDispatcherInterface;

class EventDispatcher implements EventDispatcherInterface
{
  private array $listeners = [];

  public function subscribe(string $event, callable $listener): void {
    $this->listeners[$event][] = $listener;
  }

  public function dispatch(object $event): void
  {
    $eventClass = get_class($event);
    if (!empty($this->listeners[$eventClass])) {
      foreach ($this->listeners[$eventClass] as $listener) {
        $listener($event);
      }
    }
  }
}