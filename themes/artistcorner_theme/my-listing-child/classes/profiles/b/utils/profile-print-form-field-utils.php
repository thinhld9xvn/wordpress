<?php 

    namespace Profiles;

    class ProfilePrintFormFieldUtils {

        public static function print($field_value, $field_name) {

            $basename = basename($field_value);
            $ext = array_pop( explode('.', $basename) );      

            if ( $field_value ) : ?>

                <div class="uploaded-file uploaded-image review-gallery-image job-manager-uploaded-file">

                    <span class="uploaded-file-preview">

                        <?php if ( is_attachment_image_type($ext) ) : ?>

                            <span class="job-manager-uploaded-file-preview">

                                <img src="<?php echo $field_value ?>" />

                            </span>

                        <?php else : ?>

                            <span class="job-manager-uploaded-file-name">				
                                <i class="<?= get_fontawesome_file_icon($ext) ?> uploaded-file-icon"></i>
                                <code><?= $basename ?></code>
                            </span>

                        <?php endif; ?>

                        <a class="remove-uploaded-file review-gallery-image-remove job-manager-remove-uploaded-file">
                            <i class="mi delete"></i>
                        </a>

                    </span>

                    <input type="hidden" 
                            class="input-text" 
                            name="current_<?= $field_name ?>" 
                            value="b64:<?= base64_encode($field_value) ?>">

                </div>

        <?php 
            endif;  


        }

    }