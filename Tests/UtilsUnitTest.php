<?php
require_once (__DIR__ . '/../Utils.php');

class UtilsUnitTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Testing bot detection
     */
    public function testBotSuccess(): void
    {
        // test body
        $result = \Mezon\Utils\Utils::isBot('YandexCalendar');

        // assertions
        $this->assertTrue($result, 'Invalid result');
    }

    /**
     * Testing bot detection
     */
    public function testBotFailed(): void
    {
        // test body
        $result = \Mezon\Utils\Utils::isBot('Unexisting Bot');

        // assertions
        $this->assertFalse($result, 'Invalid result');
    }

    /**
     * Testing translit function
     */
    public function testTranslit(): void
    {
        // test body
        $result = \Mezon\Utils\Utils::translit('а б');

        // assertions
        $this->assertEquals('a b', $result);
    }

    /**
     * Testing url transliteration
     */
    public function testTranslitUrl(): void
    {
        // test body
        $result = \Mezon\Utils\Utils::translitUrl('а б?"');

        // assertions
        $this->assertEquals('a-b', $result);
    }

    public function testMbStrTr(): void
    {
        // test body
        $result = \Mezon\Utils\Utils::mbStrTr('аб', 'аб', 'вг');

        // assertions
        $this->assertEquals('вг', $result);
    }
}
