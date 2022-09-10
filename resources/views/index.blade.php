@extends('admin.layout')

@section('content')
<main>
<div class="container-fluid">
		<h1 class="mt-4">Category</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.html">View All Category </a></li>
			<li class="breadcrumb-item active"><a href="category/create">Create category</a></li>

	</div>
    <div class="container-fluid">
      <div class="card mb-4">
            <div class="card-body">
                @if (count($categories) > 0)
                <table class="table table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Other</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                                {!! $category->description !!}
                            </td>
                            <td>
                                {!! $category->other !!}
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