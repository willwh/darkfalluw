<?php
get_header();
wp_enqueue_script('dfuw_table_sort', get_template_directory_uri().'/js/jquery.tablesorter.min.js',false,$ver,'all');
?>
<div id="content" class="clans">
  <h2>Darkfall: Unholy Wars Clans</h2>
<table id="clans-list" class="tablesorter" width="695" border="0" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <th>Name <i class="icon-chevron-up icon-white"></i></th>
    <th>Leader IGN <i class="icon-chevron-down icon-white"></i></th>
    <th>Leader ForumFall <i class="icon-chevron-up icon-white"></i></th>
    <th class="last">Server <i class="icon-chevron-up icon-white"></i></th>
  </tr>
  </thead>
  <tbody>
  <?php
    $count = 0;
    query_posts($query_string . '&orderby=title&order=ASC');
   while ( have_posts() ) : the_post();
   $count++;
   if($count % 2 != 0){
      $extra_class = '';
    }else{
      $extra_class = 'odd';
    }
   ?>
  <tr class="<?php echo $extra_class; ?>">
    <td class="clan_name"><a href="<?php echo get_post_meta($post->ID, '_clan_url', true) ?>" target="_blank"><?php echo get_the_title();?></a></td>
    <td><?php echo get_post_meta($post->ID, '_clan_leader_ign', true) ?></td>
    <td><?php echo get_post_meta($post->ID, '_clan_leader_forum', true) ?></td>
    <td class="server"><?php echo get_post_meta($post->ID, '_clan_server', true) ?></td>
  </tr>
  <?php endwhile; ?>
  </tbody>
</table>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
