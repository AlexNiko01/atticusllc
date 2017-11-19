<?php
$terms = get_field('key_benefits');
if(!empty($term)) :
?>

<section class="pr-benefits">
    <div class="container c-center">


        <h3>Key Uses</h3>
        <p>Acadia™ 2 SC offers maximum application flexibility and may be applied with all types of
            spray equipment used for ground and aerial applications.</p>

        <div class="grid pr-benefits__items">
            <?php if (!empty($terms)): ?>
                <?php foreach ($terms as $term): ?>
                    <a href="#" class="col col-20 col-50-m pr-benefits__item">
                        <div class=""
                             style="background-image: url('<?php echo get_field('tag_img', 'post_tag_' . $term->term_id) ?>')">

                            <?php echo $term->name ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <em><?php the_field('disclaimer') ?></em>
    </div>
</section>

<?php endif; ?>