<?php
/**
 * Custom Block: Video
 * 
 * Gutenberg block which represents a video.
 *
 * @package Smartphoniker
 * @since 1.0.0
 */


use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * Registers Gutenberg Block video.
 * 
 * @since 1.0.0
 */
function block_video() {
    Block::make( __( 'Video' ) )
        ->add_fields( array(
            Field::make( 'text', 'video_id', __('YouTube Video ID' ) )
                ->set_help_text(
                    'Video im Browser aufrufen und den v-Parameter der URL kopieren. 
                    Bsp: Der Link zum Video ist: https://www.youtube.com/watch?v=zExoGYO_L1s 
                    Also muss zExoGYO_L1s kopiert und in dieses Feld eingefügt werden.'
                )
        ) )
        ->set_parent( 'carbon-fields/section' )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
            ?>
            <div class="section__content section__content--small">
                <div id="video" data-yt-id="https://www.youtube.com/embed/<?php echo $fields['video_id']; ?>" class="video">

                </div>
            </div>

            <script>
                let video = document.getElementById('video');
                video.addEventListener('click', () => {
                    let link = video.getAttribute('data-yt-id');
                    video.innerHTML = '<iframe src="' + link + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                });
            </script>
            <?php
        } );
}