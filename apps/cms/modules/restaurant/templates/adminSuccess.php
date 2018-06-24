<div id="sf_admin_container">
    <h1><?php echo __('Admin settings for restaurant %x%', array('%x%' => $Restaurant)) ?></h1>

    <?php include_partial('global/flashes') ?>


    <div id="sf_admin_content">
        <div class="sf_admin_form">

            <form method="post" action="">
                <?php echo $form; ?>


                <div>
                    <input type="submit" value="<?php echo __('Save'); ?>" class="btn btn-primary" />
                    <a class="btn btn-default" href="<?php echo url_for('restaurant/index'); ?>"><?php echo __('Back'); ?></a>
                </div>
            </form>

        </div>
    </div>
</div>