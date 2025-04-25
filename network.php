<?php
$staticUrls = [
	//locals
	'local-url' => 'http://localhost/networks/aurrrah/live/static/',
	'local-preview-url' => 'http://localhost/networks/aurrrah/static/',
	//lives
	'live-url' => 'https://aurrrah.com/static/',
	'live-preview-url' => 'https://preview.aurrrah.com/static/',
];

variables([
	'network-static-folder' => NETWORKPATH . '/',
	'network-static' => $static = $staticUrls[variable(SITEURLKEY)],
	'site-static-folder' => NETWORKPATH . '/' . SITENAME . '/',
	'site-static' => $static . SITENAME . '/',
]);

//NOTE: for now, manage sub-theme for entire network here
function site_before_render() {
	if (SITENAME == 'real-estate') {
		$node = variable('node');
		if ($node == 'index') setSubTheme('real-estate');
	}
}

function enrichThemeVars($vars, $what) {
	if ($what == 'footer-widgets') {
		$vars['footer-message'] = '<h2 class="m-0">' . $vars['footer-name'] . '</h2>' . NEWLINE . $vars['footer-message-plain'];
		$vars['footer-logo'] = $vars['footer-logo-plain'];
		return $vars;
	}

	if (SITENAME == 'real-estate' && variable('node') == 'index')
		$vars['optional-slider'] = getSnippet('home-slider');

	return $vars;
}

variables([
	'email' => 'contact+' . SITENAME . '@aurrrah.com',
	'phone' => '91-91766-86867',
	'whatsapp' => '919176686867',

	'dont-show-current-menu' => true,
	'footer-variation' => '-two-headings',
	'link-to-site-home' => true,

	'social' => [
		[ 'type' => 'linkedin', 'url' => 'https://www.linkedin.com/in/raveendar/', 'name' => 'Raveendar' ],
	],
]);

addStyle('network', 'network-static--common-assets');
addStyle(SITENAME, 'network-static--common-assets');
