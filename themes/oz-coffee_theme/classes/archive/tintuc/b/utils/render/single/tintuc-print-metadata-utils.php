<?php 

    namespace Archive\News\Single;

    class NewsPrintMetaDataHtmlUtils  {        

        public static function render($post) {  
            
            $day = date('d', strtotime($post->post_date));
            $month = date('m', strtotime($post->post_date));
            $year = date('Y', strtotime($post->post_date)); ?>
            
            <div class="metadata metadata-datetime flex-layout flex-justify-center">

                <span class="fa fa-calendar"></span>
                <span class="padLeft10">
                    NGÀY <?= $day ?> THÁNG <?= $month ?>. <?= $year ?>
                </span>

            </div>
            
        <?php }

    }