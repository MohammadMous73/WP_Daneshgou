<?php
add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add(){
	add_meta_box( 'cd_meta_slide_show', 'تنظیمات اسلاید شو', 'cd_meta_slide_show' , 'post', 'slide_show', 'normal', 'high' );
	add_meta_box( 'cd_meta_portfolios', 'تنظیمات نمونه کار ها', 'cd_meta_portfolios', 'download', 'normal', 'high' );
} 
function cd_meta_portfolios( $post ) {
	$values = get_post_custom( $post->ID );
	$text_download_help = isset( $values['download_help'] ) ? esc_attr( $values['download_help'][0] ) : '';
	$text_download = isset( $values['download'] ) ? esc_attr( $values['download'][0] ) : '';
	$text_Source = isset( $values['Source'] ) ? esc_attr( $values['Source'][0] ) : '';
	$text_Size = isset( $values['Size'] ) ? esc_attr( $values['Size'][0] ) : '';
	$text_type = isset( $values['type'] ) ? esc_attr( $values['type'][0] ) : '';
	
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<div style="margin-bottom:8px;">
		<span style="width:20%;margin-left:-4px;display: inline-block;"><label for="download_help">دانلود با لینک کمکی</label></span>
		<span style="width:80%;margin-right:-4px;display: inline-block;">
			<input type="text" name="download_help" id="download_help" value="<?php echo $text_download_help; ?>" style="width:100%;" />
		</span>
	</div>
	<div style="margin-bottom:8px;">
		<span style="width:20%;margin-left:-4px;display: inline-block;"><label for="download">دانلود با لینک مستقیم</label></span>
		<span style="width:80%;margin-right:-4px;display: inline-block;">
			<input type="text" name="download" id="download" value="<?php echo $text_download; ?>" style="width:100%;" />
		</span>
	</div>
	<div style="margin-bottom:8px;">
		<span style="width:20%;margin-left:-4px;display: inline-block;"><label for="Source">منبـــــع</label></span>
		<span style="width:80%;margin-right:-4px;display: inline-block;">
			<input type="text" name="Source" id="Source" value="<?php echo $text_Source; ?>" style="width:100%;" />
		</span>
	</div>
	<div style="margin-bottom:8px;">
		<span style="width:20%;margin-left:-4px;display: inline-block;"><label for="Size">حجم فایل</label></span>
		<span style="width:80%;margin-right:-4px;display: inline-block;">
			<input type="text" name="Size" id="Size" value="<?php echo $text_Size; ?>" style="width:100%;" />
		</span>
	</div>
	<div style="margin-bottom:8px;">
		<span style="width:20%;margin-left:-4px;display: inline-block;"><label for="type"> نوع فـایـل</label></span>
		<span style="width:80%;margin-right:-4px;display: inline-block;">
			<input type="text" name="type" id="type" value="<?php echo $text_type; ?>" style="width:100%;" />
		</span>
	</div>
	
<?php } 
function cd_meta_slide_show( $post ) {
	$values = get_post_custom( $post->ID );
	$text_slide_show_img = isset( $values['slide_show_img'] ) ? esc_attr( $values['slide_show_img'][0] ) : '';
	$text_slide_show_info = isset( $values['slide_show_info'] ) ? esc_attr( $values['slide_show_info'][0] ) : '';
	$text_slide_show_matn = isset( $values['slide_show_matn'] ) ? esc_attr( $values['slide_show_matn'][0] ) : '';
	$check_slide_show_check = isset( $values['slide_show_check'] ) ? esc_attr( $values['slide_show_check'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<style type="text/css">
		#postdivrich {display: none !important;}
		.box {display: none;}
	</style>
	<script>
	jQuery(document).ready( function( $ ) {
		$('#upload_image_button').click(function() {
			formfield = $('#slide_show_img').attr('name');
			tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
			return false;
		});
		window.send_to_editor = function(html) {
			imgurl = $('img',html).attr('src');
			$('#slide_show_img').val(imgurl);
			tb_remove();
		}
	});
    $(document).ready(function(){
        $("#slide_show_check").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else{
                    $(".box").hide();
                }
            });
        }).change();
    });
    </script>
	<div style="margin-bottom:8px;">
		<span style="width:20%;margin-left:-4px;display: inline-block;"><label for="slide_show_check">اسلایدشو نمایش داده شود ؟</label></span>
		<span style="width:80%;margin-right:-4px;display: inline-block;"><select name="slide_show_check" id="slide_show_check">
			<option value="off" <?php selected( $check_slide_show_check, 'off' ); ?>>خیر</option>
			<option value="on" <?php selected( $check_slide_show_check, 'on' ); ?>>بله</option>
		</select></span>
	</div>
	<div class="on box">
		<div style="margin-bottom:8px;border-top:1px solid #ccc;padding-top: 10px;">
			<span style="width:20%;margin-left:-4px;display: inline-block;"><label for="slide_show_img">آدرس تصویر اسلایدشو</label></span>
			<span style="width:80%;margin-right:-4px;display: inline-block;">
				<span style="float:left"><input id="upload_image_button" type="button" value="آپلود تصویر" /></span>
				<input type="text" name="slide_show_img" id="slide_show_img" value="<?php echo $text_slide_show_img; ?>" style="width:100%;direction:ltr;" />
			</span>
		</div>
		<div style="margin-bottom:8px;">
			<span style="width:20%;margin-left:-4px;display: inline-block;"><label for="slide_show_info">توضیح مختصر</label></span>
			<span style="width:80%;margin-right:-4px;display: inline-block;">
				<input type="text" name="slide_show_info" id="slide_show_info" value="<?php echo $text_slide_show_info; ?>" style="width:100%;" />
			</span>
		</div>
		<div style="margin-bottom:8px;">
			<span style="width:20%;margin-left:-4px;display: inline-block;"><label for="slide_show_matn">توضیح کامل</label></span>
			<span style="width:80%;margin-right:-4px;display: inline-block;">
				<textarea name="slide_show_matn" id="slide_show_matn" style="width:100%;" /><?php echo $text_slide_show_matn; ?></textarea>
			</span>
		</div>
	</div>
