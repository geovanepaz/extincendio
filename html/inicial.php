<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css-scripts/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css-scripts/inicial.css">

<script type="text/javascript" src="../css-scripts/functions.js"></script>
 <script src="../css-scripts/jquery-3.1.0.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  


<!--  ===============================   validação de sessão  ========================================================== -->
 <?php require '../php/validasessao.php'; include 'nav.html'?>
<!--  =============================== ========================================================== -->
  <title>Geovane</title>

</head>

<body>
<main>
<!--  ===============================   Pagina Inicial ========================================================== -->
<section id="section-inicial">


</section>

<!--  =============================== Cadastro de produto ========================================================== -->

<section id="section-inclurProduto">

  <form class="form-horizontal" method="POST">

    <fieldset>



    <!-- Form Name -->

    <legend><strong>Cadastro de  produtos</strong></legend>



    <!-- Text input-->


    <div class="col-md-4" class="form-group">
    

      <label class="col-md-4 control-label" for="codigo">Codigo</label>  

      <div class="col-md-8">

      <input id="inclurProduto-codigo" name="inclurProduto-codigo" type="text" placeholder="Codigo produto" class="form-control input-md"> 

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="nome">Agente Extintor</label>  

      <div class="col-md-8">

      <input id="inclurProduto-agente" name="inclurProduto-agente" type="text" placeholder="Agente Extintor" class="form-control input-md"> 

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="Carga">Carga</label>  

      <div class="col-md-8">

      <input id="inclurProduto-carga" name="inclurProduto-carga" type="text" placeholder="Carga" class="form-control input-md">

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="valor">Valor</label>  

      <div class="col-md-8">

      <input id="inclurProduto-valor" name="inclurProduto-valor" type="text" placeholder="Valor Unitario" class="form-control input-md">

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="Validade">Validade Selo</label>  

      <div class="col-md-8">

      <input id="inclurProduto-validade" name="inclurProduto-validade" type="text" placeholder="Validade Selo" class="form-control input-md">

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="reteste">Data reteste</label>  

      <div class="col-md-8">

      <input id="inclurProduto-reteste" name="inclurProduto-reteste" type="text" placeholder="Data reteste" class="form-control input-md">

      </div>

    </div>



   
    <!-- Button (Double) -->

<div class="form-group">

  <label class="control-label" for="enviar"></label>

     <button  onclick="validarProduto()" type="button"  class="btn btn-primary" > Cadastrar </button>


</div>

</fieldset>
</form>

<form class="form-horizontal">
<fieldset>

</section>



<!--  =============================== Cadastrar Usuario ========================================================== -->
<section id="section-IncluirUsuario" class="col-md-12" >

 
<legend> <strong>Cadastro de usuario</strong> </legend>
<div class="main-login" class="col-md-12">
  
  <form class="col-md-12"  class="form-horizontal"  method="POST">
<fieldset   >

<!-- Form Name -->

  <div id="msg-user-alert" class="alert alert-danger col-sm-12">
    <span id="mensagem"></span>
  </div>
  <div  id="msg-user-sucess"class="alert alert-success">
    <span id="mensagem-sucess"></span>
  </div>
<!-- Text input-->
<div  class="form-group">
  <label class="col-md-12 control-label" for="nome">Nome</label>
  <div  class="col-md-12">
  <input id="IncluirUsuario-nome" name="IncluirUsuario-nome" type="text" placeholder="Nome" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="usuario">Usuario</label>  
  <div class="col-md-12">
  <input id="IncluirUsuario-usuario" name="IncluirUsuario-usuario" type="text" placeholder="Usuario" class="form-control input-md">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="senha">Senha</label>
  <div class="col-md-12">
    <input id="IncluirUsuario-senha" name="IncluirUsuario-senha" type="password" placeholder="Senha" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="confirma">Confirmar senha</label>  
  <div class="col-md-12">
  <input id="IncluirUsuario-confirma" name="IncluirUsuario-confirma" type="password" placeholder="Confirmar senha" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="control-label" for="enviar"></label>
    <button  onclick="cadastraUsuario()" type="button" id="IncluirUsuario-cadastrar" name="usuario-cadastrar" value="IncluirUsuario-cadastrar"  class="btn btn-primary" >Cadastrar</button>
