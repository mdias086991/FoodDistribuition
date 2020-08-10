@extends('dashboard.home')

@section('content_dash')
    <section class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card" style="width: 18rem;">
                <form method="post"  action="{{ route('edit.client', ['client' => $clients->id]) }}">
                    @method('POST')
                    @csrf
                    <div class="card-header">
                        <label for="">Cidade</label>
                        <input class="input_disable list-group-item" type="text" name="company_name" value="{{$clients->company_name}}" >
                    </div>
                    <ul class="list-group list-group-flush">
                        <label for="">CNPJ</label>
                        <input class="input_disable list-group-item" type="text" name="cnpj" value="{{$clients->cnpj}}" >
                        <label for="">Nome do responsavel</label>
                        <input class="input_disable list-group-item" type="text" name="name_responsible" value="{{$clients->name_responsible}}" >
                        <label for="">Telefone</label>
                        <input class="input_disable list-group-item" type="text" name="phone" value="{{$clients->phone}}" >
                        <label for="">Email</label>
                        <input class="input_disable list-group-item" type="text" name="email" value="{{$clients->email}}" >
                    </ul>
                <div class="card-body">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{route('delete', ['client' => $clients->id])}}" class="btn btn-danger">Apagar</a>
                </div>
                </form>
                
              </div>
        </div>
        <div class="col-md-6 col-sm-12">
            @foreach ($addresses as $address)
            {{-- {{dd($address)}} --}}
                <div class="card">
                    <div class="card-header">
                        Cidade: {{$address->city}}
                        <form method="post" class="delete_form" action="{{ route('address.delete', ['address' => $address->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Apagar</button>
                        </form>
                        @if ($address->status == 1)
                            <div class="alert alert-info"><span class="text-center">Endereço Principal</span>
                        @else
                        <form method="post" class="update_address" action="{{ route('address.update', ['address' => $address->id])}}">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-primary" type="submit">Tornar principal</button>
                        </form>
                        @endif
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$address->cep}}</li>
                            <li class="list-group-item">{{$address->state}}</li>
                            <li class="list-group-item">{{$address->neighborhood}}</li>
                            <li class="list-group-item">{{$address->patio}}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
                <div class="address-info">
                    
                    
                    
                </div>
                <p class="btn btn-success" id="addNew">Adicionar novo endereço</p>
        </div>
    </section>

    <script>
        let id_client = "{!! json_encode($clients->id) !!}"
        let html = ''
        $('#addNew').on('click', () => {
            console.log(id_client)
            html += `<form class="form-inline" method="post" action="{{ route('address.store') }}">`
                html += '@csrf'
                html += `<input id="id_client" name="id_client" value="${id_client}" hidden/>`
                html += '<div class="form-group" style="width: 100%">'
                    html+=' <input type="number" name="cep" id="cep_search" maxlength="9" required placeholder="CEP" style="marign: 10px"> '
                    html+='<a href="#"  onclick="searchCep()" class="btn btn-primary mb-2">Buscar</a>'
                html+='</div>'
                        
                html += '<div class="form-group mx-sm-3 mb-2">'
                    html+='<input type="text" class="form-control" id="patio" name="patio" placeholder="Logradouro">'
                html+='</div>'
                html += '<div class="form-group mx-sm-3 mb-2">'
                    html+='<input type="text" class="form-control" id="city" name="city" placeholder="Cidade">'
                html+='</div>'
                html += '<div class="form-group mx-sm-3 mb-2">'
                    html+='<input type="text" class="form-control" id="state" name="state" placeholder="Estado">'
                html+='</div>'
                html += '<div class="form-group mx-sm-3 mb-2">'
                    html+='<input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Bairro">'
                html+='</div>'
                html += '<div class="form-group mx-sm-3 mb-2">'
                    html+='<input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">'
                html+='</div>'
                html += '<div class="form-group mx-sm-3 mb-2">'
                    html+='<input type="text" class="form-control" id="number"  name="number" placeholder="Número">'
                html+='</div>'
                html += '<div class="form-group mx-sm-3 mb-2">'
                    html+='<input type="text" class="form-control" id="number"  name="status" value="1" style="visibility: hidden">'
                html+='</div>'
                html+='<button type="submit" class="btn btn-success">Salvar</button>'
            html+='</form>'

            $('.address-info').append(html);
            
        });

        function searchCep () {
            var numCep = $('#cep_search').val();
            var url = 'http://viacep.com.br/ws/'+ numCep +'/json/'

            $.ajax({
                url: url,
                type: 'get',
                dataType: "json",

                success: (data) => {
                    $('#patio').val(data.logradouro);
                    $('#neighborhood').val(data.bairro);
                    $('#city').val(data.localidade);
                    $('#state').val(data.uf);
                    $('#complemento').val(data.complemento);
                }
            });
        }

    </script>

    
@endsection