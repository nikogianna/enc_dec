@extends('layouts.app')
@section('content')

<style>
    input {
    width: 2%;
    text-align: center;
  }
</style>

    <div class="container">
        <form method="post" id="textUpload" class="form" action="{{ action('TestController@upload') }}" enctype="multipart/form-data">
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
                <div class="col-md-12 text-center">
                    <input type="text" class="inputs" maxlength="1" name="in_bit[]">
                    <input type="text" class="inputs" maxlength="1" name="in_bit[]">
                    <input type="text" class="inputs" maxlength="1" name="in_bit[]">
                    <input type="text" class="inputs" maxlength="1" name="in_bit[]">
                    <input type="text" class="inputs" maxlength="1" name="in_bit[]">
                    <input type="text" class="inputs" maxlength="1" name="in_bit[]">
                    <input type="text" class="inputs" maxlength="1" name="in_bit[]">
                    <input type="text" class="inputs" maxlength="1" name="in_bit[]">
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-submit text-center" style="color: #FFF; background-color: rgb(192,0,0); border-radius: 20px;" type="submit">Encrypt</button>
                    </div>
                </div>
            </div>

            <div class="modal-body row">
                <div class="col-md-12 text-center">
                    <input type="text" class="outputs" maxlength="1" id="out_bit1" name="out_bit[]">
                    <input type="text" class="outputs" maxlength="1" id="out_bit2" name="out_bit[]">
                    <input type="text" class="outputs" maxlength="1" id="out_bit3" name="out_bit[]">
                    <input type="text" class="outputs" maxlength="1" id="out_bit4" name="out_bit[]">
                    <input type="text" class="outputs" maxlength="1" id="out_bit5" name="out_bit[]">
                    <input type="text" class="outputs" maxlength="1" id="out_bit6" name="out_bit[]">
                    <input type="text" class="outputs" maxlength="1" id="out_bit7" name="out_bit[]">
                    <input type="text" class="outputs" maxlength="1" id="out_bit8" name="out_bit[]">
                </div>
            </div>

        </form>
    </div>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e) {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/test',
            data: $('form').serialize(),
            success: function(data) {
                alert(data.success);
            }
        });
    });
</script>

<script type="text/javascript" src="{{ URL::asset('js/test.js') }}"></script>

@endsection
