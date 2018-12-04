@extends('layouts.decrypt')
@section('fileOrText')

<div class="card">
    <div class="card-header" id="fileDecCard">File (Max size 2MB)</div>
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="form-group" id="testform">
            <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a file. Size should not be more than 2MB.</small>
        </div>
    </div>
</div>
@endsection

@section('fileOrText2')
a file
@endsection

@section('fileOrText3')
file
@endsection
