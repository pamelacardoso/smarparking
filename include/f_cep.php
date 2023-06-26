<script>    
        function limpa_formulário_cep() {
                document.getElementById('perfil_logradouro').value=("");

        }
        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('perfil_logradouro').value=(conteudo.logradouro);

            }
            else {
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }        
        function pesquisacep(valor) {
            //Nova variável "cep" somente com dígitos.
            var perfil_cep = valor.replace(/\D/g, '');
            //Verifica se campo cep possui valor informado.
            if (perfil_cep != "") {
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
                //Valida o formato do CEP.
                if(validacep.test(perfil_cep)) {
                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('perfil_rua').value="...";
                    //Cria um elemento javascript.
                    var script = document.createElement('script');
                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);
                }
                else {
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } 
            else {
                limpa_formulário_cep();
            }
        }
    </script>