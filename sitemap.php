<?php

CONST ROUTE_PATH = "/var/www/camrumble/website/src/Dim/CamBundle/Resources/translations/routes.__LANG__.yml";
CONST OUTPUT_FILE = "/var/www/camrumble/website/web/sitemap.xml";
CONST WEBSITE_URL = "http://www.camrumble.org";
CONST TRANSLATIONS = array('fr', 'en', 'es');

$urls = array();
foreach (TRANSLATIONS as $lang) {
	$urls[$lang] = yaml_parse(file_get_contents(str_replace('__LANG__', $lang, ROUTE_PATH)));
}

$data = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$data .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

foreach ($urls as $lang => $routes) {
	
	$data .= "\t<!-- $lang -->\n";
	foreach ($routes as $route => $path) {
		
		$data .= "\t<url>\n";
		$data .= "\t\t<loc>" . WEBSITE_URL . '/' . $lang . $urls[$lang][$route] . "</loc> \n";


		foreach (TRANSLATIONS as $key2 => $noCurrentLang) {
			if($lang != $noCurrentLang) {
				$data .= "\t\t" . '<xhtml:link rel="alternate" hreflang="' . $noCurrentLang . '" href="' . WEBSITE_URL . '/' . $noCurrentLang . $urls[$noCurrentLang][$route] . '" />' . "\n";
			}
		}

		$data .= "\t\t<changefreq>daily</changefreq>\n";
		$data .= "\t</url>\n";
	}
}

$data .= '</urlset>';

file_put_contents(OUTPUT_FILE, $data);

?>
