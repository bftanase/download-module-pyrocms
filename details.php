<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Download module
 *
 * @author bftanase@gmail.com

 */
class Module_Download extends Module {

  public $version = '0.1';

  public function info() {
    return array(
        'name' => array(
            'en' => 'Download module',
        ),
        'description' => array(
            'en' => 'Displays download links for files with a specified regex. Also records access data',
        ),
        'frontend' => true,
        'backend' => true,
        'menu' => 'content',
        'sections' => array(
            'Settings' => array(
                'name' => 'download_settings_titile',
                'uri' => 'admin/download/settings',
            ),
        ),
    );
  }

  public function install() {
//    $this->dbforge->drop_table('blog_categories');
//    $this->dbforge->drop_table('blog');
//
//    $tables = array(
//        'blog_categories' => array(
//            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'primary' => true),
//            'slug' => array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'unique' => true, 'key' => true),
//            'title' => array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'unique' => true),
//        ),
//        'blog' => array(
//            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'primary' => true),
//            'title' => array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'unique' => true),
//            'slug' => array('type' => 'VARCHAR', 'constraint' => 100, 'null' => false),
//            'category_id' => array('type' => 'INT', 'constraint' => 11, 'key' => true),
//            'attachment' => array('type' => 'VARCHAR', 'constraint' => 255, 'default' => ''),
//            'intro' => array('type' => 'TEXT'),
//            'body' => array('type' => 'TEXT'),
//            'parsed' => array('type' => 'TEXT'),
//            'keywords' => array('type' => 'VARCHAR', 'constraint' => 32, 'default' => ''),
//            'author_id' => array('type' => 'INT', 'constraint' => 11, 'default' => 0),
//            'created_on' => array('type' => 'INT', 'constraint' => 11),
//            'updated_on' => array('type' => 'INT', 'constraint' => 11, 'default' => 0),
//            'comments_enabled' => array('type' => 'INT', 'constraint' => 1, 'default' => 1),
//            'status' => array('type' => 'ENUM', 'constraint' => array('draft', 'live'), 'default' => 'draft'),
//            'type' => array('type' => 'SET', 'constraint' => array('html', 'markdown', 'wysiwyg-advanced', 'wysiwyg-simple')),
//        ),
//    );

//    if (!$this->install_tables($tables)) {
//      return false;
//    }

    $download_folder_setting = array(
			'slug' => 'download_folder',
			'title' => 'Download folder',
			'description' => 'Folder to scan for downloadable files (relative path)',
			'`default`' => 'uploads/default/downloads',
			'`value`' => 'uploads/default/downloads',
			'type' => 'text',
			'`options`' => '',
			'is_required' => 1,
			'is_gui' => 1,
			'module' => 'download'
		);

    if (!$this->db->insert('settings', $download_folder_setting)){
      return FALSE;
    }

    $download_regex_settings = array(
			'slug' => 'download_regex',
			'title' => 'File RegEx',
			'description' => 'Regular expression to match downloadable files. match[1] = operating syste, match[2] = version',
			'`default`' => '/train-my-ear-([a-z]*)-.*installer-(\d\.\d\.\d)/',
			'`value`' => '/train-my-ear-([a-z]*)-.*installer-(\d\.\d\.\d)/',
			'type' => 'text',
			'`options`' => '',
			'is_required' => 1,
			'is_gui' => 1,
			'module' => 'download'
		);
    
    if (!$this->db->insert('settings', $download_regex_settings)){
      return FALSE;
    }

    return true;
  }

  public function uninstall() {
    $this->db->delete('settings', array('module' => 'download'));
    return TRUE;
  }

  public function upgrade($old_version) {
    return true;
  }

}
