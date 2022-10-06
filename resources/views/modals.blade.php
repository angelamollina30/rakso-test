<div>

<div  wire:ignore.self  id="contactImport" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header">
                <h4>Import Contacts</h4>

            </div>

            <div class="modal-body">
                <form  enctype="multipart/form-data" method="POST" action="{{ route('import')}}"> 

                    {{ csrf_field() }}
                <div class="form-group">
                <label for="date">Import Excel File</label>
                    <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input"  id="fileData" name="fileData" wire:model="fileData">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>

                    </div>
                </div>
              
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" wire:click.prevent="importContacts" class="btn btn-success">Upload</button>
                {{-- <button type="submit" class="btn btn-success">Upload</button> --}}
            </form>
            </div>
        </div>
    </div>
    
</div>


<div  wire:ignore.self  id="updateContact" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header">
                <h4>Update Contact</h4>
               <form  enctype="multipart/form-data"> 
               @csrf 
            </div>

            <div class="modal-body">

                    <div class="row">
                        <div class="form-group col-12">
                            <label> Title </label>
                            <input type="text" class="form-control"  wire:model.defer="contact.title"   value=""  />
                            @error('contact.title')
                            <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group col-12">
                            <label> First Name </label>
                            <input type="text" class="form-control"  wire:model.defer="contact.first_name"   value=""  />
                            @error('contact.first_name')
                            <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group col-12">
                            <label> Last Name </label>
                            <input type="text" class="form-control"  wire:model.defer="contact.last_name"   value=""  />
                            @error('contact.last_name')
                            <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group col-12">
                            <label> Mobile </label>
                            <input type="text" class="form-control"  wire:model.defer="contact.mobile"   value=""  />
                            @error('contact.mobile')
                            <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group col-12">
                            <label> Company </label>
                            <input type="text" class="form-control"  wire:model.defer="contact.company_name"   value=""  />
                            @error('contact.company_name')
                            <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
                <button type="button" wire:click.prevent="updateContact" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
</div>