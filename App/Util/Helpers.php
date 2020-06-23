<?php

namespace App\Util;

final class Helpers{

  static function uploadImg($arq)
    {
        $files =  new Files();
        $dirToSave = './files/local/imagens';
        $length = 10485760; //10 MB por foto
        $imgExtension = array('png', 'jpg', 'jpeg','gif','jiff');
        
        $files->initialize($dirToSave, $length, $imgExtension);
        $imagem = isset($_FILES[$arq]) ? $_FILES[$arq] : null;
        if (!is_null($imagem)) {
            $files->setFile($imagem);
            $upload = $files->processMultFiles();
            return $upload;
        }
        return false;
    }


}