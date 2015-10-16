<div class="row">
    <div class="col-sm-6 col-md-offset-1 col-md-5 esquerda">
        <div class="form-group">
            {!! Form::label('nome', 'Nome do Projeto') !!} <span class="required">*</span>
            {!! Form::text('nome', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cliente', 'Nome do Cliente') !!} <span class="required">*</span>
            {!! Form::text('cliente', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-mail do Cliente') !!} <span class="required">*</span>
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('imagem', 'Marca do Cliente') !!}
            @if ($textoBotao == 'CADASTRAR PROJETO')
                <span class="required">*</span>
            @endif
            {!! Form::file('imagem', ['class' => 'single-file-upload form-control']) !!}
        </div>
    </div>
    <div class="col-sm-6 col-md-5 direita">
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição do Projeto') !!}
            {!! Form::textarea('descricao', null, ['class' => 'big-textarea form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit($textoBotao, ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    </div>
</div>