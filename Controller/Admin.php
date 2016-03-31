<?php

namespace MozGallery\Controller;

use MozGallery\Table\MozGallery;

class Admin
{
    /** @var  MozGallery */
    private $table;

    
    public function __construct(MozGallery $mozGalleryTable)
    {
        $this->table = $mozGalleryTable;
    }

    /**
     * Show the add form
     */
    public function addForm()
    {
        require_once __DIR__ . '/../views/add.php';
    }

    /**
     * Add an image to the gallery
     *
     * @param array  $data
     */
    public function add(array $data)
    {
        $insertData = [
            'title' => empty($data['title']) ? '' : $data['title'],
            'image' => empty($data['image']) ? '' : $data['image'],
            'thumbnail' => empty($data['thumbnail']) ? '' : $data['thumbnail'],
            'description' => empty($data['description']) ? '' : $data['description'],
        ];

        $this->table->insert($insertData);
    }

    /**
     * List images
     */
    public function listImages()
    {
        $data = $this->table->getAll();
        require_once __DIR__ . '/../views/list.php';
    }

    /**
     * Update an image in the gallery
     *
     * @param array  $data
     */
    public function update(array $data)
    {
        //$this->mozGalleryTable
    }
}
