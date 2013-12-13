/* This is the accordion file for the project_info page. */

jQuery(function($){
    var accordion_head = $('.accordion-tab'),
        accordion_panel = $('.accordion-panel');

    function toggleSection(id){
        event.preventDefault();

        // Closing all open panels
        if (accordion_panel.hasClass('active')) {
            accordion_panel.removeClass('active');
        }

        if (id == 'project-general') {
            $('.project-general').addClass('active');
        }

        else if (id == 'project-files') {
            $('.project-files').addClass('active');
        }

        else if (id == 'project-tasks') {
            $('.project-tasks').addClass('active');
        }
    }

    accordion_head.click(function(){
        var id = $(this).attr('id');
        toggleSection(id);
    });
});