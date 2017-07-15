@extends('admin.layouts.layout')

@section('content')
	<div class="col-md-8 col-md-offset-1">
		<div class="content-box-large">
			<div class="panel-heading">
            <div class="panel-title">All Account Type</div>

        </div>
			<div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <th>
                            Account Type
                        </th>
                        <th>
                            Edit
                        </th>

                        <th>
                            Delete
                        </th>
                    </thead>
                    <tbody>
                        @foreach($account_type as $account_types)
                            <tr>
                                <td>
                                    {{ $account_types->name }}
                                </td>
                                <td>
                                    <a href="{{ route('account_type.edit', ['id' => $account_types->id]) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ route('account_type.delete', ['id' => $account_types->id]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
			</div>
		</div>
	</div>
@stop

@section('footer')
	@include('admin.templates.footer')
@stop

	
		