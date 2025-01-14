<?php

namespace Tristanfrn\PennylaneLaravel;

use GuzzleHttp\ClientInterface;
use Tristanfrn\PennylaneLaravel\Api\Enums;
use Tristanfrn\PennylaneLaravel\Api\Invoices;
use Tristanfrn\PennylaneLaravel\Api\Products;
use Tristanfrn\PennylaneLaravel\Api\Customers;
use Tristanfrn\PennylaneLaravel\Api\Estimates;

class PennylaneLaravel
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function me()
    {
        $response = $this->client->request('get', 'me');

        return json_decode($response->getBody()->getContents(), true);
    }

    public function customers()
    {
        return new Customers($this->client);
    }

    public function products()
    {
        return new Products($this->client);
    }

    public function invoices()
    {
        return new Invoices($this->client);
    }

    public function estimates()
    {
        return new Estimates($this->client);
    }

    public function enums()
    {
        return new Enums($this->client);
    }
}
