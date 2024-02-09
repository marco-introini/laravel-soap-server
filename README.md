# Laravel Soap Server Demo

## Overview

This project is a simple implementation of a SOAP server using Laravel.

It uses the Laminas SOAP package: https://github.com/laminas/laminas-soap

## Features

- Configurable SOAP endpoints
- Error handling for improper SOAP requests

## Installation

To install dependencies, run the following command in the project directory:

```
composer install
```

Usage

1. Start the Laravel server with:
    ```bash
    php artisan serve
    ```
2. To access the server SOAP endpoint, make a `POST` request to [server url]/api/soap/server.
3. To access the WSDL file, make a `GET` request to [server url]api/soap/server?wsdl.

## Requirements

- PHP >= 8.2
- The SOAP extension needs to be installed and enabled in PHP.

## Contributing

For any changes, please open an issue first to discuss what you would like to change. Pull requests are welcome.
