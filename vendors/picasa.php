<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    23.11.12 16:32
 */

class Picasa
{

    protected $_cache_dir = 'tmp/';
    protected $_username = '';
    
    public $start, $limit, $current, $thumbsize = 200,$url;
    
    public $entry_album;
    public $entry_base;

    public $album_title;

    public function __construct($username, $start = 1, $limit = 10)
    {
        $this->_username = $username;
        $this->start = $start <= 0 ? 1 : $start;
//        $this->limit = ($limit < 0) || ($limit > 20) ? 10 : $limit;;
        $this->current = $this->start;
        
        $this->entry_base = 'http://picasaweb.google.com/data/feed/base/user/'.$this->_username;
        $this->entry_album = 'http://picasaweb.google.com/data/feed/base/user/'.$this->_username.'/albumid/';
    }

    public function getAlbums()
    {
//        http://picasaweb.google.com/data/feed/base/user/proaukcje?start-index=2&max-results=1&prettyprint=true&fields=link,entry
        $picasa_obj = $this->_getXMLObj($this->entry_base);//, array('kind' => 'album', 'prettyprint' => 'truef','fields'=> 'entry'));
//        $picasa_obj = $this->_getXMLObj('http://picasaweb.google.com.tw/data/feed/base/user/'.$this->_username.'?alt=rss&kind=album&hl=en_US&access=public');
        $albums = array();

        foreach($picasa_obj->entry as $item)
        {
//            print_r($item);

            
            // get nodes in media: namespace for media information
            $media = $item->children('http://search.yahoo.com/mrss/');
            $attrs = $media->group->thumbnail[0]->attributes();
            
            $links = $this->getLinks($item);
            preg_match('/(\d+)/is',basename($item->id), $match);
            $albums[] =
                array(
                    'id' => $match[1],
                    'link' => $this->buildQuery((string) $links['feed']),
                    'title'=> (string) $item->title,
//                    'guid' => (string) str_replace('?alt=rss','',str_replace('http://picasaweb.google.com.tw/data/entry/base/user/'.$this->_username.'/albumid/','',$item->guid)),
                    'thumbnail' => (string) $attrs['url']
                );
        }

//        print_r($albums);
//        die();

        return $albums;
    }

    public function getAlbumPhotos($guid, $thumbnail_size = '128')
    {
//        $picasa_obj = $this->_getXMLObj('http://picasaweb.google.com.tw/data/feed/base/user/'.$this->_username.'/albumid/'.$guid.'?alt=rss&kind=photo');
        $picasa_obj = $this->_getXMLObj($this->entry_album.$guid, array('prettyprint' => 'truef','fields'=> 'title,entry', /*'imgmax' => '1024'*/));

        $this->album_title = $picasa_obj->title;
        $photos = array();

        foreach($picasa_obj->entry as $item)
        {
//            print_r($item);

            $media = $item->children('http://search.yahoo.com/mrss/');
            $attrs = $media->group->thumbnail[0]->attributes();

//            print_r($attrs);
//            die();

            $data = (array) $item->content;
            $image = $data['@attributes']['src'];
            $title = $item->title;
            $thumbnail = (string)$attrs['url'];

//            $suffix = basename($image_link);
//
//            $full_link = str_replace($suffix, "s{$size}/{$suffix}",$image_link);
//            $thumb_link = str_replace($suffix, "s150/{$suffix}",$image_link);

            $photos[] = array(
                'title'=>(string)$title,
                'image'=>$image,
                'thumbnail'=>$thumbnail
            );
        }

        return $photos;
    }

    protected function _getXMLObj($url, $params = array())
    {

//         $time_start = microtime(true);
           $url = $this->buildQuery($url,$params);
//        echo $this->_cache_dir. md5($url).'_'.date('YmdH').'.cache.php';

        if(file_exists($this->_cache_dir. md5($url).'_'.date('YmdH').'.cache.php'))
        {
//            echo '2';
            $xmlString = base64_decode(file_get_contents($this->_cache_dir. md5($url).'_'.date('YmdH').'.cache.php'));
        }
        else
        {
//            echo '3';
            $fileString = base64_encode(file_get_contents($url));
            file_put_contents($this->_cache_dir. md5($url).'_'.date('YmdH').'.cache.php',$fileString);
            $xmlString = base64_decode($fileString);
        }

//        $time_end = microtime(true);
//        $time = $time_end - $time_start;
//        echo "Did nothing in $time seconds\n";
        
        return simplexml_load_file($url);
//        return new SimpleXMLElement(simplexml_load_file($url));
    }

    private function getLinks($xml) {
        $linkElements = array();
        foreach($xml->link as $links) {
            switch ($links->attributes()->rel) {
                case "http://schemas.google.com/photos/2007#slideshow":
                    $linkElements['slideshow'] = $links->attributes()->href;
                    break;
                case "alternate":
                    $linkElements['link'] = $links->attributes()->href;
                    break;
                case "http://schemas.google.com/g/2005#feed":
                    $linkElements['feed'] = $links->attributes()->href;
                    break;
                case "self":
                    $linkElements['id'] = $links->attributes()->href;
                    break;
                case "edit":
                    $linkElements['edit'] = $links->attributes()->href;
                    break;
            }
        }
        return $linkElements;
    }
    
