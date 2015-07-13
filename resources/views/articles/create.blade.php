@extends('app')

@section('content')
<div class="container contenu">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Créer un nouvel article</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('post.store') }}">
					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<div class="form-group @if($errors->has('titre')) has-error  @endif">
						<label class="col-md-4 control-label">Titre</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="titre" value="{{ old('titre') }}">
						</div>
						<span class="errors text-danger">{{$errors->first('titre')}}</span>
					</div>
					<div class="form-group @if($errors->has('chapo')) has-error  @endif">
						<label class="col-md-4 control-label">Chapo</label>
						<div class="col-md-6">
							<textarea rows="5" class="form-control" name="chapo">{{ old('chapo') }}</textarea>
						</div>
						<span class="errors text-danger">{{$errors->first('chapo')}}</span>
					</div>
					<div class="form-group @if($errors->has('contenu')) has-error  @endif">
						<label class="col-md-4 control-label">Contenu</label>
						<div class="col-md-6">
							<textarea rows="15" class="form-control" name="contenu">{{ old('contenu') }}</textarea>
						</div>
						<span class="errors text-danger">{{$errors->first('contenu')}}</span>
					</div>
				
					<div class="form-group @if($errors->has('photo')) has-error  @endif">
						<label class="col-md-4 control-label">Photo</label>
						<div class="col-md-6">
							<button class='btn btn-default btn-file'><input type="file" name="photo">Importer une photo</button>
						</div>
					</div>
				
					<div class="form-group">
						<label class="col-md-4 control-label">Publier</label>
						<div class="checkbox">
						  <label>
						    <input type="radio" value="oui" name='publie'>Oui
						  </label>
						  <label>
						    <input type="radio" value="non" name='publie' checked>Non
						  </label>
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