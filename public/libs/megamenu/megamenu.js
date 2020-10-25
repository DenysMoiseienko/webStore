/* open/close main sidebar menu */
function openNav() {
    document.getElementById("sidebar-nav").style.width = "300px";
}

function closeNav() {
    document.getElementById("sidebar-nav").style.width = "0";
}

/*global $ */


    $('.sidebar-nav > ul > li:has( > ul)').addClass('menu-dropdown-icon');
    //Checks if li has sub (ul) and adds class for toggle icon - just an UI
  
    //Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)
  
    // $(".sidebar-nav > ul").before("<a href=\"#\" class=\"menu-mobile\">Navigation</a>");
  
    //Adds menu-mobile class (for mobile toggle menu) before the normal menu
    //Mobile menu is hidden if width is more then 959px, but normal menu is displayed
    //Normal menu is hidden if width is below 959px, and jquery adds mobile menu
    //Done this way so it can be used with wordpress without any trouble
  
    //  
    //If width is more than 943px dropdowns are displayed on hover
  
    $(".sidebar-nav > ul > li .menu-has-items-toggle").click(function() {
        $(this).siblings("ul").animate({
            height: 'toggle'
          });
        $(this).parent("li").toggleClass('active');
        $(this).toggleClass('active');
    });
    //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)
  
    $(".sidebar-nav-mobile").click(function(e) {
      $(".sidebar-nav > ul").toggleClass('show-on-mobile');
      e.preventDefault();
    });
    //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)
  
