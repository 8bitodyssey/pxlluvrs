//(function($){})(jQuery);

jQuery(function($){
    $(document).foundation({
        topbar : {
            sticky_class : 'topbar-sticky',
            custom_back_text: true, // Set this to false and it will pull the top level link name as the back text
            back_text: 'Back', // Define what you want your custom back text to be if custom_back_text: true
            is_hover: true,
            mobile_show_parent_link: false, // will copy parent links into dropdowns for mobile navigation
            scrolltop : true // jump to top when sticky nav menu toggle is clicked
          }
    });
    //$('#content > .columns').autoHeight({column:2, clear:1});
    //$('#sidebar-bottom').stick_in_parent();


});
