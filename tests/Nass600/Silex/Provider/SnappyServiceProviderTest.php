<?php

namespace Nass600\Silex\Provider\Tests;

use Silex\Application;
use Nass600\Silex\Provider\SnappyServiceProvider;

/**
 * Class SnappyServiceProviderTest
 *
 * @author Ignacio Velazquez <ivelazquez85@gmail.com>
 */
class SnappyServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    protected $app;

    public function setUp()
    {
        $this->app = new Application();
    }

    public function createProvider($parameters = array())
    {
        $this->app->register(new SnappyServiceProvider(), $parameters);
    }

    public function testRegister()
    {
        $this->createProvider(array(
            'snappy.pdf.binary'   => '/usr/local/bin/wkhtmltopdf',
            'snappy.image.binary' => '/usr/local/bin/wkhtmltoimage',
        ));

        $this->assertInstanceOf('Knp\Snappy\Pdf', $this->app['snappy.pdf']);
        $this->assertInstanceOf('Knp\Snappy\Image', $this->app['snappy.image']);
    }

    public function testDefaultBinaries()
    {
        $pdfBinary = '/usr/local/bin/wkhtmltopdf';
        $imageBinary = '/usr/local/bin/wkhtmltoimage';

        $this->createProvider();

        $this->assertEquals($pdfBinary, $this->app['snappy.pdf']->getBinary());
        $this->assertEquals($imageBinary, $this->app['snappy.image']->getBinary());
    }

    public function testBinaries()
    {
        $pdfBinary = '/custom/bin/wkhtmltopdf';
        $imageBinary = '/custom/bin/wkhtmltoimage';

        $this->createProvider(array(
            'snappy.pdf.binary'   => $pdfBinary,
            'snappy.image.binary' => $imageBinary,
        ));

        $this->assertEquals($pdfBinary, $this->app['snappy.pdf']->getBinary());
        $this->assertEquals($imageBinary, $this->app['snappy.image']->getBinary());
    }

    public function testOptions()
    {
        $pdfOptions = array(
            'page-size' => 1170
        );

        $imageOptions = array(
            'format' => 'png'
        );

        $this->createProvider(array(
            'snappy.pdf.options'   => $pdfOptions,
            'snappy.image.options' => $imageOptions,
        ));

        $afterPdfOptions = $this->app['snappy.pdf']->getOptions();
        $afterImageOptions = $this->app['snappy.image']->getOptions();

        $this->assertEquals(1170, $afterPdfOptions['page-size']);
        $this->assertEquals('png', $afterImageOptions['format']);
    }
}
