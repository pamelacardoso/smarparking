

function limpa_formulário_cep() {
    document.getElementById('perfil_logradouro').value=("");
    document.getElementById('perfil_bairro').value=("");
    document.getElementById('perfil_municipio').value=("");
    document.getElementById('perfil_estado').value=("");
  
  }
  function meu_callback(conteudo) {
  if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('perfil_logradouro').value=(conteudo.logradouro);
    document.getElementById('perfil_bairro').value=(conteudo.bairro);
    document.getElementById('perfil_municipio').value=(conteudo.localidade);
    document.getElementById('perfil_estado').value=(conteudo.uf);
  
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
        document.getElementById('perfil_logradouro').value="...";
        //Cria um elemento javascript.
        var script = document.createElement('script');
        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ perfil_cep + '/json/?callback=meu_callback';
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

  const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
    }
  
    const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
    }
  
    const handleZipCode = (event) => {
    let input = event.target
    input.value = zipCodeMask(input.value)
    }
  
    const zipCodeMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{5})(\d)/,'$1-$2')
    return value
  }
  const input = document.getElementById("perfil_cpf");

  input.addEventListener("keyup", formatarCPF);
  
  function formatarCPF(e){
  
  var v=e.target.value.replace(/\D/g,"");
  
  v=v.replace(/(\d{3})(\d)/,"$1.$2");
  
  v=v.replace(/(\d{3})(\d)/,"$1.$2");
  
  v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
  
  e.target.value = v;
  
  } 