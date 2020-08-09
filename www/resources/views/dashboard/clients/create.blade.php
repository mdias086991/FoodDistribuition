@extends('dashboard.home')

@section('content_dash')
    <section class="form-client-add">
        <div class="text-form-create">
            <h3>Cadastrar novo cliente</h3>
        </div>
        <form action="{{route('store')}}">
            @csrf @method('POST')
            <div class="form-client">
                <div class="form-group">
                    <label for="company_name">Nome da empresa</label>
                    <input type="text" name="company_name" id="company_name" required>
                </div>
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="number" name="cnpj" id="cnpj" maxlength="18" required>
                </div>
                <div class="form-group">
                    <label for="phone">Telefone</label>
                    <input type="tel" name="phone" id="phone" maxlength="15" required>
                </div>
                <div class="form-group">
                    <label for="name_responsible">Nome do Responsavel</label>
                    <input type="text" name="name_responsible" id="name_responsible" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
            </div>
            <div class="form-address">
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="number" name="cep" id="cep" maxlength="9" required>
                    <p class="btn btn-primary" id="search">Buscar</p>
                </div>
                <div class="form-group">
                    <label for="patio">Logradouro</label>
                    <input type="text" name="patio" id="patio" readonly>
                </div>
                <div class="form-group">
                    <label for="neighborhood">Bairro</label>
                    <input type="text" name="neighborhood" id="neighborhood" readonly>
                </div>
                <div class="form-group">
                    <label for="number">Numero</label>
                    <input type="number" name="number" id="number" required>
                </div>
                <div class="form-group">
                    <label for="city">Cidade</label>
                    <input type="text" name="city" id="city" readonly>
                </div>
                <div class="form-group">
                    <label for="state">Estado</label>
                    <input type="text" name="state" id="state" readonly>
                </div>
                <div class="form-group">
                    <label for="status">status</label>
                    <input type="checkbox" name="status" id="status" required>
                </div>
            </div>
            <button class="btn btn-warning" type="submit">Enviar</button>
        </form>
    </section>
@endsection