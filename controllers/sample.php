<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a sample module for PyroCMS
 *
 * @author 		Jerel Unruh - PyroCMS Dev Team
 * @website		http://unruhdesigns.com
 * @package 	PyroCMS
 * @subpackage 	Sample Module
 */
class Sample extends Public_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	/**
	 * All items
	 */
	public function index($offset = 0)
	{
    echo "sample!!!";
	}
}