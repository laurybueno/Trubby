<?php
class WebTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp(){
        $this->setBrowser('firefox');
        $this->setBrowserUrl('https://trubby-flashfox.c9.io/');
    }
 
    public function testTitle()
    {
        $this->open('/usuario/login.php');
        $this->assertTitle('trubby!');
    }
 
}
?>