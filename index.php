<!-- Gerador de Currículo - Aluno:willians Matheus Braccide oliveira, R.A: 09051777 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gerador de Currículo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f7fa;
    margin-bottom: 50px;
}
h1, h2 {
    color: #2c3e50;
}
.card {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
#preview h3 {
    color: #34495e;
}
.experiencia, .referencia {
    border-left: 4px solid #3498db;
    padding-left: 10px;
    margin-bottom: 8px;
}
#fotoPreview {
    width:120px;
    height:120px;
    object-fit:cover;
    border-radius:50%;
    border: 2px solid #3498db;
    margin-right:20px;
}
.btn-primary {
    background-color:#3498db;
    border-color:#3498db;
}
.btn-primary:hover {
    background-color:#2980b9;
    border-color:#2980b9;
}
.btn-secondary {
    background-color:#95a5a6;
    border-color:#95a5a6;
}
.btn-secondary:hover {
    background-color:#7f8c8d;
    border-color:#7f8c8d;
}
</style>
</head>
<body>
<div class="container mt-5 mb-5">
    <h1 class="text-center mb-4">Gerador de Currículo</h1>
    <form id="curriculoForm">
        <div class="mb-3">
            <label class="form-label">Nome completo</label>
            <input type="text" class="form-control" id="nome" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="dataNascimento" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Idade</label>
            <input type="text" class="form-control" id="idade" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Resumo Profissional</label>
            <textarea class="form-control" id="resumo" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto">
        </div>

        <h4>Experiências Profissionais</h4>
        <div id="experiencias">
            <div class="mb-3">
                <label class="form-label">Experiência 1</label>
                <input type="text" class="form-control" placeholder="Digite sua experiência">
            </div>
        </div>
        <button type="button" class="btn btn-secondary mb-3" id="addExp">+ Adicionar Experiência</button>

        <h4>Referências Pessoais</h4>
        <div id="referencias">
            <div class="mb-3">
                <label class="form-label">Referência 1</label>
                <input type="text" class="form-control" placeholder="Digite a referência">
            </div>
        </div>
        <button type="button" class="btn btn-secondary mb-3" id="addRef">+ Adicionar Referência</button>

        <button type="submit" class="btn btn-primary">Visualizar Currículo</button>
    </form>

    <div id="preview" class="mt-5" style="display:none;">
        <h2 class="text-center mb-3">Currículo</h2>
        <div class="card p-4">
            <div class="d-flex align-items-center mb-3">
                <img id="fotoPreview" src="" alt="Foto">
                <h3 id="nomePreview"></h3>
            </div>
            <p><strong>Idade:</strong> <span id="idadePreview"></span></p>
            <p><strong>E-mail:</strong> <span id="emailPreview"></span></p>
            <p><strong>Telefone:</strong> <span id="telefonePreview"></span></p>
            <p><strong>Resumo:</strong> <span id="resumoPreview"></span></p>
            <h5>Experiências</h5>
            <div id="experienciasPreview"></div>
            <h5>Referências</h5>
            <div id="referenciasPreview"></div>
            <p class="text-end mt-4" style="font-size:0.9em; color:#7f8c8d;">Apo acadêmico R.A 09051777</p>
        </div>
        <button class="btn btn-success mt-3" onclick="window.print()">Baixar PDF</button>
    </div>
</div>

<script>
document.getElementById('dataNascimento').addEventListener('change', function() {
    const hoje = new Date();
    const nascimento = new Date(this.value);
    let idade = hoje.getFullYear() - nascimento.getFullYear();
    const m = hoje.getMonth() - nascimento.getMonth();
    if (m < 0 || (m === 0 && hoje.getDate() < nascimento.getDate())) idade--;
    document.getElementById('idade').value = idade;
});

document.getElementById('addExp').addEventListener('click', () => {
    const div = document.createElement('div');
    div.classList.add('mb-3');
    div.innerHTML = `<label class="form-label">Nova Experiência</label>
                     <input type="text" class="form-control" placeholder="Digite sua experiência">`;
    document.getElementById('experiencias').appendChild(div);
});

document.getElementById('addRef').addEventListener('click', () => {
    const div = document.createElement('div');
    div.classList.add('mb-3');
    div.innerHTML = `<label class="form-label">Nova Referência</label>
                     <input type="text" class="form-control" placeholder="Digite a referência">`;
    document.getElementById('referencias').appendChild(div);
});

document.getElementById('foto').addEventListener('change', function(){
    const reader = new FileReader();
    reader.onload = function(e){
        document.getElementById('fotoPreview').src = e.target.result;
    }
    reader.readAsDataURL(this.files[0]);
});

document.getElementById('curriculoForm').addEventListener('submit', function(e){
    e.preventDefault();
    document.getElementById('nomePreview').textContent = document.getElementById('nome').value;
    document.getElementById('idadePreview').textContent = document.getElementById('idade').value;
    document.getElementById('emailPreview').textContent = document.getElementById('email').value;
    document.getElementById('telefonePreview').textContent = document.getElementById('telefone').value;
    document.getElementById('resumoPreview').textContent = document.getElementById('resumo').value;

    const experienciasPreview = document.getElementById('experienciasPreview');
    experienciasPreview.innerHTML = '';
    document.querySelectorAll('#experiencias input').forEach((input, index) => {
        if(input.value.trim() !== ''){
            const p = document.createElement('p');
            p.classList.add('experiencia');
            p.innerHTML = `<strong>Experiência ${index+1}:</strong> ${input.value}`;
            experienciasPreview.appendChild(p);
        }
    });

    const referenciasPreview = document.getElementById('referenciasPreview');
    referenciasPreview.innerHTML = '';
    document.querySelectorAll('#referencias input').forEach((input, index) => {
        if(input.value.trim() !== ''){
            const p = document.createElement('p');
            p.classList.add('referencia');
            p.innerHTML = `<strong>Referência ${index+1}:</strong> ${input.value}`;
            referenciasPreview.appendChild(p);
        }
    });

    document.getElementById('preview').style.display = 'block';
    window.scrollTo(0, document.getElementById('preview').offsetTop);
});
</script>
</body>
</html>
