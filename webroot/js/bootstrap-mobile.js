$(function(){
    if (
        window.matchMedia('(max-device-width: 480px)').matches ||
        window.matchMedia('(max-device-width : 768px)').matches
        ) {
        $('.link').removeClass('link').addClass('btn btn-lg btn-primary');
        $('.btn').removeAttr('style').css({
        	'width': '100%',
        	'margin-bottom': '10px'
        });
        $('div').removeAttr('style');

        $('.btn-group .btn').removeAttr('style');
        $('.file-loading input').removeAttr('style');

        var cols =  $("table").find('tr')[0].cells.length;
        for (var i = 3; i < cols; i++) {
	        $('th:nth-child(' + i + ')').hide();
	        $('td:nth-child(' + i + ')').hide();
        };
    } 
});