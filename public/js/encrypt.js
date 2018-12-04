$("#textUpload").on("submit", function(e) {
    if (document.getElementById("auto").value != null) {
        $('#randomEncryptionKey').val(document.getElementById("auto").value);
    }
});

$("#fileToUpload").on("submit", function(e) {
    if (document.getElementById("auto").value != null) {
        $('#randomEncryptionKey').val(document.getElementById("auto").value);
    }
});

$("#SHA").change(function() {
    if ($(this).prop("checked") == true) {

        if ($('#encInputFile').is(":visible")) {
            $('#encInputFile').attr('style', 'pointer-events:none');
            $('#encInputFile').attr('style', 'opacity:0.4');
        } else {
            $('#encInputText').attr('style', 'pointer-events:none');
            $('#encInputText').attr('style', 'opacity:0.4');
        }
        $('#options').attr('style', 'pointer-events:none');
        $('#options').attr('disabled', 'disabled');
        $('#options').attr('style', 'opacity:0.4');

        $('#fileCard').html('File (Max size 2MB)');

        $('#myGroup2').find('.collapse.show').collapse('hide');

    }
});

$("#AES").change(function() {
    if ($(this).prop("checked") == true) {

        if ($('#encInputFile').is(":visible")) {
            if ($('#auto').prop("checked") != true) {
                $('#encInputFile').attr('style', 'pointer-events:auto');
                $('#encInputFile').attr('style', 'opacity:1.0');

                if ($('#collapseEncFile').is(":hidden")) {
                    $('#myGroup2').find('.collapse.show').collapse('hide');
                    $('#collapseEncFile').collapse('show');
                }
            } else {
                if ($('#collapseEncAuto').is(":hidden")) {
                    $('#myGroup2').find('.collapse.show').collapse('hide');
                    $('#collapseEncAuto').collapse('show');
                }
            }
        } else {
            if ($('#auto').prop("checked") != true) {

                $('#encInputText').attr('style', 'pointer-events:auto');
                $('#encInputText').attr('style', 'opacity:1.0');

                if ($('#collapseEncText').is(":hidden")) {
                    $('#myGroup2').find('.collapse.show').collapse('hide');
                    $('#collapseEncText').collapse('show');
                }
            } else {
                if ($('#collapseEncAuto').is(":hidden")) {
                    $('#myGroup2').find('.collapse.show').collapse('hide');
                    $('#collapseEncAuto').collapse('show');
                }
            }
        }
        $('#options').attr('style', 'pointer-events:auto');
        $('#options').removeAttr('disabled');
        $('#options').attr('style', 'opacity:1.0');

        $('#fileCard').html('File (Max size 2MB)');
    }

});

$("#RSA").change(function() {
    if ($(this).prop("checked") == true) {
        if ($('#encInputFile').is(":visible")) {
            if ($('#auto').prop("checked") != true) {
                $('#encInputFile').attr('style', 'pointer-events:auto');
                $('#encInputFile').attr('style', 'opacity:1.0');
                if ($('#collapseEncFile').is(":hidden")) {
                    $('#myGroup2').find('.collapse.show').collapse('hide');
                    $('#collapseEncFile').collapse('show');
                }
            } else {
                if ($('#collapseEncAuto').is(":hidden")) {
                    $('#myGroup2').find('.collapse.show').collapse('hide');
                    $('#collapseEncAuto').collapse('show');
                }
            }
        } else {
            if ($('#auto').prop("checked") != true) {

                $('#encInputText').attr('style', 'pointer-events:auto');
                $('#encInputText').attr('style', 'opacity:1.0');

                if ($('#collapseEncText').is(":hidden")) {
                    $('#myGroup2').find('.collapse.show').collapse('hide');
                    $('#collapseEncText').collapse('show');
                }
            } else {
                if ($('#collapseEncAuto').is(":hidden")) {
                    $('#myGroup2').find('.collapse.show').collapse('hide');
                    $('#collapseEncAuto').collapse('show');
                }
            }
        }
        $('#options').attr('style', 'pointer-events:auto');
        $('#options').removeAttr('disabled');
        $('#options').attr('style', 'opacity:1.0');

        $('#fileCard').html('File (Max size 10KB)');
    }
});

$("#auto").change(function() {
    if ($(this).prop("checked") == true) {

        $(this).val("auto");
        if ($('#encInputFile').is(":visible")) {
            $('#encInputFile').attr('style', 'pointer-events:none');
            $('#encInputFile').attr('style', 'opacity:0.4');

        } else {
            $('#encInputText').attr('style', 'pointer-events:none');
            $('#encInputText').attr('style', 'opacity:0.4');
        }
    }

});

$("#manualFile").change(function() {
    if ($(this).prop("checked") == true) {

        $('#auto').val(null);

        $('#encInputFile').attr('style', 'pointer-events:auto');
        $('#encInputFile').attr('style', 'opacity:1.0');
        $('#encInputText').hide();
    }
});

$("#manualText").change(function() {
    if ($(this).prop("checked") == true) {
        $('#auto').val(null);
        $('#encInputText').attr('style', 'pointer-events:auto');
        $('#encInputText').attr('style', 'opacity:1.0');
        $('#encInputText').show();
        $('#encInputFile').hide();
    }
});

var $myGroup = $('#myGroup');
$myGroup.on('show.bs.collapse', '.collapse', function() {
    $myGroup.find('.collapse.show').collapse('hide');
});

var $myGroup2 = $('#myGroup2');
$myGroup2.on('show.bs.collapse', '.collapse', function() {
    $myGroup2.find('.collapse.show').collapse('hide');
});
