 <?php
/**
 * part-filters.php
 * FacetWP Filters
 * 
 * @package knotty
 * @since Knotty 1.0
 */
?>   

<div class="header__filters">

    <div class="facet">
        <label>Categories</label>
        <?php echo facetwp_display( 'facet', 'categories' ); ?>
    </div>

    <div class="facet">
        <label>Tags</label>
        <?php echo facetwp_display( 'facet', 'tags' ); ?>
    </div>

    <a href="#" onclick="FWP.reset()" class="meta" aria-label="Clear All Filters" title="Clear Filters">Clear Filters</a>

</div>