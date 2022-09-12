@extends('admin.layout')

@section('content')
<main>
<div class="container-fluid">
		<h1 class="mt-4">Test</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active"><a href="category/create">Create New Test</a></li>
<h2>
{!! Form::open(array('url'=>'/category','method'=>'get')) !!}
                    <div class="input-group">
                        {!! Form::text('keyword',$keyword ?? '', array('placeholder'=>'Search', 'class'=>'form-control')) !!}
                        <span class="input-group-btn">
                            {!! Form::submit('search',array('class'=>'btn btn-primary')) !!}
                        </span>
                    </div>
                    {!! Form::close() !!}
</h2>
	</div>
    <div class="container-fluid">
      <div class="card mb-4">
            <div class="card-body">
                @if (count($categories) > 0)
                <table class="table table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>View Detail</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                                {!! $category->id !!}
                            </td>
                            <td>
                                {!! $category->name !!}
                            </td>
                            <td>
                                {!! $category->duration !!}
                            </td>
                            <td>
                                {!! $category->type !!}
                            </td>
                            <td><a class="btn btn-primary" href="{!! url('category/' . $category->id . '/edit') !!}">Edit</a></td>
                            @if(Session::has('category_delete'))
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Primary!</strong> {!! session('category_delete') !!}
                </div>
                @endif
        
                            <td>
                                 {!! Form::open(array('url'=>'category/'. $category->id, 'method'=>'DELETE')) !!}
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                            	<button class="btn btn-danger delete">Delete</button>
                                {!! Form::close() !!} 
                            </td>
                            <td><a class="btn btn-primary" href="{!! url('category/' . $category->id . '/viewdetail') !!}">View Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--use with dialog-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
	<script>
            $(".delete").click(function() {
                var form = $(this).closest('form');
                $('<div></div>').appendTo('body')
                    .html('<div><h6> Are you sure ?</h6></div>')
                    .dialog({
                        modal: true,
                        title: 'Delete message',
                        zIndex: 10000,
                        autoOpen: true,
                        width: 'auto',
                        resizable: false,
                        buttons: {
                            Yes: function() {
                                $(this).dialog('close');
                                form.submit();
                            },
                            No: function() {
                                $(this).dialog("close");
                                return false;
                            }
                        },
                        close: function(event, ui) {
                            $(this).remove();
                        }
                    });
                return false;
            });
        </script>
                @endif
            </div>
        </div>
        <div style="height: 100vh;"></div>
    </div>
</main>
@endsection