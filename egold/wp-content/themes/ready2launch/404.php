<?php  
global $options;
foreach ($options as $value) {
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } }

get_header();
?>
<script type="text/javascript">
<!--
window.location = "<?php  echo get_option('home') ?>/"
//-->
</script>
  <div id="rocket">
    <div id="block" style="">
      <div id="block-text"><h1><?php  bloginfo('name'); ?> - Error 404</h1>
        <p>
          <span class="alt-heading">Page you've requested wasn't found.</span>
        </p>
        <p>
          <span class="text">

You'll be redirected to main page soon! If not, use this link <a href="<?php  echo get_option('home') ?>/" title="<?php  bloginfo('name') ?>" rel="home"><?php  bloginfo('name') ?></a>
          </span>
        </p>
       
      </div>
    </div>
    </div>

<?php  get_footer(); ?>

