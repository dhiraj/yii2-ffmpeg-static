<?php
/**
 * Created by PhpStorm.
 * User: dhiraj
 * Date: 8/16/17
 * Time: 7:45 PM
 */

namespace traversient\yii;


use yii\base\Component;
use yii\base\InvalidConfigException;

class FFMPEGStatic extends Component
{
    static function basePath(){
        $os = php_uname("s");
        $arch = php_uname("m");
        $binOS = "";
        if (
            strtoupper(substr($os, 0, 3)) !== 'LIN' && //Linux
            strtoupper(substr($os, 0, 3)) !== 'DAR' //Darwin
        )
        {
            throw new InvalidConfigException();
        }
        if (strtoupper(substr($os, 0, 3)) === 'LIN'){
            $binOS = "linux";
        }
        if (strtoupper(substr($os, 0, 3)) === 'DAR'){
            $binOS = "darwin";
        }
        return __DIR__.DIRECTORY_SEPARATOR."bin".DIRECTORY_SEPARATOR.$binOS;
    }
    public static function FFMPEGPath(){
        return self::basePath().DIRECTORY_SEPARATOR."ffmpeg";
    }
    public static function FFPROBEPath(){
        return self::basePath().DIRECTORY_SEPARATOR."ffprobe";
    }

}