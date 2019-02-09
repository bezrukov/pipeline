<?php

namespace Php\pipeline\Tests;

use Php\pipeline\IO;
use Php\pipeline\Main;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    /**
     * @dataProvider fileListProvider
     *
     * @param $fileList
     * @param $expect
     */
    public function testMain($fileList, $expect)
    {
        $io = $this->getIOMock($fileList);
        $main = new Main($io);

        $this->assertEquals($expect, $main->main());
    }

    private function getIOMock($fileList)
    {
        $response = $this->createMock(IO::class);
        $response->method('getFilesFromDir')->willReturn($fileList);
        return $response;
    }

    public function fileListProvider()
    {
        return [
            [['.','..','php-package'], 'PHP-PACKAGES'],
            [['.','..','php-package', 'jopa', 'list'], 'LISTS'],
            [['.','..','polymorphism', 'inheritance', 'encapsulation'], 'INHERITANCES'],
        ];
    }
}