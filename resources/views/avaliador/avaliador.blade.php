@extends ('layouts.app')
<!--esta visão irá aparecer dentro da principal.blade-->

@section('conteudo')

<h1>Avaliadores Cadastrados</h1>
<hr>
<a href="\avaliador\create" class="btn btn-primary">
	<span class="glyphicon glyphicon-file"></span>
	Cadastrar Avaliador
</a><br><br>
<table id="table" class="table table-condensed table-hover table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>Área</th>
			<th>Instituição</th>
			<th class="text-right">Avaliações</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($avaliadores as $q)
		<tr>
			<td>{{ $q->id }}</td>
			<td>{{ $q->pessoa->nome }}</td>
			<td>{{ $q->area }}</td>
			<td>{{ $q->instituicao->sigla }} - {{ $q->instituicao->nome }}</td>
			<td class="text-right">
				<a class="btn btn-primary btn-sm" href="\avaliador\avaliacoes\{{ $q->id }}" title="Visualizar avaliações cadastrados para este avaliador">
					{{ $q->avaliacoes->count() }}
				</a>
			</td>
			<td>
				<div class="btn-group">
					<a href="#" data-toggle="modal" data-target="#delete_{{ $q->id }}" class="btn btn-sm btn-primary" title="Excluir dados pessoais">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</div>
				<!-- Modal -->
				<div id="delete_{{ $q->id }}" class="modal fade text-justify" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">
				        	<span class="glyphicon glyphicon-alert"></span>
				        	Exclusão do Avaliador {{$q->pessoa->nome}}
				       	</h4>
				      </div>
				      <div class="modal-body">
				        <p>Confirma a exclusão do avaliador <strong>{{ $q->id }} - {{ $q->pessoa->nome }}</strong>?</p>
				      </div>
				      <div class="modal-footer">
				        <a href="\avaliador\delete\{{ $q->id }}" class="btn btn-danger">Sim</a>
				        <button type="button" class="btn btn-info" data-dismiss="modal">Não</button>
				      </div>
				    </div>
				  </div>
				</div>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<hr>
@endsection