<?php

define('THEME_EDITION', 'buddyboss-theme');

add_filter('pre_http_request', function($pre, $parsed_args, $url) {
	if(strpos($url, 'caseproof.com') !== false) {
		$products = [
			['slug' => 'buddyboss-platform-pro', 'status' => 'enabled'],
			['slug' => 'buddyboss-sharing', 'status' => 'enabled'],
			['slug' => 'buddyboss-theme', 'status' => 'enabled']
		];
		return [
			'response' => ['code' => 200],
			'body' => json_encode(['success' => true, 'products' => $products])
		];
	}
	return $pre;
}, 10, 3);

update_option('buddyboss-platform-pro_license_key', 'OYLITE0000000005603B1EBE59708542');
update_option('buddyboss-platform-pro_license_activation_status', true);
update_option('bb-web_license_key', 'OYLITE0000000005603B1EBE59708542');
update_option('bb-web_license_activation_status', true);
update_option('buddyboss-sharing_license_key', 'OYLITE0000000005603B1EBE59708542');
update_option('buddyboss-sharing_license_activation_status', true);
update_option('buddyboss-theme_license_key', 'OYLITE0000000005603B1EBE59708542');
update_option('buddyboss-theme_license_activation_status', true);
function buddyboss_theme_get_theme_sudharo() {
	return false;
}

/**
 * buddyboss-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BuddyBoss_Theme
 */
$init_file = get_template_directory() . '/inc/init.php';

if ( ! file_exists( $init_file ) ) {
	$err_msg = __( 'Could not load the starter file!', 'buddyboss-theme' );
	wp_die( esc_html( $err_msg ) );
}

require_once $init_file;

/**
 * Theme Global Function Caller Helper.
 *
 * @return \BuddyBossTheme\BaseTheme
 */
function buddyboss_theme() {
	return \BuddyBossTheme\BaseTheme::instance();
}

buddyboss_theme(); // Instantiate.


/************* Theme Activation **************/

require_once locate_template( '/inc/theme-activation.php' );

/**
 * Register the required plugins for this theme.
 */

add_action( 'bbta_register', 'buddyboss_theme_register_required_plugins' );

