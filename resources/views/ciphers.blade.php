@extends('layouts.app')
@section('content')


{{-- <form method="post" id="testUpload" class="form" action="{{ action('CiphersController@get_ciphers') }}" enctype="multipart/form-data"> --}}
<form autocomplete="off">

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

    {{-- <button class="btn btn-submit to-binary" style="color: #FFF; background-color: rgb(192,0,0);" type="submit"><span>To binary</span></button> --}}
    <textarea type="text" cols="50" id="obla" placeholder="Ciph"></textarea>

    <select id="myDropdown" class="js-example-basic-single" name="state"  style="width: 20%;">
        {{-- <option value="AL">Alabama</option>
      ...
    <option value="WY">Wyoming</option> --}}
    <option>plea</option>
    </select>

</form>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        // e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/ciphers',
            // data: $('form').serialize(),
            success: function(data) {

                for (var i = 0; i < data.output.length; i++) {

                    // $('<option>').val(data.output[i]).data("data-tokens",data.output[i]).text(data.output[i]).appendTo('#myDropdown');
                    $('<option>').val(data.output[i]).text(data.output[i]).appendTo('#myDropdown');
                    // $(#myDropdwn).select('data', {
                    //     id: data.output[i],
                    //     text: data.output[i]
                    // });
                    // $('#ciphers_out').html(data.output[i] + '\n');
                }
                // alert(data.output[2]);
                // alert(data.in_bit.slice());
            }
        });


             $('#obla').val("1010101010101010101010101010".toString().replace(/\d{8}(?=.)/g, '$& '));


        $('.js-example-basic-single').select2();

    });
</script>

@endsection
