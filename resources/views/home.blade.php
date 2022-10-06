@extends('layouts.app')

@section('content')

<div class="modal-body">
    <form   method="POST" action="{{ route('import')}}" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
    <label for="date">Import Excel File</label>
        <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="fileData">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>

        </div>
    </div>
  
   
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    {{-- <button type="submit" wire:click.prevent="importContacts()" class="btn btn-success">Upload</button> --}}
    <button type="submit" class="btn btn-success">Upload</button>
</form>
</div>

@livewire('contacts-view')

@endsection
