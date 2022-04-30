<?php
    namespace Comments;
    use Membership\CheckRoleAdminUser;
    use Ratingstars\PrintUserRatingStarUtils;
    class PrintCommentTemplate {
        public static function perform($data) {
            extract($data); 
            $is_admin_role = CheckRoleAdminUser::get_current(); ?>
            <li>
                <div class="items-cmt__prds">
                    <div class="avatar-cmt__prds">
                        <a href="#">
                            DTH
                        </a>
                    </div>
                    <div class="intros-cmt__prds">
                        <p class="names-cmt__prds"><?= $author_fullname ?></p>
                        <?php PrintUserRatingStarUtils::print($author_ratings) ?>
                        <p class="text-cmt__prds"><?= $comments ?></p>
                        <div class="rep-days__cmts">
                            <?php if ( $is_admin_role ) : ?>
                                <button class="btn-products__tops">Trả lời</button>
                            <?php endif; ?>
                            <p class="days-cmt__prds"><?= $date_created ?></p>
                        </div>
                    </div>
                </div>
            </li>
    <?php }
    }