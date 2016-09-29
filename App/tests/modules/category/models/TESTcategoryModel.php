<?php
class TestCategoryModel extends PHPUnit_Framework_TestCase
{

    /**
     * @var \Modules\Category\Models\CategoryModel
     */
    public $objects;

    public function setUp(){
        $this->objects = new \Modules\Category\Models\CategoryModel();
    }

    /**
     * @return array
     */
    public function stringExceptionNull()
    {
        return array(array('is null' => null, 'is int' => 3));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCategoryCatIdException(){
        $this->objects->setCat_Id('Lorem Ipsum');
        $this->objects->getCat_Id();
    }

    public function testCategoryCatId(){
        $d = '3';
        $this->objects->setCat_Id($d);
        $r = $this->objects->getCat_Id();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider stringExceptionNull
     * @expectedException InvalidArgumentException
     */
    public function testCategoryCatNameException($datas){
        $this->objects->setCat_Name($datas);
        $this->objects->getCat_Name();
    }

    public function testCategoryCatName(){
        $d = 'Lorem Ipsum !';
        $this->objects->setCat_Name($d);
        $r = $this->objects->getCat_Name();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider stringExceptionNull
     * @expectedException InvalidArgumentException
     */
    public function testCategoryCatIconException($datas){
        $this->objects->setCat_Icon($datas);
        $this->objects->getCat_Icon();
    }

    public function testCategoryCatIcon(){
        $d = 'Lorem Ipsum !';
        $this->objects->setCat_Icon($d);
        $r = $this->objects->getCat_Icon();
        $this->assertEquals($d, $r);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCategorySubcatIdException(){
        $this->objects->setSubcat_Id('Lorem Ipsum');
        $this->objects->getSubcat_Id();
    }

    public function testCategorySubcatId(){
        $d = '3';
        $this->objects->setSubcat_Id($d);
        $r = $this->objects->getSubcat_Id();
        $this->assertEquals($d, $r);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCategorySubcatNameException(){
        $this->objects->setSubcat_Name(7);
        $this->objects->getSubcat_Name();
    }

    public function testCategorySubcatName(){
        $d = 'Lorem Ipsum !';
        $this->objects->setSubcat_Name($d);
        $r = $this->objects->getSubcat_Name();
        $this->assertEquals($d, $r);
    }

    public function tearDown(){
        $this->objects = null;
    }

    //phpunit --bootstrap bootstrapPhpUnit.php modules\category\models\TestCategoryModel.php

}
