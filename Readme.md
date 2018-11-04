# Nasdaq Crawler
Extract information from official Nasdaq website

## Install
```
composer require joseraul/nasdaq-crawler 
```

## How to use

### Resources
#### FTP
Get files from the ftp

##### Not parsed (return the raw file)
* `path()`
```
$client = new NasdaqCrawler\Client();
$data = $client->ftp()->path();
print_r($data);
```
 
##### Parsed (clean the response)
* `nasdaqlisted()`
```
$client = new NasdaqCrawler\Client();
$data = $client->ftp()->nasdaqlisted();
print_r($data);
```
