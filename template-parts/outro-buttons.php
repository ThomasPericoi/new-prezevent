<section class="outro">
    <div class="container">
        <h2><?php echo $args['title']; ?></h2>
        <div class="btn-wrapper">
            <?php for ($i = 1; $i < 3; ++$i) :
                $button = $args['button_' . $i];
                if ($button) : ?>
                    <a href="<?php echo $button["content"]["url"]; ?>" target="<?php echo $button["content"]["target"]; ?>" class="btn btn-<?php echo $button["style"]["color"]; ?>"><?php echo $button["content"]["title"]; ?></a>
            <?php endif;
            endfor; ?>
        </div>
    </div>
</section>