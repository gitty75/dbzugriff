<?php
namespace Lib;

class Logger{

    private $filepath;

    public function __construct(string $filepath){

        if(file_exists($filepath)){
            $this->filepath = $filepath;
        }
        else{
            throw new Exception('Path does not exist.');
        }

    }

    public function log(string $text){

        if(strlen($text)>0){
            $file = fopen($this->filepath, 'a');
            $newLine = $text;
            fwrite($file, $newLine . "\r\n");

        fclose($file);
        }
        else{
            throw new Exception('String expected, but not received!');
        }

    }

}

?>