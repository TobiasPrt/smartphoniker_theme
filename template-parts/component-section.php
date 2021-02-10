<section class="content__section section">
  <h2 class="section__heading"><?= $args["heading"] ?></h2>
  
  <!-- Component within section -->
  <?php 
  foreach($args["components"] as $component):
    get_template_part( "template-parts/component", $component["type"], $component["content"] ); 
  endforeach;  
  ?>
</section>