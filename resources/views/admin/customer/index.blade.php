@extends('admin.layouts.layout')

@section('content')
	<div class="col-md-8 col-md-offset-1">
		<div class="content-box-large">
			<div class="panel-heading">
            <div class="panel-title">All Customers</div>

        </div>
			<div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Phone Number
                            </th>
                            <th>
                                Account Type
                            </th>
                            <th>
                                Account Number
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </thead>
                        <tbody>
                            @foreach($user as $users)
                                @if($users->role->customer)
                                    <tr>
                                        <td>
                                            {{ $users->name }}
                                        </td>
                                        <td>
                                            {{ $users->email }}
                                        </td>
                                        <td>
                                            {{ $users->username }}
                                        </td>
                                        <td>
                                            {{ $users->profile->phone_number }}
                                        </td>
                                        <td>
                                            {{ $users->accounts->pluck('account_name')->values()->implode('account_type_id', ' ') }}
                                        </td>
                                        <td>
                                            {{ $users->accounts->pluck('account_number')->values()->implode('account_number', ' ') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('customer_account.edit', ['id'=>$users->id]) }}" class="btn btn-success btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('customer.delete', ['id'=>$users->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
	</div>
@stop

@section('footer')
	@include('admin.templates.footer')
@stop