<?php
function FrontScripts (){
	// wp_register_script( 'ajax-woow', JSURL.'ajax-woow.js', array(), '1.0.3', true );
	// wp_localize_script( 'ajax-woow', 'MyAjax', array( 'url' => admin_url( 'admin-ajax.php' ), 'urlHome' => home_url(), 'urlJs' => JSURL ) );
	wp_enqueue_script('jquery');
	// wp_enqueue_script('ajax-woow');
}
add_action( 'wp_enqueue_scripts', 'FrontScripts' );

function CustomPostEventos(){
    $labels = array(
			'name' => 'Eventos'
		,   'menu_name' => 'Eventos'
	);

	$supports = array(
			'title'
        ,   'editor'
        ,   'thumbnail'
	);

	$args = array(
			'labels' => $labels
		,   'public' => true
		,   'publicly_queryable' => true
		,   'show_ui' => true
		,   'query_var' => true
		,   'show_in_menu' => true
		,   'show_in_admin_bar' => true
		,   'menu_position' => 21
		,   'capability_type' => 'post'
		,   'menu_icon' => 'dashicons-youtube'
		,   'supports' => $supports
		,   'rewrite' => array( 'slug' => 'evento' )
	);
	register_post_type( 'evento', $args );
}
add_action( 'init', 'CustomPostEventos' );

function eventos_add_a_metabox() {
	add_meta_box(
		'eventos_metabox', 
		'Datos del evento', 
		'eventos_display_metabox', 
		'evento',
		'normal', 
		'high' 
	);
}
add_action( 'admin_menu', 'eventos_add_a_metabox' );
/*
|-------------------------------------------------------------------------------
|
|-------------------------------------------------------------------------------
*/
function eventos_display_metabox( $post ) {	
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <style>
        .container_items {
            display: flex;
            flex-wrap: wrap;
        }
        .container_item {
            margin-bottom: 15px;
            margin-right: 8px;
        }
    </style>
    <div class="container_items">
        <div class="container_item">
            <label for="">Subtítulo</label>
            <input type="text" class="form-control" name="subtitle" value="<?php echo get_post_meta( $post->ID, 'subtitle', true); ?>">
        </div>
        <div class="container_item">
            <label for="">Lugar</label>
            <input type="text" class="form-control" name="lugar" value="<?php echo get_post_meta( $post->ID, 'lugar', true); ?>">
        </div>
        <div class="container_item">
            <label for="">ID Youtube</label>
            <input type="text" class="form-control" name="id_youtube" value="<?php echo get_post_meta( $post->ID, 'id_youtube', true); ?>">
        </div>
        <div class="container_item">
            <label for="">Fecha</label>
            <input type="date" class="form-control" name="fecha_completa" value="<?php echo get_post_meta( $post->ID, 'fecha_completa', true); ?>">
        </div>
        <div class="container_item">
            <label for="">Hora inicial</label>
            <input type="time" class="form-control" name="hora_inicial" value="<?php echo get_post_meta( $post->ID, 'hora_inicial', true); ?>">
        </div>
        <div class="container_item">
            <label for="">Hora final</label>
            <input type="time" class="form-control" name="hora_final" value="<?php echo get_post_meta( $post->ID, 'hora_final', true); ?>">
        </div>
    </div>
    <?php
}

function save_post_meta( $post_id, $post ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return; 
	if( !current_user_can( 'edit_post' ) ) return; 
    //Guardar campos para los eventos
    if( $_POST['subtitle'] != '') {
		update_post_meta( $post_id, 'subtitle', $_POST['subtitle']  );  	
    }
    if( $_POST['lugar'] != '') {
		update_post_meta( $post_id, 'lugar', $_POST['lugar']  );  	
    }
    if( $_POST['id_youtube'] != '') {
		update_post_meta( $post_id, 'id_youtube', $_POST['id_youtube']  );  	
    }
    if( $_POST['fecha_completa'] != '') {
		update_post_meta( $post_id, 'fecha_completa', $_POST['fecha_completa']  );  	
    }
    if( $_POST['hora_inicial'] != '') {
		update_post_meta( $post_id, 'hora_inicial', $_POST['hora_inicial']  );  	
    }
    if( $_POST['hora_final'] != '') {
		update_post_meta( $post_id, 'hora_final', $_POST['hora_final']  );  	
    }
    
}
add_action( 'save_post', 'save_post_meta', 10, 2 );
//_______________________________________________________________//
function PostTypeSection ($post_type, $fecha) {
    $post_type_arr = array();
    $args = array(
            'post_type' => $post_type
        ,   'post_status' => 'publish'
        ,   'posts_per_page' => 1
        ,   'meta_query' => array('key' => 'fecha_completa', 'value' => $fecha, 'compare' => 'LIKE')
    );

    $wp_query = new WP_Query( $args );
    while( $wp_query->have_posts() ) : $wp_query->the_post();
        $post_id = get_the_id();
        $imgAttr = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id  ), 'full' );
        $post_type_arr[ $post_id ]['urlImg'] = (!empty($imgAttr[ 0 ])) ? $imgAttr[ 0 ] : '';
        $post_type_arr[ $post_id ]['id'] = $post_id;
        $post_type_arr[ $post_id ]['name'] = get_the_title();
        $post_type_arr[ $post_id ]['descripcion'] = substr(get_the_excerpt(), 0,100).'...';
        $post_type_arr[ $post_id ]['fecha_completa'] = get_post_meta($post_id, "fecha_completa", true);
    endwhile;
    wp_reset_postdata();
    wp_reset_query();
    return $post_type_arr;
}




