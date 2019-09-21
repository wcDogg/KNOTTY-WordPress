# Quck-Grab: Navigation


## `<a>` with underline for body
```
.section__text {
    a { 
        @extend %a-underline; // +1 optional
        // @extend %a-underline-primary;
        // @extend %a-underline-secondary;
        // @extend %a-underline-alt;
        // @extend %a-underline-bright;
        // @extend %a-underline-subtle;
        // @extend %a-underline-inherit;
    } //
}
```

## `<a>` NO underline for body 
```
.section__text {
    a { 
        @extend %a-color; // +1 optional
        // @extend %a-color-primary;
        // @extend %a-color-secondary;
        // @extend %a-color-alt;
        // @extend %a-color-bright;
        // @extend %a-color-subtle;
    } //
}
```

## `<a>` for title blocks
```
a.card__title-wrap {
	@extend %a-title; // +1 optional
	// @extend %a-title-primary;
	// @extend %a-title-secondary;
	// @extend %a-title-alt;
	// @extend %a-title-bright;
	// @extend %a-title-subtle;
	// @extend %a-title-white;
}
```

## Horizontal Text Menu 

Note that a `nav` element can contain more than one `<ul>` menu - a mobile nav usually has a main and social menu at the least. 

For this reason, always target the specific `<ul>` tp `@extemd`. 

```
nav#main-nav {
    ul#main-menu {
        @extend %nav-text-horizontal;
        background: #000000;
        a {
            @extend %a-menu; // +1 optional
            // @extend %a-menu-primary;
            // @extend %a-menu-secondary;
            // @extend %a-menu-alt;
            // @extend %a-menu-subtle;
            // @extend %a-menu-bright;
            // @extend %a-menu-white;
        }	       
    } //
} //
```

## Vertical Text Menu 
```
nav#mobile-nav {
    ul#mobile-menu {
        @extend %nav-text-vertical;
        a {
            @extend %a-menu; // +1 optional
            // @extend %a-menu-primary;
            // @extend %a-menu-secondary;
            // @extend %a-menu-alt;
            // @extend %a-menu-subtle;
            // @extend %a-menu-bright;
            // @extend %a-menu-white;
        }
    } //
} // 
```

## Horizontal Icon Menu 
```

```

## Vertical Icon Menu 
```

```

