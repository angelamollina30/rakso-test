<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                @if(Session::has('message'))
                <p class="alert alert-info"> {{ Session::get('message') }}</p> 
                @endif


                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Search</label>
                      <div class="col-sm-10">
                        <input class="form-control-plaintext"  type="text" wire:model.lazy="search_contacts" placeholder="search">
                      </div>
                    </div>
                    <div class="form-group row">
                        <a href="#" class="form form-control col-12" data-toggle="modal" data-target="#contactImport"> Upload Contacts </a>
                      </div>
                    
                <br>

                <table>
                    <thead> 
                        @foreach($headers as $head)
                            <th> 
                                <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $head }}
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach($headers as $choice)
                                    @if($choice != $head)
                                    <a class="dropdown-item" href="#">{{ $choice }}</a>
                                    @endif
                                    @endforeach

                                </div>
                                </div>
                            </th>
                        @endforeach
                        <th>  

                        </th>
                        <th> Actions </th>
                    </thead>
                    <tbody> 
                        @foreach($contacts as $contact)
                        <tr>
                        <td> {{ $contact->title }}</td>
                        <td> {{ $contact->first_name }}</td>
                        <td> {{ $contact->last_name }}</td>
                        <td> {{ $contact->mobile }}</td>
                        <td> {{ $contact->company_name }}</td>
                        <td>
                            <button class="btn btn-warning" type="button" wire.click="showModalContact({{$contact->id}})"> Update </button>
                            <button class="btn btn-danger" type="button" wire.click="deleteContact({{$contact->id}})"> Delete </button>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        @include('modals')
    </div>


</div>