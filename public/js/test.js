$(".inputs").keyup(function() {
  if (this.value.length == this.maxLength) {
    var $next = $(this).next('.inputs');
    if ($next.length)
      $(this).next('.inputs').focus();
    else
      $(this).blur();
  }
});

// Random Number
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$("#auto-key").click(function(e) {

  e.preventDefault();

  $.ajax({
    type: 'POST',
    url: '/test/random_number',
    data: $('form').serialize(),
    success: function(data) {

      $("#key").val(data.output);
    }
  });
});


$("#manual-key").click(function() {
  $("#key").val('');
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$("#auto-iv").click(function(e) {

  e.preventDefault();

  $.ajax({
    type: 'POST',
    url: '/test/random_number',
    data: $('form').serialize(),
    success: function(data) {

      $("#iv").val(data.output);
    }
  });
});

$("#manual-iv").click(function() {
  $("#iv").val('');
});

$(document).on('change', '.div-toggle', function() {
  var target = $(this).data('target');
  var show = $("option:selected", this).data('show');
  $(target).children().addClass('hide');
  $(show).removeClass('hide');
});
$(document).ready(function() {
  $('.div-toggle').trigger('change');
});


// Get Ciphers
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function() {

  $.ajax({
    type: 'POST',
    url: '/test',
    data: {
      choice: 'ciphers_only'
    },
    success: function(data) {

      for (var i = 0; i < data.output.length; i++) {
        // $('<option>').val(data.output[i]).text(data.output[i]).appendTo('#cipher_select');
        $('<option>').val(i + 1).text(data.output[i]).appendTo('#cipher_select');

      }
    }
  });
  $('.js-example-basic-single').select2();
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$("#binary").click(function(e) {

  e.preventDefault();

  $.ajax({
    type: 'POST',
    url: '/test/binary',
    data: $('form').serialize(),
    success: function(data) {

      $('#editor').html("<span style='color: blue;'>" + data.output + "</span>" +
        " " + "<span style='color: red;'>" + data.cipher + "</span>");

      $("#binary_input").val($("#editor").text());
    }
  });
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$("#encrypt").click(function(e) {

  e.preventDefault();

  $.ajax({
    type: 'POST',
    url: '/test',
    data: $('form').serialize() + "&choice=full",
    success: function(data) {

      $('#out_bit').val('');
      $('#out_bit2').val('');
      $('#out_bit3').val('');

      $('#out_bit').val(data.raw_output);
      $('#out_bit2').val(data.hex_output);
      $('#out_bit3').val(data.bin_output);

    },
    error: function(msg) {
      $('#out_bit').html("Something went wrong with the encryption");
      $('#out_bit2').html("Something went wrong with the encryption");
      $('#out_bit3').html("Something went wrong with the encryption");

    }
  });
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$("#decrypt").click(function(e) {

  e.preventDefault();

  $.ajax({
    type: 'POST',
    url: '/test/decrypt',
    data: $('form').serialize() + "&choice=full",
    success: function(data) {

      $('#editor').html("<span style='color: blue;'>" + data.bin_output + "</span>" +
        " " + "<span style='color: red;'>" + data.cipher + "</span>");

      $("#binary_input").val($("#editor").text());

      $("#input_bits").val(data.output);

    }
  });
});
