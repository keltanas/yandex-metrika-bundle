<?php
/**
 *
 * @author: Nikolay Ermin <keltanas@gmail.com>
 */

namespace keltanas\Bundle\YandexMetrikaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('keltanasYandexMetrikaBundle:Default:index.html.twig');
    }
}
