@extends('layouts.app')
@section('content')

{{-- <form autocomplete="off"> --}}
{{-- <form method="post" id="testUpload" class="form" action="{{ action('TestController@decrypt') }}" enctype="multipart/form-data"> --}}
<form>

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

  <input type="hidden" name="cipher_select" value="0">

  <div class="someHeader"></div>

  <div class="row">

    <div class="col-md-4 text-center bun2">
      <textarea type="text" cols="50" class="input" maxlength="16" id="input_bits" placeholder="Input" name="input_bits"></textarea>
      <select id="cipher_select" class="js-example-basic-single" name="cipher_select">
        <option>Please Choose a Cipher</option>
      </select>
    </div>

    <div class="col-md-1 text-left bun">
      <button class="btn btn-submit next-button" id="binary" type="submit">Binary</button>
    </div>

    <div class="col-md-4 text-center">
      <div class="out">
        <div id="editor" name="editor" class="textarea2" style="background-color: #FFF;" contenteditable="true" data-text="Binary Input"></div>
        <input id="binary_input" name="binary_input" type="hidden" />
        <div class="someHeader2"></div>
      </div>
    </div>

    <div class="col-md-3 text-center">
      <textarea type="text" cols="35" class="inputs" id="key" placeholder="Encryption Key" name="key"></textarea>

      <div class="btn-group btn-group-toggle auto-key" data-toggle="buttons">
        <label class="btn btn-secondary active" id="manual-key">
          <input type="radio" id="manual-key" checked> Text Key
        </label>
        <label class="btn btn-secondary" id="auto-key">
          <input type="radio" id="auto-key"> Random Key
        </label>
      </div>

      <textarea type="text" cols="35" class="inputs" maxlength="16" id="iv" placeholder="IV" name="iv"></textarea>
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active" id="manual-iv">
          <input type="radio" id="manual-iv" checked> Text IV
        </label>
        <label class="btn btn-secondary" id="auto-iv">
          <input type="radio" id="auto-iv"> Random IV
        </label>
      </div>
    </div>

  </div>

  <div class="someHeader"></div>

  <div class="modal-body row">
    <div class="col-md-12 text-center">
      <button id="encrypt" class="btn btn-submit text-center" style="color: #FFF; background-color: rgb(192,0,0); border-radius: 20px;" type="submit">Encrypt</button>
      <button id="decrypt" class="btn btn-submit text-center" style="color: #FFF; background-color: rgb(192,0,0); border-radius: 20px;" type="submit">Decrypt</button>

      <div class="output">
        <textarea rows=3 cols=80 wrap=on class="inputs raw hide text-center" id="out_bit" name="out_bit"></textarea>
        <textarea rows=3 cols=80 wrap=on class="inputs hex hide text-center" id="out_bit2" name="out_bit2"></textarea>
        <textarea rows=3 cols=80 wrap=on class="inputs bin hide text-center" id="out_bit3" name="out_bit3"></textarea>
      </div>

      <select class="div-toggle" data-target=".output" name="output_choice">
        <option value="option1" data-show=".raw"> Base64 Output</option>
        <option value="option2" data-show=".hex"> ASCII Output</option>
        <option value="option3" data-show=".bin"> Binary Output</option>
        <select>
    </div>
  </div>
</form>

{{-- Convert to binary --}}
<script type="text/javascript">

</script>

{{-- Encrypt --}}
<script type="text/javascript">

</script>


{{-- Decrypt --}}
<script type="text/javascript">

</script>


<script type="text/javascript" src="{{ URL::asset('js/test.js') }}"></script>

@endsection
