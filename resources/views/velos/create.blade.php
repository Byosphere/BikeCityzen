@extends('app')

@section('content')
<div class="container contenu">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Ajouter un Vélo</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('velo.store') }}">

					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group @if($errors->has('modele')) has-error  @endif">
						<label class="col-md-4 control-label">Modèle</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="modele" value="{{ old('modele') }}">
						</div>
					</div>
					<div class="form-group @if($errors->has('categorie')) has-error  @endif">
						<label class="col-md-4 control-label">Catégorie</label>
						<div class="col-md-6">
							<select class="form-control" name="categorie">
								<option value='enfant'>Enfant</option>
								<option value='adulte'>Adulte</option>
							</select>
						</div>
					</div>
					<div class="form-group @if($errors->has('image')) has-error  @endif">
						<label class="col-md-4 control-label">Photo</label>
						<div class="col-md-6">
							<button class='btn btn-default btn-file'><input type="file" name="image">Importer une photo</button>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								Enregistrer
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
