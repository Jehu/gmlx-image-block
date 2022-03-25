<?php
  // Unique HTML ID if available.
	$id = 'demo-block-' . ( $attributes['id'] ?? '' );
	if ( ! empty( $attributes['anchor'] ) ) {
		$id = $attributes['anchor'];
	}

	// Custom CSS class name.
	$class = 'demo-block ' . ( $attributes['className'] ?? '' );
	if ( ! empty( $attributes['align'] ) ) {
		$class .= " align{$attributes['align']}";
	}
?>

<div id="<?= $id ?>" class="<?= $class ?>">
  Text:  <?= mb_get_block_field( 'my_text' ) ?><br>
  URL:  <?= mb_get_block_field( 'my_url' ) ?><br>

  <a class="btn" href="<?= mb_get_block_field( 'my_url' ) ?>" target="_blank"><?= mb_get_block_field( 'my_text' ) ?></a>
</div>