</div>
<a id="sair" href="#"> Login </a>

</fieldset>
</form>

</div>


</section>
<!--  ===============================   Cadastra Cliente ========================================================== -->
<section id="section-incluirCliente">

 <form class="form-horizontal" method="POST">

    <fieldset>



    <!-- Form Name -->

    <legend><strong>Cadastro de  Clientes</strong></legend>



    <!-- Text input-->


    <div class="col-md-4" class="form-group">
    

      <label class="col-md-4 control-label" for="Documento">Documento</label>  

      <div class="col-md-8">

      <input id="incluirCliente-documento" name="incluirCliente-documento" type="text" placeholder="CPF/CNPJ" class="form-control input-md" >

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="nome">Nome</label>  

      <div class="col-md-8">

      <input id="incluirCliente-nome" name="incluirCliente-nome" type="text" placeholder="Nome" class="form-control input-md"> 

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="razao">Razão Social</label>

      <div class="col-md-8">

      <input id="incluirCliente-razao" name="incluirCliente-razao" type="text" placeholder="Razão Social" class="form-control input-md">

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="ie">IE</label>

      <div class="col-md-8">

      <input id="incluirCliente-ie" name="incluirCliente-ie" type="number" placeholder="Inscrição Estadual" class="form-control input-md">

      </div>

    </div>


    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="telefone">Telefone</label>

      <div class="col-md-8">

      <input id="incluirCliente-telefone" name="incluirCliente-telefone" type="number" placeholder="Telefone" class="form-control input-md">

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="email">Email</label>  

      <div class="col-md-8">

      <input type="email"  id="incluirCliente-email" name="incluirCliente-email"  placeholder="Email" class="form-control input-md" autocomplete="on">

      </div>

    </div>




    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="cep">CEP</label>

      <div class="col-md-8">

      <input id="incluirCliente-cep" name="incluirCliente-cep" type="cep" placeholder="CEP" class="form-control input-md">

      </div>

    </div>

   <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="Cidade">Cidade</label>

      <div class="col-md-8">                     

        <input id="incluirCliente-cidade" name="incluirCliente-cidade" placeholder="Cidade" class="form-control input-md">

      </div>

    </div>

    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="bairro">Bairro</label>

      <div class="col-md-8">

      <input id="incluirCliente-bairro" name="incluirCliente-bairro" type="text" placeholder="Bairro" class="form-control input-md">

      </div>

    </div>




    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="Rua">Rua</label>  

      <div class="col-md-8">

      <input id="incluirCliente-rua" name="incluirCliente-rua" type="text" placeholder="Rua" class="form-control input-md">

      </div>

    </div>


    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="numero">Numero</label>  

      <div class="col-md-8">

      <input id="incluirCliente-numero" name="incluirCliente-numero" type="number" placeholder="Numero" class="form-control input-md">

      </div>

    </div>



         <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="complemento">Complemento</label>

      <div class="col-md-8">                     

        <input id="incluirCliente-complemento" name="incluirCliente-complemento" placeholder="Complemento" class="form-control input-md">

      </div>

    </div>


    <!-- Button (Double) -->

<div class="form-group">

  <label class="control-label" for="enviar"></label>

     <button  onclick="incluirCliente()" type="button"  class="btn btn-primary" > Cadastrar </button>

</div>

</fieldset>
</form>
  


</section>


<!--  ===============================  Busca por usuarios ========================================================== -->
<section class="col-md-12" id="section-listarUsuario"  > 
  <form class="form-horizontal" method="POST" >

    <fieldset>



    <!-- Form Name -->

    <legend><strong> Busca por usuarios</strong></legend>


      <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="id">Idendtificador</label>  

      <div class="col-md-8">

      <input id="listarUsuario-id" name="listarUsuario-id" placeholder="Busca por Idendtificador" class="form-control input-md" type="text">

        

      </div>

    </div>


    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="Usuario">Usuario</label>  

      <div class="col-md-8">

      <input id="listarUsuario-usuario" name="listarUsuario-usuario" placeholder="Busca por Usuario" class="form-control input-md" type="text">

        

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="nome">Nome</label>  

      <div class="col-md-8">

      <input id="listarUsuario-nome" name="listarUsuario-nome" placeholder="Busca por nome" class="form-control input-md" type="text">

        

      </div>

    </div>


    <!-- Button -->

    <div class="form-group">
      <label class="control-label" for="buscar"></label>
        <button  onclick="buscaUsuario()" type="button" id="listarUsuario-pesquisar" name="listarUsuario-pesquisar" value="Pesquisar"  class="btn btn-primary" > Pesquisar  </button>
    </div>

    </fieldset>
  </form>  
  <h2>Resultados da pesquisa:</h2>


