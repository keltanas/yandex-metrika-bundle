<?php
/**
 *
 * @author: Nikolay Ermin <keltanas@gmail.com>
 */

namespace keltanas\Bundle\YandexMetrikaBundle\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Hello Yandex")')->count() > 0);
    }
}
