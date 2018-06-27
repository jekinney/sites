@extends('layouts.app')

@section( 'title', 'Plans' )

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <header class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="card-title">Stripe Plans</h1>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create-subscription-modal">
                            Add
                        </button>
                    </header>
                        
                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nickname</th>
                                <th scope="col">Interval</th>
                                <th scope="col">Amount</th>
                                <th scope="col"># users</th>
                                <th scope="col">Publish</th>
                                <th scope="col">Expires</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach( $plans as $plan )
                                <tr>
                                    <td>{{ $plan->stripe_id }}</td>
                                    <td>{{ $plan->nickname }}</td>
                                    <td>{{ $plan->formatPrice() }}</td>
                                    <td>{{ $plan->users_count }}</td>
                                    <td>{{ $plan->publish_at->toDateTimeFormat() }}</td>
                                    <td>{{ $plan->expires_at->toDateTimeFormat() }}</td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

    @include( 'users.stripe.create-modal' )
@endsection
