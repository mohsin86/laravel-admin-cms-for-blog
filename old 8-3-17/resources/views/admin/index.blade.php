@extends('admin.layouts.layouts')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="{{url('admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
    {{--<div class="quick-actions_homepage">--}}
    {{--<ul class="quick-actions">--}}
    {{--<li class="bg_lb"> <a href="index.html"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> My Dashboard </a> </li>--}}
    {{--<li class="bg_lg span3"> <a href="charts.html"> <i class="icon-signal"></i> Charts</a> </li>--}}
    {{--<li class="bg_ly"> <a href="widgets.html"> <i class="icon-inbox"></i><span class="label label-success">101</span> Widgets </a> </li>--}}
    {{--<li class="bg_lo"> <a href="tables.html"> <i class="icon-th"></i> Tables</a> </li>--}}
    {{--<li class="bg_ls"> <a href="grid.html"> <i class="icon-fullscreen"></i> Full width</a> </li>--}}
    {{--<li class="bg_lo span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>--}}
    {{--<li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>--}}
    {{--<li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>--}}
    {{--<li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>--}}
    {{--<li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li>--}}

    {{--</ul>--}}
    {{--</div>--}}
    <!--End-Action boxes-->

        <!--Chart-box-->

        <!--End-Chart-box-->
        <hr/>
        <div class="row-fluid">

            @include('admin.includes.error-succes-message')

            <style>
                input, textarea, .uneditable-input {
                    width: 60%;
                }
            </style>
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-ok"></i></span>
                        <h5>Lead Generation</h5>
                        @if ($display=='list')
                        <a href="#" class="btn btn-success pull-right">Generate Excel </a>

                        <a href="{{route('AddLead')}}" class="btn btn-success pull-right mr3" style="margin-right: 10px">Add </a>
                        @else
                            <a href="{{url('admin')}}" class="btn btn-success pull-right">Back </a>
                        @endif
                    </div>
                    @if($display=='list')
                        @include('admin.includes.leadList')
                    @endif

                    @if ($display=='add')
                           @include('admin.includes.addLead')

                    @endif
                    @if ($display =='edit')
                        @include('admin.includes.editLead')

                    @endif
                </div>


            </div>

        </div>
    </div>
@endsection