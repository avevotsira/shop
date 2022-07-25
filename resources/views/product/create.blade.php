@extends('admin.layout')

@section('content')
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Create Product</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="/product">View All Product </a></li>
			@if(Session::has('category_create'))
<div class="alert alert-success"><em>{!! session('category_create') !!}</em>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>    
</div>
@endif
@if (count($errors) > 0)
<!-- Form Error List -->
<div class="alert alert-danger">
	<strong>Something is Wrong</strong>
	<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{!! $error !!}</li>
		@endforeach
	</ul>
</div>
@endif
		</ol>
		<div class="card mb-4">
			<div class="card-body">
			</div>
		</div>
		<div>	
  <!-- It Create the new Category -->


	{!! Form::open(array('url'=>'product', 'files'=>'true')) !!}
<br>


{!! Form::label('name', 'Name:') !!}
{!! Form::text('name',null, array('class'=>'form-control')) !!}

{!! Form::label('description', 'Description:') !!}
{!! Form::text('description',null, array('class'=>'form-control')) !!}

{!! Form::label('image', 'Image:') !!}
{!! Form::file('image', array('class'=>'form-control')) !!}
<br>
{!! Form::label('price', 'Price') !!}
{!! Form::text('price',null, array('class'=>'form-control')) !!}
  
{!! Form::submit('Create', array('class'=>'btn btn-primary')) !!}

<a class="btn btn-primary" href="{!! url('/product')!!}">Back</a>

{!! Form::close() !!}
		</div>
		<div style="height: 100vh;"></div>
		<div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
	</div>
</main>
@endsection
