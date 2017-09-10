<?php
/**
 * Created by PhpStorm.
 * User: mohsin
 * Date: 8/27/2017
 * Time: 3:31 PM
 */


?>
<div class="widget-content nopadding">

    <div class="todo">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Profile Image</th>
                    <th>Company Name</th>
                    <th>Designation</th>
                    <th>Extra Info</th>
                    <th>source</th>
                    <th>Valid</th>
                    <th>Action</th>

                </tr>

            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach($leads as $lead)
             <tr class="grade ">
                 <td><div class="txt"> {{$i++}}</div></td>
                 <td><div class="txt"><a href="{{$lead->profile_url}}" target="_blank"> {{$lead->first_name}}</a></div></td>
                 <td><div class="txt"><a href="{{$lead->profile_url}}" target="_blank"> {{$lead->last_name}}</a></div></td>
                 <td><div class="txt"> {{$lead->email}}</div></td>
                 <td><div class="txt">
                       @if($lead->profile_image!='')
                         <a href="{{asset($lead->profile_image)}}" target="_blank"><img src="{{asset($lead->profile_image)}}" width="100"></a> </div></td>
                        @endif
                 <td><div class="txt"><a href="{{$lead->company_url}}" target="_blank">  {{$lead->company_name}}</a></div></td>
                 <td><div class="txt"> {{$lead->designation}}</div></td>
                 <td><div class="txt"> {{$lead->extra_info}}</div></td>
                 <td><div class="txt"> {{$lead->source}}</div></td>

                 <td><div class="txt"> {{$lead->valid}}</div></td>
                 <td><div class="pull-right">
                         <a  href="{{route('editLead',['id'=>$lead->id])}}" title="Edit Task"><i class="icon-pencil"></i></a>
                         <a id="deleteLead" data-leadId="{{$lead->id}}" onclick="javascript:return false;" title="Delete"><i class="icon-remove"></i></a>
                     </div>
                 </td>
             </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
