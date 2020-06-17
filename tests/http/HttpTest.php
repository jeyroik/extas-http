<?php
namespace tests\http;

use extas\interfaces\http\IHasHttpIO;

use extas\components\extensions\ExtensionRepository;
use extas\components\http\THasHttpIO;
use extas\components\http\TSnuffHttp;
use extas\components\Item;
use extas\components\plugins\PluginRepository;
use extas\components\protocols\ProtocolRepository;
use extas\components\repositories\TSnuffRepository;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

/**
 * Class HttpTest
 *
 * @package tests\http
 * @author jeyroik <jeyroik@gmail.com>
 */
class HttpTest extends TestCase
{
    use TSnuffHttp;
    use TSnuffRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->registerSnuffRepos([
            'protocolRepository' => ProtocolRepository::class,
            'extensionRepository' => ExtensionRepository::class,
            'pluginRepository' => PluginRepository::class
        ]);
    }

    protected function tearDown(): void
    {
        $this->unregisterSnuffRepos();
    }

    public function testHasHttpIo()
    {
        $item = new class ([
            IHasHttpIO::FIELD__PSR_REQUEST => $this->getPsrRequest(),
            IHasHttpIO::FIELD__ARGUMENTS => ['test is ok']
        ]) extends Item {
            use THasHttpIO;
            protected function getSubjectForExtension(): string
            {
                return 'test';
            }
        };

        $item->setPsrResponse($this->getPsrResponse());

        $io = $item->getHttpIO(['test' => 'is ok']);
        $this->assertCount(3, $io);
        $this->assertArrayHasKey(IHasHttpIO::FIELD__PSR_REQUEST, $io);
        $this->assertArrayHasKey(IHasHttpIO::FIELD__PSR_RESPONSE, $io);
        $this->assertEquals(['test is ok'], $item->getArguments());
        $item->applyProtocols();
    }
}
