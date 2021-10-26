<?php

$custom_css = "


	/* Section
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_section {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}


	/* Column
	-------------------- */
	
	.bt_bb_inner_color_scheme_{$scheme_id}.bt_bb_column .bt_bb_column_content {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}


	/* Inner Column
	-------------------- */
	
	.bt_bb_inner_color_scheme_{$scheme_id}.bt_bb_column_inner .bt_bb_column_inner_content {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}


	/* Headline
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline .bt_bb_headline_superheadline {
		color: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline .bt_bb_headline_subheadline {
		color: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_dash_top.bt_bb_headline .bt_bb_headline_superheadline:before, 
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_dash_top_bottom.bt_bb_headline .bt_bb_headline_superheadline:before,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_dash_bottom.bt_bb_headline .bt_bb_headline_content:after,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_dash_top_bottom.bt_bb_headline .bt_bb_headline_content:after {
		border-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline s:before, 
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline s:after,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline u:before, 
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline u:after {
		background-color: {$color_scheme[2]};
	}


	/* Icons
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon a {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon:hover a {
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_outline .bt_bb_icon_holder:before {
		background-color: transparent;
		box-shadow: 0 0 0 1px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_outline:hover .bt_bb_icon_holder:before {
		background-color: {$color_scheme[1]};
		box-shadow: 0 0 0 1em {$color_scheme[1]} inset;
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled .bt_bb_icon_holder:before {
		box-shadow: 0 0 0 1em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled:hover .bt_bb_icon_holder:before {
		box-shadow: 0 0 0 1px {$color_scheme[2]} inset;
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless .bt_bb_icon_holder:before {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless:hover .bt_bb_icon_holder:before {
		color: {$color_scheme[2]};
	}

	.bt_bb_text_color_scheme_{$scheme_id}.bt_bb_icon .bt_bb_icon_holder span {
		color: {$color_scheme[1]};
	}
	

	/* Buttons
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline a {
		box-shadow: 0 0 0 1px {$color_scheme[1]} inset, 0 0 0 rgba(0, 0, 0, 0.1);
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline:hover a {
		box-shadow: 0 0 0 4em {$color_scheme[1]} inset, 0 5px 8px rgba(0, 0, 0, 0.1);
		color: {$color_scheme[2]};
		opacity: 1;
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline.btWithIcon.bt_bb_icon_style_filled a .bt_bb_icon_holder {
		color: {$color_scheme[2]};
		box-shadow: 0 0 0 4em {$color_scheme[1]} inset;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline.btWithIcon.bt_bb_icon_style_filled:hover a .bt_bb_icon_holder {
		color: {$color_scheme[1]};
		box-shadow: 0 0 0 4em {$color_scheme[2]} inset;
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled a {
		box-shadow: 0 0 0 4em {$color_scheme[2]} inset;
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled:hover a {
		box-shadow: 0 0 0 4em {$color_scheme[2]} inset, 0 5px 8px rgba(0, 0, 0, 0.1);
		color: {$color_scheme[1]};
		background-color: transparent;
		opacity: 1;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled.btWithIcon.bt_bb_icon_style_filled a .bt_bb_icon_holder {
		color: {$color_scheme[2]};
		box-shadow: 0 0 0 4em {$color_scheme[1]} inset;
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_clean a,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless a {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_clean:hover a,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless:hover a {
		color: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled_gradient a {
		background: linear-gradient(90deg, {$color_scheme[1]} 0%, {$color_scheme[2]} 100%);
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled_gradient.btWithIcon.bt_bb_icon_style_filled a .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}


	/* Services
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline.bt_bb_service .bt_bb_icon_holder	{
		box-shadow: 0 0 0 1px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline.bt_bb_service:hover .bt_bb_icon_holder {
		box-shadow: 0 0 0 1em {$color_scheme[1]} inset;
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled.bt_bb_service .bt_bb_icon_holder {
		box-shadow: 0 0 0 1em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled.bt_bb_service:hover .bt_bb_icon_holder	{
		box-shadow: 0 0 0 1px {$color_scheme[2]} inset;
		background-color: transparent;
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_borderless.bt_bb_service .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_borderless.bt_bb_service:hover .bt_bb_icon_holder {
		color: {$color_scheme[2]};
	}


	/* Tabs
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header {
		border-color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header li,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header li:hover,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header li.on {
		border-color: {$color_scheme[1]};
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header li:hover,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline .bt_bb_tabs_header li.on,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tabs_header li {
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
		border-color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_tabs.bt_bb_style_simple .bt_bb_tabs_header li {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_tabs.bt_bb_style_simple .bt_bb_tabs_header li.on,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_tabs.bt_bb_style_simple .bt_bb_tabs_header li:hover {
		color: {$color_scheme[1]};
		border-color: {$color_scheme[2]};
	}


	
	/* Accordion
	-------------------- */

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_outline .bt_bb_accordion_item_title {
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_outline .bt_bb_accordion_item {
		border-color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_outline .bt_bb_accordion_item.on,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_outline .bt_bb_accordion_item:hover {
		border-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_outline .bt_bb_accordion_item.on .bt_bb_accordion_item_title {
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_outline .bt_bb_accordion_item:hover .bt_bb_accordion_item_title {
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_outline .bt_bb_accordion_item .bt_bb_accordion_item_title:hover {
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_outline .bt_bb_accordion_item:before {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_outline .bt_bb_accordion_item.on:before,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_outline .bt_bb_accordion_item:hover:before {
		color: {$color_scheme[2]};
	}


	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_filled .bt_bb_accordion_item {
		background-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_filled .bt_bb_accordion_item:hover {
		background-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_filled .bt_bb_accordion_item.on {
		background-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_filled .bt_bb_accordion_item .bt_bb_accordion_item_title {
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_filled .bt_bb_accordion_item .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_filled .bt_bb_accordion_item:before {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_filled .bt_bb_accordion_item.on .bt_bb_accordion_item_title,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_filled .bt_bb_accordion_item:hover .bt_bb_accordion_item_title {
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_filled .bt_bb_accordion_item.on:before,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_filled .bt_bb_accordion_item:hover:before {
		color: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_simple .bt_bb_accordion_item .bt_bb_accordion_item_title {
		color: {$color_scheme[1]};
		border-color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_simple .bt_bb_accordion_item.btWithIcon .bt_bb_accordion_item_title_content .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_simple .bt_bb_accordion_item.on .bt_bb_accordion_item_title {
		color: {$color_scheme[1]};
		border-color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_accordion.bt_bb_style_simple .bt_bb_accordion_item:hover .bt_bb_accordion_item_title {
		color: {$color_scheme[2]};
	}


	/* Price List
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_price_list {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_price_list .bt_bb_price_list_title {
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_price_list .bt_bb_price_list_price,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_price_list li {
		color: {$color_scheme[1]};
	}
	
	.bt_bb_colored_icon_color_scheme_{$scheme_id}.bt_bb_price_list .bt_bb_price_list_colored_icon svg .cls-1 {
		fill: {$color_scheme[1]};
	}
	.bt_bb_colored_icon_color_scheme_{$scheme_id}.bt_bb_price_list .bt_bb_price_list_colored_icon svg .cls-2 {
		fill: {$color_scheme[2]};
	}

	.bt_bb_colored_icon_color_scheme_{$scheme_id}.bt_bb_price_list .bt_bb_price_list_icon .bt_bb_icon_holder:before {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
		border-radius: 50%;
		overflow: hidden;
		padding: 1rem;
		font-size: 0.8em;
	}
	.bt_bb_colored_icon_color_scheme_{$scheme_id}.bt_bb_price_list .bt_bb_price_list_icon {
		padding-bottom: 2em;
	}



	/* Counter
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_counter_holder .bt_bb_counter_icon {
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_counter_holder .bt_bb_counter_content {
		color: {$color_scheme[1]};
	}


	/* Progress bar
	-------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_progress_bar .bt_bb_progress_bar_bg_cover .bt_bb_progress_bar_bg {
		background-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_progress_bar .bt_bb_progress_bar_bg_cover .bt_bb_progress_bar_bg .bt_bb_progress_bar_inner {
		color: {$color_scheme[2]};
		background-color: {$color_scheme[1]};
	}


	/* Rating
	-------------------- */

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_rating .bt_bb_rating_icon .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_rating .bt_bb_rating_icon:hover .bt_bb_icon_holder {
		color: {$color_scheme[2]};
	}


	/* Card Icon - Colored Icon
	-------------------- */

	.bt_bb_colored_icon_color_scheme_{$scheme_id}.bt_bb_card_icon .bt_bb_card_icon_colored_icon svg .cls-1 {
		fill: {$color_scheme[1]};
	}
	.bt_bb_colored_icon_color_scheme_{$scheme_id}.bt_bb_card_icon .bt_bb_card_icon_colored_icon svg .cls-2 {
		fill: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_card_icon {
		color: {$color_scheme[1]};
		background: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_card_icon .bt_bb_card_icon_icon {
		color: {$color_scheme[2]};
	}


	/* Card Image - Colored Icon
	-------------------- */

	.bt_bb_colored_icon_color_scheme_{$scheme_id}.bt_bb_card_image .bt_bb_card_image_colored_icon svg .cls-1 {
		fill: {$color_scheme[1]};
	}
	.bt_bb_colored_icon_color_scheme_{$scheme_id}.bt_bb_card_image .bt_bb_card_image_colored_icon svg .cls-2 {
		fill: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_card_image  {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_card_image .bt_bb_card_image_text_box .bt_bb_headline {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.btNoImage.bt_bb_card_image .bt_bb_card_image_text_box .bt_bb_headline {
		color: {$color_scheme[1]};
	}


	/* Latest Post
	-------------------- */

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_latest_posts .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_title {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_latest_posts .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta {
		color: {$color_scheme[2]};
	}


	/* Slider
	-------------------- */

	.bt_bb_dots_color_scheme_{$scheme_id}.bt_bb_content_slider .slick-dots li {
		background: {$color_scheme[1]};
	}
	.bt_bb_dots_color_scheme_{$scheme_id}.bt_bb_content_slider .slick-dots li.slick-active,
	.bt_bb_dots_color_scheme_{$scheme_id}.bt_bb_content_slider .slick-dots li:hover {
		background: {$color_scheme[2]};
	}


	/* Image Slider
	-------------------- */

	.bt_bb_dots_color_scheme_{$scheme_id}.bt_bb_slider .slick-dots li {
		background: {$color_scheme[1]};
	}
	.bt_bb_dots_color_scheme_{$scheme_id}.bt_bb_slider .slick-dots li.slick-active,
	.bt_bb_dots_color_scheme_{$scheme_id}.bt_bb_slider .slick-dots li:hover {
		background: {$color_scheme[2]};
	}


";