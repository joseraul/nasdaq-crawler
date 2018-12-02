[![Build Status](https://travis-ci.org/joseraul/nasdaq-crawler.svg?branch=master)](https://travis-ci.org/joseraul/nasdaq-crawler)

# Nasdaq Crawler
This is an Open Source PHP package that helps to extract information from the official Nasdaq website.

Keep in mind that you do not own the information, it is only for your personal use.

## Install
```
composer require joseraul/nasdaq-crawler 
```

## How to use

### Resources
#### FTP
Get files from the ftp folder: ftp://ftp.nasdaqtrader.com

##### Not parsed (return the raw file)
* `path()`
```
$client = new NasdaqCrawler\Client();
$data = $client->ftp()->path('SymbolDirectory/nasdaqlisted.txt');
print_r($data);
```
 
##### Parsed (response cleaned)
* `nasdaqlisted()`
```
$client = new NasdaqCrawler\Client();
$data = $client->ftp()->nasdaqlisted();
print_r($data);
```
