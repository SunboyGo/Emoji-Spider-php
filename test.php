<?php
    require("EmojiSpider.php");
    
    $emojiSpider  = new EmojiSpider();
    
    $comtent = $emojiSpider->connectToInstagram("http://localhost:8888/emojiSpider/index.html");
    
    $imgUrl = $emojiSpider->getPictureUrl($comtent);
    
    foreach ($imgUrl as $value)
    {
        $imgDownUrl = 'http://www.emoji-cheat-sheet.com/'.$value;
        $emojiSpider->savePicture($imgDownUrl);
        
    }
    
    
    