 function CriaRequest() {
     try{
         request = new XMLHttpRequest();        
     }catch (IEAtual){
         
         try{
             request = new ActiveXObject("Msxml2.XMLHTTP");       
         }catch(IEAntigo){
         
             try{
                 request = new ActiveXObject("Microsoft.XMLHTTP");          
             }catch(falha){
                 request = false;
             }
         }
     }
     
     if (!request) 
         alert("Seu Navegador não suporta Ajax!");
     else
         return request;
 }

 function login(){
    var usuario = document.getElementById("usuario").value;
    var senha = document.getElementById("senha").value;
    var xmlreq = CriaRequest();





     xmlreq.open('GET','../php/user/login.php?usuario='+usuario+'&senha='+senha,true);


         xmlreq.onreadystatechange = function(){

         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
             if (xmlreq.readyState == 4) {

                 // Verifica se o arquivo foi encontrado com sucesso
                 if (xmlreq.status == 200) {

                     if(xmlreq.responseText == true){

                         window.location.href = "inicial.php"
                         $("#login-alert").css('display', 'none');
                     }else{
                         $("#login-alert").css('display', 'block')
                         $("#mensagem").html('<strong>Erro! </strong>' + "Usuario ou senha incorretos");

                     }

                 }else{
                     $("#login-alert").css('display', 'block')
                     $("#mensagem").html('<strong>Erro! </strong>' + xmlreq.responseText);


                 }
            }
        };
        xmlreq.send(null);





 }


 function incluirCliente(){

     var result = document.getElementById("resultado");
     var documento = document.getElementById("incluirCliente-documento").value;
     var nome = document.getElementById("incluirCliente-nome").value;
     var razao = document.getElementById("incluirCliente-razao").value;
     var ie = document.getElementById("incluirCliente-ie").value;
     var telefone = document.getElementById("incluirCliente-telefone").value;
     var email = document.getElementById("incluirCliente-email").value;
     var cep = document.getElementById("incluirCliente-cep").value;
     var cidade = document.getElementById("incluirCliente-cidade").value;
     var bairro = document.getElementById("incluirCliente-bairro").value;
     var rua = document.getElementById("incluirCliente-rua").value;
     var numero = document.getElementById("incluirCliente-numero").value;
     var complemento = document.getElementById("incluirCliente-complemento").value;

     var xmlreq = CriaRequest();

     if(documento.trim().length >11) {
         if (!validarCNPJ(documento)){
             alert("CNPJ invalido");
            return;
         }
     }else{
         if (!validarCPF(documento)) {
             alert("CPF invalido");
             return;
         }
     }
     if(nome.trim().length <2){
         alert("O campo nome deve ser preenchido");
         return;
     }


    //xmlreq.open('GET','Banco/validarCnpj.php?cnpj='+cnpj,true);
     xmlreq.open('GET','../php/cliente/cadastrar.php?documento='+documento+'&nome='+nome+'&razao='+razao+'&ie='+ie+'&telefone='+telefone+'&email='+email+'&cep='+cep+'&cidade='+cidade+'&bairro='+bairro+'&rua='+rua+'&numero='+numero+'&complemento='+complemento,true);


     xmlreq.onreadystatechange = function(){

     // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)

         if (xmlreq.readyState == 4) {

             // Verifica se o arquivo foi encontrado com sucesso

             if (xmlreq.status == 200) {

                 if(xmlreq.responseText == true){

                     result.innerHTML = 'Cliente cadastrado com sucesso';

                 }else {

                     result.innerHTML = xmlreq.responseText;
                 }
             }else{

                 result.innerHTML = "Erro: " + xmlreq.statusText;

             }
         }

    };

        xmlreq.send(null);


 }

