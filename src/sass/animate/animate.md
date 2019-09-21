# Quick-Grab: Animate.scss

## The Files

`_animate.scss` - Start here by setting the `globals`. This controls which `@keyframes` are printed and which `@extend`s are available. 

`_animate-mix.scss` - The big mamma `@mixin` that uses a combination of `$glbobals` and `@if` statements to print the selected `@keyframes`. 

`_animate-write.scss` - Where the big mamma `@mixin` is called. This needs to happen once per theme. 

`_import.scss` - Pulls all files together in the correct order. `@import` this into your Sass flow. 


## @include

    @include animated($duration, $delay);
    @include animated-infinite; 

## @extend

    @extend %bounce;
    @extend %bounceIn;
    @extend %bounceInDown;
    @extend %bounceInLeft;
    @extend %bounceInRight;
    @extend %bounceInUp;

    @extend %bounceOut;
    @extend %bounceOutDown;
    @extend %bounceOutLeft;
    @extend %bounceOutRight;
    @extend %bounceOutUp;

    @extend %fadeIn;
    @extend %fadeInDown;
    @extend %fadeInDownBig;
    @extend %fadeInLeft;
    @extend %fadeInLeftBig;
    @extend %fadeInRight;
    @extend %fadeInRightBig;
    @extend %fadeInUp;
    @extend %fadeInUpBig;

    @extend %fadeOut;
    @extend %fadeOutDown;
    @extend %fadeOutDownBig;
    @extend %fadeOutLeft;
    @extend %fadeOutLeftBig;
    @extend %fadeOutRight;
    @extend %fadeOutRightBig;
    @extend %fadeOutUp;
    @extend %fadeOutUpBig;

    @extend %flash;

    @extend %flip;
    @extend %flipInX;
    @extend %flipInY;
    @extend %flipOutX;
    @extend %flipOutY;

    @extend %headShake;
    @extend %heartBeat;
    @extend %hinge;
    @extend %jackInTheBox;
    @extend %jello;

    @extend %lightSpeedIn;
    @extend %lightSpeedOut;

    @extend %pulse;

    @extend %rollIn;
    @extend %rollOut;

    @extend %rotateIn;
    @extend %rotateInDownLeft;
    @extend %rotateInDownRight;
    @extend %rotateInUpLeft;
    @extend %rotateInUpRight;

    @extend %rotateOut;
    @extend %rotateOutDownLeft;
    @extend %rotateOutDownRight;
    @extend %rotateOutUpLeft;
    @extend %rotateOutUpRight;

    @extend %rubberBand;

    @extend %scaleInDown;
    @extend %scaleOutUp;  

    @extend %shake;

    @extend %slideInDown;
    @extend %slideInLeft;
    @extend %slideInRight;
    @extend %slideInUp;

    @extend %slideOutDown;
    @extend %slideOutLeft;
    @extend %slideOutRight;
    @extend %slideOutUp;

    @extend %swing;
    @extend %tada;
    @extend %wobble;

    @extend %zoomIn;
    @extend %zoomInDown;
    @extend %zoomInLeft;
    @extend %zoomInRight;
    @extend %zoomInUp;

    @extend %zoomOut;
    @extend %zoomOutDown;
    @extend %zoomOutLeft;
    @extend %zoomOutRight;
    @extend %zoomOutUp;

