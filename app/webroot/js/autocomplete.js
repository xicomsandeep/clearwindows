//Purpose:autocomplete links
//created on:28 August 2014
//Author:Abhishek Tripathi

$(function() {
        function log( message ) {
            $( "<div>" ).text( message ).prependTo( "#log" );
            $( "#log" ).scrollTop( 0 );
        }
        $( "#city" ).autocomplete({
            
            source: "link_search",
            minLength: 3,
            select: function( event, ui ) {
                var city =ui.item.name;
                $('#city').val(city);
                return false;
            }
        })
        .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            var i="";
            
            return $( "<li>" ).append( "<a>&nbsp;" + item.name + "</a>" ).appendTo( ul )};
    });