<div class="infinite-scroll__item scale__image__wrapper">
   <?php the_post_thumbnail("sela-carousel-thumbnail"); ?>
   <a class="infinite-scroll__hover" href="<?php the_permalink(); ?>">
      <h1 class="infinite-scroll__title"><?php the_title_attribute(); ?></h1>
      <h4 class="infinite-scroll__subtitle"><?php the_time("d-m-Y") ?> por: <?php the_author() ?> </h4>
      <span class="infinite-scroll__resumen"><?php the_excerpt(); ?><span>
   </a>
</div>