function cadastraUsuario(){
    $("#msg-user-sucess").css('display', 'none')
    $("#aviso-alert").css('display', 'none');
    var nome = document.getElementById("IncluirUsuario-nome").value;
    var usuario = document.getElementById("IncluirUsuario-usuario").value;
    var senha = document.getElementById("IncluirUsuario-senha").value;
    var confirma = document.getElementById("IncluirUsuario-confirma").value;
    var result = document.getElementById("msg-user-alert");
    var xmlreq = CriaRequest();
    var aviso = "";
    var campoObrigatorio = true;


    if(nome.trim().length<4){
        campoObrigatorio = false;
        aviso = aviso +  "Nome deve conter no minimo 4 carcateres<br>";

    }
    if(usuario.trim().length <4){
        aviso = aviso +  "Usuario deve conter no minimo 4 carcateres<br>";
        campoObrigatorio = false;

    }

    if(senha.trim().length<4) {
        aviso = aviso +  "Senha deve conter no minimo 4 carcateres<br>";
        campoObrigatorio = false;
    }

    if(senha !== confirma) {
        aviso = aviso +  "As senhas não conferem<br>";
        campoObrigatorio = false;
    }

    if(!campoObrigatorio){
        $("#msg-user-alert").css('display', 'block');
        $("#mensagem").html('<strong>'+  aviso + '</strong>');
        return;
    }else{
        $("#msg-user-alert").css('display', 'none');
    }




         xmlreq.open('GET','../php/user/cadastrar.php?nome='+nome+'&usuario='+usuario+'&senha='+senha+'&confirma='+confirma,true);


    xmlreq.onreadystatechange = function(){

        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)

        if (xmlreq.readyState == 4) {


            // Verifica se o arquivo foi encontrado com sucesso

            if (xmlreq.status == 200) {

                if(xmlreq.responseText == true){
                    $("#msg-user-sucess").css('display', 'block');
                    $("#mensagem-sucess").html('<strong>'+  'Cadastrado efetuado com sucesso' + '</strong>');
                }else{
                    $("#msg-user-alert").css('display', 'block');
                    $("#mensagem").html('<strong>'+  xmlreq.responseText + '</strong>');
                }

            }else{

                result.innerHTML = "Erro: " + xmlreq.statusText;

            }
        }


    };
        xmlreq.send(null);



}

