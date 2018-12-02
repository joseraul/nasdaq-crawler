<?php

use NasdaqCrawler\Client;

class ClientTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function ftp_function_returns_ftp_resource()
    {
        $client = new Client();
        $this->assertEquals('NasdaqCrawler\Resources\Ftp', get_class($client->ftp()));
    }
}