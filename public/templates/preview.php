<?php
// R.A 09051777
function esc($v){ return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$dt_nasc = $_POST['dt_nasc'] ?? '';
$resumo = $_POST['resumo'] ?? '';
$experiencias = $_POST['experiencias'] ?? [];

function formatDate($d){
  if(!$d) return '';
  $dt = DateTime::createFromFormat('Y-m-d', $d);
  if(!$dt) return $d;
  return $dt->format('m/Y');
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Preview do Currículo</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { padding: 30px; background: #fff; }
    .cv-header { border-bottom: 2px solid #333; margin-bottom: 20px; }
    .no-print { margin-bottom: 15px; }
    @media print {
      .no-print { display: none; }
      body { padding: 0; }
    }
  </style>
</head>
<body>
<div class="container">
  <div class="no-print d-flex justify-content-between">
    <a href="../index.php" class="btn btn-secondary btn-sm">Voltar</a>
    <button onclick="window.print()" class="btn btn-primary btn-sm">Imprimir / Baixar PDF</button>
  </div>

  <div class="cv-header mb-4">
    <h2><?=esc($nome)?></h2>
    <p class="text-muted"><?=esc($email)?> | <?=esc($telefone)?></p>
  </div>

  <h5>Resumo Profissional</h5>
  <p><?=nl2br(esc($resumo))?></p>

  <h5 class="mt-4">Experiências Profissionais</h5>
  <?php if(!empty($experiencias)): ?>
    <?php foreach($experiencias as $exp): ?>
      <div class="mb-3">
        <strong><?=esc($exp['cargo'])?> - <?=esc($exp['empresa'])?></strong><br>
        <small><?=esc(formatDate($exp['inicio']))?> - <?=esc(formatDate($exp['fim']))?></small>
        <p><?=nl2br(esc($exp['descricao']))?></p>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>Nenhuma experiência adicionada.</p>
  <?php endif; ?>

  <footer class="text-muted small mt-5">Gerado em <?=date('d/m/Y')?> — Sistema de Currículos</footer>
</div>
</body>
</html>
