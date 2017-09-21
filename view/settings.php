<?php
/**
 * Settings Admin Screen
 */
?>
<div class="wrap">
        <h1>Sidebar Posts Settings</h1>
        <p>Select up to six posts to show in six different locations on the sidebar. Have fun!</p>

        <?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php settings_fields( 'sidebar-posts-settings-group' ); ?>
    <?php do_settings_sections( 'sidebar-posts-settings-group' ); ?>
    <div id="sidebar_posts_main">
        <div class="row">
            <div class="left">
                <?php
                $your_query = new WP_Query( 'posts_per_page=-1' ); ?>
                <label>Location One Post</label>
                <?php
                $options = get_option( 'location_one_option' );
                ?>
                <select name="location_one_option[select_field_0]">
                    <?php while ( $your_query->have_posts() ) : $your_query->the_post();
                        $title = get_the_title();
                        $postid = get_the_ID();
                        ?>
                        <option value="<?=$postid?>" <?php selected( $options['select_field_0'], $postid); ?>>
                            <?=$title ?>
                        </option>
                    <? endwhile; ?>
                </select>
            </div>
            <div class="right">
                <?php
                $your_query_two = new WP_Query( 'posts_per_page=-1' ); ?>
                <label>Location Two Post</label>
                <?php
                $options_two = get_option( 'location_two_option' );
                ?>
                <select name="location_two_option[select_two_field_0]">
                    <?php while ( $your_query_two->have_posts() ) : $your_query_two->the_post();
                        $title_two = get_the_title();
                        $postid_two = get_the_ID();
                        ?>
                        <option value="<?=$postid_two?>" <?php selected( $options_two['select_two_field_0'], $postid_two); ?>>
                            <?=$title_two ?>
                        </option>
                    <? endwhile; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <?php
                $your_query_three = new WP_Query( 'posts_per_page=-1' ); ?>
                <label>Location Three Post</label>
                <?php
                $options_three = get_option( 'location_three_option' );
                ?>
                <select name="location_three_option[select_three_field_0]">
                    <?php while ( $your_query_three->have_posts() ) : $your_query_three->the_post();
                        $title_three = get_the_title();
                        $postid_three = get_the_ID();
                        ?>
                        <option value="<?=$postid_three?>" <?php selected( $options_three['select_three_field_0'], $postid_three); ?>>
                            <?=$title_three ?>
                        </option>
                    <? endwhile; ?>
                </select>
            </div>
            <div class="right">
                <?php
                $your_query_four = new WP_Query( 'posts_per_page=-1' ); ?>
                <label>Location Four Post</label>
                <?php
                $options_four = get_option( 'location_four_option' );
                ?>
                <select name="location_four_option[select_four_field_0]">
                    <?php while ( $your_query_four->have_posts() ) : $your_query_four->the_post();
                        $title_four = get_the_title();
                        $postid_four = get_the_ID();
                        ?>
                        <option value="<?=$postid_four?>" <?php selected( $options_four['select_four_field_0'], $postid_four); ?>>
                            <?=$title_four ?>
                        </option>
                    <? endwhile; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <?php
                $your_query_five = new WP_Query( 'posts_per_page=-1' ); ?>
                <label>Location Five Post</label>
                <?php
                $options_five = get_option( 'location_five_option' );
                ?>
                <select name="location_five_option[select_five_field_0]">
                    <?php while ( $your_query_five->have_posts() ) : $your_query_five->the_post();
                        $title_five = get_the_title();
                        $postid_five = get_the_ID();
                        ?>
                        <option value="<?=$postid_five?>" <?php selected( $options_five['select_five_field_0'], $postid_five); ?>>
                            <?=$title_five ?>
                        </option>
                    <? endwhile; ?>
                </select>
            </div>
            <div class="right">
                <?php
                $your_query_six = new WP_Query( 'posts_per_page=-1' ); ?>
                <label>Location Six Post</label>
                <?php
                $options_six = get_option( 'location_six_option' );
                ?>
                <select name="location_six_option[select_six_field_0]">
                    <?php while ( $your_query_six->have_posts() ) : $your_query_six->the_post();
                        $title_six = get_the_title();
                        $postid_six = get_the_ID();
                        ?>
                        <option value="<?=$postid_six?>" <?php selected( $options_six['select_six_field_0'], $postid_six); ?>>
                            <?=$title_six ?>
                        </option>
                    <? endwhile; ?>
                </select>
            </div>
        </div>
    </div>
    <?php submit_button(); ?>
</form>
</div>