<?php } 
add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id ) {
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	if( !current_user_can( 'edit_post' ) ) return;
	$allowed = array( 
		'a' => array( 
		'href' => array()
		)
	);
	if( isset( $_POST['slide_show_img'] ) ) update_post_meta( $post_id, 'slide_show_img', wp_kses( $_POST['slide_show_img'], $allowed ) );
	if( isset( $_POST['download_help'] ) ) update_post_meta( $post_id, 'download_help', wp_kses( $_POST['download_help'], $allowed ) );
	if( isset( $_POST['download'] ) ) update_post_meta( $post_id, 'download', wp_kses( $_POST['download'], $allowed ) );
	if( isset( $_POST['Source'] ) ) update_post_meta( $post_id, 'Source', wp_kses( $_POST['Source'], $allowed ) );
	if( isset( $_POST['Size'] ) ) update_post_meta( $post_id, 'Size', wp_kses( $_POST['Size'], $allowed ) );
	if( isset( $_POST['type'] ) ) update_post_meta( $post_id, 'type', wp_kses( $_POST['type'], $allowed ) );
	if( isset( $_POST['berand'] ) ) update_post_meta( $post_id, 'berand', wp_kses( $_POST['berand'], $allowed ) );
	if( isset( $_POST['tedad'] ) ) update_post_meta( $post_id, 'tedad', wp_kses( $_POST['tedad'], $allowed ) );
	if( isset( $_POST['tavaghof'] ) ) update_post_meta( $post_id, 'tavaghof', wp_kses( $_POST['tavaghof'], $allowed ) );
	if( isset( $_POST['sorat'] ) ) update_post_meta( $post_id, 'sorat', wp_kses( $_POST['sorat'], $allowed ) );
	if( isset( $_POST['slide_show_matn'] ) ) update_post_meta( $post_id, 'slide_show_matn', wp_kses( $_POST['slide_show_matn'], $allowed ) );
	if( isset( $_POST['slide_show_info'] ) ) update_post_meta( $post_id, 'slide_show_info', wp_kses( $_POST['slide_show_info'], $allowed ) );
	if( isset( $_POST['slide_show_check'] ) ) update_post_meta( $post_id, 'slide_show_check', esc_attr( $_POST['slide_show_check'] ) );
} ?>