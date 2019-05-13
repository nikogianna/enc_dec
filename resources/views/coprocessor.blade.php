@extends('layouts.app')
@section('content')

<style>
  #iv[disabled=disabled]
{
    background-color: #D3D3D3;
}
#encryption_key[disabled=disabled]
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

  <div class="modal-body row">
  </div>



  <div class="modal-body row">

    <div class="col-md-4 text-center bun2">
      <textarea type="text" cols="20" class="input" maxlength="8" id="input_bits1" placeholder="0x00000000" name="input_bits1"></textarea>
      <div class="modal-body row">
      </div>
      <textarea type="text" cols="20" class="input" maxlength="8" id="input_bits" placeholder="0x00000000" name="input_bits2"></textarea>
      <div class="modal-body row">
      </div>
      <textarea type="text" cols="20" class="input" maxlength="8" id="input_bits" placeholder="0x00000000" name="input_bits3"></textarea>
      <div class="modal-body row">
      </div>
      <textarea type="text" cols="20" class="input" maxlength="8" id="input_bits" placeholder="0x00000000" name="input_bits4"></textarea>

    </div>

    <div class="col-md-4 text-center bun2">
      <textarea type="text" rows="2" cols="50" class="input" maxlength="512" id="encryption_key" placeholder="Encryption Key" name="encryption_key"></textarea>
      <div class="btn-group btn-group-toggle auto-key" data-toggle="buttons">
        <label class="btn btn-secondary active" id="manual-key">
          <input type="radio" id="manual-key" checked> Text Key
        </label>
        <label class="btn btn-secondary" id="auto-key">
          <input type="radio" id="auto-key"> Random Key
        </label>
      </div>

      <div class="modal-body row">
      </div>
      <textarea type="text" rows="1" cols="50" class="input" maxlength="16" id="iv" placeholder="Input IV, if required by block cipher" name="iv"></textarea>
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active" id="manual-iv">
          <input type="radio" id="manual-iv" checked> Text IV
        </label>
        <label class="btn btn-secondary" id="auto-iv">
          <input type="radio" id="auto-iv"> Random IV
        </label>
      </div>

      <div class="modal-body row">
      </div>
      <div class="text-center">
        <div>
          <input type="radio" name="action" value="cipher" checked />
          <label for="cipher" style="color:white;" display: block;>Block Cipher</label>
          <select id="block_cipher" class="dropdown" name="block_cipher">
            <option>aes-128-cbc</option>
            <option>aes-128-ecb</option>
            <option>aes-128-cfb</option>
          </select>
        </div>

        <div>
          <input type="radio" name="action" value="public" />
          <label for="public" style="color:white;">Assymetric (RSA)</label>
        </div>
        <div>
          <input type="radio" name="action" value="hash" />
          <label for="hash" style="color:white;">Hashing</label>
          <select id="hash_select" class="dropdown" name="hash_select" disabled>
            <option>md5</option>
            <option>sha512</option>
            <option>sha3-512</option>
            <option>tiger192,4</option>
            <option>haval256,5</option>
          </select>
        </div>
      </div>
      <div class="modal-body row">
      </div>
      <button class="btn btn-submit next-button" id="encrypt" type="submit">Encrypt</button>
    </div>

    <div class="col-md-4 text-center bun2">
      <div class="modal-body row">
      </div>
      <div class="modal-body row">
      </div>
      <div class="modal-body row">
      </div>
      <textarea type="text" rows="4" cols="50" class="input" id="output_bits" placeholder="Output" name="output_bits"></textarea>
      <div class="btn-group btn-group-toggle auto-key" data-toggle="buttons">
        <label class="btn btn-secondary active" id="base64">
          <input type="radio" name="output" id="base64" value="base64" checked> Base64
        </label>
        <label class="btn btn-secondary" id="raw">
          <input type="radio" name="output" id="raw" value="raw"> Raw
        </label>
      </div>
    </div>

  </div>


</form>

<script type="text/javascript">
  $('input[type=radio][name=action]').change(function() {
    if (this.value == 'public') {
      $('#public_key').removeAttr("disabled");
      $('#hash_select').attr("disabled", "disabled");
      $('#block_cipher').attr("disabled", "disabled");
      $('#iv').attr("disabled", "disabled");
      $('#encryption_key').removeAttr("disabled");
    } else if (this.value == 'hash') {
      $('#hash_select').removeAttr("disabled");
      $('#public_key').attr("disabled", "disabled");
      $('#block_cipher').attr("disabled", "disabled");
      $('#iv').attr("disabled", "disabled");
      $('#encryption_key').attr("disabled", "disabled");
    } else if (this.value == 'cipher') {
      $('#block_cipher').removeAttr("disabled");
      $('#hash_select').attr("disabled", "disabled");
      $('#public_key').attr("disabled", "disabled");
      $('#iv').removeAttr("disabled");
      $('#encryption_key').removeAttr("disabled");

    }
  });


  $("#encrypt").click(function(e) {

    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: '/processor',
      data: $('form').serialize(),
      success: function(data) {

        $('#output_bits').val('');

        $("#base64").attr("checked", true);
        $("#raw").attr("checked", false);

        $("#base64").prop("checked", true);
        $("#raw").prop("checked", false);
        $("#raw").removeClass("active")
        $("#base64").addClass("active")


        $('#output_bits').val(data.output);


      },
      error: function(msg) {
        $('#output_bits').html("Something went wrong with the encryption");


      }
    });
  });

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
      data: ({
        size: 32
      }),
      success: function(data) {

        $("#encryption_key").val(data.output);
      }
    });
  });


  $("#manual-key").click(function() {
    $("#encryption_key").val('');
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
      data: ({
        size: 16
      }),
      success: function(data) {

        $("#iv").val(data.output);
      }
    });
  });

  $("#manual-iv").click(function() {
    $("#iv").val('');
  });

  $("#base64").click(function() {

    var choice = $('input[name=output]:checked').val();
    var isChecked = $('#base64').prop('checked');
    $("#base64").prop("checked", true);
    $("#raw").prop("checked", false);

    // if (isChecked) {
    //   alert(choice);
    // }
    if (isChecked == false) {
      $("#output_bits").val(btoa($("#output_bits").val()));
    }

    // $("#base64").prop("checked", true);
    // $("#raw").prop("checked", false);
    // $("#raw").removeClass( "active" )
    // $("#base64").addClass( "active" )
    // $('input[name=output]:checked').val('base64e');


  });

  $("#raw").click(function() {

  var isChecked = $('#raw').prop('checked');
    $("#raw").prop("checked", true);
    $("#base64").prop("checked", false);

    // if (isChecked) {
    //   alert(choice);
    // }
    if (isChecked == false) {
    $("#output_bits").val(atob($("#output_bits").val()));
  }

    // $("#base64").prop("checked", false);
    // $("#raw").prop("checked", true);
    // $("#raw").addClass( "active" )
    // $("#base64").removeClass( "active" )
    // $('input[name=output]:checked').val('raw');

  });
</script>

{{-- <script type="text/javascript" src="{{ URL::asset('js/test.js') }}"></script> --}}


@endsection
