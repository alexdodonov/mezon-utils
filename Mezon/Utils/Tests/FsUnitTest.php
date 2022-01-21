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
        // setup
        @mkdir(__DIR__ . '/EmptyDir');
        Fs::cleanUpDirectory(__DIR__ . '/EmptyDir');

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

    /**
     * Testing directory cleanup
     */
    public function testCleanUpDirectory(): void
    {
        // setup
        @mkdir(__DIR__ . '/EmptyDir');
        file_put_contents(__DIR__ . '/EmptyDir/1', '1');

        // test body
        Fs::cleanUpDirectory(__DIR__ . '/EmptyDir');

        // assertions
        $this->assertTrue(Fs::isDirectoryEmpty(__DIR__ . '/EmptyDir'));
    }
}
