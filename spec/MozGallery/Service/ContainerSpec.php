<?php

namespace spec\MozGallery\Service;

use PhpSpec\ObjectBehavior;

class ContainerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('\MozGallery\Service\Container');
    }

    public function it_return_false_on_value_check_of_non_existant_keys()
    {
        $this->has('yo')->shouldBe(false);
    }

    public function it_can_set_values()
    {
        $this->set('hello', 'hi');
        $this->has('hello')->shouldBe(true);
    }

    public function it_executes_callables_on_get()
    {
        $this->set('hello', function () {
            $data = new \StdClass;
            $data->key = 'value';
            return $data;
        });


        $obj = $this->get('hello')->getWrappedObject();
        $this->get('hello')->shouldBe($obj);
    }

    public function it_returns_set_values()
    {
        $this->set('hello', 'hi');
        $this->get('hello')->shouldBe('hi');
    }
}
