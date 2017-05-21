<?php 

	/**
	 * @package     WordPress Plugin
	 * @subpackage  WP Missed Schedule
	 * @description Uninstall Module
	 * @development Code in Becoming!
	 * @license     GPLv3 or later
	 *
	 * @gnu         www.gnu.org/licenses/gpl-3.0.html
	 * @humans      humanstxt.org/Standard.html
	 * @indentation www.gnu.org/prep/standards/standards.html
	 *
	 * @github      github.com/sLaNGjI/wp-missed-schedule
	 * @project     slangjis.org/plugins/wp-missed-schedule
	 *
	 * @author      sLaNGjIs Team
	 * @website     slangjis.org
	 * @contact     slangjis.org/contact
	 * @donate      slangjis.org/donate
	 * @support     slangjis.org/support
	 * @translation slangjis.org/translations
	 * @blog        slangji.wordpress.com
	 *
	 * @build       2017-05-21
	 * @version     2014.1231.2017.4
	 * @requires    WordPress 2.7+
	 * @since       WordPress 2.7+
	 * @tested      WordPress 3.7+
	 * @updated     WordPress 4.7+
	 * @compatible  WordPress 4.8-beta
	 */

	defined ( 'WP_UNINSTALL_PLUGIN' ) OR exit;

	$option_names = array( 
			'byrev_fixshedule_next_verify',
			'scheduled_post_guardian_next_run',
			'simpul_missed_schedule',
			'wpt_scheduled_check',
			'missed_schedule',
			'missed_scheduled',
			'schedule_missed',
			'scheduled_missed',
			'missed_schedule_cron',
			'missed_scheduled_cron',
			'schedule_missed_cron',
			'scheduled_missed_cron',
			'missed_schedule_options',
			'missed_scheduled_options',
			'schedule_missed_options',
			'scheduled_missed_options',
			'missed_schedule_cron_options',
			'missed_scheduled_cron_options',
			'schedule_missed_cron_options',
			'scheduled_missed_cron_options',
			'wp_missed_schedule',
			'wp_missed_scheduled',
			'wp_schedule_missed',
			//'wp_scheduled_missed',
			'wp_missed_schedule_cron',
			'wp_missed_scheduled_cron',
			'wp_schedule_missed_cron',
			'wp_scheduled_missed_cron',
			'wp_missed_schedule_options',
			'wp_missed_scheduled_options',
			'wp_schedule_missed_options',
			'wp_scheduled_missed_options',
			'wp_missed_schedule_cron_options',
			'wp_missed_scheduled_cron_options',
			'wp_schedule_missed_cron_options',
			'wp_scheduled_missed_cron_options',
	);

	global $wp_version;

	if ( $wp_version >= 3.0 )
		{
			if ( ! is_multisite() )
				{
					foreach ( $option_names as $option_name )
						{
							delete_option( $option_name );
						}
				}

			if ( is_multisite() )
				{
					foreach ( $option_names as $option_name )
						{
							delete_option( $option_name );
						}

					global $wpdb;

					$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
					$original_blog_id = get_current_blog_id();

					foreach ( $blog_ids as $blog_id )
						{
							switch_to_blog( $blog_id );

							foreach ( $option_names as $option_name )
								{
									delete_site_option( $option_name );
								}
						}
					switch_to_blog( $original_blog_id );
				}
		}
?>