function cadastrarProdutos(codigo,nome,preco,peso,cc,cs,so,ad,descricao){
    var result = document.getElementById("resultado");

    var xmlreq = CriaRequest();











    xmlreq.open('GET','Banco/incluir.php?incluirCodigo='+codigo+'&incluirNome='+nome+'&incluirDescricao='+descricao+'&incluirPreco='+preco+'&incluirPeso='+peso+'&incluirCc='+cc+'&incluirCs='+cs+'&incluirAd='+ad+'&incluirSistema='+so,true);

    xmlreq.onreadystatechange = function(){



     // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)

         if (xmlreq.readyState == 4) {



             // Verifica se o arquivo foi encontrado com sucesso

             if (xmlreq.status == 200) {

                 result.innerHTML = xmlreq.responseText;

             }else{

                 result.innerHTML = "Erro: " + xmlreq.statusText;

             }

         }

    };

        xmlreq.send(null);





 }







 function deletaProduto(codigo){


    var result = document.getElementById("resultado");

    var xmlreq = CriaRequest();

    alert(codigo);

    xmlreq.open("GET", "Banco/deletar.php?delCodigo="+ codigo, true); 




         xmlreq.onreadystatechange = function(){

         

         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)

             if (xmlreq.readyState == 4) {

                 // Verifica se o arquivo foi encontrado com sucesso

                 if (xmlreq.status == 200) {

                        result.innerHTML = xmlreq.responseText;

                 }else{

                     result.innerHTML = "Erro: " + xmlreq.statusText;

                 }

            }

        };

        xmlreq.send(null);



     

        

 }



 function deletarUsuario(id){
     if(!confirm("Tem certeza que desaja excluir este usuario "))
         return;

    var result = document.getElementById("resultado");
    var xmlreq = CriaRequest();


    xmlreq.open("GET", "../php/user/deletar.php?id="+ id, true);




         xmlreq.onreadystatechange = function(){

         

         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)

             if (xmlreq.readyState == 4) {

                 

                 // Verifica se o arquivo foi encontrado com sucesso

                 if (xmlreq.status == 200) {

                     if(xmlreq.responseText){
                         result.innerHTML = "Usuario deletado com sucesso";
                     }else{
                         result.innerHTML = "Usuario não encontrado";
                     }

                 }else{

                     result.innerHTML = "Erro: " + xmlreq.statusText;

                 }

            }

        };

        xmlreq.send(null);



     

        

 }



 function deletarCliente(id){
     if(!confirm("Tem certeza que desaja excluir este usuario "))
         return;

     var result = document.getElementById("resultado");
     var xmlreq = CriaRequest();


     xmlreq.open("GET", "../php/cliente/deletar.php?id="+ id, true);




     xmlreq.onreadystatechange = function(){



         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)

         if (xmlreq.readyState == 4) {



             // Verifica se o arquivo foi encontrado com sucesso

             if (xmlreq.status == 200) {

                 if(xmlreq.responseText){
                     result.innerHTML = "Usuario deletado com sucesso";
                 }else{
                     result.innerHTML = "Usuario não encontrado";
                 }

             }else{

                 result.innerHTML = "Erro: " + xmlreq.statusText;

             }

         }

     };

     xmlreq.send(null);







 }






 function buscaProduto() {

  


     
     // Declaração de Variáveis

     var nome   = document.getElementById("listarProduto-nome").value;

     var codigo   = document.getElementById("listarProduto-codigo").value;

     var result = document.getElementById("resultado");

     var xmlreq = CriaRequest();

     // Iniciar uma requisição

     //arrumar teste testa se os dois campos estão prenchidos caso sim esvazia a variavel 

     if(nome.length >0 && codigo.length >0){

        xmlreq.open("GET", "Banco/erro.php", true);

    }else if(nome.length>0){

        xmlreq.open("GET", "Banco/buscaNome.php?listNome=" + nome, true);

    }else if(codigo.length > 0){

        xmlreq.open("GET", "Banco/buscaCodigo.php?listCodigo=" + codigo, true);

    }else{
        xmlreq.open("GET", "Banco/buscaTodos.php", true);

    } 



     // Exibi a imagem de progresso

     result.innerHTML = '<img src="b.gif"/>';




     // Atribui uma função para ser executada sempre que houver uma mudança de ado

     xmlreq.onreadystatechange = function(){

         

         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)

         if (xmlreq.readyState == 4) {

             

             // Verifica se o arquivo foi encontrado com sucesso

             if (xmlreq.status == 200) {

                 result.innerHTML = xmlreq.responseText;

             }else{

                 result.innerHTML = "Erro: " + xmlreq.statusText;

             }

         }

     };

     xmlreq.send(null);

 }

 //scrpt para buscar os usuarios cadastrados no sistema
