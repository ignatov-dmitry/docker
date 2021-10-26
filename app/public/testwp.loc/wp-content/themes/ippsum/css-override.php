<?php
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars ) ) {
	$boldthemes_crush_vars = BoldThemesFramework::$crush_vars;
}
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars_def ) ) {
	$boldthemes_crush_vars_def = BoldThemesFramework::$crush_vars_def;
}
if ( isset( $boldthemes_crush_vars['accentColor'] ) ) {
	$accentColor = $boldthemes_crush_vars['accentColor'];
} else {
	$accentColor = "#fcf113";
}
if ( isset( $boldthemes_crush_vars['alternateColor'] ) ) {
	$alternateColor = $boldthemes_crush_vars['alternateColor'];
} else {
	$alternateColor = "#8c8c8c";
}
if ( isset( $boldthemes_crush_vars['bodyFont'] ) ) {
	$bodyFont = $boldthemes_crush_vars['bodyFont'];
} else {
	$bodyFont = "Rubik";
}
if ( isset( $boldthemes_crush_vars['menuFont'] ) ) {
	$menuFont = $boldthemes_crush_vars['menuFont'];
} else {
	$menuFont = "Rubik";
}
if ( isset( $boldthemes_crush_vars['headingFont'] ) ) {
	$headingFont = $boldthemes_crush_vars['headingFont'];
} else {
	$headingFont = "Rubik";
}
if ( isset( $boldthemes_crush_vars['headingSuperTitleFont'] ) ) {
	$headingSuperTitleFont = $boldthemes_crush_vars['headingSuperTitleFont'];
} else {
	$headingSuperTitleFont = "Rubik";
}
if ( isset( $boldthemes_crush_vars['headingSubTitleFont'] ) ) {
	$headingSubTitleFont = $boldthemes_crush_vars['headingSubTitleFont'];
} else {
	$headingSubTitleFont = "Rubik";
}
if ( isset( $boldthemes_crush_vars['buttonFont'] ) ) {
	$buttonFont = $boldthemes_crush_vars['buttonFont'];
} else {
	$buttonFont = "Rubik";
}
if ( isset( $boldthemes_crush_vars['logoHeight'] ) ) {
	$logoHeight = $boldthemes_crush_vars['logoHeight'];
} else {
	$logoHeight = "80";
}
$accentColorDark = CssCrush\fn__l_adjust( $accentColor." -15" );$accentColorVeryDark = CssCrush\fn__l_adjust( $accentColor." -35" );$accentColorVeryVeryDark = CssCrush\fn__l_adjust( $accentColor." -42" );$accentColorLight = CssCrush\fn__a_adjust( $accentColor." -30" );$alternateColorDark = CssCrush\fn__l_adjust( $alternateColor." -15" );$alternateColorVeryDark = CssCrush\fn__l_adjust( $alternateColor." -25" );$alternateColorLight = CssCrush\fn__a_adjust( $alternateColor." -40" );$css_override = sanitize_text_field("select,
input{font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
input[type='submit']{font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.btText a,
figcaption a{
    border-bottom: 2px solid {$accentColor};}
body{font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
h1,
h2,
h3,
h4,
h5,
h6{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
blockquote{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.btPreloader .btLoaderSpin svg circle{fill: {$accentColor};}
.btNoSearchResults .bt_bb_port #searchform input[type='submit']{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.mainHeader{
    font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;}
.menuPort{
    font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;}
.menuPort nav > ul > li > a{line-height: {$logoHeight}px;}
.btTextLogo{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;
    line-height: {$logoHeight}px;}
.btLogoArea .logo img{height: {$logoHeight}px;}
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btDarkTransparentHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btDarkTransparentHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btDarkTransparentHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btCurrentPage_underline.btMenuHorizontal .menuPort nav > ul > li > a:after{
    background-color: {$accentColor};}
.btCurrentPage_dot.btMenuHorizontal .menuPort nav > ul > li > a:after{
    background-color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li.on li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.on li.current-menu-item > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-item > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-item > a{color: {$accentColor} !important;}
.btMenuHorizontal .menuPort ul li.btMenuWideDropdown ul li:last-child > a:after{
    background-color: {$accentColor};}
body.btMenuHorizontal .subToggler{
    line-height: {$logoHeight}px;}
.btMenuHorizontal .menuPort > nav > ul > li > ul li a:hover{color: {$accentColor};}
.btCurrentPage_underline.btMenuHorizontal .menuPort > nav > ul > li > ul li a:hover{
    box-shadow: inset 5px 0 0 0 {$accentColor};}
html:not(.touch) body.btMenuHorizontal .menuPort > nav > ul > li.btMenuWideDropdown > ul > li > a:after{
    background-color: {$accentColor};}
.btMenuHorizontal .topBarInMenu{
    height: {$logoHeight}px;}
.btAccentLightHeader .btBelowLogoArea,
.btAccentLightHeader .topBar{background-color: {$accentColor};}
.btAccentLightHeader .btBelowLogoArea a:hover,
.btAccentLightHeader .topBar a:hover{color: {$alternateColor};}
.btAccentDarkHeader .btBelowLogoArea,
.btAccentDarkHeader .topBar{background-color: {$accentColor};}
.btAccentDarkHeader .btBelowLogoArea a:hover,
.btAccentDarkHeader .topBar a:hover{color: {$alternateColor};}
.btLightAccentHeader .btLogoArea,
.btLightAccentHeader .btVerticalHeaderTop{background-color: {$accentColor};}
.btLightAccentHeader.btMenuHorizontal.btBelowMenu .mainHeader .btLogoArea{background-color: {$accentColor};}
.btAlternateTransparentHeader .mainHeader,
.btAlternateTransparentHeader .btVerticalHeaderTop{color: {$alternateColor};}
.btStickyHeaderActive.btAlternateTransparentHeader .mainHeader,
.btStickyHeaderActive.btAlternateTransparentHeader .btVerticalHeaderTop{
    color: {$alternateColor};}
.btHasAltLogo.btStickyHeaderActive.btMenuHorizontal.btAlternateTransparentHeader .mainHeader,
.btHasAltLogo.btStickyHeaderActive.btMenuHorizontal.btAlternateTransparentHeader .btVerticalHeaderTop{color: {$alternateColor};}
.btAlternateTransparentHeader.btMenuHorizontal .menuPort ul ul li a{color: {$alternateColor};}
.btMenuVertical.btAlternateTransparentHeader .mainHeader{color: {$alternateColor};}
.btAlternateTransparentHeader .btBelowLogoArea,
.btAlternateTransparentHeader .topBar{background-color: {$alternateColor};}
.btMenuVertical.btAccentTransparentHeader .mainHeader{color: {$accentColor};}
.btAccentTransparentHeader .btBelowLogoArea,
.btAccentTransparentHeader .topBar{background-color: {$accentColor};}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .btLogoArea .logo img{height: calc({$logoHeight}px*0.8);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .btLogoArea .btTextLogo{
    line-height: calc({$logoHeight}px*0.8);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .btLogoArea .menuPort nav > ul > li > a,
.btStickyHeaderActive.btMenuHorizontal .mainHeader .btLogoArea .menuPort nav > ul > li > .subToggler{line-height: calc({$logoHeight}px*0.8);}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .btLogoArea .topBarInMenu{height: calc({$logoHeight}px*0.8);}
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btAccentTransparentHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btAlternateTransparentHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btDarkTransparentHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btAccentTransparentHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btAlternateTransparentHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btDarkTransparentHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentTransparentHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAlternateTransparentHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btDarkTransparentHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuVertical .mainHeader .btCloseVertical:before:hover{color: {$accentColor};}
.btMenuHorizontal .topBarInLogoArea{
    height: {$logoHeight}px;}
.btMenuHorizontal .topBarInLogoArea .topBarInLogoAreaCell{border: 0 solid {$accentColor};}
.btMenuVertical .mainHeader .btCloseVertical:hover:before{color: {$accentColor};}
.btDarkSkin .btSiteFooterCopyMenu .port:before,
.btLightSkin .btDarkSkin .btSiteFooterCopyMenu .port:before,
.btDarkSkin.btLightSkin .btDarkSkin .btSiteFooterCopyMenu .port:before,
.bt-dark-skin .btSiteFooterCopyMenu .port:before,
.btLightSkin .bt-dark-skin .btSiteFooterCopyMenu .port:before,
.bt-dark-skin .btLightSkin .bt-dark-skin .btSiteFooterCopyMenu .port:before{background-color: {$accentColor};}
.btPostSingleItemStandard .btArticleShareEtc > div.btReadMoreColumn .bt_bb_button{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.btBorderDetail_show .btArticleMedia img,
.btBorderDetail_show .btArticleMedia .bt-video-container,
.btBorderDetail_show .btArticleMedia iframe,
.btBorderDetail_show .btArticleMedia .btQuote,
.btBorderDetail_show .btArticleMedia .btLink{border-bottom: 7px solid {$accentColor};}
.sticky.btArticleListItem .btArticleHeadline h1 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h2 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h3 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h4 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h5 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h6 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h7 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h8 .bt_bb_headline_content span a:after{
    color: {$accentColor};}
.post-password-form p:first-child{color: {$alternateColor};}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextTitle{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextDir{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.btPrevNextNav .btPrevNext:hover .btPrevNextTitle{color: {$accentColor};}
.bt-comments-box .comment-respond .comment-form a{color: {$alternateColor};}
.bt-comments-box .vcard .posted{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt-comments-box .commentTxt p.edit-link,
.bt-comments-box .commentTxt p.reply{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt-comments-box .comment-navigation a,
.bt-comments-box .comment-navigation span{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.comment-awaiting-moderation{color: {$alternateColor};}
a#cancel-comment-reply-link{
    color: {$alternateColor};}
a#cancel-comment-reply-link:hover{color: {$alternateColor};}
.btCommentSubmit{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
body:not(.btNoDashInSidebar) .btBox > h4:after,
body:not(.btNoDashInSidebar) .btCustomMenu > h4:after,
body:not(.btNoDashInSidebar) .btTopBox > h4:after{
    border-bottom: 3px solid {$accentColor};}
.btBox ul li.current-menu-item > a,
.btCustomMenu ul li.current-menu-item > a,
.btTopBox ul li.current-menu-item > a{color: {$accentColor};}
.widget_calendar table caption{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.widget_calendar table tbody tr td#today{color: {$accentColor};}
.widget_rss li a.rsswidget{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.widget_shopping_cart .total{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.widget_shopping_cart .buttons .button{
    background: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove{
    background-color: {$alternateColor};}
.menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents{
    font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;
    background-color: {$accentColor};}
.btMenuVertical .menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler{
    background-color: {$accentColor};}
.widget_recent_reviews{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.widget_recent_reviews .reviewer{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle{
    background-color: {$accentColor};}
.btBox .tagcloud a,
.btTags ul a{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.btBox .tagcloud a:before,
.btTags ul a:before{
    color: {$alternateColor};}
.btAccentDarkHeader .topTools .btIconWidget:hover,
.btAccentDarkHeader .topBarInMenu .btIconWidget:hover{color: {$alternateColor};}
.topTools a.btIconWidget:hover,
.topBarInMenu a.btIconWidget:hover{color: {$accentColor};}
.btAccentIconWidget.btIconWidget .btIconWidgetIcon{color: {$accentColor};}
a.btAccentIconWidget.btIconWidget:hover{color: {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon a.bt_bb_icon_holder{color: {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon:hover a.bt_bb_icon_holder{color: {$accentColorDark};}
.btSearchInner.btFromTopBox button:hover:before{color: {$accentColor};}
div.btButtonWidget .btButtonWidgetLink:hover{
    box-shadow: 0 0 0 3em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
div.btButtonWidget .btButtonWidgetLink .btButtonWidgetContent span.btButtonWidgetText{font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
div.btButtonWidget.btLightAccentButton.btOutlineButton .btButtonWidgetLink:hover{color: {$accentColor};}
div.btButtonWidget.btLightAccentButton.btOutlineButton .btButtonWidgetLink:hover .bt_bb_icon_holder{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
div.btButtonWidget.btLightAccentButton.btOutlineButton .bt_bb_icon_holder{color: {$accentColor};}
div.btButtonWidget.btLightAccentButton.btFilledButton .btButtonWidgetLink{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 0 0 rgba(0,0,0,.1);}
div.btButtonWidget.btLightAccentButton.btFilledButton .btButtonWidgetLink:hover{box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
div.btButtonWidget.btLightAccentButton.btFilledButton .bt_bb_icon_holder{color: {$accentColor};}
div.btButtonWidget.btLightAlternateButton.btOutlineButton .btButtonWidgetLink:hover{color: {$alternateColor};}
div.btButtonWidget.btLightAlternateButton.btOutlineButton .btButtonWidgetLink:hover .bt_bb_icon_holder{
    box-shadow: 0 0 0 4em {$alternateColor} inset;}
div.btButtonWidget.btLightAlternateButton.btOutlineButton .bt_bb_icon_holder{color: {$alternateColor};}
div.btButtonWidget.btLightAlternateButton.btFilledButton .btButtonWidgetLink{
    box-shadow: 0 0 0 4em {$alternateColor} inset,0 0 0 rgba(0,0,0,.1);}
div.btButtonWidget.btLightAlternateButton.btFilledButton .btButtonWidgetLink:hover{box-shadow: 0 0 0 4em {$alternateColor} inset,0 5px 8px rgba(0,0,0,.1);}
div.btButtonWidget.btLightAlternateButton.btFilledButton .bt_bb_icon_holder{color: {$alternateColor};}
div.btButtonWidget.btAccentGradientButton.btOutlineButton .btButtonWidgetLink:hover{color: {$accentColor};}
div.btButtonWidget.btAccentGradientButton.btOutlineButton .btButtonWidgetLink:hover .bt_bb_icon_holder{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
div.btButtonWidget.btAccentGradientButton.btOutlineButton .bt_bb_icon_holder{color: {$accentColor};}
div.btButtonWidget.btAccentGradientButton.btFilledButton .btButtonWidgetLink{
    background: linear-gradient(90deg,{$alternateColor} 0%,{$accentColor} 100%);}
div.btButtonWidget.btAccentGradientButton.btFilledButton .bt_bb_icon_holder{color: {$accentColor};}
div.btButtonWidget.btAccentLightButton.btOutlineButton .btButtonWidgetLink{color: {$accentColor};
    box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 rgba(0,0,0,.1);}
div.btButtonWidget.btAccentLightButton.btOutlineButton .btButtonWidgetLink:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
div.btButtonWidget.btAccentLightButton.btOutlineButton .btButtonWidgetLink:hover .bt_bb_icon_holder{color: {$accentColor};}
div.btButtonWidget.btAccentLightButton.btOutlineButton .bt_bb_icon_holder{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
div.btButtonWidget.btAccentLightButton.btFilledButton .btButtonWidgetLink{color: {$accentColor};}
div.btButtonWidget.btAccentLightButton.btFilledButton .bt_bb_icon_holder{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.bt_bb_row.bt_bb_border_accent{border-bottom: .5em solid {$accentColor};}
.bt_bb_row.bt_bb_border_accent_top{border-top: .5em solid {$accentColor};}
.bt_bb_column.bt_bb_border_accent,
.bt_bb_column_inner.bt_bb_border_accent{border-bottom: 10px solid {$accentColor};}
.bt_bb_separator.bt_bb_border_style_solid.bt_bb_border_color_accent{border-bottom: 1px solid {$accentColor};}
.bt_bb_border_style_solid.bt_bb_separator.btWithText.bt_bb_border_style_solid:before,
.bt_bb_border_style_solid.bt_bb_separator.btWithText.bt_bb_border_style_solid:after{background-color: {$accentColor};}
.bt_bb_border_style_solid.bt_bb_separator.btWithText.bt_bb_border_style_dotted:before,
.bt_bb_border_style_solid.bt_bb_separator.btWithText.bt_bb_border_style_dotted:after{border-color: {$accentColor};}
.bt_bb_border_style_solid.bt_bb_separator.btWithText.bt_bb_border_style_dashed:before,
.bt_bb_border_style_solid.bt_bb_separator.btWithText.bt_bb_border_style_dashed:after{border-color: {$accentColor};}
.bt_bb_separator.btWithText .bt_bb_separator_text{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;
    color: {$accentColor};}
.bt_bb_headline .bt_bb_headline_superheadline{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_supertitle_style_accent.bt_bb_headline .bt_bb_headline_superheadline > span{color: {$accentColor} !important;}
.bt_bb_dash_top.bt_bb_headline .bt_bb_headline_superheadline:before,
.bt_bb_dash_top_bottom.bt_bb_headline .bt_bb_headline_superheadline:before{
    border-color: {$accentColor};}
.bt_bb_headline.bt_bb_subheadline .bt_bb_headline_subheadline{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_headline h1 strong,
.bt_bb_headline h2 strong,
.bt_bb_headline h3 strong,
.bt_bb_headline h4 strong,
.bt_bb_headline h5 strong,
.bt_bb_headline h6 strong{
    color: {$accentColor};}
.bt_bb_headline h1 strong em,
.bt_bb_headline h2 strong em,
.bt_bb_headline h3 strong em,
.bt_bb_headline h4 strong em,
.bt_bb_headline h5 strong em,
.bt_bb_headline h6 strong em{
    color: {$alternateColor};}
.bt_bb_headline h1 u:before,
.bt_bb_headline h2 u:before,
.bt_bb_headline h3 u:before,
.bt_bb_headline h4 u:before,
.bt_bb_headline h5 u:before,
.bt_bb_headline h6 u:before{
    background-color: {$accentColor};}
.bt_bb_headline h1 u:after,
.bt_bb_headline h2 u:after,
.bt_bb_headline h3 u:after,
.bt_bb_headline h4 u:after,
.bt_bb_headline h5 u:after,
.bt_bb_headline h6 u:after{
    background-color: {$accentColor};}
.bt_bb_headline h1 s:before,
.bt_bb_headline h2 s:before,
.bt_bb_headline h3 s:before,
.bt_bb_headline h4 s:before,
.bt_bb_headline h5 s:before,
.bt_bb_headline h6 s:before{
    background-color: {$accentColor};}
.bt_bb_headline h1 s:after,
.bt_bb_headline h2 s:after,
.bt_bb_headline h3 s:after,
.bt_bb_headline h4 s:after,
.bt_bb_headline h5 s:after,
.bt_bb_headline h6 s:after{
    background-color: {$accentColor};}
.bt_bb_dash_top.bt_bb_headline h1 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h1 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h1 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h2 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h2 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h2 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h3 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h3 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h3 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h4 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h4 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h4 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h5 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h5 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h5 .bt_bb_headline_content:after,
.bt_bb_dash_top.bt_bb_headline h6 .bt_bb_headline_content:after,
.bt_bb_dash_top_bottom.bt_bb_headline h6 .bt_bb_headline_content:after,
.bt_bb_dash_bottom.bt_bb_headline h6 .bt_bb_headline_content:after{border-color: {$accentColor};}
.bt_bb_button .bt_bb_button_text{font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_button.bt_bb_style_filled_gradient a{
    background: linear-gradient(90deg,{$accentColor} 0%,{$alternateColor} 100%);}
.bt_bb_border_accent.bt_bb_service .bt_bb_service_inner{
    border-bottom: .4em solid {$accentColor};}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_supertitle{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_supertitle_style_accent.bt_bb_service .bt_bb_service_content .bt_bb_service_content_supertitle{color: {$accentColor};}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_title{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_service:hover .bt_bb_service_content_title a{color: {$accentColor};}
.bt_bb_border_accent.bt_bb_service.bt_bb_icon_position_on_top .bt_bb_service_inner{
    border-top: .4em solid {$accentColor};}
.bt_bb_progress_bar .bt_bb_progress_bar_text_above span{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_style_accent.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_image{border-bottom: 7px solid {$accentColor};}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta span,
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta .bt_bb_latest_posts_item_date span{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_style_accent.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_arrow a span:after{
    color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_meta > span{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_meta .bt_bb_grid_item_category a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_meta .bt_bb_grid_item_item_author a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_post_title a:hover{color: {$accentColor};}
.bt_bb_masonry_post_grid .bt_bb_masonry_post_grid_content .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_post_show_more a:before{
    color: {$accentColor};}
.bt_bb_post_grid_loader{
    border-top: .4em solid {$accentColor};}
.bt_bb_post_grid_filter .bt_bb_post_grid_filter_item.active:after,
.bt_bb_post_grid_filter .bt_bb_post_grid_filter_item:hover:after{background-color: {$accentColor};}
.slick-dots li{
    background: {$accentColor};}
.bt_bb_google_maps.bt_bb_style_right .bt_bb_google_maps_content .bt_bb_google_maps_content_wrapper .bt_bb_google_maps_location{
    border-bottom: 9px solid {$accentColor};}
.bt_bb_tabs .bt_bb_tabs_header li span{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_title_content .bt_bb_icon_holder{
    color: {$accentColor};}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_title_content .bt_bb_accordion_item_title{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_counter_holder .bt_bb_counter_icon{
    color: {$accentColor};}
.bt_bb_counter_holder .bt_bb_counter_content .bt_bb_counter{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_counter_holder .bt_bb_counter_content .bt_bb_counter_text{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_countdown.btCounterHolder .btCountdownHolder span[class$=\"_text\"] > span{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_price_list.bt_bb_style_border:after{
    background: {$accentColor};}
.bt_bb_price_list .bt_bb_price_list_icon .bt_bb_icon_holder{
    color: {$accentColor};}
.bt_bb_price_list .bt_bb_price_list_title{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_price_list ul li.included:before{
    color: {$accentColor};}
.bt_bb_card_image .bt_bb_card_image_text_box .bt_bb_card_image_icon{
    color: {$accentColor};}
.bt_bb_card_image .bt_bb_card_image_text_box .bt_bb_headline:before{
    background: {$accentColor};}
.bt_bb_card_image .bt_bb_card_image_text_box .bt_bb_card_image_text li.included:before{
    color: {$accentColor};}
.bt_bb_card_image .bt_bb_card_image_text_box .bt_bb_card_image_arrow span:before{
    color: {$accentColor};}
.bt_bb_url_color_accent.bt_bb_card_image .bt_bb_card_image_text_box .bt_bb_button a{box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 rgba(0,0,0,.1) !important;
    color: {$accentColor} !important;}
.bt_bb_url_color_accent.bt_bb_card_image .bt_bb_card_image_text_box .bt_bb_button:hover a:hover{box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1) !important;}
.bt_bb_card_image:hover.bt_bb_hover_style_light.btNoImage .bt_bb_card_image_text_box .bt_bb_card_image_arrow span:before{color: {$accentColor};}
.bt_bb_card_icon.bt_bb_hover_style_gradient:after{
    background: linear-gradient(90deg,{$accentColor} 0%,{$alternateColor} 100%);}
.bt_bb_icon_color_accent.bt_bb_card_icon .bt_bb_card_icon_content .bt_bb_card_icon_icon{color: {$accentColor} !important;}
.bt_bb_icon_color_alternate.bt_bb_card_icon .bt_bb_card_icon_content .bt_bb_card_icon_icon{color: {$alternateColor} !important;}
.bt_bb_card_icon .bt_bb_card_icon_content .bt_bb_card_icon_text_inner .bt_bb_card_icon_arrow a span:before{
    color: {$accentColor};}
.bt_bb_card_icon:hover.bt_bb_hover_style_accent{
    background: {$accentColor};}
.bt_bb_floating_icon{
    color: {$accentColor};}
.bt_bb_floating_icon.bt_bb_floating_icon_color_alternate{color: {$alternateColor};}
.bt_bb_progress_bar_advanced .container .bt_bb_progress_bar_advanced_text{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_link .bt_bb_link_content .bt_bb_link_text{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_link .bt_bb_link_content .bt_bb_link_text:after{
    color: {$accentColor};}
.bt_bb_link .bt_bb_link_content:after{
    background: {$accentColor};}
.bt_bb_link:hover .bt_bb_link_content .bt_bb_link_text{color: {$accentColor};}
.bt_bb_link.bt_bb_style_underline:hover .bt_bb_link_content:after{
    background: {$accentColor};}
.bt_bb_testimonial.bt_bb_border_visible{border-bottom: 6px solid {$accentColor};}
.bt_bb_testimonial.bt_bb_background_color_light_alternate > .bt_bb_headline{color: {$alternateColor};}
.bt_bb_testimonial.bt_bb_background_color_accent{
    background-color: {$accentColor};}
.bt_bb_testimonial.bt_bb_background_color_alternate{
    background-color: {$alternateColor};}
.bt_bb_image_border_visible.bt_bb_testimonial.bt_bb_image_position_on_top .bt_bb_testimonial_image .bt_bb_image{border: 4px solid {$accentColor};}
.bt_bb_testimonial .bt_bb_testimonial_ratings .bt_bb_testimonial_icon span:before{
    color: {$accentColor};}
.bt_bb_image_border_visible.bt_bb_testimonial .bt_bb_testimonial_text_box .bt_bb_testimonial_image .bt_bb_image{border: 4px solid {$accentColor};}
.bt_bb_masonry_portfolio_tiles .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_inner_content .bt_bb_grid_item_post_show_more a:before{
    color: {$accentColor};}
.wpcf7-form .wpcf7-submit{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.wpcf7-form .wpcf7-submit:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
div.wpcf7-validation-errors,
div.wpcf7-acceptance-missing{border: 2px solid {$accentColor};}
span.wpcf7-not-valid-tip{color: {$accentColor};}
.btOutline.btNewsletter .btNewsletterColumn input:focus{
    border-color: {$accentColor};}
.btAccent.btNewsletter .btNewsletterColumn input{
    border-bottom: 1px solid {$accentColor};}
.btAccent.btNewsletter .btNewsletterColumn input:focus{
    border-color: {$accentColor};}
.btLightButton.btNewsletter .btNewsletterColumn input:focus{
    border-color: {$accentColor};}
.btNewsletter .btNewsletterColumn input:focus{border-color: {$accentColor} !important;}
.btGradient.btNewsletter .btNewsletterColumn input:focus{
    border-bottom: 1px solid {$accentColor};}
.btNewsletter .btNewsletterButton button{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btNewsletter .btNewsletterButton button:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btAccent.btNewsletter .btNewsletterButton button{color: {$accentColor} !important;
    box-shadow: 0 0 0 1px {$accentColor} inset;}
.btAccent.btNewsletter .btNewsletterButton button:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btDemo.btNewsletter .btNewsletterButton button{
    box-shadow: 0 0 0 4em {$alternateColor} inset;}
.btDemo.btNewsletter .btNewsletterButton button:hover{box-shadow: 0 0 0 4em {$alternateColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btGradient.btNewsletter .btNewsletterButton button{
    background: linear-gradient(90deg,{$accentColor} 0%,{$alternateColor} 100%);}
.btLightOutline.btNewsletter .btNewsletterButton button{color: {$accentColor} !important;}
.btUnderline.btContact .btContactRow input,
.btUnderline.btContact .btContactRow textarea,
.btUnderline.btContact .btContactRow .trigger,
.btUnderline.btContact .btContactRow select{border-color: {$accentColor};}
.btFullWidth.btContact .btContactRow input:focus,
.btFullWidth.btContact .btContactRow textarea:focus,
.btFullWidth.btContact .btContactRow .trigger:focus,
.btFullWidth.btContact .btContactRow select:focus{
    border: 1px solid {$accentColor} !important;}
.btContact .btContactRow input:focus,
.btContact .btContactRow textarea:focus,
.btContact .btContactRow .trigger:focus,
.btContact .btContactRow select:focus{
    border-bottom: 1px solid {$accentColor} !important;}
.btLeftIcon.btContact .btContactButton button{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btLeftIcon.btContact .btContactButton button:before{
    color: {$accentColor};}
.btLeftIcon.btContact .btContactButton button:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btOutline.btLight.btLeftIcon.btContact .btContactButton button:hover:before{background: {$accentColor};}
.btFullWidth.btContact .btContactButton button{box-shadow: 0 0 0 4em {$accentColor} inset;}
.btFullWidth.btContact .btContactButton button:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btLight.btContact .btContactButton button{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 0 0 rgba(0,0,0,.1);}
.btLight.btContact .btContactButton button:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btUnderline.btContact .btContactButton button{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btUnderline.btContact .btContactButton button:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btGradient.btContact .btContactButton button{
    background: linear-gradient(90deg,{$accentColor} 0%,{$alternateColor} 100%);}
.btAccent.btContact .btContactButton button{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btAccent.btContact .btContactButton button:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btContactBox .btBoxButton button{
    box-shadow: 0 0 0 4em {$alternateColor} inset;}
.btAccent.btContactBox .btBoxButton button{box-shadow: 0 0 0 4em {$accentColor} inset;}
.btAccent.btContactBox .btBoxButton button:hover{box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btContactBox .btBoxButton button:hover{
    box-shadow: 0 0 0 4em {$alternateColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btCareer input:focus,
.btCareer textarea:focus,
.btCareer .trigger:focus{
    border-bottom: 1px solid {$accentColor} !important;}
.btAccent.btCareer input,
.btAccent.btCareer textarea,
.btAccent.btCareer .trigger{border-color: {$accentColor};}
.btSquare.btCareer .btContactButton button{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btSquare.btCareer .btContactButton button:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btSquare.btCareer .btContactButton button:before{
    color: {$accentColor};}
.btLight.btCareer .btContactButton button{color: {$accentColor} !important;}
.btLight.btCareer .btContactButton button:before{background: {$accentColor};}
.btLight.btCareer .btContactButton button:hover{color: {$accentColor} !important;}
.btAccent.btCareer .btContactButton button{
    box-shadow: 0 0 0 4em {$accentColor} inset;}
.btAccent.btCareer .btContactButton button:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btBorderShopDetail_show .products ul li.product .btWooShopLoopItemInner .bt_bb_image,
.btBorderShopDetail_show ul.products li.product .btWooShopLoopItemInner .bt_bb_image{border-bottom: 7px solid {$accentColor};}
.products ul li.product .btWooShopLoopItemInner .price,
ul.products li.product .btWooShopLoopItemInner .price{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.products ul li.product .btWooShopLoopItemInner a.button,
ul.products li.product .btWooShopLoopItemInner a.button{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.products ul li.product .btWooShopLoopItemInner .added:after,
.products ul li.product .btWooShopLoopItemInner .loading:after,
ul.products li.product .btWooShopLoopItemInner .added:after,
ul.products li.product .btWooShopLoopItemInner .loading:after{
    background-color: {$accentColor};}
.products ul li.product .onsale,
ul.products li.product .onsale{
    background: {$alternateColor};}
div.product .onsale{
    background: {$alternateColor};}
div.product div.images .woocommerce-product-gallery__trigger:after{
    box-shadow: 0 0 0 2em {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;}
div.product div.images .woocommerce-product-gallery__trigger:hover:after{box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    color: {$accentColor};}
table.shop_table .coupon .input-text{
    color: {$accentColor};}
ul.wc_payment_methods li .about_paypal{
    color: {$accentColor};}
.woocommerce-MyAccount-navigation ul li a{
    border-bottom: 2px solid {$accentColor};}
.btDarkSkin .woocommerce-error,
.btLightSkin .btDarkSkin .woocommerce-error,
.btDarkSkin.btLightSkin .btDarkSkin .woocommerce-error,
.bt-dark-skin .woocommerce-error,
.btLightSkin .bt-dark-skin .woocommerce-error,
.bt-dark-skin .btLightSkin .bt-dark-skin .woocommerce-error,
.btDarkSkin .woocommerce-info,
.btLightSkin .btDarkSkin .woocommerce-info,
.btDarkSkin.btLightSkin .btDarkSkin .woocommerce-info,
.bt-dark-skin .woocommerce-info,
.btLightSkin .bt-dark-skin .woocommerce-info,
.bt-dark-skin .btLightSkin .bt-dark-skin .woocommerce-info,
.btDarkSkin .woocommerce-message,
.btLightSkin .btDarkSkin .woocommerce-message,
.btDarkSkin.btLightSkin .btDarkSkin .woocommerce-message,
.bt-dark-skin .woocommerce-message,
.btLightSkin .bt-dark-skin .woocommerce-message,
.bt-dark-skin .btLightSkin .bt-dark-skin .woocommerce-message{border-top: 4px solid {$accentColor};}
.woocommerce-info a:not(.button),
.woocommerce-message a:not(.button){color: {$alternateColor};}
.woocommerce .btSidebar a.button,
.woocommerce .btContent a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .btContent a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .btContent input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .btContent input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .btContent button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .btContent button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .btContent input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .btContent input.button,
.woocommerce .btSidebar input.alt:hover,
.woocommerce .btContent input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .btContent input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .btContent a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .btContent a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .btContent .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .btContent .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .btContent button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .btContent button.alt:hover,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.star-rating span:before{
    color: {$accentColor};}
p.stars a[class^=\"star-\"].active:after,
p.stars a[class^=\"star-\"]:hover:after{color: {$accentColor};}
.select2-container--default .select2-results__option--highlighted[aria-selected],
.select2-container--default .select2-results__option--highlighted[data-selected]{background-color: {$accentColor};}
.btQuoteBooking .btContactNext{color: {$accentColor};
    box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 rgba(0,0,0,.1);
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.btQuoteBooking .btContactNext:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btQuoteBooking h1 strong,
.btQuoteBooking h2 strong,
.btQuoteBooking h3 strong,
.btQuoteBooking h4 strong,
.btQuoteBooking h5 strong,
.btQuoteBooking h6 strong{
    color: {$accentColor};}
.btQuoteBooking .ui-slider .ui-slider-handle{background: {$accentColor};}
.btQuoteBooking .btQuoteSwitch.on .btQuoteSwitchInner{background: {$accentColor};}
.btQuoteBooking textarea:focus,
.btQuoteBooking input[type=\"text\"]:focus,
.btQuoteBooking input[type=\"email\"]:focus,
.btQuoteBooking input[type=\"password\"]:focus,
.btQuoteBooking .fancy-select .trigger:focus,
.btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btQuoteBooking .ddcommon.borderRadiusBtm .ddTitleText:focus{box-shadow: 0 0 4px 0 {$accentColor};}
.btLightSkin .btQuoteBooking textarea:focus,
.btDarkSkin .btLightSkin .btQuoteBooking textarea:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking textarea:focus,
.btLightSkin .btQuoteBooking input[type=\"text\"]:focus,
.btDarkSkin .btLightSkin .btQuoteBooking input[type=\"text\"]:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking input[type=\"text\"]:focus,
.btLightSkin .btQuoteBooking input[type=\"email\"]:focus,
.btDarkSkin .btLightSkin .btQuoteBooking input[type=\"email\"]:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking input[type=\"email\"]:focus,
.btLightSkin .btQuoteBooking input[type=\"password\"]:focus,
.btDarkSkin .btLightSkin .btQuoteBooking input[type=\"password\"]:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking input[type=\"password\"]:focus,
.btLightSkin .btQuoteBooking .fancy-select .trigger:focus,
.btDarkSkin .btLightSkin .btQuoteBooking .fancy-select .trigger:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking .fancy-select .trigger:focus,
.btLightSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btDarkSkin .btLightSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btLightSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btDarkSkin .btLightSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btLightSkin .btQuoteBooking .ddcommon.borderRadiusBtm .ddTitleText:focus,
.btDarkSkin .btLightSkin .btQuoteBooking .ddcommon.borderRadiusBtm .ddTitleText:focus,
.btLightSkin .btDarkSkin .btLightSkin .btQuoteBooking .ddcommon.borderRadiusBtm .ddTitleText:focus{
    border-bottom: 1px solid {$accentColor};}
.btDarkSkin .btQuoteBooking textarea:focus,
.btLightSkin .btDarkSkin .btQuoteBooking textarea:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking textarea:focus,
.bt-dark-skin .btQuoteBooking textarea:focus,
.btLightSkin .bt-dark-skin .btQuoteBooking textarea:focus,
.bt-dark-skin .btLightSkin .bt-dark-skin .btQuoteBooking textarea:focus,
.btDarkSkin .btQuoteBooking input[type=\"text\"]:focus,
.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"text\"]:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"text\"]:focus,
.bt-dark-skin .btQuoteBooking input[type=\"text\"]:focus,
.btLightSkin .bt-dark-skin .btQuoteBooking input[type=\"text\"]:focus,
.bt-dark-skin .btLightSkin .bt-dark-skin .btQuoteBooking input[type=\"text\"]:focus,
.btDarkSkin .btQuoteBooking input[type=\"email\"]:focus,
.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"email\"]:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"email\"]:focus,
.bt-dark-skin .btQuoteBooking input[type=\"email\"]:focus,
.btLightSkin .bt-dark-skin .btQuoteBooking input[type=\"email\"]:focus,
.bt-dark-skin .btLightSkin .bt-dark-skin .btQuoteBooking input[type=\"email\"]:focus,
.btDarkSkin .btQuoteBooking input[type=\"password\"]:focus,
.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"password\"]:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking input[type=\"password\"]:focus,
.bt-dark-skin .btQuoteBooking input[type=\"password\"]:focus,
.btLightSkin .bt-dark-skin .btQuoteBooking input[type=\"password\"]:focus,
.bt-dark-skin .btLightSkin .bt-dark-skin .btQuoteBooking input[type=\"password\"]:focus,
.btDarkSkin .btQuoteBooking .fancy-select .trigger:focus,
.btLightSkin .btDarkSkin .btQuoteBooking .fancy-select .trigger:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking .fancy-select .trigger:focus,
.bt-dark-skin .btQuoteBooking .fancy-select .trigger:focus,
.btLightSkin .bt-dark-skin .btQuoteBooking .fancy-select .trigger:focus,
.bt-dark-skin .btLightSkin .bt-dark-skin .btQuoteBooking .fancy-select .trigger:focus,
.btDarkSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btLightSkin .btDarkSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.bt-dark-skin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btLightSkin .bt-dark-skin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.bt-dark-skin .btLightSkin .bt-dark-skin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btDarkSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btLightSkin .btDarkSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.bt-dark-skin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btLightSkin .bt-dark-skin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.bt-dark-skin .btLightSkin .bt-dark-skin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.btDarkSkin .btQuoteBooking .ddcommon.borderRadiusBtm .ddTitleText:focus,
.btLightSkin .btDarkSkin .btQuoteBooking .ddcommon.borderRadiusBtm .ddTitleText:focus,
.btDarkSkin.btLightSkin .btDarkSkin .btQuoteBooking .ddcommon.borderRadiusBtm .ddTitleText:focus,
.bt-dark-skin .btQuoteBooking .ddcommon.borderRadiusBtm .ddTitleText:focus,
.btLightSkin .bt-dark-skin .btQuoteBooking .ddcommon.borderRadiusBtm .ddTitleText:focus,
.bt-dark-skin .btLightSkin .bt-dark-skin .btQuoteBooking .ddcommon.borderRadiusBtm .ddTitleText:focus{
    border-bottom: 1px solid {$accentColor};}
.btQuoteBooking .btQuoteBookingForm .btQuoteTotal{
    box-shadow: 0 0 0 1px {$accentColor} inset;}
.btQuoteBooking .btQuoteBookingForm .btQuoteTotal .btQuoteTotalCalc{
    background: {$accentColor};
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.btQuoteBooking .btQuoteBookingForm .btQuoteTotal .btQuoteTotalCurrency{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    background: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError input,
.btQuoteBooking .btContactFieldMandatory.btContactFieldError textarea{box-shadow: 0 0 0 1px {$accentColor} inset;
    border-color: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError .dd.ddcommon.borderRadius .ddTitleText{box-shadow: 0 0 0 2px {$accentColor} inset;}
.btQuoteBooking .btSubmitMessage{color: {$accentColor};}
.btQuoteBooking .dd.ddcommon.borderRadiusTp .ddTitleText,
.btQuoteBooking .dd.ddcommon.borderRadiusBtm .ddTitleText{box-shadow: 0 0 4px 0 {$accentColor};
    border-bottom: 1px solid {$accentColor};}
.btQuoteBooking .btContactSubmit{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;
    box-shadow: 0 0 0 4em {$accentColor} inset,0 0 0 rgba(0,0,0,.1);}
.btQuoteBooking .btContactSubmit:hover{
    box-shadow: 0 0 0 4em {$accentColor} inset,0 5px 8px rgba(0,0,0,.1);}
.btDatePicker .ui-datepicker-header{background-color: {$accentColor};}
.btTimelineAbout.btDemo04 .bold_timeline_group_header{
    background: {$accentColor} !important;}
.btTimelineAbout.btDemo04 .bold_timeline_item_header .bold_timeline_item_header_supertitle .bold_timeline_item_header_supertitle_inner{color: {$accentColor} !important;}
.btCompanyHistory .bold_timeline_item{border-bottom: 6px solid {$accentColor} !important;}
.btProcess .bold_timeline_item .bold_timeline_item_icon{color: {$accentColor} !important;}
.btAboutMe .bold_timeline_item_header_supertitle .bold_timeline_item_header_supertitle_inner{color: {$accentColor} !important;}
", array() );