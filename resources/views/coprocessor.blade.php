@extends('layouts.app')
@section('content')

<style>
  .iv[disabled=disabled]
{
    background-color: #D3D3D3;
}
.encryption_key[disabled=disabled]
{
  background-color: #D3D3D3;
}
</style>

{{-- <script type="text/javascript" src="{{ URL::asset('js/test.js') }}"></script> --}}
<form autocomplete="off">
{{-- <form method="post" id="testUpload" class="form" action="{{ action('CoprocessorController@encrypt') }}" enctype="multipart/form-data"> --}}
{{-- <form> --}}

  @csrf
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="row">

    <div class="col-md-6 text-left bun2">
      <label style="color:white; padding-left: 20px;" display: block;>32 bytes Input</label>
      <div class="row">
        <div class="col-md-4 text-center bun2">
          <textarea type="text" rows="2" cols="25" class="input" maxlength="32" id="input_bits1" placeholder="0x00000000" name="input_bits1"></textarea>
        </div>

        <div class="col-md-8 text-center bun2">
          <div class="row">
            <div class="btn-group btn-group-toggle auto-key btn-group-sm" data-toggle="buttons">
              <label class="btn btn-secondary active" id="manual-key1">
                <input type="radio" id="manual-key1" checked> Text Key
              </label>
              <label class="btn btn-secondary" id="auto-key1">
                <input type="radio" id="auto-key1"> Random Key
              </label>
            </div>
            <textarea class="encryption_key" type="text" rows="1" cols="33" class="input" maxlength="512" id="encryption_key1" placeholder="Encryption Key" name="encryption_key1"></textarea>
          </div>
          <div class="row">
            <textarea class="iv" type="text" rows="1" cols="35" class="input" maxlength="16" id="iv1" placeholder="Input IV, if required by block cipher" name="iv1"></textarea>
            <div class="btn-group btn-group-toggle btn-group-sm" data-toggle="buttons">
              <label class="btn btn-secondary active" id="manual-iv1">
                <input type="radio" id="manual-iv1" checked> Text IV
              </label>
              <label class="btn btn-secondary" id="auto-iv1">
                <input type="radio" id="auto-iv1"> Random IV
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body row">
      </div>

      <label style="color:white; padding-left: 20px;" display: block;>32 bytes Input</label>
      <div class="row">
        <div class="col-md-4 text-center bun2">
          <textarea type="text" rows="2" cols="25" class="input" maxlength="32" id="input_bits2" placeholder="0x00000000" name="input_bits2"></textarea>
        </div>

        <div class="col-md-8 text-right bun2">
          <div class="row">
            <div class="btn-group btn-group-toggle auto-key btn-group-sm" data-toggle="buttons">
              <label class="btn btn-secondary active" id="manual-key2">
                <input type="radio" id="manual-key2" checked> Text Key
              </label>
              <label class="btn btn-secondary" id="auto-key2">
                <input type="radio" id="auto-key2"> Random Key
              </label>
            </div>
            <textarea class="encryption_key" type="text" rows="1" cols="33" class="input" maxlength="512" id="encryption_key2" placeholder="Encryption Key" name="encryption_key2"></textarea>
          </div>
          <div class="row">
            <textarea class="iv" type="text" rows="1" cols="35" class="input" maxlength="16" id="iv2" placeholder="Input IV, if required by block cipher" name="iv2"></textarea>
            <div class="btn-group btn-group-toggle btn-group-sm" data-toggle="buttons">
              <label class="btn btn-secondary active" id="manual-iv2">
                <input type="radio" id="manual-iv2" checked> Text IV
              </label>
              <label class="btn btn-secondary" id="auto-iv2">
                <input type="radio" id="auto-iv2"> Random IV
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body row">
      </div>

      <label style="color:white; padding-left: 20px;" display: block;>32 bytes Input</label>
      <div class="row">
        <div class="col-md-4 text-center bun2">
          <textarea type="text" rows="2" cols="25" class="input" maxlength="32" id="input_bits3" placeholder="0x00000000" name="input_bits3"></textarea>
        </div>

        <div class="col-md-8 text-right bun2">
          <div class="row">
            <div class="btn-group btn-group-toggle auto-key btn-group-sm" data-toggle="buttons">
              <label class="btn btn-secondary active" id="manual-key3">
                <input type="radio" id="manual-key3" checked> Text Key
              </label>
              <label class="btn btn-secondary" id="auto-key3">
                <input type="radio" id="auto-key3"> Random Key
              </label>
            </div>
            <textarea class="encryption_key" type="text" rows="1" cols="33" class="input" maxlength="512" id="encryption_key3" placeholder="Encryption Key" name="encryption_key3"></textarea>
          </div>
          <div class="row">
            <textarea class="iv" type="text" rows="1" cols="35" class="input" maxlength="16" id="iv3" placeholder="Input IV, if required by block cipher" name="iv3"></textarea>
            <div class="btn-group btn-group-toggle btn-group-sm" data-toggle="buttons">
              <label class="btn btn-secondary active" id="manual-iv3">
                <input type="radio" id="manual-iv3" checked> Text IV
              </label>
              <label class="btn btn-secondary" id="auto-iv3">
                <input type="radio" id="auto-iv3"> Random IV
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body row">
      </div>

      <label style="color:white; padding-left: 20px;" display: block;>32 bytes Input</label>
      <div class="row">
        <div class="col-md-4 text-center bun2">
          <textarea type="text" rows="2" cols="25" class="input" maxlength="32" id="input_bits4" placeholder="0x00000000" name="input_bits4"></textarea>
        </div>

        <div class="col-md-8 text-right bun2">
          <div class="row">
            <div class="btn-group btn-group-toggle auto-key btn-group-sm" data-toggle="buttons">
              <label class="btn btn-secondary active" id="manual-key4">
                <input type="radio" id="manual-key4" checked> Text Key
              </label>
              <label class="btn btn-secondary" id="auto-key4">
                <input type="radio" id="auto-key4"> Random Key
              </label>
            </div>
            <textarea class="encryption_key" type="text" rows="1" cols="33" class="input" maxlength="512" id="encryption_key4" placeholder="Encryption Key" name="encryption_key4"></textarea>
          </div>
          <div class="row">
            <textarea class="iv" type="text" rows="1" cols="35" class="input" maxlength="16" id="iv4" placeholder="Input IV, if required by block cipher" name="iv4"></textarea>
            <div class="btn-group btn-group-toggle btn-group-sm" data-toggle="buttons">
              <label class="btn btn-secondary active" id="manual-iv4">
                <input type="radio" id="manual-iv4" checked> Text IV
              </label>
              <label class="btn btn-secondary" id="auto-iv4">
                <input type="radio" id="auto-iv4"> Random IV
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-2 text-center bun2">
      <div class="modal-body row">
      </div>
      <div class="modal-body row">
      </div>
      <div class="modal-body row">
      </div>
      <div class="modal-body row">
      </div>

      <div class="text-center">
        <div>
          <input type="radio" name="action" value="cipher" checked />
          <label for="cipher" style="color:white;" display: block;>Block Cipher</label>
          <select id="block_cipher" class="dropdown" name="block_cipher">
            <option>aes-128-ecb</option>
            <option>aes-128-cbc</option>
            <option>aes-128-cfb</option>
            <option>aes-128-ofb</option>
            <option>des-ecb</option>
            <option>des-cbc</option>
            <option>des-cfb</option>
            <option>des-ede</option>

          </select>
        </div>

        <div>
          <input type="radio" name="action" value="public" />
          <label for="public" style="color:white;">Asymmetric (RSA)</label>
        </div>
        <div>
          <input type="radio" name="action" value="hash" />
          <label for="hash" style="color:white;">Hashing</label>
          <select id="hash_select" class="dropdown" name="hash_select" disabled>
            <option>md5</option>
            <option>sha512</option>
            <option>sha3-512</option>
          </select>
        </div>
      </div>
      <div class="modal-body row">
      </div>
      <button class="btn btn-submit next-button" id="encrypt" type="submit">Encrypt</button>
    </div>

    <div class="col-md-4 text-left bun2">

      <label style="color:white; padding-left: 20px;" display: block;>32 bytes Output</label>
      <div class=" row">
        <textarea type="text" rows="2" cols="40" class="input" id="output_bits1" placeholder="Output" name="output_bits1"></textarea>
        <div class="btn-group-vertical btn-group-toggle auto-key btn-group-sm" data-toggle="buttons">
          <label class="btn btn-secondary active" id="base64_1">
            <input type="radio" name="output" id="base64_1" value="base64_1" checked> Base64
          </label>
          <label class="btn btn-secondary" id="raw1">
            <input type="radio" name="output1" id="raw1" value="raw1"> Raw
          </label>
        </div>
      </div>
      <div class="modal-body row">
      </div>
      <label style="color:white; padding-left: 20px;" display: block;>32 bytes Output</label>
      <div class=" row">
        <textarea type="text" rows="2" cols="40" class="input" id="output_bits2" placeholder="Output" name="output_bits2"></textarea>
        <div class="btn-group-vertical btn-group-toggle auto-key btn-group-sm" data-toggle="buttons">
          <label class="btn btn-secondary active" id="base64_2">
            <input type="radio" name="output2" id="base64_2" value="base64_2" checked> Base64
          </label>
          <label class="btn btn-secondary" id="raw2">
            <input type="radio" name="output2" id="raw2" value="raw2"> Raw
          </label>
        </div>
      </div>
      <div class="modal-body row">
      </div>
      <label style="color:white; padding-left: 20px;" display: block;>32 bytes Output</label>

      <div class=" row">
        <textarea type="text" rows="2" cols="40" class="input" id="output_bits3" placeholder="Output" name="output_bits3"></textarea>
        <div class="btn-group-vertical btn-group-toggle auto-key btn-group-sm" data-toggle="buttons">
          <label class="btn btn-secondary active" id="base64_3">
            <input type="radio" name="output3" id="base64_3" value="base64_3" checked> Base64
          </label>
          <label class="btn btn-secondary" id="raw3">
            <input type="radio" name="output3" id="raw3" value="raw3"> Raw
          </label>
        </div>
      </div>
      <div class="modal-body row">
      </div>
      <label style="color:white; padding-left: 20px;" display: block;>32 bytes Output</label>

      <div class=" row">
        <textarea type="text" rows="2" cols="40" class="input" id="output_bits4" placeholder="Output" name="output_bits4"></textarea>
        <div class="btn-group-vertical btn-group-toggle auto-key btn-group-sm" data-toggle="buttons">
          <label class="btn btn-secondary active" id="base64_4">
            <input type="radio" name="output4" id="base64_4" value="base64_4" checked> Base64
          </label>
          <label class="btn btn-secondary" id="raw4">
            <input type="radio" name="output4" id="raw4" value="raw4"> Raw
          </label>
        </div>
      </div>
    </div>

  </div>