</section>

<!--  ===============================   Busca por produtos ========================================================= -->
<section id="section-listarProduto">
  <form class="form-horizontal" method="POST" >

    <fieldset>



    <!-- Form Name -->

    <legend><strong>Busca por produtos</strong> </legend>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="codigo">Codigo</label>  

      <div class="col-md-8">

      <input id="listarProduto-codigo" name="listarProduto-codigo" placeholder="Busca por codigo" class="form-control input-md" type="text">

        

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="nome">Nome</label>  

      <div class="col-md-8">

      <input id="listarProduto-nome" name="listarProduto-nome" placeholder="Busca por nome" class="form-control input-md" type="text">

        

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="so">S. Operacional</label>  

      <div class="col-md-8">

      <input id="listarProduto-so" name="listarProduto-so" placeholder="Busca por SO" class="form-control input-md" type="text">

        

      </div>

    </div>



    <!-- Button -->

    <div class="form-group">
      <label class="ontrol-label" for="buscar"></label>
        <button  onclick="buscaProduto()" type="button" id="btnPesquisar" name="btnPesquisar" value="Pesquisar"  class="btn btn-primary" > Pesquisar  </button>
    </div>

    </fieldset>
  </form>  
  <h2>Resultados da pesquisa:</h2>

</section>
<!--  ===============================   Busca por cliente ========================================================== -->
<section id="section-listarCliente">

  <form class="form-horizontal" method="POST" >

    <fieldset>



    <!-- Form Name -->

    <legend><strong>Busca por clientes</strong></legend>


      <!-- Text input-->

    <div class="col-md-2" class="form-group">

      <label class="col-md-3 control-label" for="Id">ID</label>

      <div class="col-md-9">

      <input id="listarCliente-id" name="listarCliente-id" placeholder="Id" class="form-control input-md" type="text">

        

      </div>

    </div>


    <!-- Text input-->

    <div class="col-md-3" class="form-group">

      <label class="col-md-4 control-label" for="documento">Documento</label>

      <div class="col-md-8">

      <input id="listarCliente-documento" name="listarCliente-documento" placeholder="Documento" class="form-control input-md" type="text">

        

      </div>

    </div>



    <!-- Text input-->

    <div class="col-md-3" class="form-group">

      <label class="col-md-4 control-label" for="nome">Nome</label>  

      <div class="col-md-8">

      <input id="listarCliente-nome" name="listarCliente-nome" placeholder="Nome" class="form-control input-md" type="text">

        

      </div>

    </div>

        <!-- Text input-->

    <div class="col-md-4" class="form-group">

      <label class="col-md-4 control-label" for="razao">Razão social</label>  

      <div class="col-md-8">

      <input id="listarCliente-razao" name="listarCliente-razao" placeholder="Razão social" class="form-control input-md" type="text">

        

      </div>

    </div>




    <!-- Button -->

    <div class="form-group">
      <label class="control-label" for="buscar"></label>
        <button  onclick="buscaCliente()" type="button" id="listarCliente-pesquisar" name="listarCliente-pesquisar" value="Pesquisar"  class="btn btn-primary" > Pesquisar  </button>
    </div>

    </fieldset>
  </form>  
  <h2>Resultados da pesquisa:</h2>


</section>



<!--  ============================= Mensagens ========================================================== -->
            
            <div id="resultado"></div>  


  <script src="../css-scripts/ajax.js"></script>


  <script type="text/javascript" src="../css-scripts/js/bootstarp.min.js"></script>

  </main>
</body>

</html>