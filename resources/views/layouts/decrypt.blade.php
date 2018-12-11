@extends('layouts.app')
@section('content')
<form method="post" id="textUpload" class="form" action="{{ action('DecryptController@upload') }}" enctype="multipart/form-data">
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
        <div class="col-md-6 text-center">
            @yield('fileOrText')
            <div id="myDec">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active" data-toggle="collapse" href="#collapseDec">
                        <input type="radio" name="encChoiceAES" id="AESdec" value='true' autocomplete="off" checked> AES-256-ECB
                    </label>
                    <label class="btn btn-secondary" data-toggle="collapse" href="#collapseDec2">
                        <input type="radio" name="encChoiceRSA" id="RSAdec" value='false' autocomplete="off"> RSA
                    </label>
                </div>
                <div class="accordion-group">
                    <div class="panel-collapse collapse show" id="collapseDec" style="text-align: center;">
                        <div class="card card-body" style="margin:auto; width: 70%; background-color: #d2cfcf;">
                            Decrypt @yield('fileOrText2') encrypted with AES-256-ECB.
                        </div>
                    </div>
                    <div class="panel-collapse collapse" id="collapseDec2" style="text-align: center;">
                        <div class="card card-body" style="margin:auto; width: 70%; background-color: #d2cfcf;">
                            Decrypt @yield('fileOrText2') encrypted with RSA-512.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 text-center">
            <div class="card" id="decInputFile">
                <div class="card-header">Encryption Key File (Max size 10KB)</div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="userDecryptionKeyFile" id="userDecryptionKeyFile" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Please upload a file. Size should not be more than 10KB.</small>
                    </div>
                </div>
            </div>
            <div class="card" id="decInputText" style="display: none;">
                <div class="card-header">Encryption Key Text (Max 128 characters)</div>
                <div class="form-group">
                    <textarea name="userDecryptionKeyText" id="userDecryptionKeyText" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div id="myDec2">
                <div class="btn-group btn-group-toggle" data-toggle="buttons" id="encOptions">
                    <label class="btn btn-secondary active" data-toggle="collapse" href="#collapseDecFile">
                        <input type="radio" name="encOptions" value="manualFile" id="decFile" autocomplete="off" checked>File-Key
                    </label>
                    <label class="btn btn-secondary" data-toggle="collapse" href="#collapseDecText">
                        <input type="radio" name="encOptions" value="manualText" id="decText" autocomplete="off">Text-Key
                    </label>
                </div>

                <div class="accordion-group">
                    <div class="panel-collapse collapse show" id="collapseDecFile" style="text-align: center;">
                        <div class="card card-body" style="margin:auto; width: 70%; background-color: #d2cfcf;">
                            Upload the key with which your @yield('fileOrText3') was encrypted as a file.
                        </div>
                    </div>
                    <div class="panel-collapse collapse" id="collapseDecText" style="text-align: center;">
                        <div class="card card-body" id="collapseDecTextInner" style="margin:auto; width: 70%; background-color: #d2cfcf;">
                            Upload the key with which your @yield('fileOrText3') was encrypted as text.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Submit Button --}}
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <button class="btn text-center" style="color: #FFF; background-color: rgb(192,0,0); border-radius: 20px;" type="submit">Submit</button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript" src="{{ URL::asset('js/decrypt.js') }}"></script>

@endsection
