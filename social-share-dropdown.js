jQuery(document).ready(function($) {
    $('.share-toggle').on('click', function(e) {
        e.preventDefault();
        $(this).next('.share-menu').slideToggle();
    });

    $('.copy-btn').on('click', function() {
        const copyText = $(this).siblings('input');
        copyText.select();
        document.execCommand('copy');
        alert('URL copied to clipboard!');
    });
});
