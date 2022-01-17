<?php
namespace Mezon\Utils\Tests;

use PHPUnit\Framework\TestCase;
use Mezon\Utils\Fs;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class FsUnitTest extends TestCase
{

    /**
     * Testing method
     */
    public function testEmptyAndNonEmptyDirs(): void
    {
        // test body and assertions
        $this->assertFalse(Fs::isDirectoryEmpty(__DIR__));
        $this->assertTrue(Fs::isDirectoryEmpty(__DIR__ . '/EmptyDir'));
    }

    /**
     * Testing exception
     */
    public function testExceptionForNonReadableDirectory(): void
    {
        // assertions
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(- 1);
        $this->expectExceptionMessage('Path "./unexisting" is not directory');

        // test body
        Fs::isDirectoryEmpty('./unexisting');
    }
}
