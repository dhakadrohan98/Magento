<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 24/8/22
 * Time: 6:16 PM
 */

namespace Dependency\Inject\Model;
use Magento\Sales\Model\EntityInterface;

class Student
{
    private $name;
    private $age;
    private $score;
    public function __construct($name = "Alexa", $age = 28,array $score = array('Maths'=>90,
                                'Computer Science'=>80))
    {
        $this->name = $name;
        $this->age = $age;
        $this->score = $score;
    }
    
    /**
     * @return string
     */
    public function getIncrementId()
    {
        
    }
}