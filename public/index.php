<?php
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Gerador de Currículos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Gerador de Currículos</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Criar Currículo</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h2 class="mb-4 text-center">Preencha seus dados</h2>

  <form id="cvForm" method="post" action="templates/preview.php" enctype="multipart/form-data" target="_blank">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Nome completo</label>
        <input name="nome" required class="form-control">
      </div>
      <div class="col-md-3 mb-3">
        <label class="form-label">Data de nascimento</label>
        <input type="date" id="dtNasc" name="dt_nasc" required class="form-control">
      </div>
      <div class="col-md-3 mb-3">
        <label class="form-label">Idade</label>
        <input id="idade" readonly class="form-control">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">E-mail</label>
      <input type="email" name="email" required class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Telefone</label>
      <input type="text" name="telefone" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Resumo Profissional / Objetivo</label>
      <textarea name="resumo" class="form-control" rows="3"></textarea>
    </div>

    <hr>
    <h5>Experiências Profissionais</h5>
    <div id="experienciasContainer"></div>
    <button type="button" id="addExp" class="btn btn-outline-primary btn-sm mb-3">+ Adicionar Experiência</button>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-primary">Visualizar Currículo</button>
      <button type="reset" class="btn btn-secondary">Limpar</button>
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
