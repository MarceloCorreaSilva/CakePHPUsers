$(function(){
    if (window.matchMedia('(max-device-width: 480px)').matches) {
        $('.link').removeClass('link').addClass('btn btn-primary');
        $('.btn').removeAttr('style').css({
        	'width': '100%',
        	'margin-bottom': '10px'
        });

        $('.btn-group .btn').removeAttr('style');
        $('.file-loading input').removeAttr('style');

        var cols =  $("table").find('tr')[0].cells.length;
        for (var i = 3; i < cols; i++) {
	        $('th:nth-child(' + i + ')').hide();
	        $('td:nth-child(' + i + ')').hide();
        };
    } 
});