function buscaUsuario(){

     

     // Declaração de Variáveis
    var id   = document.getElementById("listarUsuario-id").value;

    var usuario   = document.getElementById("listarUsuario-usuario").value;
    
    var nome   = document.getElementById("listarUsuario-nome").value;

   

     var result = document.getElementById("resultado");

     var xmlreq = CriaRequest();





     // Iniciar uma requisição

     //arrumar teste testa se os dois campos estão prenchidos caso sim esvazia a variavel 

    if(id.trim().length >0 && nome.trim().length==0 && usuario.trim().length==0){

        xmlreq.open("GET", "../php/user/listar.php?id=" + id, true);
        
    }else if (nome.trim().length > 0 && usuario.trim().length==0 && id.trim().length == 0) {
        xmlreq.open("GET", "../php/user/listar.php?nome=" + nome, true);

    }else if (usuario.trim().length > 0 && nome.trim().length==0 && id.trim().length == 0) {
         xmlreq.open("GET", "../php/user/listar.php?usuario=" + usuario, true);

    }else if(usuario.trim().length == 0 && nome.trim().length==0 && id.trim().length == 0){
            xmlreq.open("GET", "../php/user/listar.php",true);
         
    }else{
        xmlreq.open("GET", "Banco/erro.php", true);
       
    }



     // Exibi a imagem de progresso

    // result.innerHTML = '<img src="img/b.gif"/>';




     // Atribui uma função para ser executada sempre que houver uma mudança de ado

     xmlreq.onreadystatechange = function(){

         

         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)

         if (xmlreq.readyState == 4) {

             

             //Verifica se o arquivo foi encontrado com sucesso

             if (xmlreq.status == 200) {

                result.innerHTML = xmlreq.responseText;

             }else{
                 result.innerHTML = "Erro: " + xmlreq.statusText;

             }

         }

     };

     xmlreq.send(null);

}


 //scrpt para buscar os clientes cadastrados no sistema
 function buscaCliente(){



     // Declaração de Variáveis
     var id   = document.getElementById("listarCliente-id").value;
     var documento   = document.getElementById("listarCliente-documento").value;
     var nome   = document.getElementById("listarCliente-nome").value;
     var razao = document.getElementById("listarCliente-razao").value;
     var result = document.getElementById("resultado");

     var xmlreq = CriaRequest();





     // Iniciar uma requisição

     //arrumar teste testa se os dois campos estão prenchidos caso sim esvazia a variavel

     if(id.trim().length >0 && nome.trim().length==0 && documento.trim().length==0 && razao.trim().length==0){
         xmlreq.open("GET", "../php/cliente/listar.php?id=" + id, true);

     }else if (documento.trim().length > 0 && nome.trim().length==0 && id.trim().length == 0 && razao.trim().length==0) {
         xmlreq.open("GET", "../php/cliente/listar.php?documento=" + documento, true);

     }else if (nome.trim().length > 0 && razao.trim().length==0 && id.trim().length == 0 && documento.trim().length==0) {
         xmlreq.open("GET", "../php/cliente/listar.php?nome=" + nome, true);

     }else if (razao.trim().length > 0 && nome.trim().length==0 && id.trim().length == 0 && documento.trim().length==0) {
         xmlreq.open("GET", "../php/cliente/listar.php?razao=" + razao, true);

     }else{
         xmlreq.open("GET", "../php/erro.php", true);

     }



     // Exibi a imagem de progresso

     // result.innerHTML = '<img src="img/b.gif"/>';




     // Atribui uma função para ser executada sempre que houver uma mudança de ado

     xmlreq.onreadystatechange = function(){



         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)

         if (xmlreq.readyState == 4) {



             //Verifica se o arquivo foi encontrado com sucesso

             if (xmlreq.status == 200) {

                 result.innerHTML = xmlreq.responseText;

             }else{
                 result.innerHTML = "Erro: " + xmlreq.statusText;

             }

         }

     };

     xmlreq.send(null);

 }

 function validarCNPJ(cnpj) {

     cnpj = cnpj.replace(/[^\d]+/g,'');

     if(cnpj == '') return false;

     if (cnpj.length != 14)
         return false;

     // Elimina CNPJs invalidos conhecidos
     if (cnpj == "00000000000000" ||
         cnpj == "11111111111111" ||
         cnpj == "22222222222222" ||
         cnpj == "33333333333333" ||
         cnpj == "44444444444444" ||
         cnpj == "55555555555555" ||
         cnpj == "66666666666666" ||
         cnpj == "77777777777777" ||
         cnpj == "88888888888888" ||
         cnpj == "99999999999999")
         return false;

     // Valida DVs
     tamanho = cnpj.length - 2
     numeros = cnpj.substring(0,tamanho);
     digitos = cnpj.substring(tamanho);
     soma = 0;
     pos = tamanho - 7;
     for (i = tamanho; i >= 1; i--) {
         soma += numeros.charAt(tamanho - i) * pos--;
         if (pos < 2)
             pos = 9;
     }
     resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
     if (resultado != digitos.charAt(0))
         return false;

     tamanho = tamanho + 1;
     numeros = cnpj.substring(0,tamanho);
     soma = 0;
     pos = tamanho - 7;
     for (i = tamanho; i >= 1; i--) {
         soma += numeros.charAt(tamanho - i) * pos--;
         if (pos < 2)
             pos = 9;
     }
     resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
     if (resultado != digitos.charAt(1))
         return false;

     return true;

 }

 function validarCPF(strCPF) {
     var Soma;
     var Resto;
     Soma = 0;
     if (strCPF == "00000000000") return false;

     for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
     Resto = (Soma * 10) % 11;

     if ((Resto == 10) || (Resto == 11))  Resto = 0;
     if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

     Soma = 0;
     for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
     Resto = (Soma * 10) % 11;

     if ((Resto == 10) || (Resto == 11))  Resto = 0;
     if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
     return true;
 }
 var strCPF = "12345678909";
 alert(validarCPF(strCPF));