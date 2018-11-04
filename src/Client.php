<?php

namespace NasdaqCrawler;

use NasdaqCrawler\Resources\Ftp;

class Client
{

    /**
     * Return FTP resource.
     *
     * @return Ftp
     */
    public function ftp()
    {
        return new Ftp();
    }
}