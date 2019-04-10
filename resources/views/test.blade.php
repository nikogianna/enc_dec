@extends('layouts.app')
@section('content')


<style>

    .next-button {
  position: relative;
  text-align: center;
  border: none;

  height: 36px;
  line-height: 36px;
  padding: 0 1rem;

  color: #FFF;
  background-color: rgb(192,0,0);
}

.next-button::after {
  position: absolute;
  content: "";
  top: 0;
  right: 0;
  transform: translateX(95%);
  width: 0;
  height: 0;
  border-top: 18px solid transparent;
  border-bottom: 18px solid transparent;
  border-left: 16px solid rgb(192,0,0);
  border-right: 18px solid transparent;

}

/* button:hover{box-shadow:0px 0px 4px #fff;}
button:active{top:1px;} */

    .input {
    text-align: center;
  }

  .inputs {
  text-align: center;
}

  .hide {
  display: none;
}

.out {
  text-align: center;
  padding-top: 0%;
  /* padding-right: 40%; */
}

.someHeader {
    height: 50px;
}

.someHeader2 {
    height: 20px;
}

.big-btn {
        width: 200px;
        height: 40px;
    }

    .bun {
            padding-top: 8px;
            /* padding-right: 30px; */
        }

        .bun2 {
                padding-left: 30px;
            }

            .output {
                    border-radius: 20px;
                }

</style>

{{-- <div class="container"> --}}

{{-- <form autocomplete="off"> --}}
{{-- <form method="post" id="testUpload" class="form" action="{{ action('TestController@upload') }}" enctype="multipart/form-data"> --}}
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

    {{-- Input --}}
    {{-- <div class="container"> --}}
    <div class="someHeader"></div>

    <div class="row">

        <div class="col-md-4 text-center bun2">
            {{-- <div class="row"> --}}

            {{-- <div class="col-md-11"> --}}
            <textarea type="text" cols="50" class="input" maxlength="16" id="in_bit" placeholder="Input" name="in_bit"></textarea>
            <select id="myDropdown" class="js-example-basic-single" name="state">
                <option>Please Choose a Cipher</option>
            </select>
            {{-- </div> --}}
            {{-- <div class="col-md-11"> --}}

            {{-- </div> --}}
        </div>


        <div class="col-md-1 text-center bun">
            {{-- <div class="container"> --}}
            {{-- <div class="container"> --}}
            <button class="btn btn-submit next-button" id="binary" type="button">Binary</button>

            {{-- </div> --}}
        </div>
        {{-- </div> --}}
        {{-- <button class="btn btn-submit to-binary" style="color: #FFF; background-color: rgb(192,0,0);" type="submit"><span>To binary</span></button> --}}
        {{-- </div> --}}

        <div class="col-md-4 text-center">
            <div class="out">
                <textarea rows="3" cols="50" wrap="on" type="text" placeholder="Binary Output"></textarea>
                <div class="someHeader2"></div>
                <button class="btn btn-submit text-center" style="color: #FFF; background-color: rgb(192,0,0); border-radius: 20px;" type="submit">Encrypt</button>
                <button class="btn btn-submit text-center" style="color: #FFF; background-color: rgb(192,0,0); border-radius: 20px;" type="submit">Decrypt</button>
            </div>
            <div>
                {{-- <button class="btn btn-submit text-center big-btn" style="color: #FFF; background-color: rgb(192,0,0); border-radius: 20px;" type="submit">Encrypt</button> --}}
            </div>

        </div>

        <div class="col-md-3 text-center">
            <textarea type="text" cols="35" class="inputs" id="key" placeholder="Encryption Key" name="key"></textarea>
            <textarea type="text" cols="35" class="inputs" id="iv" placeholder="IV" name="iv"></textarea>
        </div>
    </div>

    {{-- </form> --}}
    {{-- Submit --}}
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                {{-- <button class="btn btn-submit text-center" style="color: #FFF; background-color: rgb(192,0,0); border-radius: 20px;" type="submit">Encrypt</button>
                <button class="btn btn-submit text-center" style="color: #FFF; background-color: rgb(192,0,0); border-radius: 20px;" type="submit">Decrypt</button> --}}
            </div>
        </div>
    </div>

    <div class="someHeader"></div>

    <div class="modal-body row">
        <div class="col-md-12 text-center">
            <div class="output">
                <textarea rows=3 cols=80 wrap=on class="outputs raw hide text-center" id="out_bit"></textarea>
                <textarea rows=3 cols=80 wrap=on class="outputs hex hide text-center" id="out_bit2"></textarea>
                <textarea rows=3 cols=80 wrap=on class="outputs bin hide text-center" id="out_bit3"></textarea>
            </div>

            <select class="div-toggle" data-target=".output">
                <option value="option1" data-show=".raw"> Raw Output</option>
                <option value="option2" data-show=".hex"> Hex Output</option>
                <option value="option3" data-show=".bin"> Bin Output</option>
                <select>
        </div>
    </div>
</form>

<script>
    $(document).on('change', '.div-toggle', function() {
        var target = $(this).data('target');
        var show = $("option:selected", this).data('show');
        $(target).children().addClass('hide');
        $(show).removeClass('hide');
    });
    $(document).ready(function() {
        $('.div-toggle').trigger('change');
    });
</script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#binary").click(function(e) {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/test',
            data: $('form').serialize(),
            success: function(data) {
                // $('[name="out_bit"]').val(data.in_bit.slice());
                // var output_length = data.in_bit.slice().length;
                // for (var i = 0; i < output_length; i++) {
                $('#out_bit').html(data.raw_output);
                $('#out_bit2').html(data.hex_output);
                $('#out_bit3').html(data.bin_output);


                // }
                // alert(output_length);
                // alert(data.in_bit.slice());
            }
        });
    });
</script>

<script type="text/javascript" src="{{ URL::asset('js/test.js') }}"></script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        $.ajax({
            type: 'POST',
            url: '/ciphers',
            // data: $('form').serialize(),
            success: function(data) {

                for (var i = 0; i < data.output.length; i++) {
                    $('<option>').val(data.output[i]).text(data.output[i]).appendTo('#myDropdown');
                }
            }
        });
        $('.js-example-basic-single').select2();
    });
</script>

@endsection
