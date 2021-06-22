<?php
////////////////ADMIN DEFAULT CONSTANTS////////////////////////
date_default_timezone_set('UTC');
define("ADMIN_PAGE_WIDTH", 1000);
define("ADMIN_LEFT_WIDTH", "20%");
define("ADMIN_BODY_WIDTH", "80%");
define("ADMIN_TITLE", "Admin Control Panel");
define("PAGE_TITLE", "Nast");
define("SITE_URL","localhost/nast/");

////////////////IMAGE FOLDER LOCATIONS////s////////////////////
define("CMS_FILES_DIR", "files/download/");
define("FILES_DIR", "fung_img/");
define("CMS_IMAGES_DIR", "files/pics/");
define("CMS_LISTINGS_DIR", "files/listings/");
define("CMS_LISTING_FILES_DIR", "files/listingfiles/");
define("CMS_GROUPS_DIR", "files/groups/");
define("CMS_TESTIMONIALS_DIR", "files/testimonials/");
define("CMS_ADDS_DIR", "files/adds/");

define("ADMIN_VIDEO_GALLERY_LIMIT", 6); // VIDEO GALLERY LIMIT FOR ADMIN
define("ADMIN_GALLERY_LIMIT", 12); // IMAGE GALLERY LIMIT FOR ADMIN
define("PAGING_LIMIT", 30); // LISTING TYPE LIMIT FOR CLIENT
define("LISTING_LIMIT", 6); // IMAGE AND VIDEO GALLERY LIMIT FOR CLIENT


define("SLIDER", 295);
define("WELCOME", 71);
define("HOURS",306);	

define("MESSAGE", 70);
//define("VIDEO",161);
define("CONTACT", 7);
define("NEWS",307);
define("SERVICE", 208);
define("SCHEME", 334);


///////////////GENERAL CLIENT SIDE CONSTANTS///////////////////




////////////////LINKS AND PAGE TYPES////////////////////////
$groupTypesArray = array("Header", "Other","Front Images");

$linkTypesArray = array("Normal Group", "Link", "File", "Contents Page", "Gallery", "List", "Video Gallery");

?>