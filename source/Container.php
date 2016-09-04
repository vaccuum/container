<?php namespace Vaccuum\Container;

use Auryn\Injector;
use Vaccuum\Container\Traits\TContainerConfiguration;
use Vaccuum\Container\Traits\TContainerInjection;
use Vaccuum\Contracts\Config\IConfig;
use Vaccuum\Contracts\Container\IContainer;

class Container implements IContainer
{
    use TContainerInjection;
    use TContainerConfiguration;

    /** @var Injector */
    protected $injector;

    /**
     * Container constructor.
     *
     * @param IConfig $config
     */
    public function __construct(IConfig $config)
    {
        $this->injector = new Injector();

        $this->share($this);
        $this->share($config);

        $this->configure($config);
    }
}