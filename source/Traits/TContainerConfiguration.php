<?php namespace Vaccuum\Container\Traits;

use Vaccuum\Contracts\Config\IConfig;

trait TContainerConfiguration
{
    /**
     * Configure container.
     *
     * @param IConfig $config
     *
     * @return void
     */
    protected function configure(IConfig $config)
    {
        $configuration = $config->get('container');

        foreach ($configuration as $name => $group)
        {
            switch ($name)
            {
                case 'parameters':
                    $this->configureParameters($group);
                    break;

                case 'shared':
                    $this->configureShared($group);
                    break;

                case 'definitions':
                    $this->configureDefinitions($group);
                    break;

                case 'aliases':
                    $this->configureAliases($group);
                    break;

                case 'factories':
                    $this->configureFactories($group);
                    break;
            }
        }
    }

    /**
     * @param array $group
     *
     * @return void
     */
    protected function configureParameters(array $group)
    {
        foreach ($group as $name => $value)
        {
            $this->parameter($name, $value);
        }
    }

    /**
     * @param array $group
     *
     * @return void
     */
    protected function configureShared(array $group)
    {
        foreach ($group as $dependency)
        {
            $this->share($dependency);
        }
    }

    /**
     * @param array $group
     *
     * @return void
     */
    protected function configureDefinitions(array $group)
    {
        foreach ($group as $name => $dependencies)
        {
            $this->definition($name, $dependencies);
        }
    }

    /**
     * @param array $group
     *
     * @return void
     */
    protected function configureAliases(array $group)
    {
        foreach ($group as $name => $dependency)
        {
            $this->alias($name, $dependency);
        }
    }

    /**
     * @param array $group
     *
     * @return void
     */
    protected function configureFactories(array $group)
    {
        foreach ($group as $name => $delegate)
        {
            $this->factory($name, $delegate);
        }
    }
}