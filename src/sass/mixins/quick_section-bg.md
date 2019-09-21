# Qucik Grab: Section Bacgrounds


## @include section-bg-slash-h;

Drop in as-is - works on the `article section` selector. 

    @include section-bg-slash-h($dk: #000000, $lt: $c__base-dk)

    @include section-bg-slash-h;


## @include section-bg-voals;

Drop in as-is - works on the `article section` selector. 

    @include section-bg-ovals ($bg: #000000, $oval: $c__base-dk, $hlt: $c__base); 

    @include section-bg-ovals;

# @include section-bg-angle;

https://codepen.io/jeremyfrank/pen/avyezR?editors=1100

    @include section-bg-angle($pseudo, $flip: false, $angle: 1.5deg); 

    // Bottom angle up 
    @include section-bg-angle(after);

    // Bottom angle down 
    @include section-bg-angle(after, true);

    // Top angle down
    @include section-bg-angle(before);

    // Top angle up
    @include section-bg-angle(before, true);

    // Both narrow right
    @include section-bg-angle(both);

    // Both narrow left
    @include section-bg-angle(both, true);

