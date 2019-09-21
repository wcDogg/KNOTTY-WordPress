/*!
 * Vanilla Aria Mobile Menu
 * Display a mobile menu using vanilla JS + Animate CSS
 * Handles open, close, and trap focus for keyboard navigation
 * 
 * @requires /js/AriaModalPrep.js
 *
 */


function MobileMenu() {

    // Raw IDs
    let id_mobile_open = 'mobile-open';
    let id_mobile_close = 'mobile-close';
    let id_mobile_close_sr = 'mobile-close-sr';
    let id_mobile_overlay = 'mobile-overlay';
    let id_mobile_content = 'mobile-content';
    let id_mobile_top = 'mobile-top';
    let id_mobile_menu = 'mobile-menu';
    let id_mobile_bottom = 'mobile-bottom';

    // Open + Close elements
    let mobile_open = document.getElementById(id_mobile_open);
    let mobile_close = document.getElementById(id_mobile_close);
    let mobile_close_sr = document.getElementById(id_mobile_close_sr);

    // Animation Elements
    let mobile_overlay = document.getElementById(id_mobile_overlay);
    let mobile_content = document.getElementById(id_mobile_content);
    let mobile_top = document.getElementById(id_mobile_top);
    let mobile_menu = document.getElementById(id_mobile_menu);
    let mobile_bottom = document.getElementById(id_mobile_bottom);

    // Initial event listeners for Open button
    mobile_open.addEventListener('click', mobileOpenClick, false);
    // mobile_open.addEventListener('keyup', mobileOpenKeyup, false);

    // Open Click - goes on 'click' event
    function mobileOpenClick() {
        event.preventDefault();
        mobileListenersAdd();
        mobileOpenAnimate();
        mobileOpenScroll();
        mobile_close.focus();
    } //

    // Close Click
    function mobileCloseClick() {
        event.preventDefault();
        mobileCloseAnimate();
        mobile_open.focus();

        setTimeout(() => {
            mobileCloseSrcoll();
        }, 150); // improve visual of scroll bars swapping

        setTimeout(() => {
            mobileSweep();
            mobileListenersRemove();
        }, 501); // longest CSS close animation is 500ms
    }

    // Close Enter - mobiile_close_sr 'keyup' event
    // Not necessary on mobile_close button
    function mobileCloseKeyup() {
        if (event.keyCode === 13) {
            event.preventDefault();
            mobileClick();
        }
    } //

    // Add listeners
    function mobileListenersAdd() {
        mobile_overlay.addEventListener('keyup', mobileEscToClose, false);
        mobile_close.addEventListener('click', mobileCloseClick, false);
        mobile_close.addEventListener('keydown', mobileTrapFocus, false);
        mobile_close_sr.addEventListener('click', mobileCloseClick, false);
        mobile_close_sr.addEventListener('keyup', mobileCloseKeyup, false);
        mobile_close_sr.addEventListener('keyup', mobilSrTabIntoView, false);
        mobile_close_sr.addEventListener('keydown', mobileTrapFocus, false);
        mobile_top.addEventListener('click', mobileCloseOnContentClick, false);
        mobile_menu.addEventListener('click', mobileCloseOnMenuClick, false);
        mobile_bottom.addEventListener('click', mobileCloseOnContentClick, false);
        document.body.addEventListener('touchmove', mobileBodyTouchmove, false);
    } //

    // Remove listeners
    function mobileListenersRemove() {
        mobile_overlay.removeEventListener('keyup', mobileEscToClose, false);
        mobile_close.removeEventListener('click', mobileCloseClick, false);
        mobile_close.removeEventListener('keydown', mobileTrapFocus, false);
        mobile_close_sr.removeEventListener('click', mobileCloseClick, false);
        mobile_close_sr.removeEventListener('keyup', mobileCloseKeyup, false);
        mobile_close_sr.removeEventListener('keyup', mobilSrTabIntoView, false);
        mobile_close_sr.removeEventListener('keydown', mobileTrapFocus, false);
        mobile_top.removeEventListener('click', mobileCloseOnContentClick, false);
        mobile_menu.removeEventListener('click', mobileCloseOnMenuClick, false);
        mobile_bottom.removeEventListener('click', mobileCloseOnContentClick, false);
        document.body.removeEventListener('touchmove', mobileBodyTouchmove, false);
    } //

    // Open animation
    function mobileOpenAnimate() {
        document.body.setAttribute('data-mobile', 'true');
        mobile_overlay.setAttribute('data-mobile', 'true');
        mobile_content.setAttribute('data-mobile', 'true');
        mobile_top.setAttribute('data-mobile', 'true');
        mobile_menu.setAttribute('data-mobile', 'true');
        mobile_bottom.setAttribute('data-mobile', 'true');
    } //

    // Close animation
    function mobileCloseAnimate() {
        mobile_overlay.setAttribute('data-mobile', 'false');
        mobile_content.setAttribute('data-mobile', 'false');

        // Not animated out - removed on sweep
        // mobile_top.setAttribute('data-mobile', 'false');   
        // mobile_menu.setAttribute('data-mobile', 'false');   
        // mobile_bottom.setAttribute('data-mobile', 'false');   
    } //

    // Open scrollbars
    function mobileOpenScroll() {
        // Scroll to top of mobile menu
        mobile_overlay.scroll(0, 0);
        // Swap acrollbars
        var scrollBarWidth = window.innerWidth - document.body.offsetWidth;
        document.body.style.margin = '0px ' + scrollBarWidth + 'px 0px 0px';
        // Prevent background scroll - mouse + keyboard
        // CSS sets `overflow: hidden`
        document.body.setAttribute('data-mobile', 'true');
    } //

    // Clsoe scrollbars
    function mobileCloseSrcoll() {
        // Swap scrollbars
        document.body.style.margin = '';
        // Restore mouse + keyboard scroll
        // CSS sets `overflow: auto`
        document.body.removeAttribute('data-mobile');
    } //

    // Remove all [data] 
    function mobileSweep() {

        var sweep_mobile = Array.from(document.querySelectorAll('[data-mobile]'));
        sweep_mobile.forEach(element => {
            element.removeAttribute('data-mobile');
        });

        var sweep_sub = Array.from(document.querySelectorAll('[data-sub]'));
        sweep_sub.forEach(element => {
            element.removeAttribute('data-sub');
        });

    } //

    // ESC handler - mobile_overlay 'keyup' event
    function mobileEscToClose() {
        if (event.keyCode === 27) {
            // event.preventDefault();
            mobileCloseClick();
        }
    } //

    // Trap Focus handler - mobile_close + mobile_close_sr 'keydown' event
    function mobileTrapFocus() {
        // TAB from SR link to Close button
        if (event.target === mobile_close_sr) {
            if (!event.shiftKey && event.keyCode == 9) {
                event.preventDefault();
                mobile_overlay.scroll(0, 0);
                mobile_close.focus();
            }
        }
        // SHIFT+TAB from Close button back to SR link
        if (event.target === mobile_close) {
            if (event.shiftKey && event.keyCode == 9) {
                event.preventDefault();
                // scroll handled by keyup event
                mobile_close_sr.focus();
            }
        }
    } //

    // Close on link click in mobile_top + mobile_bottom
    function mobileCloseOnContentClick() {
        if (event.target.closest('a, button, [type="button"], [type="submit"], [type="reset"]')) {
            // event.preventDefault();
            mobileCloseAnimate();
            // mobile_open.focus();
            setTimeout(() => {
                mobileCloseSrcoll();
                mobileSweep();
                mobileListenersRemove();
            }, 310); // longest CSS close animation is 300ms               
        }
    }

    // Close on any click in mobile_menu that is not submenu
    function mobileCloseOnMenuClick() {
        if (!event.target.closest('li').classList.contains('menu-item-has-children')) {
            // event.preventDefault();
            mobileCloseAnimate();
            // mobile_open.focus();
            setTimeout(() => {
                mobileCloseSrcoll();
                mobileSweep();
                mobileListenersRemove();
            }, 310); // longest CSS close animation is 300ms              
        }
    } //

    // TAB SR link into view - mobile_close_sr 'keyup' event
    function mobilSrTabIntoView() {
        if (event.keyCode === 9) {
            mobile_overlay.scrollTop = mobile_overlay.scrollHeight - mobile_overlay.clientHeight;
        }
    } //

    // Touchmove handler - body 'touchmove' event
    function mobileBodyTouchmove() {
        event.preventDefault();
    } //    


    // -------------------------------------------  
    // Sub menus - WordPress default classes 
    // -------------------------------------------

    // Get all parent <li> with children <ul>
    let parents = Array.from(mobile_menu.querySelectorAll('.menu-item-has-children'));

    // Iterate the parents
    parents.forEach(parent_li => {

        let parent_li_a = parent_li.querySelector("a");
        let sub_ul = parent_li.querySelector('.sub-menu');

        // Click listener - note this is working on the <li>
        parent_li_a.addEventListener('click', mobileSubToggle, false);

        // Add icons to <a> 
        (function () {
            var icon = document.createElement('i');
            icon.classList.add('fas', 'fa-chevron-right', 'fa-pull-right');
            var fragment = document.createDocumentFragment();
            fragment.appendChild(icon);
            parent_li_a.appendChild(fragment);
        }()); //

        // Toggle submenu 
        function mobileSubToggle() {
            if (event.target.closest('li').getAttribute('data-sub') == 'true') {
                event.preventDefault();
                mobileSubClose();
            }
            else {
                event.preventDefault();
                mobileSubOpen();
            }
        } //

        // Open submenu handler
        function mobileSubOpen() {
            mobileSubClose();
            setTimeout(() => {
                parent_li.setAttribute('data-sub', 'true');
                sub_ul.setAttribute('data-sub', 'true');
            }, 150); // wait for close          

        } //

        // Close submenu handler
        function mobileSubClose() {
            var sweep_sub = Array.from(document.querySelectorAll('[data-sub]'));
            sweep_sub.forEach(element => {
                element.setAttribute('data-sub', 'false');
                setTimeout(() => {
                    element.removeAttribute('data-sub');
                }, 300); // total close animation time (see CSS)               
            });
        } //  

    }); // forEach

} // MobileMenu


MobileMenu.init = function () {

    console.log('INIT MobileMenu')
    return new MobileMenu();

} // 

