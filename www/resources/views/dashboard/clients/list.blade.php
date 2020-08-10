@extends('dashboard.home')

@section('content_dash')
    <div class="section-table-clients container">
        
        <div class="table-clients">
            <div class="text-table-clients">
                <h3>Seus clientes</h3>
            </div>
            <table id="example" class="table">
                <thead>
                  <tr>
                    <th scope="col">Nome da empresa</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Nome do Responsavel</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clients as $client)
                    <tr>
                      <th>{{$client->company_name}}</th>
                      <td>{{$client->cnpj}}</td>
                      <td>{{$client->name_responsible}}</td>
                      <td>{{$client->phone}}</td>
                      <td>{{$client->email}}</td>
                      <td>
                        <a class="btn btn-info" href="{{route('edit', ['client' => $client->id])}}">Ver</a>
                        <a class="btn btn-danger" href="{{route('delete', ['client' => $client->id])}}">apagar</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection