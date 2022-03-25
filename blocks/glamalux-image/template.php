<?php
  $prefix = 'glamalux-image_';
  $image_sizes = glamalux_image_image_sizes();
  $image_size = (mb_get_block_field( $prefix . 'image_size')) ?: 'full';

  $has_hovereffect = (mb_get_block_field( $prefix . 'image_hover_effect')) ? true : false;
  $has_animation = (mb_get_block_field( $prefix . 'image_animation')) ? true : false;
  $caption_type = (mb_get_block_field( $prefix . 'caption_type')) ?: 'below';
  $caption = mb_get_block_field($prefix . 'caption');
  $caption_subtitle = mb_get_block_field($prefix . 'caption_subtitle');
  $caption_font = (mb_get_block_field( $prefix . 'caption_font')) ?: 'sans';
  $caption_alignment = (mb_get_block_field( $prefix . 'caption_alignment') ?? 'left');
  $has_lightbox = (mb_get_block_field( $prefix . 'lightbox')) ? true : false;
  $link = (!$has_lightbox && mb_get_block_field( $prefix . 'internal_link')) ? mb_get_block_field( $prefix . 'internal_link') :  null;

  $data_attrs = (!$is_preview && $has_animation) ? 'data-aos="fade-up" data-aos-delay="300" data-aos-easing="ease-out"' : '';

  $data_lightbox_text = ($caption) ? "title: {$caption};" : '';
  $data_lightbox_text .= ($caption_subtitle) ? "description: {$caption_subtitle};" : '';
  $data_lightbox = (!empty($data_lightbox_text)) ? 'data-glightbox="' . $data_lightbox_text .'"' : '';

  // Unique HTML ID if available.
	$id = 'glamalux-image-' . ( $attributes['id'] ?? '' );
	if ( ! empty( $attributes['anchor'] ) ) {
		$id = $attributes['anchor'];
	}

	// Custom CSS class name.
  $class = [];
	$class[] = 'glamalux-image';
  $class[] = ( $attributes['className'] ) ?? '';
	if ( ! empty( $attributes['align'] ) ) {
		$class[] = "align{$attributes['align']}";
	}
  if ( $has_hovereffect ) {
    $class[] = "glamalux-image--hovereffect";
  }
  if ( $caption_type === 'inside') {
    $class[] = "glamalux-image--caption-inside";
  }
  if ( $link ) {
    $class[] = "glamalux-image--linked";
  }
  if ( $has_lightbox ) {
    $class[] = "glamalux-image--lightboxed";
  }
  $class = trim(implode(" ", $class));
?>

<?php $image = mb_get_block_field( $prefix . 'single_image', array('size' => $image_size) ); ?>
<figure id="<?= $id ?>" class="<?= $class ?>" <?= $data_attrs ?>>
  <div class="glamalux-image__imgwrapper">
    <?php if ( !$is_preview && $has_lightbox ): ?>
      <a class="mwe-glightbox glamalux-image__imglink" href="<?= $image['full_url'] ?>" <?= $data_lightbox ?> >
    <?php endif; ?>
      <img class="glamalux-image__image" alt="<?= $image['alt'] ?>" title="<?= $image['title'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" loading="lazy" src="<?= $image['url'] ?>" srcset="<?= $image['srcset'] ?>">
    <?php if ( !$is_preview && $has_lightbox ): ?>
      <svg class="glamalux-image__zoomicon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="64" height="64"
viewBox="0 0 226 226"
style=" fill:transparent;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,226v-226h226v226z" fill="none"></path><g fill="#ffffff"><path d="M88.28125,0c-48.67883,0 -88.28125,39.60242 -88.28125,88.28125c0,48.67883 39.60242,88.28125 88.28125,88.28125c19.47705,0 37.47815,-6.34521 52.08594,-17.06311l8.97986,8.96606c0.38623,0.38623 1.28284,1.39319 1.28284,1.57251c0.13794,4.51062 1.97254,8.74536 5.17273,11.94555l36.52637,36.52637c3.44848,3.44849 7.95911,5.17273 12.48352,5.17273c4.51062,0 9.03504,-1.72424 12.48352,-5.17273l1.21387,-1.21387c3.33814,-3.33813 5.17273,-7.76599 5.17273,-12.48352c0,-4.71753 -1.83459,-9.14539 -5.17273,-12.48352l-36.52637,-36.52637c-3.32434,-3.32434 -7.65564,-5.021 -12.02832,-5.13135c-0.2345,-0.01379 -1.10352,-0.93799 -1.48975,-1.32422l-8.96606,-8.97986c10.71789,-14.60779 17.06311,-32.60889 17.06311,-52.08594c0,-48.67883 -39.60242,-88.28125 -88.28125,-88.28125zM88.28125,7.0625c44.78894,0 81.21875,36.42981 81.21875,81.21875c0,44.78894 -36.42981,81.21875 -81.21875,81.21875c-44.78894,0 -81.21875,-36.42981 -81.21875,-81.21875c0,-44.78894 36.42981,-81.21875 81.21875,-81.21875zM88.28125,21.1875c-36.99536,0 -67.09375,30.09839 -67.09375,67.09375c0,1.95874 1.5863,3.53125 3.53125,3.53125c1.94495,0 3.53125,-1.57251 3.53125,-3.53125c0,-33.10547 26.92578,-60.03125 60.03125,-60.03125c33.10547,0 60.03125,26.92578 60.03125,60.03125c0,33.10547 -26.92578,60.03125 -60.03125,60.03125c-1.94495,0 -3.53125,1.57251 -3.53125,3.53125c0,1.95874 1.5863,3.53125 3.53125,3.53125c36.99536,0 67.09375,-30.09839 67.09375,-67.09375c0,-36.99536 -30.09839,-67.09375 -67.09375,-67.09375zM88.28125,49.4375c-1.94495,0 -3.53125,1.57251 -3.53125,3.53125v31.78125h-31.78125c-1.94495,0 -3.53125,1.57251 -3.53125,3.53125c0,1.95874 1.5863,3.53125 3.53125,3.53125h31.78125v31.78125c0,1.95874 1.5863,3.53125 3.53125,3.53125c1.94495,0 3.53125,-1.57251 3.53125,-3.53125v-31.78125h31.78125c1.94495,0 3.53125,-1.57251 3.53125,-3.53125c0,-1.95874 -1.5863,-3.53125 -3.53125,-3.53125h-31.78125v-31.78125c0,-1.95874 -1.5863,-3.53125 -3.53125,-3.53125zM34.19519,99.39917c-0.4552,-0.06897 -0.93799,-0.02759 -1.40698,0.09655l-6.828,1.8208c-1.87598,0.51038 -2.99329,2.45532 -2.48291,4.34509c0.41382,1.57251 1.84839,2.60705 3.39331,2.60705c0.30347,0 0.62073,-0.04138 0.9242,-0.12414l6.828,-1.8208c1.87598,-0.51038 3.00708,-2.45532 2.4967,-4.3313c-0.37244,-1.40698 -1.55871,-2.40015 -2.92432,-2.59326zM38.91272,113.01379c-0.4552,0.06897 -0.89661,0.2207 -1.32422,0.469l-6.11072,3.53125c-1.69666,0.96557 -2.276,3.11743 -1.29663,4.81409c0.64832,1.13111 1.83459,1.76563 3.06226,1.76563c0.59314,0 1.20007,-0.15173 1.75183,-0.48279l6.11072,-3.53125c1.69666,-0.96557 2.276,-3.11743 1.31043,-4.81409c-0.73108,-1.26904 -2.12427,-1.91736 -3.50366,-1.75183zM48.33398,124.69727c-0.9104,0 -1.80701,0.34485 -2.4967,1.03455l-5.0072,4.99341c-1.37939,1.37939 -1.37939,3.61402 0,4.99341c0.6897,0.6897 1.6001,1.03455 2.4967,1.03455c0.9104,0 1.8208,-0.34485 2.5105,-1.03455l4.97961,-4.99341c1.39319,-1.37939 1.39319,-3.61401 0,-4.99341c-0.6897,-0.6897 -1.5863,-1.03455 -2.48291,-1.03455zM60.47266,133.70471c-1.37939,-0.16553 -2.77258,0.469 -3.48987,1.73804l-3.53125,6.12451c-0.97937,1.68286 -0.40002,3.83472 1.28284,4.81409c0.55176,0.31726 1.15869,0.48279 1.76563,0.48279c1.21387,0 2.40015,-0.64832 3.04846,-1.76562l3.53125,-6.12451c0.97937,-1.68286 0.40003,-3.84851 -1.28284,-4.82788c-0.42761,-0.2345 -0.86902,-0.38623 -1.32422,-0.44141zM73.16309,139.36023c-1.3518,0.19311 -2.53809,1.17248 -2.92432,2.57947l-1.8208,6.828c-0.51038,1.87598 0.60693,3.82093 2.4967,4.3313c0.30347,0.06897 0.60693,0.11035 0.9242,0.11035c1.54492,0 2.97949,-1.03455 3.40711,-2.62085l1.8208,-6.81421c0.51038,-1.87598 -0.62073,-3.82092 -2.4967,-4.3313c-0.469,-0.12414 -0.95178,-0.15173 -1.40698,-0.08276zM155.05774,145.92615l6.62109,6.62109c-1.66907,0.82764 -3.26916,1.86218 -4.66235,3.25537l-1.21387,1.21387c-1.37939,1.37939 -2.42773,2.9657 -3.25537,4.64856l-6.62109,-6.6073c3.26916,-2.81396 6.31763,-5.86243 9.13159,-9.13159zM169.5,157.69238c2.71741,0 5.42102,1.03455 7.49011,3.10364l36.52637,36.52637c2.00012,2.00012 3.10364,4.66236 3.10364,7.49011c0,2.82776 -1.10352,5.48999 -3.10364,7.49011l-1.21387,1.21387c-4.13818,4.12439 -10.84204,4.13818 -14.98023,0l-36.52637,-36.52637c-2.00012,-2.00012 -3.10364,-4.66236 -3.10364,-7.49011c0,-2.82776 1.10352,-5.48999 3.10364,-7.49011l1.21387,-1.21387c2.06909,-2.06909 4.7865,-3.10364 7.49011,-3.10364z"></path></g></g></svg>
      </a>
    <?php endif; ?>
  </div>
  <?php if ( $caption && $caption_type === 'below' ): ?>
  <figcaption class="glamalux-image__caption glamalux-image__caption--<?= $caption_font ?> glamalux-image__caption--<?= $caption_alignment ?>"><?= $caption ?></figcaption>
  <?php endif; ?>
  <?php if ( $caption && $caption_type === 'inside' ): ?>
  <div class="glamalux-image__caption glamalux-image__caption--<?= $caption_font ?>">
    <?= $caption ?>
    <?php if ( $caption_subtitle !== '' ): ?>
    <div class="glamalux-image__caption-sub"><?= $caption_subtitle ?></div>
    <?php endif; ?>
  </div>
  <?php endif; ?>
  <?php if ( !$is_preview && $link ): ?>
    <a class="glamalux-image__link" href="<?= get_permalink($link) ?>"></a>
  <?php endif; ?>
</figure>
