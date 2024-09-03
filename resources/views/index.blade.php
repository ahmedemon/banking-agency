@extends('layouts.frontend.app')

@section('content')

<ul class="notification" id="notification" style="bottom: 1px; display: block; max-width: 600px; position: fixed; left: 12px; text-align: left; z-index: 2500; list-style-type: none;"></ul>
    <script type="text/javascript">
        $(function() {
            $(".notification a").attr({
                class: "btn btn-info btn-rounded"
            });
        });
        $("#notification li").click(function() {
            $(this).hide("slow");
        });
    </script>

<h1 class="mt-2 text-center">Welcome to the Blue Star Somithi Application Dashboard</h1>

<style>
    .el-tablo, .el-tablo:hover * {
        transition: none !important;
        transform: none !important;
    }
    .el-tablo a:hover{
        color: greenyellow !important;
    }
    .el-tablo:hover{
        background: #fff !important;
    }
</style>

    <div class="all-wrapper solid-bg-all">
        <div class="layout-w">
            <div class="content-w">
                <div class="content-i">
                    <div class="content-box">
                        <div>
                            <div class="row">
                                @role('admin|manager')
                                    @include('dashboard.summary')
                                @elserole('accountant')
                                    @include('dashboard\summary-acc')
                                @else
                                    @include('dashboard.summary-area')
                                @endrole
                            </div>
                        </div>

                        @include('dashboard.shortcuts')
                    </div>
                </div>
            </div>
        </div>
@endsection
