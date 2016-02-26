<?php

class Yoast_GA_Incompatible_Version_Notifier implements Yoast_Notifier_Interface {

	/**
	 * Check if the cause for the notification is present
	 *
	 * @return bool True if notification is no longer relevant, False if it is still active.
	 */
	public function notify() {
		return ( class_exists( 'Yoast_Api_Google_Client' ) === false );
	}

	/**
	 * Create the notification
	 *
	 * @return Yoast_Notification
	 */
	public function get_notification() {
		/* translators: %1$s expands to Yoast SEO, %2$s expands to Google Analytics by Yoast */
		$notice = sprintf(
			__(
				'%1$s detected you’re using a version of %2$s which is not compatible with %1$s. Please update %2$s to the latest version to use this feature.',
				'wordpress-seo'
			),
			'Yoast SEO',
			'Google Analytics by Yoast'
		);

		return new Yoast_Notification( $notice, array( 'type' => 'error', 'id' => 'wpseo-ga-incompatible-version' ) );
	}
}