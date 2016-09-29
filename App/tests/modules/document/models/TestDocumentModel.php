<?php

class TestDocumentModel extends PHPUnit_Framework_TestCase
{

    /**
     * @var \Modules\Document\Models\DocumentModel
     */
    public $objects;

    public function setUp(){
        $this->objects = new \Modules\Document\Models\DocumentModel();
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
    public function testDocumentIdException($datas){
        $this->objects->setId($datas);
        $this->objects->getId();
    }

    public function testDocumentId(){
        $d = 3;
        $this->objects->setId($d);
        $r = $this->objects->getId();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider stringException
     * @expectedException InvalidArgumentException
     */
    public function testDocumentTitleException($datas){
        $this->objects->setTitle($datas);
        $this->objects->getTitle();
    }

    public function testDocumentTitle(){
        $d = 'Lorem Ipsum !';
        $this->objects->setTitle($d);
        $r = $this->objects->getTitle();
        $this->assertEquals($d, $r);
    }


    /**
     * @dataProvider stringException
     * @expectedException InvalidArgumentException
     */
    public function testDocumentSubtitleException($datas){
        $this->objects->setSubtitle($datas);
        $this->objects->getSubtitle();
    }

    public function testDocumentSubtitle(){
        $d = 'Lorem Ipsum !';
        $this->objects->setSubtitle($d);
        $r = $this->objects->getSubtitle();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider stringException
     * @expectedException InvalidArgumentException
     */
    public function testDocumentText1Exception($datas){
        $this->objects->setText1($datas);
        $this->objects->getText1();
    }

    public function testDocumentText1(){
        $d = 'Lorem Ipsum !';
        $this->objects->setText1($d);
        $r = $this->objects->getText1();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider stringException
     * @expectedException InvalidArgumentException
     */
    public function testDocumentText2Exception(){
        $this->objects->setText2(3);
        $this->objects->getText2();
    }

    public function testDocumentText2(){
        $d = 'Lorem Ipsum !';
        $this->objects->setText2($d);
        $r = $this->objects->getText2();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider stringException
     * @expectedException InvalidArgumentException
     */
    public function testDocumentLinkException(){
        $this->objects->setLink(3);
        $this->objects->getLink();
    }

    public function testDocumentLink(){
        $d = 'Lorem Ipsum !';
        $this->objects->setLink($d);
        $r = $this->objects->getLink();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider stringException
     * @expectedException InvalidArgumentException
     */
    public function testDocumentText_LinkException(){
        $this->objects->setText_Link(3);
        $this->objects->getText_Link();
    }

    public function testDocumentText_Link(){
        $d = 'Lorem Ipsum !';
        $this->objects->setText_Link($d);
        $r = $this->objects->getText_Link();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider intException
     * @expectedException InvalidArgumentException
     */
    public function testCat_IdException($datas){
        $this->objects->setCat_Id($datas);
        $this->objects->getCat_Id();
    }

    public function testCat_Id(){
        $d = 3;
        $this->objects->setCat_Id($d);
        $r = $this->objects->getCat_Id();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider stringException
     * @expectedException InvalidArgumentException
     */
    public function testDocumentCat_NameException($datas){
        $this->objects->setCat_Name($datas);
        $this->objects->getCat_Name();
    }

    public function testDocumentCat_Name(){
        $d = 'Lorem Ipsum !';
        $this->objects->setCat_Name($d);
        $r = $this->objects->getCat_Name();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider intException
     * @expectedException InvalidArgumentException
     */
    public function testSubcat_IdException($datas){
        $this->objects->setSubcat_Id($datas);
        $this->objects->getSubcat_Id();
    }

    public function testSubcat_Id(){
        $d = 3;
        $this->objects->setSubcat_Id($d);
        $r = $this->objects->getSubcat_Id();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider stringException
     * @expectedException InvalidArgumentException
     */
    public function testDocumentSubcat_NameException($datas){
        $this->objects->setSubcat_Name($datas);
        $this->objects->getSubcat_Name();
    }

    public function testDocumentSubcat_Name(){
        $d = 'Lorem Ipsum !';
        $this->objects->setSubcat_Name($d);
        $r = $this->objects->getSubcat_Name();
        $this->assertEquals($d, $r);
    }

    /**
     * @dataProvider intException
     * @expectedException InvalidArgumentException
     */
    public function testFlag_HomeException($datas){
        $this->objects->setFlag_Home($datas);
        $this->objects->getFlag_Home();
    }

    public function testFlag_Home(){
        $d = 1;
        $this->objects->setFlag_Home($d);
        $r = $this->objects->getFlag_Home();
        $this->assertEquals($d, $r);
    }


    public function tearDown(){
        $this->objects = null;
    }

    //phpunit --bootstrap bootstrapPhpUnit.php modules\document\models\TestDocumentModel.php

}
