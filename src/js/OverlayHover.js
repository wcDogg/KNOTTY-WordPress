// ------------------------------------------------------
// Overlay.scss - Hover JS
// @required /sass/overlay
// ------------------------------------------------------

function OverlayHover() {

    var overlayLinksArray = Array.from( document.getElementsByClassName('overlay__link') );

    overlayLinksArray.forEach(link => {

        // console.log('OverlayHover links', link)
        let overlay_wrap =link.querySelector('.overlay__wrap:not(.hover)');
        let overlay_wrap_hover =link.querySelector('.overlay__wrap.hover');

        // Events
        link.addEventListener('mouseenter', overlayMouseEnter, false);
        link.addEventListener('mouseleave', overlayMouseLeave, false);

        // Hover handler
        function overlayMouseEnter() {
            overlay_wrap.setAttribute('data-overlay', 'false');
            overlay_wrap_hover.setAttribute('data-overlay', 'true');
        } //

        // Hover out handler
        function overlayMouseLeave() {
            overlay_wrap.setAttribute('data-overlay', 'true');
            overlay_wrap_hover.setAttribute('data-overlay', 'false');

            // longest CSS close animation is 300ms 
            setTimeout(() => {
                overlay_wrap.removeAttribute('data-overlay');
                overlay_wrap_hover.removeAttribute('data-overlay');
            }, 310);         

        } //

    }); // forEach

} //    


OverlayHover.init = function () {
    console.log('INIT OverlayHover')
    return new OverlayHover();
} // 

