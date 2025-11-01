
$(function(){

  
  $('#dtNasc').on('change', function(){
    const val = $(this).val();
    if(!val){ $('#idade').val(''); return; }
    const dob = new Date(val);
    const today = new Date();
    let age = today.getFullYear() - dob.getFullYear();
    const m = today.getMonth() - dob.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) age--;
    $('#idade').val(age);
  });

  
  let expIndex = 0;
  function addExperience(){
    const idx = expIndex++;
    const html = `
      <div class="card mb-3 p-3 exp-item" data-idx="${idx}">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h6 class="m-0">Experiência ${idx + 1}</h6>
          <button type="button" class="btn btn-danger btn-sm remove-exp">Remover</button>
        </div>
        <input name="experiencias[${idx}][empresa]" placeholder="Empresa" class="form-control mb-2" required>
        <input name="experiencias[${idx}][cargo]" placeholder="Cargo" class="form-control mb-2" required>
        <div class="row">
          <div class="col"><input name="experiencias[${idx}][inicio]" placeholder="Início" class="form-control mb-2"></div>
          <div class="col"><input name="experiencias[${idx}][fim]" placeholder="Fim" class="form-control mb-2"></div>
        </div>
        <textarea name="experiencias[${idx}][descricao]" placeholder="Descrição das atividades" class="form-control" rows="2"></textarea>
      </div>
    `;
    $('#experienciasContainer').append(html);
  }

  $('#addExp').on('click', addExperience);
  $('#experienciasContainer').on('click', '.remove-exp', function(){
    $(this).closest('.exp-item').remove();
  });

  
  addExperience();
});
