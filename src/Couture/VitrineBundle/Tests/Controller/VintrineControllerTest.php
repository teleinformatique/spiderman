<?php

namespace Couture\VitrineBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VintrineControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testLicence()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/licence');
    }

    public function testApropos()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/apropos');
    }

}
