@extends('adminlte::page')

@section('script')
<script>
function mascara(i){
   
   var v = i.value;
   
   if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
   }
   
   i.setAttribute("maxlength", "14");
   if (v.length == 3 || v.length == 7) i.value += ".";
   if (v.length == 11) i.value += "-";

}

</script>
@endsection

@section('content')
<div style="text-align:center">
    <h4>Novo Cliente</h4>
</div>
    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url' => 'clientes/store']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', null, ['class' => 'form-control', 'require']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('cpf', 'Cpf:') !!}
        {!! Form::text('cpf', null, ['class' => 'form-control', 'require']) !!} 


       
			
    </div>

    <div class="form-group">
        {!! Form::label('endereco', 'Endereço:') !!}
        {!! Form::text('endereco', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefone', 'Telefone:') !!}
        {!! Form::text('telefone', null, ['class' => 'form-control', 'require']) !!}
    </div>
    <div class="form-group" style="text-align:center">
        {!! Form::submit('Criar Cliente', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('clientes') }}">Voltar</a>
    </div>
    {!! Form::close() !!}

@stop