    private function buildQuery($url, $params = array()){
        $this->url = $url;
        $params['max-results'] = $this->limit;
        $params['start-index'] = $this->start;
        $params['thumbsize'] = $this->thumbsize;
//        $params['max-results'] = $this->limit;
        if(filter_var($url,FILTER_VALIDATE_URL)){
            parse_str(parse_url($url, PHP_URL_QUERY), $origQuery);

            $url =   http_build_url(http_build_url($url,null, HTTP_URL_STRIP_QUERY), array(
                "query" => http_build_query((array)$params + (array)$origQuery)
            ));

//     echo $url  ;
//     die();
     
        }
        return $url;
    }
    public function getNextPage(){
        $this->start += $this->limit;
        return $this->buildQuery($this->url);
    }

    public function setCurrent($current)
    {
        $this->current = $current;
    }

    public function getCurrent()
    {
        return $this->current;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setThumbsize($thumbsize)
    {
        $this->thumbsize = (int)$thumbsize;
    }

    public function getThumbsize()
    {
        return $this->thumbsize;
    }

}

  if (!function_exists('http_build_url'))
  {
      define('HTTP_URL_REPLACE', 1);          // Replace every part of the first URL when there's one of the second URL
      define('HTTP_URL_JOIN_PATH', 2);        // Join relative paths
      define('HTTP_URL_JOIN_QUERY', 4);       // Join query strings
      define('HTTP_URL_STRIP_USER', 8);       // Strip any user authentication information
      define('HTTP_URL_STRIP_PASS', 16);      // Strip any password authentication information
      define('HTTP_URL_STRIP_AUTH', 32);      // Strip any authentication information
      define('HTTP_URL_STRIP_PORT', 64);      // Strip explicit port numbers
      define('HTTP_URL_STRIP_PATH', 128);     // Strip complete path
      define('HTTP_URL_STRIP_QUERY', 256);    // Strip query string
      define('HTTP_URL_STRIP_FRAGMENT', 512); // Strip any fragments (#identifier)
      define('HTTP_URL_STRIP_ALL', 1024);     // Strip anything but scheme and host

      // Build an URL
      // The parts of the second URL will be merged into the first according to the flags argument. 
      // 
      // @param  mixed      (Part(s) of) an URL in form of a string or associative array like parse_url() returns
      // @param  mixed      Same as the first argument
      // @param  int        A bitmask of binary or'ed HTTP_URL constants (Optional)HTTP_URL_REPLACE is the default
      // @param  array      If set, it will be filled with the parts of the composed url like parse_url() would return 
      function http_build_url($url, $parts=array(), $flags=HTTP_URL_REPLACE, &$new_url=false)
      {
          $keys = array('user','pass','port','path','query','fragment');

          // HTTP_URL_STRIP_ALL becomes all the HTTP_URL_STRIP_Xs
          if ($flags & HTTP_URL_STRIP_ALL)
          {
              $flags |= HTTP_URL_STRIP_USER;
              $flags |= HTTP_URL_STRIP_PASS;
              $flags |= HTTP_URL_STRIP_PORT;
              $flags |= HTTP_URL_STRIP_PATH;
              $flags |= HTTP_URL_STRIP_QUERY;
              $flags |= HTTP_URL_STRIP_FRAGMENT;
          }
          // HTTP_URL_STRIP_AUTH becomes HTTP_URL_STRIP_USER and HTTP_URL_STRIP_PASS
          else if ($flags & HTTP_URL_STRIP_AUTH)
          {
              $flags |= HTTP_URL_STRIP_USER;
              $flags |= HTTP_URL_STRIP_PASS;
          }

          // Parse the original URL
          $parse_url = parse_url($url);

          // Scheme and Host are always replaced
          if (isset($parts['scheme']))
              $parse_url['scheme'] = $parts['scheme'];
          if (isset($parts['host']))
              $parse_url['host'] = $parts['host'];

          // (If applicable) Replace the original URL with it's new parts
          if ($flags & HTTP_URL_REPLACE)
          {
              foreach ($keys as $key)
              {
                  if (isset($parts[$key]))
                      $parse_url[$key] = $parts[$key];
              }
          }
          else
          {
              // Join the original URL path with the new path
              if (isset($parts['path']) && ($flags & HTTP_URL_JOIN_PATH))
              {
                  if (isset($parse_url['path']))
                      $parse_url['path'] = rtrim(str_replace(basename($parse_url['path']), '', $parse_url['path']), '/') . '/' . ltrim($parts['path'], '/');
                  else
                      $parse_url['path'] = $parts['path'];
              }

              // Join the original query string with the new query string
              if (isset($parts['query']) && ($flags & HTTP_URL_JOIN_QUERY))
              {
                  if (isset($parse_url['query']))
                      $parse_url['query'] .= '&' . $parts['query'];
                  else
                      $parse_url['query'] = $parts['query'];
              }
          }

          // Strips all the applicable sections of the URL
          // Note: Scheme and Host are never stripped
          foreach ($keys as $key)
          {
              if ($flags & (int)constant('HTTP_URL_STRIP_' . strtoupper($key)))
                  unset($parse_url[$key]);
          }


          $new_url = $parse_url;

          return
              ((isset($parse_url['scheme'])) ? $parse_url['scheme'] . '://' : '')
              .((isset($parse_url['user'])) ? $parse_url['user'] . ((isset($parse_url['pass'])) ? ':' . $parse_url['pass'] : '') .'@' : '')
              .((isset($parse_url['host'])) ? $parse_url['host'] : '')
              .((isset($parse_url['port'])) ? ':' . $parse_url['port'] : '')
              .((isset($parse_url['path'])) ? $parse_url['path'] : '')
              .((isset($parse_url['query'])) ? '?' . $parse_url['query'] : '')
              .((isset($parse_url['fragment'])) ? '#' . $parse_url['fragment'] : '')
              ;
      }
  }