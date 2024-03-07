<?php
if (!class_exists('chiaSheng_Posts_Slider_Widget')) :
    /**
     * Adds chiaSheng_Posts_Slider_Widget.
     */
    class chiaSheng_Posts_Slider_Widget extends chiaSheng_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('chiaSheng-posts-slider-ttl', 'chiaSheng-count-posts');
            $this->select_fields = array('chiaSheng-select-post-cat');


            $widget_ops = array(
                'classname' => 'chiaSheng_posts_slider_widget',
                'description' => __('Displays posts slider from selected category.', 'chiaSheng'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('chiaSheng_posts_slider_widget', __('DT : Posts Slider', 'chiaSheng'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {
            $instance = parent::chiaSheng_sanitize_data($instance, $instance);


            /** This filter is documented in wp-includes/default-widgets.php */
            $title = apply_filters('widget_title', $instance['chiaSheng-posts-slider-ttl'], $instance, $this->id_base);
            $category = isset($instance['chiaSheng-select-post-cat']) ? $instance['chiaSheng-select-post-cat'] : 0; 
			$chiaSheng_count_posts = isset($instance['chiaSheng-count-posts']) ? $instance['chiaSheng-count-posts'] : '5';

            // open the widget container
            echo $args['before_widget'];
            ?>
                <?php if (!empty($title)): ?>
					<div class="widget-header">
						<h4 class="widget-title"><?php echo esc_html($title); ?></h4>
					</div>
                <?php endif; 
                $all_posts = chiaSheng_get_posts($chiaSheng_count_posts, $category); ?>
				
				<div class="widget-content">
					<div class="post-carousel-widget">
						<?php
						$chiaSheng_hs_latest_post_tag_meta	= get_theme_mod('chiaSheng_hs_latest_post_tag_meta','1');
						$chiaSheng_hs_latest_post_auth_meta	= get_theme_mod('chiaSheng_hs_latest_post_auth_meta','1');
						$chiaSheng_hs_latest_post_date_meta	= get_theme_mod('chiaSheng_hs_latest_post_date_meta','1');
                        if ($all_posts->have_posts()) :
                            while ($all_posts->have_posts()) : $all_posts->the_post();
                                global $post;
                                ?>
								<div class="post post-carousel">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="thumb rounded">
											<?php if($chiaSheng_hs_latest_post_tag_meta=='1'): ?>	
												<?php chiaSheng_getpost_categories('','category-badge position-absolute'); ?>
											<?php endif; ?>
											<a href="<?php echo esc_url(the_permalink()); ?>">
												<div class="inner">
													<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr(the_title()); ?>" />
												</div>
											</a>
										</div>
									<?php endif; ?>
									<h5 class="post-title dt-mb-0 dt-mt-4"><a href="<?php echo esc_url(the_permalink()); ?>"><?php echo esc_html(the_title()); ?></a></h5>
									<ul class="meta list-inline mt-2 dt-mb-0">
										<?php if($chiaSheng_hs_latest_post_auth_meta=='1'): ?>
											<?php do_action('chiaSheng_common_post_author'); ?>
										<?php endif; ?>
										<?php if($chiaSheng_hs_latest_post_date_meta=='1'): ?>
											<li class="list-inline-item"><?php echo esc_html(get_the_date( 'F j, Y' )); ?></li>
										<?php endif; ?>
									</ul>
								</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
					<!-- carousel arrows -->
					<div class="slick-arrows-bot">
						<button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="fas fa-angle-left"></i></button>
						<button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="fas fa-angle-right"></i></button>
					</div>
				</div>	 
            <?php
            // close the widget container
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;
            
            $categories = chiaSheng_get_cat_terms();
			$chiaSheng_count_posts = isset($instance['chiaSheng-count-posts']) ? $instance['chiaSheng-count-posts'] : '5';
            
            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::chiaSheng_generate_text_input('chiaSheng-posts-slider-ttl', __('Title', 'chiaSheng'), 'Posts Slider');

                echo parent::chiaSheng_generate_select_options('chiaSheng-select-post-cat', __('Select category', 'chiaSheng'), $categories);
				
				 echo parent::chiaSheng_generate_text_input('chiaSheng-count-posts', __('Number of Post to Show', 'chiaSheng'), $chiaSheng_count_posts);
				 
            }
            
        }
    }
endif;