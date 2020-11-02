<?php
declare(strict_types = 1);

namespace Tests;

use Jalismrs\Symfony\Common\ConsoleEventSubscriberAbstract;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Style\SymfonyStyle;
use UnexpectedValueException;

/**
 * Class ConsoleEventSubscriberAbstractTest
 *
 * @package Tests
 *
 * @covers \Jalismrs\Symfony\Common\ConsoleEventSubscriberAbstract
 */
final class ConsoleEventSubscriberAbstractTest extends
    TestCase
{
    /**
     * testGetStyle
     *
     * @return void
     */
    public function testGetStyle() : void
    {
        // arrange
        $systemUnderTest = $this->createSUT();
        
        $style = $this->createMock(SymfonyStyle::class);
        
        $systemUnderTest->setStyle($style);
        
        // act
        $output = $systemUnderTest->getStyle();
        
        // assert
        self::assertSame(
            $style,
            $output,
        );
    }
    
    /**
     * testGetStyleThrowsUnexpectedValueException
     *
     * @return void
     */
    public function testGetStyleThrowsUnexpectedValueException() : void
    {
        // arrange
        $systemUnderTest = $this->createSUT();
        
        // assert
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('style has not been set');
        
        // act
        $systemUnderTest->getStyle();
    }
    
    /**
     * createSUT
     *
     * @return \Jalismrs\Symfony\Common\ConsoleEventSubscriberAbstract
     */
    private function createSUT() : ConsoleEventSubscriberAbstract
    {
        return new class() extends
            ConsoleEventSubscriberAbstract {
            public static function getSubscribedEvents() : array
            {
                return [];
            }
        };
    }
}
