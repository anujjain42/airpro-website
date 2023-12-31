<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function hostinza_excerpt_label( $translation, $original ) {
    if ( 'Excerpt' == $original ) {
        return esc_html__( 'Services short note', 'hostinza' );
    } elseif ( false !== strpos( $original, 'Excerpts are optional hand-crafted summaries of your' ) ) {
        return esc_html__( 'Add your services short note which show in homepage', 'hostinza' );
    }
    return $translation;
}
add_filter( 'gettext', 'hostinza_excerpt_label', 100, 2 );



function hostinza_excerpt( $num = 20 ) {

	$excerpt		 = get_the_excerpt();
	$trimmed_content = wp_trim_words( $excerpt, $num_words		 = $num, $more			 = null );

	echo hostinza_kses( $trimmed_content );
}


//Comment form textarea position change

function hostinza_move_comment_field_to_bottom( $fields ) {
	$comment_field		 = $fields[ 'comment' ];
	unset( $fields[ 'comment' ] );
	$fields[ 'comment' ] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'hostinza_move_comment_field_to_bottom' );




// Displsys search form. 
 
function hostinza_search_form( $form ) {
    $form = '
        <form  method="get" action="' . esc_url( home_url( '/' ) ) . '" class="xs-serach">
            <div class="input-group">
                <input type="search" name="s" placeholder="' .esc_attr__( 'Search', 'hostinza' ) . '" value="' . get_search_query() . '">
                <button class="search-btn"><i class="icon icon-search"></i></button>
            </div>
        </form>';
	return $form;
}

add_filter( 'get_search_form', 'hostinza_search_form' );

add_action('admin_head', 'hostinza_script_enqueuer');

function hostinza_script_enqueuer() {
    global $current_screen;
    if('page' != $current_screen->id) return;

    echo <<<HTML
        <script type="text/javascript">
        jQuery(document).ready( function($) {

            if($('#page_template').val() == 'template/template-multipage-homepage.php') {
                $('#fw-backend-option-fw-option-header_ico_1').show();
                $('#fw-backend-option-fw-option-header_ico_2').show();
                $('#fw-backend-option-fw-option-header_ico_3').show();
                $('#fw-backend-option-fw-option-header_ico_4').show();
            } else {
                $('#fw-backend-option-fw-option-header_ico_1').hide();
                $('#fw-backend-option-fw-option-header_ico_2').hide();
                $('#fw-backend-option-fw-option-header_ico_3').hide();
                $('#fw-backend-option-fw-option-header_ico_4').hide();
            }

            if (typeof console == "object") 
                console.log ('default value = ' + $('#page_template').val());

            $('#page_template').live('change', function(){
                    if($(this).val() == 'template/template-multipage-homepage.php') {
                    $('#fw-backend-option-fw-option-header_ico_1').show();
                    $('#fw-backend-option-fw-option-header_ico_2').show();
                    $('#fw-backend-option-fw-option-header_ico_3').show();
                    $('#fw-backend-option-fw-option-header_ico_4').show();
                } else {
                    $('#fw-backend-option-fw-option-header_ico_1').hide();
                    $('#fw-backend-option-fw-option-header_ico_2').hide();
                    $('#fw-backend-option-fw-option-header_ico_3').hide();
                    $('#fw-backend-option-fw-option-header_ico_4').hide();
                }

                if (typeof console == "object") 
                    console.log ('live change value = ' + $(this).val());
            });                 
        });    
        </script>
HTML;
}