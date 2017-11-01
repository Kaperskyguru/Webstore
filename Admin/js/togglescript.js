

$(document).ready(function() {
    $(".dropdown-toggle").dropdown();
});


$('#toggle').click(function(e) {
    e.preventDefault();
    $('#wrapper').toggleClass('menuWrapper');
});

$('#toggle1').click(function(e) {
    e.preventDefault();
    $('#wrapper').toggleClass('menuWrapper');
});



