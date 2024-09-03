@extends('layouts.frontend.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h5 class="font-weight-light">
                        <strong>Warning!</strong> Your savings account is not about to 365 days. You don`t get any profit. <br>
                        You are about to redirect transaction page in 10 seconds
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(() => {
            window.location = "{{route('savings.transactions', $savings->id)}}";
        }, 10000);
    </script>

@endsection
