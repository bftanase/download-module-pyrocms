<?php

/**
 * Usage
 *
 * {{ download:items }}
 *    <p> {{ os }} </p>
 *    <p> {{ version }} </p>
 * 
 * {{ /downwload:items }}
 *
 * @author b.tanase
 */
class Plugin_Download extends Plugin {

  private $regex = '/train-my-ear-([a-z]*)-.*installer-(\d\.\d\.\d)/';
  private $download_dir = 'uploads/default/downloads';

  // private $download_folder_path =
  public function items() {
    $dir_content = scandir($this->download_dir);
    $result = array();

    foreach ($dir_content as $file_name) {
//      echo $file_name.'<br/>';
      if (preg_match($this->regex, $file_name, $matches) && sizeof($matches) == 3) {

        $file_size = filesize($this->download_dir.'/'.$file_name);

        $result[] = array(
                    'os'=>$matches[1],
                    'version' => $matches[2],
                    'filename' => $file_name,
                    'download_dir' => $this->download_dir,
                    'file_size' => $this->format_bytes($file_size)
                          );
      }
    }


    return $result;
  }

  private function format_bytes($size) {
    $units = array(' B', ' KB', ' MB', ' GB', ' TB');
    for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
    return round($size, 2).$units[$i];
  }
}

?>
