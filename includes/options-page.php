<?php 
function sfpo_register_settings() {
   add_option( 'sfpo_settings', 'SFPO');
   $args = array(
            'type' => 'string', 
            'sanitize_callback' => 'sanitize_text_field',
            'default' => NULL,
            );
    register_setting( 'sfpo_options_group', 'my_option_name', $args );
}
add_action( 'admin_init', 'sfpo_register_settings' );

if(is_admin()){
	function sfpo_register_options_page() {
	  add_options_page('Sections for prices options', 'Sections for prices options', 'manage_options', 'sfpo', 'sfpo_options_page');
	}
	add_action('admin_menu', 'sfpo_register_options_page'); 

	function sfpo_options_page(){
		sfpo_styles();
		sfpo_admin_styles();
		?>
		  <div class="sfpo-all-content">
		  <h1 class="sfpo-admin-title ">Section for prices options "SFPO"</h1>
		  <form method="post" action="options.php">
		  <?php settings_fields( 'sfpo_options_group' ); ?>
		  <?php do_settings_sections( 'sfpo_option-group' ); ?>
		  <br>
		  <table class="sfpo-table">
		  	<thead>
			  <tr>
			    <th class="sfpo-w-25"></th>
			    <th><input type="text" id="1st" placeholder="Eco" name="myplugin_option_name" value="<?php echo get_option('myplugin_option_name'); ?>" /></th	>
			    <th><input type="text" id="2nd" placeholder="Normal" name="myplugin_option_name" value="<?php echo get_option('myplugin_option_name'); ?>" /></th>
			    <th><input type="text" id="3rd" placeholder="Premium" value="<?php echo get_option('my_option_name'); ?>" /></th>
			  </tr>
			</thead>
			<tbody>
			  <?php for ($i=0; $i < 3; $i++) { 
			  	?>
				  <tr>
				  	<th><input type="text" placeholder="Descripción" name="<?php echo('description'.$i) ?>"></th>
				  	<td><input type="text" placeholder="valor*" name="<?php echo('value_st'.$i) ?>"></td>
				  	<td><input type="text" placeholder="valor*" name="<?php echo('value_nd'.$i) ?>"></td>
				  	<td><input type="text" placeholder="valor*" name="<?php echo('value_rd'.$i) ?>"></td>
				  </tr>
			  	<?php
			  } 
			  ?>
			</tbody>
		  </table>
		  <br>
		  <p class="sfpo-text-center">*Las celdas <b>valor</b> se pueden rellenar con "si" para un ✔️ y "no" para un ❌. También pueden incluir texto texto</p>
		  <br>
		  <button class="button button-red sfpo-w-50">Remover fila anterior</button><button class="button button-green sfpo-w-50">Nueva fila</button>
		  <?php  submit_button('', 'sfpo-w-100 button button-primary'); ?>
		  </form>
		  </div>
		<?php
	}
}
?>