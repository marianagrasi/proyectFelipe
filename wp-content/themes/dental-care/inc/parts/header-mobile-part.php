<?php
/**
*
* Header mobile Call Us Opening Hours
*
* @package Dental_Care
*/
?>

<?php
$allowed_html = array(
  'abbr' => array(
    'title' => true,
  ),
  'acronym' => array(
    'title' => true,
  ),
  'b' => array(),
  'blockquote' => array(
    'cite' => true,
  ),
  'cite' => array(),
  'code' => array(),
  'em' => array(),
  'i' => array(),
  'q' => array(
    'cite' => true,
  ),
  'strike' => array(),
  'strong' => array(),
  'i' => array(
    'class' => array(),
    'title' => array(),
    'style' => array(),
  ),
  'a' => array(
    'href' => array(),
    'rel' => array(),
    'class' => array(),
    'style' => array(),
    'onclick' => array(),
  ),
  'p' => array(
    'class' => array(),
    'style' => array(),
  ),
  'ul' => array(
    'class' => array(),
    'style' => array(),
  ),
  'ol' => array(
    'class' => array(),
    'style' => array(),
  ),
  'li' => array(
    'class' => array(),
    'style' => array(),
  ),
  'br' => array(
    'class' => array(),
    'style' => array(),
  )
);
?>

<div class="header-mobile">


  <div class="contact-header-area">
    <div class="container">
      <div class="row">
        <?php
        if (class_exists('OT_Loader')) {
          if(ot_get_option('call_us_mobile_header_en') == '' || ot_get_option('call_us_mobile_header_en') == 'on'){
            if(ot_get_option('call_us_text') != ''){
              ?>
              <div class="contact-item col-md-12 col-sm-12 col-xs-12 call-contact">
                <div class="icon-wrapper">

                  <?php
                  if (ot_get_option('call_icon') == "") {
                    ?>
                    <i class="lnr lnr-phone-handset"></i>
                    <?php
                  } else {
                    ?>
                    <i class="<?php echo esc_attr(ot_get_option('call_icon')); ?>"></i>
                    <?php
                  }
                  ?>

                </div>
                <div class="header-area-contact-info">
                  <h6><?php echo esc_html(ot_get_option('call_us_text')); ?></h6>
                  <p><?php echo wp_kses(ot_get_option('contact_number'), $allowed_html); ?></p>
                </div>

              </div>
              <?php
            }
          }
        }
        ?>

        <?php
        if (class_exists('OT_Loader')) {
          if(ot_get_option('opening_hrs_mobile_header_en') == '' || ot_get_option('opening_hrs_mobile_header_en') == 'on'){
            if(ot_get_option('opening_hours_text') != ''){
              ?>
              <div class="contact-item col-md-12 col-sm-12 col-xs-12 opening-contact">
                <div class="icon-wrapper">

                  <?php
                  if (ot_get_option('openhrs_icon') == "") {
                    ?>
                    <i class="lnr lnr-clock"></i>
                    <?php
                  } else {
                    ?>
                    <i class="<?php echo esc_attr(ot_get_option('openhrs_icon')) ?>"></i>
                    <?php
                  }
                  ?>

                </div>
                <div class="header-area-contact-info">
                  <h6><?php echo esc_html(ot_get_option('opening_hours_text')); ?></h6>
                  <p><?php echo wp_kses(ot_get_option('contact_hours'), $allowed_html); ?></p>
                </div>
              </div>
              <?php
            }
          }
        }
        ?>

        <?php
        if (class_exists('OT_Loader')) {
          if(ot_get_option('book_mobile_header_en') == '' || ot_get_option('book_mobile_header_en') == 'on'){
            if(ot_get_option('contact_book_text') != ''){
              ?>
              <div class="contact-item col-md-12 col-sm-12 col-xs-12 booking-contact">
                <div class="icon-wrapper">
                  <?php
                  if (ot_get_option('book_icon') == "") {
                    ?>
                    <i class="lnr lnr-calendar-full"></i>
                    <?php
                  } else {
                    ?>
                    <i class="<?php echo esc_attr(ot_get_option('book_icon')) ?>"></i>
                    <?php
                  }
                  ?>
                </div>
                <div class="header-area-contact-info">
                  <?php
                  $book_type = ot_get_option('contact_book_type');

                  if ($book_type == "book-email") {
                    ?>
                    <h6><a href="mailto:<?php echo get_permalink(ot_get_option('book_email')); ?>?subject=<?php echo esc_html(ot_get_option('contact_book_text')); ?>"><?php echo esc_html(ot_get_option('contact_book_text')); ?></a></h6>
                  <?php } else if ($book_type == "book-link") { ?>
                    <h6><a href="<?php echo esc_url(ot_get_option('book_link')); ?>"><?php echo wp_kses(ot_get_option('contact_book_text'), $allowed_html); ?></a></h6>
                  <?php }else { ?>
                    <h6><a href="<?php echo get_permalink(ot_get_option('contact_book_link')); ?>"><?php echo wp_kses(ot_get_option('contact_book_text'), $allowed_html); ?></a></h6>
                  <?php }
                  ?>
                  <p><?php echo esc_html(ot_get_option('contact_book_subtext')); ?></p>
                </div>
              </div>
              <?php
            }
          }
        }
        ?>

        <?php
        if (class_exists('OT_Loader')) {
          if(ot_get_option('social_mobile_header_en') == '' || ot_get_option('social_mobile_header_en') == 'on'){

            ?>
            <div class="contact-item col-md-12 col-sm-12 col-xs-12 social-contact">

              <div class="header-area-contact-info">
                <?php
                dental_care_add_social_menu();
                ?>

              </div>
            </div>
            <?php
          }
        }
        ?>

      </div>
    </div>
  </div>
</div>
