<?php
/**
 * Created by PhpStorm.
 * User: mohsin
 * Date: 8/26/2017
 * Time: 8:14 PM
 */
?>
<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('admin')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="{{url('admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu">
            <a href="{{url('admin/page')}}"><i class="icon icon-th-list"></i> <span>Page</span></a>
            <ul>
                <li><a href="{{url('admin/addpage')}}">Add Page</a></li>
            </ul>
        </li>

        <li class="submenu">
            <a href="{{url('admin/pricing')}}"><i class="icon icon-th"></i> <span>Pricing</span> </a>
            <ul>
                <li><a href="{{url('admin/addpricing')}}">Add Pricing</a></li>
            </ul>
        </li>

        <li class="submenu">
            <a href="{{url('admin/clients')}}"><i class="icon icon-fullscreen"></i> <span>clients</span> </a>
            <ul>
                <li><a href="{{url('admin/addpricing')}}">Add Clients</a></li>
            </ul>
        </li>

        <li class="submenu">
            <a href="{{url('admin/testimonial')}}"><i class="icon icon-fullscreen"></i> <span>Testimonial</span> </a>
            <ul>
                <li><a href="{{url('admin/addtestimonial')}}">Add Testimonial</a></li>
            </ul>
        </li>

        <li> <a href="{{url('admin/settings')}}"><i class="icon icon-inbox"></i> <span>Settings</span></a> </li>


        {{--<li><a href="{{url('admin/clients')}}"><i class="icon icon-fullscreen"></i> <span>Full width</span></a></li>--}}

        {{--<li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>--}}
        {{--<li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>--}}
        {{--<li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>--}}
            {{--<ul>--}}
                {{--<li><a href="index2.html">Dashboard2</a></li>--}}
                {{--<li><a href="gallery.html">Gallery</a></li>--}}
                {{--<li><a href="calendar.html">Calendar</a></li>--}}
                {{--<li><a href="invoice.html">Invoice</a></li>--}}
                {{--<li><a href="chat.html">Chat option</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}


    </ul>
</div>
<!--sidebar-menu-->
