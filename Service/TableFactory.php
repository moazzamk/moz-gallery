<?php

namespace MozGallery\Service;

class TableFactory
{
    /** @var string */
    private $namespace = '\MozGallery\Table\\';

    /** @var  array */
    private $tables;

    /** @var \wpdb  */
    private $db;


    /**
     * TableFactory constructor.
     *
     * @param \wpdb  $db
     */
    public function __construct(\wpdb $db)
    {
        $this->db = $db;
    }

    /**
     * @param $namespace
     *
     * @return self
     */
    public function setTableNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }
    
    /**
     * Get a table/repository class
     *
     * @param string  $name
     * @return mixed
     */
    public function get($name)
    {
        if (!isset($this->tables[$name])) {
            $class = $this->namespace . $name;

            $this->tables[$name] = new $class($this->db);
            $this->tables[$name]->setDb($this->db);
        }

        return $this->tables[$name];
    }
}
