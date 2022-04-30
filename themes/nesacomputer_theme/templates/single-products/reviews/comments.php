<?php use Comments\PrintCommentTemplate; ?>
<div class="list-cmt__prds">
    <ul>
        <?php
            if ( !empty($commentsList ) ) :
                foreach($commentsList as $key => $comment ) :
                    PrintCommentTemplate::perform($comment);
                endforeach; 
            else :
                echo "<li>Chưa có đánh giá nào ở đây.</li>";
            endif; ?>
    </ul>
</div>