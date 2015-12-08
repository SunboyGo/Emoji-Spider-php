<?php
    /**
     * 网络爬虫 抓去emoji表情图片
     * Class EmojiSpider
     * @author  songbaogang
     * @date    2015-12-08  11:30
     * @modify  2015-12-08  11:30
     *
     //使用
     $p = new EmojiSpider();
     
     $r = $p->getToken('11','22','33');
     print_r($r);
     */
    
    define("imageDirectory" , 'EmojiImages/');
    
    class EmojiSpider{
        
        //Connect with Instagram
        public function connectToInstagram($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果把这行注释掉的话，就会直接输出
            $result=curl_exec($ch);
            curl_close($ch);
            return $result;
        }
        
        //Save the Picture
        public function savePicture($image_url){
            //             echo $image_url . '<br />';
            $filename = basename($image_url);
            echo $filename . '<br />';
            $destination = imageDirectory.$filename;
            file_put_contents($destination, file_get_contents($image_url));
        }
        
        //Get  the Picture Url
        public function getPictureUrl($content)
        {
            $regex = '/graphics\/emojis\/(.*).png/';
            
            preg_match_all($regex,$content,$match);
            
            return $match[0];
        }
        
        
    }