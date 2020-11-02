<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Common;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class EventHandlerAbstract
 *
 * @package Jalismrs\Symfony\Common
 */
abstract class EventSubscriberAbstract implements
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
     *
     * @codeCoverageIgnore
     */
    final public function activate() : void
    {
        $this->active = true;
    }
    
    /**
     * isActive
     *
     * @return bool
     *
     * @codeCoverageIgnore
     */
    public function isActive() : bool
    {
        return $this->active;
    }
}
