<?php

/**
 * @group formatting
 */
class Tests_Formatting_Slashit extends WP_UnitTestCase {
	function test_backslashes_alphas() {
		$this->assertEquals("\\a943\\b\\c", backslashit("a943bc"));
	}

	function test_double_backslashes_leading_numbers() {
		$this->assertEquals("\\\\95", backslashit("95"));
	}

	function test_removes_trailing_slashes() {
		$this->assertEquals("a", untrailingslashit("a/"));
		$this->assertEquals("a", untrailingslashit("a////"));
	}

	function test_adds_trailing_slash() {
		$this->assertEquals("a/", trailingslashit("a"));
	}

	function test_does_not_add_trailing_slash_if_one_exists() {
		$this->assertEquals("a/", trailingslashit("a/"));
	}
}
