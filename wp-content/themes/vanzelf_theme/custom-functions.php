<?php 

function add_theme_styles()
				{
					//For style
                    $version = wp_get_theme()->get('Version');
					wp_enqueue_style('masterstyle', get_template_directory_uri() . '/dist/styles/master.css', array(), $version, 'all');
                    wp_enqueue_style('menustyle', get_template_directory_uri() . '/dist/styles/stylemenu.css', array(), $version, 'all');
                    
                }
                add_action('wp_enqueue_scripts', 'add_theme_styles');