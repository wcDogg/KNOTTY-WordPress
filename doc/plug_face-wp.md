# Facet WP

Notes about how ACF + Facet WP are implemented in this theme - because it was a pain to get working. 

Facets are used in 2 ways:

- In `archive.php` as part of standard loop.
- In `front-page.php` in a custom `WP_QUERY`.

## Things to make it work

Install Facet WP Load More plugin 

- Without this, the default WP archive nav is a fail.
- Without this, multiple filter selectsions fail. 
- https://facetwp.com/add-ons/load-more/

Manually add `facetwp-template` to the `div` surrounding the loop and Load More button`.

- https://facetwp.com/debugging-css-based-templates/

- `WP_QUERY` does not need `facetwp_is_main_query` hook as advised here:
- https://facetwp.com/documentation/templates/wp-query/



