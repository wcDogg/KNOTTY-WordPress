# Overlay.scss

Use 1 common layout to achieve: 

- On-page images with text and gradient overlays.
- Background images with text and gradient overlays.
- No image? No problem! Title underlays for when you don't want an image but need a touch of detail. 
- Hover effects / transitioning content. 


## The Image Overlays

These can go on `img` or on `div` with `background-image`.

### Quick Grab
```
// $corner = lt || lb || rt || rb 
@include overlay-solid(center, rgba(#000000, 0.9)); // only one with center
@include overlay-wash(lb, $c__base-dk);
@include overlay-corner-sharp(lb, rgba($c__base-dk, 1), rgba($c__base-dk, 0.2));
@include overlay-corner-soft(lb, rgba($c__base-dk, 1));
@include overlay-vignette(lb, rgba($c__base-dk, 1));
@include overlay-football(lb, rgba($c__base-dk, 1));
```

### SCSS
```
.parent {
	div.overlay__wrap {
		@include overlay-wash(lb, $c__base-dk);
		min-height: 300px;
	} 	
	div.overlay {}
	div.overlay__content {}  
	img.overlay__img {} 
	div.overlay__img {}
} // 
```

### HTML img
```
<section>
    <div class="section__inner">
        <div class="overlay__wrap">	
			  <div class="overlay"></div>			
			  <div class="overlay__content">
				  <h1>On-Page Image</h1>
			  </div>				  
			  <img class="overlay__img" src="https://picsum.photos/id/237/1024/720?grayscale" alt="Title Here" />	  
        </div><!-- .overlay__wrap --> 
    </div><!-- .section__inner -->
</section>
```

### HTML div
```
<section>
    <div class="section__inner">
        <div class="overlay__wrap">	
			  <div class="overlay"></div>			
			  <div class="overlay__content">
				  <h1>Background Image</h1>
			  </div>	
			  <div class="overlay__img" style="background-image: url(https://picsum.photos/id/237/1024/720?grayscale);" ></div>	  
        </div><!-- .overlay__wrap --> 
    </div><!-- .section__inner -->
</section>
```


## The Title Underlays

For when you don't have or want an image, but you need some detail.

### Quick Grab
```
// $align = left || center || right
@include title-under-simple(center, rgba($c__base-bright, 1));
@include title-under-spotlight(center, rgba($c__base-bright, 1));
@include title-under-thumbtack(center, rgba($c__base-bright, 1));
@include title-under-nights(right, rgba($c__base-bright, 1));
@include title-under-oval(center, rgba($c__base-bright, 1));
@include title-under-slant(center, rgba($c__base-bright, 1));
```

### SCSS
```
.parent {
	div.overlay__wrap {
		@include title-under-simple;
	} 	
	div.overlay {}
	div.overlay__content {}
} // 
```

### HTML
```
<section>
    <div class="section__inner">
        <div class="overlay__wrap">	
			  <div class="overlay"></div>	 		
			  <div class="overlay__content">
				  <h1>Title Underlay</h1>
			  </div>
        </div><!-- .overlay__wrap -->
    </div><!-- .section__inner -->
</section>
```


## The Hovers

Uses Animate.scss to transition linked images. Both the default and hover states can each have their own image, overlay, and content. 

### Qucik Grab
```
See SCSS and HTML below
```

### Animate.scss

Hover effects use Animate.scss - the sassy version of Animate.css.

- https://github.com/wcDogg/Animate.scss

### JS

Hover effects require a small amount of vanilla Javascript. This is a single file and there are two versions: 

- `/js/OverlayHover.js` - Uncompressed, source file. Use this if adding to your own compile. 
- `/js/OverlayHover.min.js` - Babel, minified. Use this if you need a drop-in. 

Add this script to your site footer:

```
<script src="../js/OverlayHover.js"></script>
<script>OverlayHover.init();</script>
```

### SCSS 
```
.parent {
	.overlay__link {
		// the overlays
		.overlay__wrap { 
			min-height: 200px;
		}
		.overlay__wrap:not(.hover) {
			@include overlay-corner-sharp(lt);
		}
		.overlay__wrap.hover {
			@include overlay-corner-sharp(lb);
		}
		// the animations
		[data-overlay] {
			@include animated(300ms);
		}
		[data-overlay="true"] {
			// @extend %slideInDown;
			@extend %slideInLeft;
			// @extend %slideInRight;
			// @extend %slideInUp;        
		}
		[data-overlay="false"] {
			// @extend %slideOutDown;
			@extend %slideOutRight;
			// @extend %slideOutLeft;
			// @extend %slideOutUp;        
		}
	} // 
} //
```	

### HTML
```
<a class="overlay__link" href="#" title="TITLE">
	<div class="overlay__wrap">
		<div class="overlay"></div>
		<div class="overlay__content card__title-wrap">
			<h3 class="card__title">On start</h3>
			<h2 class="card__subtitle">This shows</h2>
		</div>
		<img class="overlay__img" src="https://picsum.photos/id/593/1024/720?grayscale" alt="Tiger">
	</div><!-- .overlay__wrap -->
	<div class="overlay__wrap hover">
		<div class="overlay"></div>
		<div class="overlay__content card__title-wrap">
			<h3 class="card__title">On Hover</h3>
			<h2 class="card__subtitle">This is visible</h2>
		</div>
		<img class="overlay__img" src="https://picsum.photos/id/594/1024/720?grayscale" alt="Dock">
	</div><!-- .overlay__wrap -->
</a><!-- .overlay__link-->
```

For an linked image with content that transitions on hover

```
<section id="over-06">
	<div class="section__inner-wrap">

		<a class="overlay__link" href="#">
			<div class="overlay__wrap">	

				<div class="overlay"></div>				
				<div class="overlay__content">
					<h1>On Hover</h1>
					<h2>The entire image is a link and this text changes on hover.</h2>
				</div>	
				<div class="overlay__img" style="background-image: url(https://picsum.photos/id/237/1024/720?grayscale);" ></div>

				<div class="overlay-hover"></div>			
				<div class="overlay__content-hover">
					<h1>Dogs</h1>
					<h2>Find Your New Best Friend</h2>
				</div>			  
				<div class="overlay__img-hover" style="background-image: url(https://picsum.photos/id/236/1024/720?grayscale);" ></div>

			</div><!-- .overlay__wrap -->
		</a><!-- .overlay__link -->
	</div><!-- .section__inner-wrap -->
</section>
```



## The Files

- `@import 'overlay/import.scss` - Add this file to your Sass flow.  
- `_overlay.scss` - The base CSS. Careful with edits here. 
- `_overlay-text.scss` - Handles text postion for the overlay @mixins.
- `_overlay-overlay.scss` - The image overlay @mixins.
- `_overlay-underlay.scss` - The title underlay @mixins.
- `_OverlayHover.scss` - Required to animate on hover.
- `OverlayHover.js` - Required to animate on hover. 
- `overlay.md` - This file :) 

