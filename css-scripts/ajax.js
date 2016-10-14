function executaScripts(){
    var telaAtiva = 'inicial';
	var xmlreq = CriaRequest();

	$('a').click(function(event){
		event.preventDefault();

        var id = $(this).attr('id');


        //nini gambiarra;
        if(id=="menu" || id=="proibido"){
            return;
        }
        if(id=="sair"){
            window.location.href = "../php/saida.php";
            return;
        }


		$('#section-'+telaAtiva+'').hide();
	    telaAtiva = id;
		$('#section-'+id).show();

        $("#msg-user-alert").css('display', 'none');
        $("#msg-user-sucess").css('display', 'none');
		document.getElementById("resultado").innerHTML=""; 
        document.getElementById("msg-user").innerHTML="";

	});



}

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

 function validarProduto(){
    
    
    var codigo = document.getElementById("inclurProduto-codigo").value;
    var validaCodigo = $('#inclurProduto-codigo');
    

    var nome = document.getElementById("inclurProduto-nome").value;
    var validaNome = $('#inclurProduto-nome');

    var preco = document.getElementById("inclurProduto-preco").value;
    var validaPreco = $('#inclurProduto-preco');

    var peso = document.getElementById("inclurProduto-peso").value;
    var validaPeso = $('#inclurProduto-peso');

    var cc = document.getElementById("inclurProduto-cc").value;
    var validaCc = $('#inclurProduto-cc');

    var cs = document.getElementById("inclurProduto-cs").value;
    var validaCs = $('#inclurProduto-cs');

    var so = document.getElementById("inclurProduto-sistema").value;

    var ad = document.getElementById("inclurProduto-ad").value;
    var descricao = document.getElementById("inclurProduto-descricao").value;

    var status = '';
    var success = 'success';
    var ver = true;

    if(!codigo.trim().length >0){
        ver = false;
       validaCodigo.removeClass(status);
       status = 'error';
       validaCodigo.addClass(status);
       
    }else {
        ver = true;
       validaCodigo.removeClass(status);
       status = 'success';
       validaCodigo.addClass(status);

    }

    if(!nome.trim().length >0){

        ver = false;
        validaNome.removeClass(status);
        status = "error";
        validaNome.addClass(status);
    }else{
        validaNome.removeClass(status);
        status = "success";
        validaNome.addClass(status);
    }

    if(!preco.trim().length >0){
        ver = false;
        validaPreco.removeClass(status);
        status = "error";
        validaPreco.addClass(status);
    }else{
        validaPreco.removeClass(status);
        status = "success";
        validaPreco.addClass(status);
    }

    if(!peso.trim().length >0){
        ver = false;
        validaPeso.removeClass(status);
        status = "error";
        validaPeso.addClass(status);
    }else{
        validaPeso.removeClass(status);
        status = "success";
        validaPeso.addClass(status);
    }

    if(!cc.trim().length >0){
        ver = false;
        validaCc.removeClass(status);
        status = "error";
        validaCc.addClass(status);
    }else{
        validaCc.removeClass(status);
        status = "success";
        validaCc.addClass(status);
    }

    if(!cs.trim().length >0){
        ver = false;
        validaCs.removeClass(status);
        status = "error";
        validaCs.addClass(status);
    }else{
        validaCs.removeClass(status);
        status = "success";
        validaCs.addClass(status);
    }


    if(ver){
        cadastrarProdutos(codigo,nome,preco,peso,cc,cs,so,ad,descricao);  
       validaCodigo.removeClass(status);
       validaNome.removeClass(status);
       validaPreco.removeClass(status);
       validaPeso.removeClass(status);
       validaCc.removeClass(status);
       validaCs.removeClass(status);

       status = 'success';
       
       validaCodigo.addClass(status);
       validaNome.addClass(status);
       validaPreco.addClass(status);
       validaPeso.addClass(status);
       validaCc.addClass(status);
       validaCs.addClass(status);

  


    }else{
        alert("Preencha os campos obrigatorios");
    }
 
        
        


}
    
    








$(document).ready(executaScripts);







