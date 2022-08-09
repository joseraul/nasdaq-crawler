<?php

use NasdaqCrawler\Resources\Ftp;
use PHPUnit\Framework\TestCase;

class FtpTest extends TestCase
{
    /** @test */
    public function path_method_return_raw_response()
    {
        $ftp = new Ftp();
        $response = $ftp->setBaseUrl(getcwd().'/tests/fake-data/')
            ->path('SymbolDirectory/nasdaqlisted.txt');

        $this->assertEquals(file_get_contents(getcwd().'/tests/fake-data/SymbolDirectory/nasdaqlisted.txt'), $response);
    }

    /** @test */
    public function nasdaqlisted_method_return_filtered_response()
    {
        $ftp = new Ftp();
        $response = $ftp->setBaseUrl(getcwd().'/tests/fake-data/')
            ->nasdaqlisted();

        $this->assertEquals([
            'info' => 'File Creation Time: 1130201821:31',
            'data' => [
                [
                    'Symbol' => 'AABA',
                    'Security Name' => 'Altaba Inc. - Common Stock',
                    'Market Category' => 'Q',
                    'Test Issue' => 'N',
                    'Financial Status' => 'N',
                    'Round Lot Size' => '100',
                    'ETF' => 'N',
                    'NextShares' => 'N',
                ],
                [
                    'Symbol' => 'AAL',
                    'Security Name' => 'American Airlines Group, Inc. - Common Stock',
                    'Market Category' => 'Q',
                    'Test Issue' => 'N',
                    'Financial Status' => 'N',
                    'Round Lot Size' => '100',
                    'ETF' => 'N',
                    'NextShares' => 'N',
                ],
            ],
        ], $response);
    }

    /** @test */
    public function options_method_return_filtered_response()
    {
        $ftp = new Ftp();
        $response = $ftp->setBaseUrl(getcwd().'/tests/fake-data/')
            ->options();

        $this->assertEquals([
            'info' => 'File Creation Time: 0805202221:32',
            'data' => [
                [
                    'Root Symbol' => 'A',
                    'Options Closing Type' => 'N',
                    'Options Type' => 'C',
                    'Expiration Date' => '08/19/2022',
                    'Explicit Strike Price' => '135.000',
                    'Underlying Symbol' => 'A',
                    'Underlying Issue Name' => 'AGILENT TECH INC',
                    'Pending' => 'N',
                ],
                [
                    'Root Symbol' => 'A',
                    'Options Closing Type' => 'N',
                    'Options Type' => 'C',
                    'Expiration Date' => '09/16/2022',
                    'Explicit Strike Price' => '110.000',
                    'Underlying Symbol' => 'A',
                    'Underlying Issue Name' => 'AGILENT TECH INC',
                    'Pending' => 'N',
                ],
            ],
        ], $response);
    }
}