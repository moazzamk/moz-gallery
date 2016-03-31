<?php

namespace spec\MozGallery\Controller;

use MozGallery\Table\MozGallery;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AdminSpec extends ObjectBehavior
{
    public function let(MozGallery $mozGalleryTable)
    {
        $this->beConstructedWith($mozGalleryTable);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('\MozGallery\Controller\Admin');
    }
}
