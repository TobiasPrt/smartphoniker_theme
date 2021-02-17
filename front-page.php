<?php


get_header();



// Hero
$hero = array(
  "heading" => get_field("pagetitle"),
  "subtitlemobile" => get_field("subtitle-mobile"),
  "subtitledesktop" => get_field("subtitle-desktop"),
  "components" => array(
    array(
      "type" => "block-form",
      "content" => array(
        "label_manufacturer" => get_field("label-manufacturer"),
        "label_device" => get_field("label-modell"),
        "label_button" => get_field("label-button"),
      ),
    ),
    array (
      "type" => "columns-5",
      "content" => array(
        "images" => array(
          get_field("logo1"),
          get_field("logo2"),
          get_field("logo3"),
          get_field("logo4"),
          get_field("logo5"),
        ),
      )
    )
  ),
);
get_template_part( "template-parts/component", "hero", $hero );
      
      


// News
$news = array(
  "heading" => get_field("news_heading"),
  "components" => array(
    array(
      "type" => "block-2",
      "content" => array(
        "large" => true,
        "color" => get_field("news_color"),
        "image" => get_field("news_image"),
        "text" => get_field("news_text"),
        "link" => get_field("news_link"),
      ),
    ),
  ),
);
get_template_part( "template-parts/component", "section", $news ); 
        
        

// Benefits
$benefits = array(
  "heading" => get_field("benefits_heading"),
  "components" => array(
    array(
      "type" => "columns-3",
      "content" => array(
        "modifications" => array(
          "headings"
        ),
        "columns" => array(
          array(
            "image" => get_field("benefit1_image"),
            "heading" => get_field("benefit1_heading"),
            "text" => get_field("benefit1_text"),
          ),
          array(
            "image" => get_field("benefit2_image"),
            "heading" => get_field("benefit2_heading"),
            "text" => get_field("benefit2_text"),
          ),
          array(
            "image" => get_field("benefit3_image"),
            "heading" => get_field("benefit3_heading"),
            "text" => get_field("benefit3_text"),
          ),
        ),
      ),
    ),
    array(
      "type" => "video",
      "content" => array(
        "url" => get_field("benefits_video_url"),
      ),
    ),
  ),
);
get_template_part( "template-parts/component", "section", $benefits );
        
        


// Feature
$feature = array(
  "heading" => get_field("feature_heading"),
  "components" => array(
    array(
      "type" => "block-2",
      "content" => array(
        "large" => true,
        "color" => get_field("feature_color"),
        "image" => get_field("feature_image"),
        "text" => get_field("feature_text"),
        "link" => get_field("feature_link"),
      ),
    ),
  ),
);
get_template_part( "template-parts/component", "section", $feature ); 
        
        



// Testimonial
$testimonial = array(
  "heading" => get_field("testimonial_heading"),
  "components" => array(
    array(
      "type" => "columns-3",
      "content" => array(
        "modifications" => array(
          "icons", "small-icons", "subtitles"
        ),
        "columns" => array(
          array(
            "image" => get_field("rating1_image"),
            "subtitle" => get_field("rating1_subtitle"),
            "text" => get_field("rating1_text"),
          ),
          array(
            "image" => get_field("rating2_image"),
            "subtitle" => get_field("rating2_subtitle"),
            "text" => get_field("rating2_text"),
          ),
          array(
            "image" => get_field("rating3_image"),
            "subtitle" => get_field("rating3_subtitle"),
            "text" => get_field("rating3_text"),
          ),
        ),
      ),
    ),
    array(
      "type" => "google-rating-block",
      "content" => array(
        "text" => get_field("google_rating_text"),
        "link" => get_field("google_rating_link"),
      ),
    ),
  ),
);
get_template_part( "template-parts/component", "section", $testimonial );
        
       



// Info
$info = array(
  "heading" => get_field("info_heading"),
  "components" => array(
    array(
      "type" => "columns-1",
      "content" => array(
        "text" => get_field("info_text"),
      ),
    ),
    array(
      "type" => "columns-3",
      "content" => array(
        "modifications" => array(
          "headings", "text-left", "orange-headings"
        ),
        "columns" => array(
          array(
            "heading" => get_field("info1_heading"),
            "text" => get_field("info1_text"),
          ),
          array(
            "heading" => get_field("info2_heading"),
            "text" => get_field("info2_text"),
          ),
          array(
            "heading" => get_field("info3_heading"),
            "text" => get_field("info3_text"),
          ),
        ),
      ),
    ),
    
  ),
);
get_template_part( "template-parts/component", "section", $info );
      
      
// Footer 
get_footer(); ?>
