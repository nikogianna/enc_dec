@extends('layouts.app')
@section('content')

<link href="{{ asset('css/ama.css') }}" rel="stylesheet">

<link rel="stylesheet" href="//brick.a.ssl.fastly.net/Roboto:400" />

<div class="container">

    <div class="modal-body row">
    </div>
    <div class="modal-body row">
    </div>
    <div class="modal-body row">
    </div>
    <div class="modal-body row">
    </div>
    <div class="modal-body row">
        <div class="col-md-3">
            <div class="container">
                <div class="button1 buttonC" id="button1" onclick="location.href='{{ url('/encrypt_text') }}'">
                    <p class="button-text" style="color:red;">Encrypt Text</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="container">
                <div class="button2 buttonC" id="button2" onclick="location.href='{{ url('/decrypt_text') }}'">
                    <p class="button-text">Decrypt Text</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="container">
                <div class="button3 buttonC" id="button3" onclick="location.href='{{ url('/encrypt_file') }}'">
                    <p class="button-text">Encrypt File</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="container">
                <div class="button4 buttonC" id="button4" onclick="location.href='{{ url('/decrypt_file') }}'">
                    <p class="button-text">Decrypt File</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-body row">
    </div>
    <div class="modal-body row">
    </div>
    <div class="modal-body row">
      {{-- <div class="col-md-5"> --}}
          {{-- <div class="container"> --}}
              <div class="button5 buttonC" id="button5" onclick="location.href='{{ url('/processor') }}'">
                  <p class="button-text" style="color:red;">Simulation</p>
              </div>
          {{-- </div> --}}
      {{-- </div> --}}
    </div>
</div>
<script src="{{ asset('js/welcome.js') }}"></script>
@endsection
