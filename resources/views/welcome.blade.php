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
                <div class="button1" id="button1" onclick="location.href='{{ url('/encrypt_text') }}'">
                    <p>Encrypt Text</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="container">
                <div class="button2" id="button2" onclick="location.href='{{ url('/encrypt_file') }}'">
                    <p>Encrypt File</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="container">
                <div class="button3" id="button3" onclick="location.href='{{ url('/decrypt_text') }}'">
                    <p>Decrypt Text</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="container">
                <div class="button4" id="button4" onclick="location.href='{{ url('/decrypt_file') }}'">
                    <p>Decrypt File</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/welcome.js') }}"></script>
@endsection
