$("#decFile").change(function() {
    if ($(this).prop("checked") == true) {

        $('#decInputText').hide();
        $('#decInputFile').show();
        $('#decText').prop('checked', false);
    }
});

$("#decText").change(function() {
    if ($(this).prop("checked") == true) {
        $('#decInputText').show();
        $('#decInputFile').hide();
        $('#decFile').prop('checked', false);
    }
});

$("#AESdec").change(function() {
    if ($(this).prop("checked") == true) {

        $(this).val('true');
        $('#RSAdec').val('false');
        $('#fileDecCard').html('File (Max size 2MB)');
    }
});

$("#RSAdec").change(function() {
    if ($(this).prop("checked") == true) {

        $(this).val('true');
        $('#AESdec').val('false');
        $('#fileDecCard').html('File (Max size 10KB)');
    }
});

var $myDec = $('#myDec');
$myDec.on('show.bs.collapse', '.collapse', function() {
    $myDec.find('.collapse.show').collapse('hide');
});

var $myDec2 = $('#myDec2');
$myDec2.on('show.bs.collapse', '.collapse', function() {
    $myDec2.find('.collapse.show').collapse('hide');
});
