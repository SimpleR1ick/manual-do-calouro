$(document).ready(function(){

    $('.teste').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            $('#cont').html(response)
            //alert("action performed successfully");
        });
    });
    
});