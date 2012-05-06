<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Public Blog module controller
 *
 * @author		PyroCMS Dev Team
 * @package 	PyroCMS\Core\Modules\Blog\Controllers
 */
class Download_mod extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
//		$this->load->model('blog_m');
//		$this->load->model('blog_categories_m');
//		$this->load->model('comments/comments_m');
//		$this->load->library(array('keywords/keywords'));
//		$this->lang->load('blog');
	}


  public function index(){
    echo "download mod index";
  }

	public function get($file_name)
	{
    $download_url = base_url().Settings::get('download_folder').'/'.$file_name;
    redirect($download_url);
    
    echo "downloading: $download_url";
//		$pagination = create_pagination('blog/page', $this->blog_m->count_by(array('status' => 'live')), NULL, 3);
//		$_blog = $this->blog_m->limit($pagination['limit'])
//			->get_many_by(array('status' => 'live'));
//
//		// Set meta description based on post titles
//		$meta = $this->_posts_metadata($_blog);
//
//		foreach ($_blog as &$post)
//		{
//			$post->keywords = Keywords::get_links($post->keywords, 'blog/tagged');
//		}
//
//		$this->template
//			->title($this->module_details['name'])
//			->set_breadcrumb(lang('blog_blog_title'))
//			->set_metadata('description', $meta['description'])
//			->set_metadata('keywords', $meta['keywords'])
//			->set('pagination', $pagination)
//			->set('blog', $_blog)
//			->build('posts');
	}

}
