# Quick-Grab: ::after background-color transtions

Transition the background color of an element using the `::after` pseudo element. Great for buttons, icon links, and actionable blocks. 

https://codepen.io/ljburton/pen/LYPWGOp?editors=0100

# @extend

    // turn on 
    @extend %after-bg;

    // peek-from
    @extend %after-peek-l;
    @extend %after-peek-t;
    @extend %after-peek-r;
    @extend %after-peek-b;

    // swipe-from-to
    @extend %after-swipe-l-r;
    @extend %after-swipe-r-l;
    @extend %after-swipe-t-b;
    @extend %after-swipe-b-t;

    // wink-in
    @extend %after-wink-in-c;
    @extend %after-wink-in-x;
    @extend %after-wink-in-y;

    // wink-out
    @extend %after-wink-out-c;
    @extend %after-wink-out-x;
    @extend %after-wink-out-y;

    // corner-in
    @extend %after-corner-in-lt;
    @extend %after-corner-in-lb;
    @extend %after-corner-in-rt;
    @extend %after-corner-in-rb;

    // corner-out
    @extend %after-corner-out-lt;
    @extend %after-corner-out-lb;
    @extend %after-corner-out-rt;
    @extend %after-corner-out-rb;



## Get Started

1. Drop the `after-bg` folder into the project's `sass` directory.
1. Add `@import "after-bg/import";` high up in the project's `main.scss` - just after globals is a good place. 
1. Refer to this [CodePen](https://codepen.io/ljburton/pen/LYPWGOp?editors=0100) for examples. 
1. Start transitioning backgrounds!

## Basic Example

    .element {
        // extend
        @extend %after-bg;
        @extend %after-peek-l;
        // defaults
        height: 200px; 
        width:200px; 
        // start 
        background: $c__purple;
        color: #ffffff;
        transition: 
            transform 2500ms ease-out, 
            color 300ms linear;	
        // hover 
        &::after {
            transition: transform 300ms ease-in;
            background: $c__green; 
        }
        &:hover {
            color: #000000;
        }
    }


