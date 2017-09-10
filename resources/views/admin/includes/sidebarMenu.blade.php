<?php
/**
 * Created by PhpStorm.
 * User: mohsin
 * Date: 8/26/2017
 * Time: 8:14 PM
 */
?>
<?php
$dashbaord = '';
$page_name = '';
$clients= '';
$pricing= '';
$testimonial = '';
$settings = '';
$user = '';
$team = '';
switch (isset($page)) {
    case 'dashboard':
        $dashbaord = 'active';
        break;
    case 'page':
        $page_name = 'active open';
        break;
    case 'client':
        $clients = 'active open';
        break;
    case 'pricing':
        $pricing = 'active open';
        break;
    case 'testimonial':
        $testimonial = 'active open';
        break;
    case 'team':
        $team = 'active open';
        break;
    case 'settings':
        $settings = 'active';
        break;
    case 'user':
        $settings = 'active';
        break;
    default:
        $dashbaord = 'active';
}


?>

<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('admin')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="{{$dashbaord}}"><a href="{{url('admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu {{$page_name}}">
            <a href="{{url('admin/page')}}"><i class="icon icon-th-list"></i> <span>Page</span></a>
            <ul>

                <li><a href="{{route('pageList')}}">Page List</a></li>
                <li><a href="{{route('addpage')}}">Add Page</a></li>
            </ul>
        </li>

        
        <li class="submenu {{$pricing}}">
            <a href="{{url('admin/pricing')}}"><i class="icon icon-th"></i> <span>Pricing</span> </a>
            <ul>
                <li><a href="{{url('admin/pricing')}}">Pricing List</a></li>
                <li><a href="{{url('admin/pricing/add')}}">Add Pricing</a></li>
            </ul>
        </li>

        <li class="submenu {{$clients}}">
            <a href="{{url('admin/client')}}"><i class="icon icon-fullscreen"></i> <span>clients</span> </a>
            <ul>
                <li><a href="{{url('admin/client')}}">Clients List</a></li>
                <li><a href="{{url('admin/client/add')}}">Add Client</a></li>
            </ul>
        </li>

        <li class="submenu {{$testimonial}}">
            <a href="{{url('admin/testimonial')}}"><i class="icon icon-fullscreen"></i> <span>Testimonial</span> </a>
            <ul>
                <li><a href="{{url('admin/testimonial')}}">Testimonial List</a></li>
                <li><a href="{{url('admin/testimonial/add')}}">Add Testimonial</a></li>
            </ul>
        </li>
        <li class="submenu {{$team}}">
            <a href="{{url('admin/team')}}"><i class="icon icon-fullscreen"></i> <span>Team</span> </a>
            <ul>
                <li><a href="{{url('admin/team')}}">Team List</a></li>
                <li><a href="{{url('admin/team/add')}}">Add Team</a></li>
            </ul>
        </li>
        <li class="submenu {{$user}}">
            <a href="{{url('admin/user')}}"><i class="icon icon-fullscreen"></i> <span>User</span> </a>
            <ul>
                <li><a href="{{url('admin/user')}}">User List</a></li>
                <li><a href="{{url('admin/register')}}">Add User</a></li>
            </ul>
        </li>

        <li class="{{$settings}}"> <a href="{{url('admin/settings')}}"><i class="icon icon-inbox"></i> <span>Settings</span></a> </li>


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
