@extends('admin.layouts.layouts')
<?php
$site_title = isset($contents['site_title'])?$contents['site_title']:'';
$site_logo = isset($contents['site_logo'])?$contents['site_logo']:'';

?>


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
                Testimonialss</a></div>
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


                    <div class="widget-box nopadding">
                        <div class="widget-title"><span class="icon"><i class="icon-ok"></i></span>
                            <h5>Settings </h5>

                        </div>
                        <form action="{{route('updatesitesettings')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="control-group">
                                <label class="control-label">Site Title* : </label>
                                <div class="controls">
                                    <input class="span11" name="site_title" value="{{$site_title}}" placeholder="site title" type="text">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"> Logo* : </label>
                                <div class="controls">

                                    <input type="file" name="site_logo" id="input-file" />
                                    <input type="hidden" value="{{$site_logo}}" name="site_logo_old_url"  />
                                    @if($site_logo!='')
                                        <a href="{{asset($site_logo)}}" target="_blank"><img src="{{asset($site_logo)}}" width="100"></a>
                                    @endif
                                </div>
                            </div>




                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>





            </div>

        </div>
    </div>
@endsection