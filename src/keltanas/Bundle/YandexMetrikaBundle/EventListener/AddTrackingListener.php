<?php
/**
 * Tracking referals
 * @author: Nikolay Ermin <keltanas@gmail.com>
 */

namespace keltanas\Bundle\YandexMetrikaBundle\EventListener;

use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class AddTrackingListener
{
    /**
     * @var boolean
     */
    private $debug;

    /** @var array */
    private $params;

    /** @var TwigEngine */
    private $templating;


    public function __construct(TwigEngine $templating, array $params = [])
    {
        $this->templating = $templating;
        $this->params = $params;
        $this->debug = $params['debug'];
    }

    /**
     * Store value to cookie
     * @param FilterResponseEvent $event
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $config = [
            'id' => $this->params['number'],
            'accurateTrackBounce' => $this->params['accurateTrackBounce'], // показатель отказов: true | false | 10000 (ms)
            'clickmap' => $this->params['clickmap'], // Включает карту кликов
            'defer' => $this->params['defer'], // Не отправлять хит при инициализации счетчика
            'enableAll' => $this->params['enableAll'], // Включает отслеживание внешних ссылок, карту кликов и точный показатель отказов
            'onlyHttps' => $this->params['onlyHttps'], // true — данные в Метрику передаются только по https-протоколу;
            'params' => $this->params['params'], // Параметры, передаваемые вместе с хитом
            'trackHash' => true, // Включает отслеживание хеша в адресной строке браузера
            'trackLinks' => true, // Включает отслеживание внешних ссылок
            'type' => 0, // Тип счетчика. Для РСЯ равен 1
            'ut' => 0, // Запрет отправки страниц на индексацию http://help.yandex.ru/metrika/code/stop-indexing.xml#stop-indexing
            'webvisor' => true, // Включает Вебвизор
        ];

        $htmlCode = $this->templating->render('keltanasYandexMetrikaBundle:Metrika:tracker.html.twig', [
                'ya_tracking' => $this->params['number'],
                'config' => array_filter($config),
            ]);

        $event->getResponse()->setContent(str_replace(
            '</body>',
            $htmlCode . '</body>',
            $event->getResponse()->getContent()
        ));
    }
}
