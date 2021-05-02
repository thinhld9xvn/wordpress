<?php 

    namespace Comments;

    class CommentPrintReviewsLoggedInTemplatesUtils {

        public static function print() { ?>

            <script type="text/javascript">
                var update_comments_form_template = `<?= get_update_comments_form_template() ?>`;
            </script>

            <section class="i-section similar-listings">

                <div class="container">

                    <div class="row section-title">

                        <h2 class="case27-primary-text">Reviews</h2>

                    </div>

                    <div class="comments-listings-box mtop20">

                        <?php comments_template(); ?>

                    </div>

                </div>

            </section>

        <?php }

    }