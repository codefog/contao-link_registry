<?php

/*
 * Link Registry Bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2017, Codefog
 * @author     Codefog <https://codefog.pl>
 * @license    MIT
 */

namespace Codefog\LinkRegistryBundle\Test\ContaoManager;

use Codefog\LinkRegistryBundle\CodefogLinkRegistryBundle;
use Codefog\LinkRegistryBundle\ContaoManager\Plugin;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use PHPUnit\Framework\TestCase;

class PluginTest extends TestCase
{
    public function testInstantiation()
    {
        static::assertInstanceOf(Plugin::class, new Plugin());
    }

    public function testGetBundles()
    {
        $plugin = new Plugin();
        $bundles = $plugin->getBundles($this->createMock(ParserInterface::class));

        /** @var BundleConfig $config */
        $config = $bundles[0];

        static::assertCount(1, $bundles);
        static::assertInstanceOf(BundleConfig::class, $config);
        static::assertEquals(CodefogLinkRegistryBundle::class, $config->getName());
        static::assertEquals([ContaoCoreBundle::class], $config->getLoadAfter());
    }
}
