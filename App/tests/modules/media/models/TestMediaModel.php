<?php

class TestMediaModel extends PHPUnit_Framework_TestCase
{

    /**
     * @var \Modules\Media\Models\MediaModel
     */
    public $objects;

    public function setUp(){
        $this->objects = new \Modules\Media\Models\MediaModel();
    }

    /**
     * @return array
     */
    public function intException()
    {
        return array(array('is string' => 'Lorem Ipsum'));
    }

    /**
     * @return array
     */
    public function stringException()
    {
        return array(array('is null' => null, 'is int' => 3));
    }

    /**
     * @dataProvider intException
     * @expectedException InvalidArgumentException
     */
    public function testMediaIdException($datas){
        $this->objects->setId($datas);
        $this->objects->getId();
    }

    public function testMediaId(){
        $d = 3;
        $this->objects->setId($d);
        $r = $this->objects->getId();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider stringException
     * @expectedException InvalidArgumentException
     */
    public function testMediaTitleException($datas){
        $this->objects->setTitle($datas);
        $this->objects->getTitle();
    }

    public function testMediaTitle(){
        $d = 'Lorem Ipsum !';
        $this->objects->setTitle($d);
        $r = $this->objects->getTitle();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider stringException
     * @expectedException InvalidArgumentException
     */
    public function testMediaTypeException($datas){
        $this->objects->setType($datas);
        $this->objects->getType();
    }

    public function testMediaType(){
        $d = 'Lorem Ipsum !';
        $this->objects->setType($d);
        $r = $this->objects->getType();
        $this->assertEquals($d, $r);
    }

    public function tearDown(){
        $this->objects = null;
    }

    //phpunit --bootstrap bootstrapPhpUnit.php modules\media\models\TestMediaModel.php

}