if ( ! function_exists( 'buddyboss_theme_register_required_plugins' ) ) {
	function buddyboss_theme_register_required_plugins() {

		/**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array();

		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       => 'buddyboss-theme',
			// Text domain - likely want to be the same as your theme.
			'default_path' => '',
			// Default absolute path to pre-packaged plugins
			'parent_slug'  => 'themes.php',
			// Default parent URL slug
			'menu'         => 'install-required-plugins',
			// Menu slug
			'has_notices'  => true,
			// Show admin notices or not
			'is_automatic' => false,
			// Automatically activate plugins after installation or not
			'message'      => '',
			// Message to output right before the plugins table
			'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins', 'buddyboss-theme' ),
				'menu_title'                      => __( 'Install Plugins', 'buddyboss-theme' ),
				'installing'                      => __( 'Installing Plugin: %s', 'buddyboss-theme' ),
				// %1$s = plugin name
				'oops'                            => __( 'Something went wrong with the plugin API.', 'buddyboss-theme' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'buddyboss-theme' ),
				// %1$s = plugin name(s)
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'buddyboss-theme' ),
				// %1$s = plugin name(s)
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'buddyboss-theme' ),
				// %1$s = plugin name(s)
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'buddyboss-theme' ),
				// %1$s = plugin name(s)
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'buddyboss-theme' ),
				// %1$s = plugin name(s)
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'buddyboss-theme' ),
				// %1$s = plugin name(s)
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'buddyboss-theme' ),
				// %1$s = plugin name(s)
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'buddyboss-theme' ),
				// %1$s = plugin name(s)
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'buddyboss-theme' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'buddyboss-theme' ),
				'return'                          => __( 'Return to Required Plugins Installer', 'buddyboss-theme' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'buddyboss-theme' ),
				'complete'                        => __( 'All plugins installed and activated successfully. %s', 'buddyboss-theme' ),
				// %1$s = dashboard link
				'nag_type'                        => __( 'updated', 'buddyboss-theme' ),
				// Determines admin notice type - can only be 'updated' or 'error'
			),
		);

		bbta( $plugins, $config );

	}
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Load deprecated functions.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/core/deprecated/deprecated-filters.php';
require_once trailingslashit( get_template_directory() ) . 'inc/core/deprecated/deprecated-hooks.php';
require_once trailingslashit( get_template_directory() ) . 'inc/core/deprecated/deprecated-functions.php';

/**
 * Load BuddyBoss theme blocks.
 *
 * @since 2.0.0
 */
require_once trailingslashit( get_template_directory() ) . 'blocks/blocks.php';
add_action('messages_message_before_save', 'vibex_limit_messages');

function vibex_limit_messages($message) {

    if (!is_user_logged_in()) return;

    $user_id = get_current_user_id();

    $user = wp_get_current_user();
    $roles = (array) $user->roles;

    // Роли без ограничений
    if (in_array('premium', $roles) || in_array('model', $roles)) {
        return;
    }

    // Проверяем количество сообщений за сегодня
    $today = date('Y-m-d');

    global $wpdb;

    $count = $wpdb->get_var($wpdb->prepare("
        SELECT COUNT(*) 
        FROM {$wpdb->prefix}bp_messages_messages 
        WHERE sender_id = %d 
        AND DATE(date_sent) = %s
    ", $user_id, $today));

    if ($count >= 5) {

        // Проверяем баланс
        if (function_exists('mycred_get_users_balance')) {

            $balance = mycred_get_users_balance($user_id);

            if ($balance < 5) {
                wp_die('У вас закончились бесплатные сообщения и недостаточно Джоников.');
            }

            // Списываем 5 Джоников
            mycred_subtract(
                'message_fee',
                $user_id,
                5,
                'Оплата за сообщение после лимита'
            );
        }
    }
}

// === Daily Private Message Limit System ===

add_action('bp_messages_before_send_message', function($message){

    $user_id = get_current_user_id();
    $user = wp_get_current_user();

    // Безлимит для Creator и Premium
    if (in_array('creator', $user->roles) || in_array('premium', $user->roles)) {
        return;
    }

    $today = date('Y-m-d');
    $meta_key = 'daily_message_count_' . $today;
    $count = (int) get_user_meta($user_id, $meta_key, true);

    // 5 бесплатных сообщений
    if ($count < 5) {
        update_user_meta($user_id, $meta_key, $count + 1);
        return;
    }

    // После 5 — списываем 5 Джоников
    if (function_exists('mycred_subtract')) {

        $cost = 30;

        $balance = mycred_get_users_balance($user_id, 'mycred_default');

        if ($balance >= $cost) {

            mycred_subtract(
                'extra_message_charge',
                $user_id,
                $cost,
                'Charge for extra private message',
                0,
                '',
                'mycred_default'
            );

        } else {

            bp_core_add_message('Недостатньо Джоників для відправки повідомлення.', 'error');
            return false;

        }
    }
});

function generate_bunny_signed_url($video_id, $expires = 300) {

    $library_id = 'ТВОЙ_LIBRARY_ID';
    $api_key = 'ТВОЙ_API_KEY';

    $expiration_time = time() + $expires;
    $path = "/embed/$library_id/$video_id";
    
    $signature = hash_hmac('sha256', $path . $expiration_time, $api_key);

    return "https://iframe.mediadelivery.net$path?token=$signature&expires=$expiration_time";
}

function vibex_secure_video_player($video_id, $post_id) {

    $author_id = get_post_field('post_author', $post_id);
    $profile_type = bp_get_member_type($author_id);

    $current_user = wp_get_current_user();

    // Обычный пользователь → бесплатно
    if ($profile_type !== 'creator') {
        return '<iframe src="' . generate_bunny_signed_url($video_id, 600) . '" allowfullscreen></iframe>';
    }

    // Premium → полный доступ
    if (in_array('premium', $current_user->roles)) {
        return '<iframe src="' . generate_bunny_signed_url($video_id, 600) . '" allowfullscreen></iframe>';
    }

    // Creator сам → полный доступ
    if ($current_user->ID == $author_id) {
        return '<iframe src="' . generate_bunny_signed_url($video_id, 600) . '" allowfullscreen></iframe>';
    }

    // Остальным → 30 секунд preview
    $preview_url = generate_bunny_signed_url($video_id, 60);

    return '
    <div class="preview-video">
        <iframe src="' . $preview_url . '" allowfullscreen></iframe>
        <div class="video-paywall">
            <p>Повний доступ — 5 Джонніків</p>
            <button onclick="unlockVideo('.$post_id.')">Розблокувати</button>
        </div>
    </div>';
}

add_action('wp_ajax_unlock_video', 'vibex_unlock_video');

add_action('wp_ajax_unlock_video', 'vibex_unlock_video');

function vibex_unlock_video() {

    $post_id = intval($_POST['post_id']);
    $cost = 30;
    $creator_percent = 70;

    if (!is_user_logged_in()) {
        wp_send_json_error('Not logged in');
    }

    $user_id = get_current_user_id();
    $author_id = get_post_field('post_author', $post_id);

    if (mycred_get_users_balance($user_id) < $cost) {
        wp_send_json_error('Недостатньо Джонніків');
    }

    // Списываем с пользователя
    mycred_subtract(
        'video_unlock_payment',
        $user_id,
        $cost,
        'Unlock creator video',
        $post_id
    );

    // Расчет выплаты
    $creator_amount = ($cost * $creator_percent) / 100;

    // Начисляем Creator
    mycred_add(
        'creator_video_income',
        $author_id,
        $creator_amount,
        'Video unlocked by user',
        $post_id
    );

    wp_send_json_success('Unlocked');
}

add_action('wp_footer', function() {
?>
<script>
function unlockVideo(post_id){
    fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: 'action=unlock_video&post_id=' + post_id
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            location.reload();
        } else {
            alert(data.data);
        }
    });
}
</script>
<?php
});


add_action('woocommerce_order_status_completed', function($order_id){

    $order = wc_get_order($order_id);
    $user_id = $order->get_user_id();

    if(!$user_id) return;

    foreach ($order->get_items() as $item){

        $variation_id = $item->get_variation_id();
        $points = 0;

        // ЗАМЕНИ НА СВОИ ID ВАРИАЦИЙ
        if($variation_id == 232){ $points = 20; }
        if($variation_id == 233){ $points = 50; }
        if($variation_id == 230){ $points = 100; }
        if($variation_id == 231){ $points = 1000; }

        if($points > 0){

            // Начисляем поінти
            mycred_add(
                'buy_points',
                $user_id,
                $points,
                'Purchase points package',
                $order_id
            );

            // Сохраняем уведомление
            update_user_meta($user_id, 'points_notice', $points);
        }

    }

});

add_action('wp_footer', function(){

    if(!is_user_logged_in()) return;

    $user_id = get_current_user_id();
    $points = get_user_meta($user_id, 'points_notice', true);

    if($points){

        delete_user_meta($user_id, 'points_notice');

        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function(){
            alert('Вам нараховано {$points} поінтів');
        });
        </script>
        ";
    }

});
