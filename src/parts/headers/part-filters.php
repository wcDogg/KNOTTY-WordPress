<?php

echo '<div class="section__filters">';

    echo '<div class="facet"><label>Categories</label>' .facetwp_display( 'facet', 'categories' ). '</div>';
    echo '<div class="facet"><label>Tags</label>' .facetwp_display( 'facet', 'tags' ). '</div>';

    echo '<a href="#" onclick="FWP.reset()" class="meta" aria-label="Clear All Filters" title="Clear Filters">Clear Filters</a>';

echo '</div>';
