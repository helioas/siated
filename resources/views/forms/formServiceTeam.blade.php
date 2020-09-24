@extends('layouts.head')

@section('content')

    <div class="container w-50">

        <div class="titulo">
            Equipe de Serviço
        </div>

    @if(isset($register))

        {!! Form::model($register, ['method' => 'put', 'route' => ['serviceteam.update', $register->id ], 'class' =>
        'form-horizontal']) !!}

    @else

        {!! Form::open(['method' => 'post','route' => 'serviceteam.store', 'class' => 'form-horizontal']) !!}

    @endif

    <div class="card">
        <div class="card-header">
            <span class="card-title">
                @if(isset($register))
                    Editando registro #{{ $register->id }}
                @else
                    Criando novo registro
                @endif
            </span>
        </div>
        <div class="card-body">

            <div class="form-row form-group">
                {!! Form::label('date', 'Data', ['class' => 'col-form-label col-sm-12']) !!}
                <div class="col-sm-12 ">                    
                    {!! Form::date('date', (isset($register) ? null : \Carbon\Carbon::now()), ['class' => 'form-control']) !!}
                </div>
            </div>                         
            
            <div class="form-row form-group">
                {!! Form::label('hour_shift', 'Turno', ['class' => 'col-form-label col-sm-12']) !!}
                <div class="col-sm-12 ">                    
                    {!! Form::select('hour_shift', ['6' => '6 Horas', '12' => '12 Horas', '24' => '24 Horas', 
                    '36' => '36 Horas','48' => '48 Horas'], null, ['placeholder' => 'Selecione...', 'class' => 'form-control'] ); !!}
                </div>
            </div>    

            @php
                
            @endphp
            <div class="form-row form-group">
                {!! Form::label('start_date_time', 'Data/Hora Inicio', ['class' => 'col-form-label col-sm-12']) !!}
                <div class="col-sm-12 ">                    
                    {!! Form::input('dateTime-local', 'start_date_time', (isset($register) ? date('Y-m-d\TH:i',  strtotime($register->start_date_time)) : null), array('class' => 'form-control')) !!}                    
                     
                </div>
            </div>             
            
            <div class="form-row form-group">
                {!! Form::label('end_date_time', 'Data/Hora Fim', ['class' => 'col-form-label col-sm-12']) !!}
                <div class="col-sm-12 ">                    
                    {!! Form::input('dateTime-local', 'end_date_time', (isset($register) ? date('Y-m-d\TH:i',  strtotime($register->end_date_time)) : null), array('class' => 'form-control')) !!}                    
                </div>
            </div>               
            
            <div class="form-row form-group">
                {!! Form::label('team_functions_id', 'Selecione a Função', ['class' => 'col-form-label col-sm-12']) !!}

                <div class="col-sm-12">
                    {{Form::select('team_functions_id',
                    $teamFunction,
                    null,
                    ['id'=>'team_functions_id', 'class' =>'form-control'])}}           
                </div>
            </div> 
            
            <div class="form-row form-group">
                {{ Form::label('military_organization_id', 'Selecione o OPM', ['class' => 'col-form-label col-sm-12']) }}
                <div class="col-sm-12">
                    {{ Form::select('military_organization_id',
                                    $militaryOrganization,
                                    null,
                                    ['class' =>'form-control'])}}           
                </div>
            </div>       
            
            

            <div class="form-row form-group">
                {!! Form::label('locality_id', 'Selecione a Localidade', ['class' => 'col-form-label col-sm-12']) !!}

                <div class="col-sm-12">
                    {{Form::select('locality_id',
                                    $locality ?? [],
                                    null,
                                    ['class' =>'form-control'])}}           
                </div>
            </div>   

            <div class="form-row form-group">
                {!! Form::label('note', 'Observação', ['class' => 'col-form-label col-sm-12']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('note', null, ['class'=>'form-control', 'rows'=>'2', 'placeholder'=>'Discrimine a Observação']) !!}
                </div>
            </div>   
        </div>
        <div class="card-footer">
            {!! Form::button('cancelar', ['class'=>'btn btn-danger btn-sm', 'onclick' =>'windo:history.go(-1);']); !!}
            {!! Form::submit( isset($register) ? 'atualizar' : 'criar', ['class'=>'btn btn-success btn-sm']) !!}

        </div>
    </div>

    {!! Form::close() !!}

</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $('select[name=military_organization_id]').change(function () {        
        var fk = $(this).val();
        $.get('/locality/'+fk+'/list', function (locality) {
            $('select[name=locality_id]').empty();
            $.each(locality, function (key, value) {
                $('select[name=locality_id]').append('<option value=' + value.id + '>' + value.descricao + '</option>');
            });
        });
    });
  
</script>
@endsection

