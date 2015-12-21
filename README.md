Symfony-jms-sitemap-generator
===================


PHP script to generate your sitemap using your routes files.
This script small script only work with YAML.

Very usefull if you use the *JMSI18nRoutingBundle* and *JMSTranslationBundle* Symfony2 bundle.

To use it, you just have to customize the lines below:

    CONST ROUTE_PATH = "/var/www/website/src/Dim/YourBundle/Resources/translations/routes.__LANG__.yml";
    CONST OUTPUT_FILE = "/var/www/website/web/sitemap.xml";
    CONST WEBSITE_URL = "http://www.website.org";
    CONST TRANSLATIONS = array('fr', 'en', 'es');