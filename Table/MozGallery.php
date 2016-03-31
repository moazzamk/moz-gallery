<?php

namespace MozGallery\Table;

class MozGallery
{
    /** @var  \wpdb */
    public $db;

    /** @var string  */
    private $table = 'moz_gallery';



    /**
     * @param \wpdb  $db
     */
    public function ___construct(\wpdb $db)
    {
        $this->db = $db;
    }

    public function setDb(\wpdb $db)
    {
        $this->db = $db;
    }

    /**
     * @param array  $data
     *
     * @return int
     */
    public function insert(array $data)
    {
        $this->db->insert($this->db->prefix . $this->table, $data);
        return $this->db->insert_id;
    }
}
