<?php

namespace MozGallery\Controller;

use MozGallery\Table\MozGallery;

class Gallery
{
    /** @var MozGallery  */
    private $table;



    public function __construct(MozGallery $mozGallery)
    {
        $this->table = $mozGallery;
    }

    public function listImages()
    {
        $data = $this->table->getAll();
        require __DIR__ . '/../views/gallery.php';
    }
}
