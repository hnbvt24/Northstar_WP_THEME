/**
 * Prevent all links with # as the href from doing anything
 */
jQuery(document).ready(function($) {
    $('a[href="#"]').click(function(e) {
        e.preventDefault();
    });
});