<?php
namespace Mezon\Utils\Tests;

use PHPUnit\Framework\TestCase;
use Mezon\Utils\Utils;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
class UtilsUnitTest extends TestCase
{

    /**
     * Testing bot detection
     */
    public function testBotSuccess(): void
    {
        // test body
        $result = Utils::isBot('YandexCalendar');

        // assertions
        $this->assertTrue($result, 'Invalid result');
    }

    /**
     * Testing bot detection
     */
    public function testBotFailed(): void
    {
        // test body
        $result = Utils::isBot('Unexisting Bot');

        // assertions
        $this->assertFalse($result, 'Invalid result');
    }

    /**
     * Testing translit function
     */
    public function testTranslit(): void
    {
        // test body
        $result = Utils::translit('а б');

        // assertions
        $this->assertEquals('a b', $result);
    }

    /**
     * Testing url transliteration
     */
    public function testTranslitUrl(): void
    {
        // test body
        $result = Utils::translitUrl('а б?"');

        // assertions
        $this->assertEquals('a-b', $result);
    }

    /**
     * Testing mbStrTr method
     */
    public function testMbStrTr(): void
    {
        // test body
        $result = Utils::mbStrTr('аб', 'аб', 'вг');

        // assertions
        $this->assertEquals('вг', $result);
    }
}
