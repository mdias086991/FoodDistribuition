$('#search').on('click', () => {
   var numCep = $('#cep').val();
   var url = 'https://viacep.com.br/ws/'+ numCep +'/json/'

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