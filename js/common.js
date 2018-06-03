$(document).ready(function() {

    function loop(dddd) {
        $(dddd).css({left:0});
        $(dddd).animate ({
            left: '+=1400',
        }, 5000, 'linear', function() {
            loop(dddd);
        });
    }
        
    loop('.glassefct');
 });