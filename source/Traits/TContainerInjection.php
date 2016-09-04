<?php namespace Vaccuum\Container\Traits;

trait TContainerInjection
{
    /** @inheritdoc */
    public function share($dependency)
    {
        return $this->injector->share($dependency);
    }

    /** @inheritdoc */
    public function make($name, array $arguments = [])
    {
        return $this->injector->make($name, $arguments);
    }

    /** @inheritdoc */
    public function parameter($name, $value)
    {
        return $this->injector->defineParam($name, $value);
    }

    /** @inheritdoc */
    public function definition($name, $dependencies)
    {
        $this->injector->define($name, $dependencies);
    }

    /** @inheritdoc */
    public function alias($name, $dependency)
    {
        return $this->injector->alias($name, $dependency);
    }

    /** @inheritdoc */
    public function factory($dependency, $delegate)
    {
        return $this->injector->delegate($dependency, $delegate);
    }
}