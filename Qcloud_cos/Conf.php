<?php
namespace Vendor\Qcloud_cos;/*如果您的存放路径不在Vendor下请注释命名空间 */

class Conf
{
    const PKG_VERSION = '1.0.0'; 

    const API_IMAGE_END_POINT = 'http://web.image.myqcloud.com/photos/v1/';
    const API_VIDEO_END_POINT = 'http://web.video.myqcloud.com/videos/v1/';
    const API_COSAPI_END_POINT = 'http://web.file.myqcloud.com/files/v1/';
    //请到http://console.qcloud.com/cos去获取你的appid、sid、skey
    const APPID = '10004138';
    const SECRET_ID = 'AKIDApGuv7gT85GxoOrgqEm0lwd78OO3iI2L';
    const SECRET_KEY = 'AbugaLO6FHs0DspTUOS4Q4JOq6VTslBG';


    public static function getUA() {
        return 'QcloudPHP/'.self::PKG_VERSION.' ('.php_uname().')';
    }
}


//end of script
