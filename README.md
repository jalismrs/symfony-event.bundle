# symfony.common.event-subscriber

Adds Symfony event subscriber abstract classes

## Test

`phpunit` or `vendor/bin/phpunit`

coverage reports will be available in `var/coverage`

## Use

### EventSubscriberAbstract
```php
use Jalismrs\Symfony\Common\EventSubscriberAbstract;
use Symfony\Contracts\EventDispatcher\Event;

class EventSubscriber extends EventSubscriberAbstract {
    public function onEvent(
        Event $event
    ): Event {
        if ($this->isActive()) {
            // do something
        }
    
        return $event;
    }
}

class SomeClass {
    private EventSubscriber $eventSubscriber;

    public function someFunction(): void {
        $this->eventSubscriber->activate();
        
        // dispatch events
    }
}
```

### ConsoleEventSubscriberAbstract
```php
use Jalismrs\Symfony\Common\ConsoleEventSubscriberAbstract;
use Symfony\Component\Console\Command\Command;
use Symfony\Contracts\EventDispatcher\Event;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ConsoleEventSubscriber extends ConsoleEventSubscriberAbstract {
    public function onEvent(
        Event $event
    ): Event {
        if ($this->isActive()) {
            $style = $this->getStyle();
        
            // do something
        }
    
        return $event;
    }
}

class SomeCommand extends Command {
    private ConsoleEventSubscriber $consoleEventSubscriber;

    protected function initialize(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $style = new SymfonyStyle(
            $input,
            $output
        );
        
        $this->consoleEventSubscriber->setStyle($style);
    }
    
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $this->consoleEventSubscriber->activate();
        
        // dispatch events
        
        return Command::SUCCESS;
    }
}
```
