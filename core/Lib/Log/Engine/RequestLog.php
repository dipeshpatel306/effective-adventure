<?php
App::uses('BaseLog', 'Log');
 
class RequestLog extends FileLog {  
  public function write($type, $message) {
    $filename = $this->_path . $this->_file;
    $output = $message;
    return file_put_contents($filename, $output, FILE_APPEND);
  }
}