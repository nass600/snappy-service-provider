<?php

namespace Nass600\Silex\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Knp\Snappy\Pdf;
use Knp\Snappy\Image;

/**
 * Snappy library Provider.
 *
 * @author Ignacio Velazquez <ivelazquez85@gmail.com>
 */
class SnappyServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     */
    public function register(Container $container)
    {
        $container['snappy.pdf.binary'] = '/usr/local/bin/wkhtmltopdf';
        $container['snappy.pdf.options'] = array();

        $container['snappy.pdf'] = function ($container) {
            return new Pdf($container['snappy.pdf.binary'], $container['snappy.pdf.options']);
        };

        $container['snappy.image.binary'] = '/usr/local/bin/wkhtmltoimage';
        $container['snappy.image.options'] = array();

        $container['snappy.image'] = function ($container) {
            return new Image($container['snappy.image.binary'], $container['snappy.image.options']);
        };
    }
}
