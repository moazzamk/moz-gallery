<?php

namespace MozGallery\Service;

class Container
{
    private $data;

    /**
     * Set a value for a key
     *
     * @param string  $key    Key
     * @param mixed   $value  Value
     *
     * @return self
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * Get the value for a key
     *
     * If the value is a callable, then it gets executed the first time
     * it is requested, then the same object/result is returned on subsequent
     * calls.
     *
     * @param string  $key  Key
     *
     * @return mixed
     */
    public function get($key)
    {
        if (!isset($this->data[$key])) {
            throw new \OutOfBoundsException('Key does not exist');
        }

        if (is_callable($this->data[$key])) {
            $this->data[$key] = $this->data[$key]($this);
            return $this->data[$key];
        }

        return $this->data[$key];
    }

    /**
     * Check if the container has a value for a key
     *
     * @param string  $key
     * 
     * @return bool
     */
    public function has($key)
    {
        return isset($this->data[$key]);
    }
}
