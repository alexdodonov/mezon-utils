<?php
require_once (__DIR__ . '/../autoloader.php');

class UtilsTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Testing bot detection
     */
    public function testBotSuccess()
    {
        // test body
        $Result = \Mezon\Utils::isBot('YandexCalendar');

        // assertions
        $this->assertTrue($Result, 'Invalid result');
    }

    /**
     * Testing bot detection
     */
    public function testBotFailed()
    {
        // test body
        $Result = \Mezon\Utils::isBot('Unexisting Bot');

        // assertions
        $this->assertFalse($Result, 'Invalid result');
    }
}
