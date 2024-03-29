<?php

namespace NasdaqCrawler\Resources;

use NasdaqCrawler\ResourceAbstract;

class Ftp extends ResourceAbstract
{
    /** @var string */
    protected $base_url = 'ftp://ftp.nasdaqtrader.com/';

    /**
     * Return any file from the ftp.
     *
     * @param $path
     * @return bool|string
     */
    public function path($path)
    {
        return file_get_contents($this->base_url . $path);
    }

    /**
     * @param $url
     * @return $this
     */
    public function setBaseUrl($url)
    {
        $this->base_url = $url;
        return $this;
    }

    private function parseSymbolsFile($csv_file)
    {
        // Parse the rows
        $rows = str_getcsv($csv_file, "\n");

        // Extract the header
        $header = str_getcsv($rows[0], "|");
        unset($rows[0]);

        // Extract the last line
        $info = str_getcsv(array_pop($rows), "|")[0];

        // Combine
        foreach ($rows as &$row) {
            $row = array_combine($header, str_getcsv($row, "|"));
        }

        return [
            'info' => $info,
            'data' => array_values($rows),
        ];
    }

    /**
     * Return the file nasdaqlisted.txt cleaned.
     *
     * @return array
     */
    public function nasdaqlisted()
    {
        return $this->parseSymbolsFile(
            $this->path('SymbolDirectory/nasdaqlisted.txt')
        );
    }

    /**
     * Return the file otherlisted.txt cleaned.
     *
     * @return array
     */
    public function otherlisted()
    {
        return $this->parseSymbolsFile(
            $this->path('SymbolDirectory/otherlisted.txt')
        );
    }

    /**
     * Return the file options.txt cleaned.
     *
     * @return array
     */
    public function options()
    {
        return $this->parseSymbolsFile(
            $this->path('SymbolDirectory/options.txt')
        );
    }
}