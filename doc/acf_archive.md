# ACF: Archives

$tax = get_queried_object(); 
$tax_title = get_the_archive_title();
$tax_subtitle = get_field('subtitle', $tax);
$tax_description = get_the_archive_description($tax);
$tax_image = get_field('tax_image', $tax);
$tax_icon;

