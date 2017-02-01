<?php

use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class LittleKernel extends Kernel
{
    use MicroKernelTrait;

    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new TwigBundle(),
            new SensioFrameworkExtraBundle()
        ];
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->add('/hello/symfony/{version}', 'kernel:helloSymfony');

        $routes->import(__DIR__.'/../src/TicBundle/Controller', '/', 'annotation');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'secret' => 't0pS3cr3tZ',
            'templating' => ['engines' => ['twig']],
        ]);
    }

    public function helloSymfony($version)
    {
        return new Response('Hi Symfony version '.$version);
    }

    public function getCacheDir()
    {
        return __DIR__.'/../var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return __DIR__.'/../var/logs';
    }
}
