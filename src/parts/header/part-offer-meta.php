<?php
/**
 * part-offer-meta.php
 * 
 * @package knotty
 * @since Knotty 1.0
 */

$offer_site = get_field('offer_site_name');
$offer_dates = get_field('offer_has_dates');
$offer_start = get_field('offer_start');
$offer_end = get_field('offer_end');
$offer_dates_none = 'No Expiration Date'; 

?>

<div class="header__meta-wrap">

<?php 
    if ( has_term( '', 'brands' ) ) :
        echo '<div class="meta meta--brands">';
            echo '<span class="meta__value">'; 
                the_terms( get_the_ID(), 'brands', '', ', ' );
            echo '</span>';
        echo '</div>';	 

    elseif ($offer_site) :

        echo '<div class="meta meta--website"><span class="meta__value"'.$offer_site.'</span></div>';

    endif; 

    if($offer_dates) :
        echo '<div class="meta meta--date"><span class="meta__value">'.$offer_start.' &#9472; '.$offer_end.'</span></div>';    
    else : 
        echo '<div class="meta meta--date"><span class="meta__value">'.$offer_dates_none.'</span></div>'; 
    endif;   
?>    

</div><!-- .header__meta-wrap -->
