<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf_min/tcpdf.php';

class CI_Pdf extends TCPDF
{
    protected $CI;
    function __construct()
    {
        parent::__construct();
        $this->CI=& get_instance();
    }
}