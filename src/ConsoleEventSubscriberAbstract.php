<?php
declare(strict_types = 1);

namespace Jalismrs\EventBundle;

use Jalismrs\ErrorBundle\AssertionError;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class ConsoleEventHandlerAbstract
 *
 * @package Jalismrs\EventBundle
 */
abstract class ConsoleEventSubscriberAbstract extends
    EventSubscriberAbstract
{
    /**
     * style
     *
     * @var \Symfony\Component\Console\Style\SymfonyStyle|null
     */
    private ?SymfonyStyle $style = null;
    
    /**
     * getStyle
     *
     * @return \Symfony\Component\Console\Style\SymfonyStyle
     */
    public function getStyle() : SymfonyStyle
    {
        if ($this->style === null) {
            throw new AssertionError(
                'style has not been set'
            );
        }
        
        return $this->style;
    }
    
    /**
     * setStyle
     *
     * @param \Symfony\Component\Console\Style\SymfonyStyle $style
     *
     * @return void
     */
    public function setStyle(
        SymfonyStyle $style
    ) : void {
        $this->style = $style;
    }
    
    /**
     * isActive
     *
     * @return bool
     */
    public function isActive() : bool
    {
        $isActive = parent::isActive();
        
        return $isActive
            &&
            $this->style !== null;
    }
}
