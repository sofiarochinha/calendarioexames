<!-- Popup para selecionar a sala e os vigilantes -->
<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <div class="modal-title">
                <h3>Configurar exame de {{$subject}}</h3>
                <h5>Marcado para de {{$horario}}</h5>
                <p>Docente: {{$docente}}</p>
            </div>

            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">

            <label>Vigilantes já associados</label>
            <ul>
                @foreach($associatedProf as $vigilante)
                    @foreach($professors as $prof)
                        @if($prof->id == $vigilante)
                            {{--não funciona--}}
                            <li><span class="fa-li"><i class="fa-solid fa-x"></i></span>{{$prof->name}}</li>
                        @endif
                    @endforeach
                @endforeach
            </ul>

            <label>Salas já associadas</label>
            <ul>
                @foreach($associatedSala as $sala)
                    @foreach($salas as $class)
                        @if($class->id == $sala)
                            <li>{{$class->classroom}} ({{$class->type}})</li>
                        @endif
                    @endforeach
                @endforeach
            </ul>

            <form>
                <div class="form-group">
                    <label>Vigilantes</label>
                    <select id="profs" class="select2" multiple="multiple" style="width: 100%; ">
                            @foreach($professors as $prof)
                                    <option value="{{$prof->id}}">{{$prof->name}}</option>
                            @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label>Salas</label>
                    <select id="salas" class="select2" multiple="multiple" style="width: 100%;">
                        @foreach($salas as $class)
                            <option value="{{$class->id}}">{{$class->classroom}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <!-- Modal footer -->
       <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="fechar()">Fechar</button>
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="associarAoExame()">Guardar</button>
        </div>
    </div>
</div>

<script src="{{(asset('/plugins/jquery/jquery-3.6.0.min.js'))}}"></script>

<script>

    $('.select2').select2();

    var profsSelected, salasSelected;

    $('#profs').change(function(e) {
        profsSelected = $(e.target).val();
    });

    $('#salas').change(function (e){
        salasSelected = $(e.target).val();
    });

    /**
     * Associa a sala e os professores ao exame selecionado
     */
    function associarAoExame(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post("{{ route('associarAoExame')}}",
            {
                idExame: JSON.stringify({{ $idExame }}),
                profsSelected: JSON.stringify(profsSelected),
                salasSelected: JSON.stringify(salasSelected),
            }, function (response) {
                console.log(response);

            })
    }

    function fechar(){
        $('#modal').modal('hide');
    }


</script>
