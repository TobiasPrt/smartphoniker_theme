<?php
/**
 * Filter: Mod-Rewrite-Rules
 * 
 * Here code can be added to the .htaccess file
 * 
 * @package Smartphoniker
 * @since 1.0.0
 */
add_filter('mod_rewrite_rules', 'smartphoniker_add_custom_htaccess_content');


/**
 * Adds custom htaccess content
 *
 * @param string $rules current htaccess rules
 *
 * @return string new htaccess rules
 * 
 * @since 1.0.0
 */
function smartphoniker_add_custom_htaccess_content( string $rules ) : string {
    $hide_author_page = <<<EOD
        \n\n
        # BEGIN My Added Content
        # Hide author page
        RewriteCond %{REQUEST_URI} !^/wp-admin [NC]
        RewriteCond %{QUERY_STRING} author=\d
        RewriteRule ^.*$ - [R=404,L]

        # redirect old urls
        Redirect 301 /reparatur/sony/ https://smartphoniker.de/service/reparatur
        Redirect 301 /service-techniker-m-w-d/ https://smartphoniker.de/job/service-techniker/
        Redirect 301 /standorte/zentrale/hygienehinweis_2020_krr/ https://smartphoniker.de/standorte/
        Redirect 301 /team/unser-team/ https://smartphoniker.de/uber-uns/
        Redirect 301 /standorte/media-markt-schwentinental/ https://smartphoniker.de/store/schwentinental/
        Redirect 301 /category/blog https://smartphoniker.de/
        Redirect 301 /reparatur/samsung-reparatur/page/2/ https://smartphoniker.de/service/reparatur
        Redirect 301 /standorte/media-markt-rendsburg/ https://smartphoniker.de/standorte/
        Redirect 301 /faq/ https://smartphoniker.de/kontakt
        Redirect 301 /team/ https://smartphoniker.de/uber-uns/
        Redirect 301 /reparatur.html https://smartphoniker.de/service/reparatur
        Redirect 301 /agb/ https://smartphoniker.de/allgemeine-geschaftsbedingungen/
        Redirect 301 /ufaq-category/filialen-services/ https://smartphoniker.de/services/
        Redirect 301 /presse/ https://smartphoniker.de/kontakt
        Redirect 301 /reparatur/iphone-reparatur/page/3/ https://smartphoniker.de/service/reparatur
        Redirect 301 /service-points.html https://smartphoniker.de/standorte/
        Redirect 301 /reparatur/samsung-reparatur/ https://smartphoniker.de/service/reparatur
        Redirect 301 /lebenslange-garantie/ https://smartphoniker.de/services/
        Redirect 301 /standorte/bootshafen-kiel-oeffnet-demnaechst/ https://smartphoniker.de/store/kiel-bootshafen/
        Redirect 301 /wp-content/uploads/2020/12/logo-kurz.jpg https://smartphoniker.de/wp-content/themes/smartphoniker_theme/assets/images/logo/logo_blackorange.svg
        Redirect 301 /ufaqs/ist-mein-handy-danach-noch-immer-wassergeschuetzt/ https://smartphoniker.de/service/reparatur
        Redirect 301 /wp-content/uploads/2020/05/sig_biogreno_rgb-300x109.png https://smartphoniker.de/wp-content/uploads/2021/03/biogreno.png
        Redirect 301 /club/ https://smartphoniker.de
        Redirect 301 /reparatur/lg-reparatur/ https://smartphoniker.de/service/reparatur
        Redirect 301 /wp-content/uploads/2019/01/wertgarantie_partner-300x300.jpg https://smartphoniker.de/wp-content/uploads/2021/04/wert-300x150.png
        Redirect 301 /standorte/media-markt-citti-park-luebeck/ https://smartphoniker.de/store/lubeck/
        Redirect 301 /reparatur/iphone-reparatur/page/4/ https://smartphoniker.de/service/reparatur
        Redirect 301 /category/blog/ https://smartphoniker.de
        Redirect 301 /faq/?include_category=reparatur https://smartphoniker.de/service/reparatur
        Redirect 301 /reparatur/iphone-reparatur/ https://smartphoniker.de/service/reparatur
        Redirect 301 /ufaqs/ich-weiss-nicht-was-genau-defekt-kaputt-ist-was-nun/ https://smartphoniker.de/service/reparatur
        Redirect 301 /wp-content/uploads/2021/01/whatsapp_icon.png https://smartphoniker.de/wp-content/themes/smartphoniker_theme/assets/images/icons/whatsapp_button_orange.svg
        Redirect 301 /produkt/handy-3/ https://smartphoniker.de/service/an-verkauf/
        Redirect 301 /team/finn_vollstedt/ https://smartphoniker.de/uber-uns/
        Redirect 301 /produkt-kategorie/unkategorisiert/ https://smartphoniker.de/services
        Redirect 301 /produkt/handy-3-kopie/ https://smartphoniker.de/service/an-verkauf/
        Redirect 301 /ufaqs/ich-habe-meinen-pin-code-verloren-was-mache-ich-nun/ https://smartphoniker.de/service/datenrettung/
        Redirect 301 /wp-content/uploads/2018/01/smartphoniker_logo_bgless.png https://smartphoniker.de/wp-content/themes/smartphoniker_theme/assets/images/logo/logo_blackorange.svg
        Redirect 301 /standorte/christian-albrechts-universitaet-kiel/ https://smartphoniker.de/store/kiel-cau/
        Redirect 301 /ufaqs/gibt-es-ein-widerrufsrecht/ https://smartphoniker.de/allgemeine-geschaftsbedingungen/
        Redirect 301 /standorte/zentrale-2/ https://smartphoniker.de/store/schwentinental/
        Redirect 301 /schulung.html https://smartphoniker.de/service/schulungen/
        Redirect 301 /reparatur/iphone-reparatur/page/21/ https://smartphoniker.de/service/reparatur
        Redirect 301 /reparatur/huawei-reparatur/ https://smartphoniker.de/service/reparatur
        Redirect 301 /jobs https://smartphoniker.de/karriere/
        Redirect 301 /2019/01/28/sicherheit-am-arbeitsplatz/ https://smartphoniker.de/service/reparaturen/
        Redirect 301 /kva/ https://smartphoniker.de/service/reparaturen/
        Redirect 301 /geschaeftskunde-werden/ https://smartphoniker.de/service/b2b/
        Redirect 301 /standorte/media-markt-citti-park-kiel/ https://smartphoniker.de/store/kiel-bootshafen/
        Redirect 301 /wp-content/uploads/2018/01/favicon.png https://smartphoniker.de/wp-content/themes/smartphoniker_theme/assets/images/logo/logo_blackorange.svg
        Redirect 301 /ufaqs/welche-hersteller-repariert-ihr/ https://smartphoniker.de/service/reparatur
        Redirect 301 /studentische-aushilfe-m-w-d/ https://smartphoniker.de/job/studentische-aushilfe/
        Redirect 301 /reparatur/andere-modelle/ https://smartphoniker.de/service/reparatur
        Redirect 301 /team/festes-seitenverhaeltnis/ https://smartphoniker.de/ueber-uns
        Redirect 301 /ufaqs/woher-weiss-ich-ob-ihr-mein-paket-erhalten-habt/ https://smartphoniker.de/kontakt
        Redirect 301 /ufaqs/wie-lange-habe-ich-zeit-zum-bezahlen/ https://smartphoniker.de/kontakt
        Redirect 301 /ufaqs/was-ist-wenn-ich-nach-der-reparatur-immer-noch-probleme-habe/ https://smartphoniker.de/kontakt
        Redirect 301 /wp-content/uploads/2018/02/finn_vollstedt.jpg https://smartphoniker.de/wp-content/uploads/2021/03/finn.jpg
        Redirect 301 /wp-content/uploads/2020/07/vater-300x155.jpg https://smartphoniker.de/wp-content/uploads/2021/03/vater.svg
        Redirect 301 /wp-content/themes/Divi/images/logo.png https://smartphoniker.de/wp-content/themes/smartphoniker_theme/assets/images/logo/logo_blackorange.svg
        Redirect 301 /kostenvoranschlag/ https://smartphoniker.de/service/reparatur
        Redirect 301 /wp-content/uploads/2020/05/ihredrogerie-300x110.jpg https://smartphoniker.de/wp-content/uploads/2021/03/ihredrogerie.jpg
        Redirect 301 /agb.html https://smartphoniker.de/allgemeine-geschaftsbedingungen/
        Redirect 301 /ufaqs/kann-ich-meine-bestellung-stornieren/ https://smartphoniker.de/kontakt
        Redirect 301 /copyright-smartphoniker/ https://smartphoniker.de
        Redirect 301 /impressum.html https://smartphoniker.de/impressum/
        Redirect 301 /standorte/media-markt-itzehoe/ https://smartphoniker.de/standorte/
        Redirect 301 /ufaqs/warum-kann-ich-nicht-im-voraus-bezahlen/ https://smartphoniker.de/kontakt
        Redirect 301 /wp-content/uploads/2020/05/logo_coop-eg_cmyk-300x115.png https://smartphoniker.de/wp-content/uploads/2021/03/coop.png
        Redirect 301 /ufaqs/ist-immer-alles-auf-lager/ https://smartphoniker.de/kontakt
        Redirect 301 /ufaqs/wie-kann-ich-den-status-meiner-reparatur-verfolgen/ https://smartphoniker.de/kontakt
        # END My Added Content\n
        EOD;    
    $position = strpos( $rules, 'RewriteEngine On') + 16;
    $new_rules = substr_replace( $rules, $hide_author_page, $position, 0);
    
    return $new_rules;
}
