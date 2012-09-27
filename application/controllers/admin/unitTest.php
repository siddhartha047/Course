<?php class UnitTest extends CI_Controller{

    function  __construct() {
        parent::__construct();
        $this->my_library->check_logged_in();
    }

    function index(){
        $fixture = array();
        $this->assertTrue(count($fixture) == 0);

        $fixture[] = 'element';
        $this->assertTrue(count($fixture) == 1);
    }

    function assertTrue($condition){
        if (!$condition) {
            throw new Exception('Assertion failed.');
        }
    }

    function sample(){
        echo 'This is sample test';
        $test = $this->getI(4);

        $expected_result = 16;

        $test_name = 'Adds one plus one';

        echo $this->unit->run($test, $expected_result, $test_name);
       
        /*echo br();
        echo $this->unit->result();
        echo br();
        echo $this->unit->report();

        echo br();
        echo $this->unit->run('Foo', 'Foo');
        echo br();
        echo $this->unit->run('Foo', 'is_string');*/
    }
    
    
    function getI($i=5){
        return $i*$i;
    }




    



}