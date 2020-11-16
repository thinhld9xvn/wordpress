<?php 

    function get_ctaxonomies( $post_type ) {



        ob_start();



        $taxonomies = get_object_taxonomies( $post_type, 'names' ); 



            foreach( $taxonomies as $taxonomy ) : ?>



                <option value="<?php echo $taxonomy ?>">                       

                    <?php echo $taxonomy ?>

                </option>                        



      <?php endforeach;



        $contents = ob_get_contents(); 

        ob_end_clean();



        echo $contents;



        die();



    }

    function get_cterms( $taxonomy ) {



        ob_start();



        $args = array(

            'hide_empty' => 0,

            'orderby' => 'date',

            'order' => 'desc',

            'taxonomy' => $taxonomy

        );



        $terms = get_terms( $args );



        foreach( $terms as $term ) : ?>



            <option value="<?php echo $term->term_id ?>">               

                <?php echo $term->name ?>

            </option>                        



      <?php endforeach;



        $contents = ob_get_contents(); 

        ob_end_clean();



        echo $contents;



        die();



    }



    function sb_showterm_callback() {

        

        $cmd = $_POST['cmd'];



        switch ($cmd) :



            case 'select_taxonomies':



                $post_type = trim( $_POST['post_type'] );



                get_ctaxonomies( $post_type );

                

                break;



            case 'select_terms':



                $taxonomy = trim( $_POST['taxonomy'] );



                get_cterms( $taxonomy );

                

                break;

            

            default:

                

                break;

        

        endswitch;       

        

        

    }
    add_action('wp_ajax_sb_showterm_ajax', 'sb_showterm_callback');
    add_action('wp_ajax_nopriv_sb_showterm_ajax', 'sb_showterm_callback'); ?>