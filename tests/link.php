<?php
/**
 * @group link
 */
class Tests_Link_Functions extends WP_UnitTestCase {

	function _get_pagenum_link_cb( $url ) {
		return $url . '/WooHoo';
	}

	/**
	 * @ticket 8847
	 */
	function test_get_pagenum_link_case_insensitivity() {
		$old_req_uri = $_SERVER['REQUEST_URI'];

		add_filter( 'home_url', array( $this, '_get_pagenum_link_cb' ) );
		$_SERVER['REQUEST_URI'] = '/woohoo';
		$paged = get_pagenum_link( 2 );
		
		remove_filter( 'home_url', array( $this, '_get_pagenum_link_cb' ) );
		$this->assertEquals( $paged, home_url( '/WooHoo/?paged=2' ) );

		$_SERVER['REQUEST_URI'] = $old_req_uri;
	}
}