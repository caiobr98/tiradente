@extends('layouts.app')
@section('title') Cadastro @endsection
@section('content')
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-10 offset-1">
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form action="{{url('cadastro-colaborador-novo')}}" method="post"  enctype="multipart/form-data">
					{{ csrf_field() }}
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Nome</label>
								<input type="text" class="form-control" id="nome" name="nome">
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4">Email</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4">CRO</label>
								<input type="input" class="form-control" id="cro" name="cro" >
							</div>
						</div>
					
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="agencia">Agência</label>
								<input type="text" class="form-control" id="agencia" name="agencia">
						</div>

						<div class="form-group col-md-4">
							<label for="agencia">Conta</label>
							<input type="text" class="form-control" id="conta" name="conta">  
						</div>
						<div class="form-group col-md-2">
							<label for="agencia">Dígito</label>
							<input type="text" class="form-control" id="digito" name="digito">
						</div>
						<div class="form-group col-md-6">
							
						</div>
						<div class="form-group col-md-6">
							
						</div>
						
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="rg">RG</label><br>
								<input type='file' id="rg" name="rg" accept="image/*" />
							</div>
							<div class="form-group col-md-6">
								<label for="cpf">CPF</label><br>
								<input type='file' id="cpf" name="cpf" accept="image/*" />
							</div>
							<div class="form-group col-md-6">
								<label for="foto">Foto</label><br>
								<input type='file' id="foto" name="foto" accept="image/*" />
							</div>
							<div class="form-group col-md-6">
								<label for="pis">PIS</label><br>
								<input type='file' id="pis" name="pis" accept="image/*" />
							</div>
						
						</div>
						<div class="form-group">
						</div>
						<button type="submit" class="btn btn-primary">Enviar dados para avaliação</button>
						
					</form>
				</div>
			</div>  <!-- /.row -->
		</div><!-- /.container-fluid -->	
	</div><!-- /.content -->
@endsection
