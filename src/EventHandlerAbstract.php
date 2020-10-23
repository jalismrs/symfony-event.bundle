<?php
declare(strict_types = 1);

namespace Jalismrs\EventBundle;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class EventHandlerAbstract
 *
 * @package Jalismrs\EventBundle
 */
abstract class EventHandlerAbstract implements
    EventSubscriberInterface
{
    /**
     * active
     *
     * @var bool
     */
    private bool $active = false;
    
    /**
     * activate
     *
     * @return void
     */
    final public function activate() : void
    {
        $this->active = true;
    }
    
    /**
     * isActive
     *
     * @return bool
     */
    public function isActive() : bool
    {
        return $this->active;
    }
}