</form>

<script type="text/javascript">

  $( document ).ready(function() {
    $('.iv').attr("disabled", "disabled");
  });

  $('input[type=radio][name=action]').change(function() {
    if (this.value == 'public') {
      $('#public_key').removeAttr("disabled");
      $('#hash_select').attr("disabled", "disabled");
      $('#block_cipher').attr("disabled", "disabled");
      $('.iv').attr("disabled", "disabled");
      $('.encryption_key').removeAttr("disabled");
    } else if (this.value == 'hash') {
      $('#hash_select').removeAttr("disabled");
      $('#public_key').attr("disabled", "disabled");
      $('#block_cipher').attr("disabled", "disabled");
      $('.iv').attr("disabled", "disabled");
      $('.encryption_key').attr("disabled", "disabled");
    } else if (this.value == 'cipher') {
      $('#block_cipher').removeAttr("disabled");
      $('#hash_select').attr("disabled", "disabled");
      $('#public_key').attr("disabled", "disabled");
      $('.iv').removeAttr("disabled");
      $('.encryption_key').removeAttr("disabled");

      if ($('#block_cipher').find(":selected").text() == 'des-ecb') {
        $('.iv').attr("disabled", "disabled");
      } else if ($('#block_cipher').find(":selected").text() == 'aes-128-ecb') {
        $('.iv').attr("disabled", "disabled");
      } else {
        $('.iv').removeAttr("disabled");
      }
    }
  });

  $('#block_cipher').on('change', function() {

    var cipher = $('#block_cipher').find(":selected").text();

    if (cipher == 'des-ecb') {
      $('.iv').attr("disabled", "disabled");
    } else if (cipher == 'aes-128-ecb') {
      $('.iv').attr("disabled", "disabled");
    } else {
      $('.iv').removeAttr("disabled");
    }
  });

  $("#encrypt").click(function(e) {

    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '/processor',
      data: $('form').serialize(),
      success: function(data) {

        $('#output_bits1').val('');
        $('#output_bits2').val('');
        $('#output_bits3').val('');
        $('#output_bits4').val('');


        $("#base64_1").attr("checked", true);
        $("#base64_2").attr("checked", true);
        $("#base64_3").attr("checked", true);
        $("#base64_4").attr("checked", true);

        $("#raw1").attr("checked", false);
        $("#raw2").attr("checked", false);
        $("#raw3").attr("checked", false);
        $("#raw4").attr("checked", false);


        $("#base64_1").prop("checked", true);
        $("#base64_2").prop("checked", true);
        $("#base64_3").prop("checked", true);
        $("#base64_4").prop("checked", true);

        $("#raw1").prop("checked", false);
        $("#raw2").prop("checked", false);
        $("#raw3").prop("checked", false);
        $("#raw4").prop("checked", false);

        $("#raw1").removeClass("active")
        $("#raw2").removeClass("active")
        $("#raw3").removeClass("active")
        $("#raw4").removeClass("active")

        $("#base64_1").addClass("active")
        $("#base64_2").addClass("active")
        $("#base64_3").addClass("active")
        $("#base64_4").addClass("active")


        $('#output_bits1').val(data.output1);
        $('#output_bits2').val(data.output2);
        $('#output_bits3').val(data.output3);
        $('#output_bits4').val(data.output4);


      },
      error: function(msg) {
        $('#output_bits1').html("Something went wrong with the encryption");
        $('#output_bits2').html("Something went wrong with the encryption");
        $('#output_bits3').html("Something went wrong with the encryption");
        $('#output_bits4').html("Something went wrong with the encryption");
      }
    });
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#auto-key1").click(function(e) {

    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '/test/random_number',
      data: ({
        size: 32
      }),
      success: function(data) {

        $("#encryption_key1").val(data.output);
      }
    });
  });


  $("#manual-key1").click(function() {
    $("#encryption_key1").val('');
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#auto-iv1").click(function(e) {

    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '/test/random_number',
      data: ({
        size: 16
      }),
      success: function(data) {

        $("#iv1").val(data.output);
      }
    });
  });

  $("#manual-iv1").click(function() {
    $("#iv1").val('');
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#auto-key2").click(function(e) {

    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '/test/random_number',
      data: ({
        size: 32
      }),
      success: function(data) {

        $("#encryption_key2").val(data.output);
      }
    });
  });


  $("#manual-key2").click(function() {
    $("#encryption_key2").val('');
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#auto-iv2").click(function(e) {

    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '/test/random_number',
      data: ({
        size: 16
      }),
      success: function(data) {

        $("#iv2").val(data.output);
      }
    });
  });

  $("#manual-iv2").click(function() {
    $("#iv2").val('');
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#auto-key3").click(function(e) {

    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '/test/random_number',
      data: ({
        size: 32
      }),
      success: function(data) {

        $("#encryption_key3").val(data.output);
      }
    });
  });


  $("#manual-key3").click(function() {
    $("#encryption_key3").val('');
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#auto-iv3").click(function(e) {

    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '/test/random_number',
      data: ({
        size: 16
      }),
      success: function(data) {

        $("#iv3").val(data.output);
      }
    });
  });

  $("#manual-iv3").click(function() {
    $("#iv3").val('');
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#auto-key4").click(function(e) {

    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '/test/random_number',
      data: ({
        size: 32
      }),
      success: function(data) {

        $("#encryption_key4").val(data.output);
      }
    });
  });


  $("#manual-key4").click(function() {
    $("#encryption_key4").val('');
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#auto-iv4").click(function(e) {

    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '/test/random_number',
      data: ({
        size: 16
      }),
      success: function(data) {

        $("#iv4").val(data.output);
      }
    });
  });

  $("#manual-iv4").click(function() {
    $("#iv4").val('');
  });

  $("#base64_1").click(function() {

    var choice = $('input[name=output]:checked').val();
    var isChecked = $('#base64_1').prop('checked');
    $("#base64_1").prop("checked", true);
    $("#raw1").prop("checked", false);

    if (isChecked == false) {
      $("#output_bits1").val(btoa($("#output_bits1").val()));
    }
  });

  $("#raw1").click(function() {

    var isChecked = $('#raw1').prop('checked');
    $("#raw1").prop("checked", true);
    $("#base64_1").prop("checked", false);

    if (isChecked == false) {
      $("#output_bits1").val(atob($("#output_bits1").val()));
    }
  });

  $("#base64_2").click(function() {

    var choice = $('input[name=output]:checked').val();
    var isChecked = $('#base64_2').prop('checked');
    $("#base64_2").prop("checked", true);
    $("#raw2").prop("checked", false);

    if (isChecked == false) {
      $("#output_bits2").val(btoa($("#output_bits2").val()));
    }
  });

  $("#raw2").click(function() {

    var isChecked = $('#raw2').prop('checked');
    $("#raw2").prop("checked", true);
    $("#base64_2").prop("checked", false);

    if (isChecked == false) {
      $("#output_bits2").val(atob($("#output_bits2").val()));
    }
  });

  $("#base64_3").click(function() {

    var choice = $('input[name=output]:checked').val();
    var isChecked = $('#base64_3').prop('checked');
    $("#base64_3").prop("checked", true);
    $("#raw3").prop("checked", false);

    if (isChecked == false) {
      $("#output_bits3").val(btoa($("#output_bits3").val()));
    }
  });

  $("#raw3").click(function() {

    var isChecked = $('#raw3').prop('checked');
    $("#raw3").prop("checked", true);
    $("#base64_3").prop("checked", false);

    if (isChecked == false) {
      $("#output_bits3").val(atob($("#output_bits3").val()));
    }
  });

  $("#base64_4").click(function() {

    var choice = $('input[name=output]:checked').val();
    var isChecked = $('#base64_4').prop('checked');
    $("#base64_4").prop("checked", true);
    $("#raw4").prop("checked", false);

    if (isChecked == false) {
      $("#output_bits4").val(btoa($("#output_bits4").val()));
    }
  });

  $("#raw4").click(function() {

    var isChecked = $('#raw4').prop('checked');
    $("#raw4").prop("checked", true);
    $("#base64_4").prop("checked", false);

    if (isChecked == false) {
      $("#output_bits4").val(atob($("#output_bits4").val()));
    }
  });

</script>

@endsection
