<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styleIndex.css">
        
        <title></title>
    </head>
    <body id="body">
        <div class="top">RocketBook</div>
        <?php 
            $url = file_get_contents('https://5cf035ff5660c400149496f9.mockapi.io/posts');
            require_once 'Post.php';
            $pos = new Post();
            
            $info=$pos->pegarInfo($url);

            $pos->setInfo($info);
            $nome=$pos->getNome();
            $avatar=$pos->getAvatar();
            $temp=$pos->calcTemp();
            $text=$pos->getText();
            $max = sizeof($nome);
            $ord = $pos->insertionSort();
            
            for($i = 0; $i < $max;$i++){
                
        ?>
        
        <div class="cartao">          
                <img class="avatar" src=<?php echo $avatar[$ord[$i]];?> > 
                <p class="nome"><?php echo $nome[$ord[$i]]; ?></p>
                <p class="tempo"> <?php echo $temp[$ord[$i]];?></p>
                <p class="text"> <?php echo $text[$ord[$i]];?></p>
        </div>  
            <?php }  ?>
    </body>   
</html>
