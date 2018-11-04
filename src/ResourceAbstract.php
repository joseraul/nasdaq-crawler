<?php

namespace NasdaqCrawler;

abstract class ResourceAbstract
{
    protected $http_client;
    protected $ftp_client;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->http_client = new \GuzzleHttp\Client();
//        $this->ftp_client = new \FtpClient\FtpClient();

        return $this;
    }
}