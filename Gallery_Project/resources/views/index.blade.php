<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Adicionando o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Galeria de Fotos</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-light bg-light justify-content-between fixed-top">
        <a class="navbar-brand">Navbar</a>
        <form class="form-inline mx-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="Digite um titulo" aria-label="Search">

            <button class="btn btn-outline-success my-2  mr-sm-2" type="submit">Abrir a Foto</button>
          </form>
      </nav>
    
    <div class="container">
        <br><br>
        <h1 class="text-center mt-5">Galeria de Fotos</h1>
        <hr>
        <button class="btn btn-success" id="adicionar"  data-toggle="modal" data-target="#addmodal">Adicionar</button>
        <div class="row mt-5">
            @foreach($photos as $photo)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $photo->url }}" class="card-img-top" alt="{{ $photo->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $photo->title }}</h5>
                    <p class="card-text">{{ $photo->description }}</p>
                </div>
            </div>
        </div>
            @endforeach

        </div>
    </div>
    

    <!-- Modal Inserção -->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarFotoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAdicionarFotoLabel">Adicionar Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="titulo">Título:</label>
              <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="descricao">Descrição:</label>
              <textarea name="descricao" id="descricao" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label for="imagem">Imagem:</label>
              <input type="file" name="imagem" id="imagem" class="form-control-file" required>
            </div>
            <div class="form-group d-none">
                <label>Imagem selecionada:</label>
                <img id="imagem-preview" src="#" alt="Imagem selecionada" width="100">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script>
    const inputImagem = document.querySelector('#imagem');
    const imagemPreview = document.querySelector('#imagem-preview');
  
    inputImagem.addEventListener('change', function() {
      const file = inputImagem.files[0];
      if (file) {
        const reader = new FileReader();
        reader.addEventListener('load', function() {
          imagemPreview.src = reader.result;
        });
        reader.readAsDataURL(file);
      }
    });

    //

    $(document).ready(function() {
    // Escuta a mudança no valor do campo de imagem
    $('#imagem').on('change', function() {
        // Remove a classe "d-none" do form-group
        $('.form-group').removeClass('d-none');
    });
});

    
  </script>
  
  
  
  
  
  
  

    
   
</body>
</html>
