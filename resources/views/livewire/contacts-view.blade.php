
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
                            @foreach($headers as $k => $head)
                                <th> 
                                    <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $head }}
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach($headers as $key => $choice)
                                        <a class="dropdown-item" wire:click="filter({{ $k }} , {{ $key }})">{{ $choice }}</a>
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
                            <td> 
                                @if($row == 'title' && $source != 'title')
                                {{ $contact[$source] }}
                                @elseif($source == 'title')
                                {{ $contact[$row] }}
                                @else
                                {{ $contact['title'] }}
                                @endif
                            </td>
                            <td>
                                @if($row == 'first_name' && $source != 'first_name')
                                {{ $contact[$source] }}
                                @elseif($source == 'first_name')
                                {{ $contact[$row] }}
                                @else
                                {{ $contact['first_name'] }}
                                @endif
                            </td>
                            <td>
                                @if($row == 'last_name' && $source != 'last_name')
                                {{ $contact[$source] }}
                                @elseif($source == 'last_name')
                                {{ $contact[$row] }}
                                @else
                                {{ $contact['last_name'] }}
                                @endif
                            </td>
                            <td>
                                @if($row == 'mobile' && $source != 'mobile')
                                {{ $contact[$source] }}
                                @elseif($source == 'mobile')
                                {{ $contact[$row] }}
                                @else
                                {{ $contact['mobile'] }}
                                @endif
                            </td>
                            <td>
                                @if($row == 'company_name' && $source != 'company_name')
                                {{ $contact[$source] }}
                                @elseif($source == 'company_name')
                                {{ $contact[$row] }}
                                @else
                                {{ $contact['company_name'] }}
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-warning" type="button" wire:click="showModalContact({{ $contact['id'] }})"> Update </button>
                                <button wire:click="deleteContact({{ $contact['id'] }})" class="btn btn-danger"> Delete </button>
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
