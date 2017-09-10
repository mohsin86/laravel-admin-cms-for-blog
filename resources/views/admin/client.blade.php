@extends('admin.layouts.layouts')

@section('content')
    <style>
        #pageOptions .form-group{
            display: inline-block;
            margin-right: 20px;
        }
        #pageOptions{
            float: left;
            position: relative;
            margin-left: 52px;
            padding: 17px 10px 31px 0px;
        }
        #pageOptions input[type="text"]{
            height: 46px;
        }
        #OptionCopy{
            display: none;
        }
    </style>
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="{{url('admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Clients</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <!--Chart-box-->

        <!--End-Chart-box-->
        <hr/>
        <div class="row-fluid">

            @include('admin.includes.error-succes-message')

            <div class="span11">

                @if($display=='list')
                    <div class="widget-box nopadding">
                        <div class="widget-title"><span class="icon"><i class="icon-ok"></i></span>
                            <h5>Page </h5>
                            <a href="{{route('addpage')}}" class="btn btn-success pull-right mr3" style="margin-right: 10px">Add Client</a>
                        </div>
                        @include('admin.includes.clients.clientsList')
                    </div>
                @endif

                @if ($display=='add')
                        <div class="widget-box nopadding">
                            <div class="widget-title"><span class="icon"><i class="icon-ok"></i></span>
                                <h5>Add Client </h5>
                            </div>
                            @include('admin.includes.clients.addClients')
                        </div>
                @endif

                @if ($display =='edit')
                        <div class="widget-box nopadding">
                            <div class="widget-title"><span class="icon"><i class="icon-ok"></i></span>
                                <h5>Edit Client </h5>
                            </div>
                            @include('admin.includes.clients.editClients')
                        </div>
                @endif


            </div>

        </div>
    </div>
@endsection