<?php

function posterDetailSrcsets($filepath)
{
    $srcsets = 'src="/uploads/posters/LD/'.$filepath.'" srcset="/uploads/posters/LD/'.$filepath.' x1, /uploads/posters/HD/'.$filepath.' x2"';
    return $srcsets;
}

 ?>
