$(document).ready(function(){
    $('.rating i.fa').click(function(e) {
          var index = $( ".rating i.fa" ).index( this ) + 1;

            $(e).removeclass('fa-star-o');
            $(e).addclass('fa-star');

    });
})
