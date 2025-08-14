<?php 
defined('BASEPATH') OR exit ('no direct script access allowed');

/**
 * 
 */
class TestModel extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function writeModel()
    {
        if(isset($_POST['sendOtp']))
        {
            echo "hi";
        }
    }
}
?>