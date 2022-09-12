@extends('admin.layout')
@section('content')
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Test Detail</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="/category">View All Test</a></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
            @if(Session::has('category_update'))
            <div class="alert alert-primary alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Primary!</strong> {!! session('category_update') !!}
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
            {!! Form::model($category , array('route' => array('category.update', $category->id), 'method'=>'PUT')) !!}
           	{!! Form::label('name', 'Name:') !!}
           	{!! Form::text('name',null, array('class'=>'form-control','readonly' => 'true'))!!}
            <br>
            {!! Form::label('duration', 'Duration:') !!}
           	{!! Form::text('duration',null, array('class'=>'form-control','readonly' => 'true')) !!}
            <br>
            {!! Form::label('type', 'Type:') !!}
           	{!! Form::text('type',null, array('class'=>'form-control','readonly' => 'true')) !!}
            </br>  
            <td><a class="btn btn-primary" href="{!! url('category') !!}">Back</a></td>
            </br> 
			</div>
		</div>	
	</div>
</main>
@endsection