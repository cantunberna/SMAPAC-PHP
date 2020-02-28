
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Detalles de la Actividad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="">Componente</label>
              <input type="text" class="form-control" id="component" readonly>
            </div>
            <div class="form-group col-md-5">
              <label for="">Departamento</label>
              <input type="text" class="form-control" id="department" readonly>
            </div>
          </div>
  
          <div class="form-row">
            <div class="form-group col-md-9">
                <label for="">Actividad</label>
                <textarea class="form-control" id="activity" rows="7" readonly></textarea>
            </div>
            <div class="form-group col-md-3">
                <label for="">Monto</label>
                <input type="text" class="form-control" id="amount" readonly>
            </div>
          </div>
        
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="">Trianual</label>
              <input type="text" class="form-control" id="trianual" readonly>
  
            </div>
            <div class="form-group col-md-2">
              <label for="">2019</label>
              <input type="text" class="form-control" id="2019" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="">2020</label>
                <input type="text" class="form-control" id="2020" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="">2021</label>
                <input type="text" class="form-control" id="2021" readonly>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Indicador</label>
              <input type="text" class="form-control" id="indicator" readonly>
            </div>
            <div class="form-group col-md-3">
              <label for="">Unidad de Medida</label>
              <input type="text" class="form-control" id="measure" readonly>
            </div>
            <div class="form-group col-md-9">
              <label for="">Formula</label>
              <input type="text" class="form-control" id="formula" readonly>
    
            </div>
            <div class="form-group col-md-2">
                <label for="">Frecuencia</label>
                <input type="text" class="form-control" id="frequency" readonly>
            </div>
           
          </div>

          <div class="card col-md-12">
            <div class="card-header text-center">
              <strong>Programado 2020</strong>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="">Indicador programado</label>
                  <input type="text" class="form-control" id="prog-indicator" readonly>
              </div>
              <div class="form-group col-md-2">
                  <label for="">1er. Trimestre</label>
                  <input type="text" class="form-control" id="prog_one" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="">2do. Trimestre</label>
                <input type="text" class="form-control" id="prog_two" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="">3er. Trimestre</label>
                <input type="text" class="form-control" id="prog_three" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="">4to. Trimestre</label>
                <input type="text" class="form-control" id="prog_four" readonly>
              </div>
            </div>
            </div>
          </div>
  
          <div class="card col-md-12">
            <div class="card-header text-center">
              <strong>Realizado 2020</strong>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="">Indicador real</label>
                  <input type="text" id="real_indicator" class="form-control" readonly>
              </div>
              <div class="form-group col-md-2">
                  <label for="">1er. Trimestre</label>
                  <input type="text" id="real_one" class="form-control" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="">2do. Trimestre</label>
                <input type="text" id="real_two" class="form-control" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="">3er. Trimestre</label>
                <input type="text" id="real_three" class="form-control" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="">4to. Trimestre</label>
                <input type="text" id="real_four" class="form-control" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="">Total acumula</label>
                <input type="text" id="total" class="form-control" readonly>
              </div>
            </div>
            </div>
          </div>
  
          <div class="form-row">
            <div class="form-group col-md-5">
              <label for="">Medios de verificación</label>
              <input type="text" class="form-control" id="verification" readonly>
            </div>
            <div class="form-group col-md-7">
                <label for="">Supuesto</label>
                <input type="text" class="form-control" id="supposed" readonly>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </div>

<script src="/js/app.js"></script>
<script type="text/javascript">
$('#edit').on('show.bs.modal', function (event){
 
var button = $(event.relatedTarget)
var component = button.data('component')
var department = button.data('department')
var activity = button.data('activity')
var amount = button.data('amount')
var trianual = button.data('trianual')
var fist_year = button.data('2019')
var second_year = button.data('2020')
var third_year = button.data('2021')
var indicator = button.data('indicator')
var formula = button.data('formula')
var frequency = button.data('frequency')
var measure = button.data('measure')
var prog_indicator = button.data('progindicator')
var prog_one = button.data('progone')
var prog_two = button.data('progtwo')
var prog_three = button.data('progthree')
var prog_four = button.data('progfour')
var real_indicator = button.data('realindicator')
var real_one = button.data('realone')
var real_two = button.data('realtwo')
var real_three = button.data('realthree')
var real_four = button.data('realfour')
var total = button.data('total')
var verification = button.data('verification')
var supposed = button.data('supposed')

var modal = $(this)
modal.find('.modal-body #component').val(component)
modal.find('.modal-body #department').val(department)
modal.find('.modal-body #activity').val(activity)
modal.find('.modal-body #amount').val(amount)
modal.find('.modal-body #trianual').val(trianual)
modal.find('.modal-body #2019').val(fist_year)
modal.find('.modal-body #2020').val(second_year)
modal.find('.modal-body #2021').val(third_year)
modal.find('.modal-body #indicator').val(indicator)
modal.find('.modal-body #formula').val(formula)
modal.find('.modal-body #frequency').val(frequency)
modal.find('.modal-body #measure').val(measure)
modal.find('.modal-body #prog-indicator').val(prog_indicator)
modal.find('.modal-body #prog_one').val(prog_one)
modal.find('.modal-body #prog_two').val(prog_two)
modal.find('.modal-body #prog_three').val(prog_three)
modal.find('.modal-body #prog_four').val(prog_four)
modal.find('.modal-body #real_indicator').val(real_indicator)
modal.find('.modal-body #real_one').val(real_one)
modal.find('.modal-body #real_two').val(real_two)
modal.find('.modal-body #real_three').val(real_three)
modal.find('.modal-body #real_four').val(real_four)
modal.find('.modal-body #total').val(total)
modal.find('.modal-body #verification').val(verification)
modal.find('.modal-body #supposed').val(supposed)
})
</script>