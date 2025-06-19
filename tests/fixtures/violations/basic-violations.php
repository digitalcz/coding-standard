<?php

namespace DigitalCz\Example;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;
use Symfony\Component\Serializer\Annotation\Groups;

class BadExample {
    var $oldStyleProperty;
    public $publicProperty;
    const CONSTANT_WITHOUT_VISIBILITY = 'bad';
    
    function methodWithoutVisibility() {
        return null;
    }
    
    public function methodWithYodaComparison($param) {
        if (true === $param) {
            return $param;
        }
        return null;
    }
    
    public function methodWithLongArray() {
        return array('old', 'style', 'array');
    }
}