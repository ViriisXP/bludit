<?php defined('BLUDIT') or die('Bludit CMS.');

// ============================================================================
// Variables
// ============================================================================

// ============================================================================
// Functions
// ============================================================================

// ============================================================================
// Main before POST
// ============================================================================

// ============================================================================
// POST Method
// ============================================================================

if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	$token = isset($_POST['tokenCSRF']) ? Sanitize::html($_POST['tokenCSRF']) : false;

	if( !$Security->validateTokenCSRF($token) )
	{
		Log::set(__FILE__.LOG_SEP.'Error occurred when trying to validate the tokenCSRF. Token CSRF ID: '.$token);

		// Destroy the session.
		Session::destroy();

		// Redirect to login panel.
		Redirect::page('admin', 'login');
	}
	else
	{
		unset($_POST['tokenCSRF']);
	}
}

// ============================================================================
// Main after POST
// ============================================================================