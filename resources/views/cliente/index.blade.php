@extends("templates.main")

@section("title", "Cliente")

@section("formulario")
	<h1>Cadastro de Clientes</h1>
	<form action="/cliente" method="POST" class="row">
		<div class="form-group col-5">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" />
		</div>
		<div class="form-group col-5">
			<label for="cpf">CPF:</label>
			<input type="text" name="cpf" class="form-control" value="{{ $cliente->cpf }}" />
		</div>
		<div class="form-group col-2">
			@csrf
			<input type="hidden" name="id" value="{{ $cliente->id }}" />
			
			<a href="/cliente" class="btn btn-primary" style="margin-top: 23.25px;">
				<i class="bi bi-plus-square">
					Novo
				</i>
			</a>
			
			<button type="submit" class="btn btn-success" style="margin-top: 23.25px;">
				<i class="bi bi-save">
					Salvar
				</i>
			</button>
		</div>
	</form>
@endsection