<?php namespace Test\PacketHost\Client\Adapter\Configuration;

class DefaultConfigurationTest extends \PHPUnit_Framework_TestCase
{
    private $configuration = null;
    public function testConfiguration()
    {
        $configuration = new \PacketHost\Client\Adapter\Configuration\DefaultConfiguration('the-token','the-cunsumer-token',['header'=>'value'],['option'=>'value'], 'logger');

        $this->assertEquals('the-token', $configuration->getAuthToken());
        $this->assertEquals('the-cunsumer-token', $configuration->getConsumerToken());
        $this->assertEquals(['header'=>'value'], $configuration->getHeaders());
        $this->assertEquals(['option'=>'value'], $configuration->getOptions());
        $this->assertEquals('https://api.packet.net', $configuration->getEndPoint());
        $this->assertEquals('logger', $configuration->getLogger());
    }

}
