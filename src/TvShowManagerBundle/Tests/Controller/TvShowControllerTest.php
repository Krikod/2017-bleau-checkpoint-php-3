<?php

namespace TvShowManagerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TvShowControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'tvshow/add');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'tvshow/list');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'tvshow/show');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'tvshow/edit');
    }

}
