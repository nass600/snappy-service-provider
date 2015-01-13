<?php

namespace Nass600\Silex\Provider;

use Silex\ServiceProviderInterface;
use Silex\Application;
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
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['snappy.pdf.binary'] = '/usr/local/bin/wkhtmltopdf';
        $app['snappy.pdf.options'] = array();

        $app['snappy.pdf'] = $app->share(function ($app) {
            return new Pdf($app['snappy.pdf.binary'], $app['snappy.pdf.options']);
        });

        $app['snappy.image.binary'] = '/usr/local/bin/wkhtmltoimage';
        $app['snappy.image.options'] = array();

        $app['snappy.image'] = $app->share(function ($app) {
            return new Image($app['snappy.image.binary'], $app['snappy.image.options']);
        });
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
    }
}
