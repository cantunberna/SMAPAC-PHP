
<div class="modal fade" id="modal-components" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Detalles del componente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="">Componente</label>
              <input type="text" class="form-control" id="component" readonly>
            </div>
            <div class="form-group col-md-9">
                <label for="">Objetivo</label>
                <textarea class="form-control" id="objective" rows="4" readonly></textarea>
            </div>
          </div>
  
          <div class="form-row">
            <div class="form-group col-md-5">
              <label for="">Recursos Federales</label>
              <input type="text" class="form-control" id="fedresource" readonly>
            </div>
            <div class="form-group col-md-5">
              <label for="">Recursos Propios</label>
              <input type="text" class="form-control" id="ownresource" readonly>
            </div>
          </div>
        
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="">Trianual</label>
              <input type="text" class="form-control" id="tri" readonly>
  
            </div>
            <div class="form-group col-md-3">
              <label for="">2019</label>
              <input type="text" class="form-control" id="one" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="">2020</label>
                <input type="text" class="form-control" id="two" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="">2021</label>
                <input type="text" class="form-control" id="three" readonly>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </div>

<script src="/js/app.js"></script>
<script type="text/javascript">
$('#modal-components').on('show.bs.modal', function (event){
 
var button = $(event.relatedTarget)
var component = button.data('component')
var objective = button.data('objective')
var fedresource = button.data('fedre')
var ownresource = button.data('ownre')
var tri = button.data('tri')
var one = button.data('one')
var two = button.data('two')
var three = button.data('three')

var modal = $(this)
modal.find('.modal-body #component').val(component)
modal.find('.modal-body #objective').val(objective)
modal.find('.modal-body #fedresource').val(fedresource)
modal.find('.modal-body #ownresource').val(ownresource)
modal.find('.modal-body #tri').val(tri)
modal.find('.modal-body #one').val(one)
modal.find('.modal-body #two').val(two)
modal.find('.modal-body #three').val(three)
})
</script>