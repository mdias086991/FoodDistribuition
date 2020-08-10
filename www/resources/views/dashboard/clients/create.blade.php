@extends('dashboard.home')

@section('content_dash')
    
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0 form">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 class="mb-4"><strong style="font-family:'Comfortaa', cursive">Cadastro de um novo cliente</strong></h2>
                
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="POST" action="{{route('store')}}">
                            @csrf @method('POST')
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Dados da empresa</strong></li>
                                <li id="personal"><strong>Dados do responsavel</strong></li>
                                <li id="payment"><strong>Endereço</strong></li>
                                <li id="confirm"><strong>Finalizar</strong></li>
                            </ul> <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Dados da empresa</h2> 
                                    <input type="text" name="company_name" id="company_name" required placeholder="Nome da empresa">
                                    <input type="text" name="cnpj" id="cnpj" required placeholder="CNPJ">
                                </div>  
                                <input type="button" name="next" class="next action-button" value="Próximo" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Dados do responsavel</h2>
                                    <input type="text" name="name_responsible" id="name_responsible" required placeholder="Nome do responsavel">
                                    <input type="tel" name="phone" id="phone" maxlength="15" required placeholder="Telefone">
                                    <input type="email" name="email" id="email" required placeholder="E-mail">
                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
                                <input type="button" name="next" class="next action-button" value="Próximo" />
                            </fieldset>
                            
                            
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Informações de endereço</h2>
                                    <input type="number" name="cep" id="cep" maxlength="9" required placeholder="CEP">
                                    <p class="btn btn-primary" id="search">Buscar</p>
                                    <input type="text" name="patio" id="patio" readonly placeholder="Logradouro">
                                    <input type="text" name="neighborhood" id="neighborhood" readonly placeholder="Bairro">
                                    <input type="number" name="number" id="number" required placeholder="Numero">
                                    <input type="text" name="city" id="city" readonly placeholder="Cidade">
                                    <input type="text" name="complemento" id="complemento" readonly placeholder="Complemento">
                                    <input type="text" name="state" id="state" readonly placeholder="Estado">
                                    <input type="number" name="status" id="status" required value="1" style="visibility: hidden">
                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
                                <input type="button" name="make_payment" class="next action-button" value="Comfirmar" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Sucesso</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>Cadastro efetuado com sucesso</h5>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
                                <button type="submit" class="btn btn-success">Finalizar cadastro</button> 
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#search').on('click', () => {
    var numCep = $('#cep').val();
    console.log(numCep);
   var url = 'http://viacep.com.br/ws/'+ numCep +'/json/'

   $.ajax({
       url: url,
       type: 'get',
       dataType: "json",

       success: (data) => {
           console.log(data);
           $('#patio').val(data.logradouro);
           $('#neighborhood').val(data.bairro);
           $('#city').val(data.localidade);
           $('#state').val(data.uf);
           $('#complemento').val(data.complemento);
       }
   });
});
</script>









{{-- <section class="form-client-add">
        <div class="text-form-create">
            <h3>Cadastrar novo cliente</h3>
        </div>
       
            
            <div class="form-client">
                <div class="form-group">
                    <label for="company_name">Nome da empresa</label>
                    <input type="text" name="company_name" id="company_name" required>
                </div>
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" required>
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
                    <input type="number" name="status" id="status" required>
                </div>
            </div>
            <button class="btn btn-warning" type="submit">Enviar</button>
        </form>
    </section> --}}
@endsection