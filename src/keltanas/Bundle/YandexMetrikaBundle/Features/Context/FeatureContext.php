<?php
/**
 * This file is part of the @package@.
 *
 * @author: Nikolay Ermin <keltanas@gmail.com>
 * @version: @version@
 */

namespace keltanas\Bundle\YandexMetrikaBundle\Features\Context;


use Behat\MinkExtension\Context\MinkContext;
use Behat\Symfony2Extension\Context\KernelDictionary;

class FeatureContext extends MinkContext
{
    use KernelDictionary;
}
