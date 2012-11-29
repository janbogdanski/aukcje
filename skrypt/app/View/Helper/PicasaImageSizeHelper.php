<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    29.11.12 10:00
 */
App::uses('AppHelper', 'View/Helper');
class PicasaImageSizeHelper extends AppHelper {

    const PHOTO_THUMB  = 150;
    const PHOTO_SMALL  = 640;
    const PHOTO_MEDIUM = 800;
    const PHOTO_LARGE  = 1024;
    const PHOTO_GALLERY_FIRST  = 220;
    const PHOTO_GALLERY_THUMB  = 150;
    public function picasaImgScaledUrl($url, $size) {

        $suffix = basename($url);

      return  $image = str_replace($suffix, "s{$size}/{$suffix}",$url);

    }
}