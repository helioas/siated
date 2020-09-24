@extends('layouts.head')

@section('content')

    <div class="container w-50">

        <div class="titulo">
            SubFato
        </div>

    @if(isset($register))

        {!! Form::model($register, ['method' => 'put', 'route' => ['subfact.update', $register->id ], 'class' =>
        'form-horizontal']) !!}

    @else

        {!! Form::open(['method' => 'post','route' => 'subfact.store', 'class' => 'form-horizontal']) !!}

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
                {!! Form::label('fact_id', 'Selecione o Fato', ['class' => 'col-form-label col-sm-12']) !!}

                <div class="col-sm-12">
                    {{Form::select('fact_id',
                    $fact,
                    null,
                    ['id'=>'fact_id','class' =>'form-control'])}}           
                </div>
            </div>   

            <div class="form-row form-group">
                {!! Form::label('subfact_description', 'Descrição do SubFato', ['class' => 'col-form-label col-sm-12']) !!}
                <div class="col-sm-12">
                    {!! Form::text('subfact_description', null, ['class' => 'form-control', 'placeholder'=>'Defina o subfato']) !!}
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
@endsection
