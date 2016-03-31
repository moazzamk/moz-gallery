<?php

namespace spec\MozGallery\Service;

use PhpSpec\ObjectBehavior;

class TableFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('hi');
        $this->setTableNamespace('spec\MozGallery\Service\\');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('\MozGallery\Service\TableFactory');
    }

    public function it_gets_tables()
    {
        $this->get('SomeTable')->shouldBeAnInstanceOf('spec\MozGallery\Service\SomeTable');
    }

    public function it_gets_the_same_instance_on_multiple_calls()
    {
        $obj = $this->get('SomeTable')->getWrappedObject();
        $this->get('SomeTable')->shouldBe($obj);
    }
}

class SomeTable
{

}
