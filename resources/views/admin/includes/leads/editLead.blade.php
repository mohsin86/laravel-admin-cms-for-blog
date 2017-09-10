<?php
/**
 * Created by PhpStorm.
 * User: mohsin
 * Date: 8/27/2017
 * Time: 3:30 PM
 */
//echo '<pre>';
//print_r($editleads);
//echo '</pre>';
?>
<style>
   #uniform-profile-url #profile-url{
       opacity: 1!important;
   }
</style>

<div class="widget-content">

    <form method="post" action="{{action('LeadController@update',['id'=>$editleads->id] )}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group form-group-lg">
            <label for="first-name">First Name</label>
            <input size="12" type="text" class="form-control"  name="first_name" value="{{$editleads->first_name}}" id="title">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" value="{{$editleads->last_name}}" id="last_name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{$editleads->email}}" id="title">
        </div>

        <div class="form-group">
            <label for="profile-url">Profile Url</label>
            <input type="text" class="form-control" name="profile_url" value="{{$editleads->profile_url}}" id="profile-url">
        </div>

        <div class="form-group">
            <label for="profile-image">Change Image</label>
            <input type="file" class="form-control input-file" name="profile_image" id="input-file"  >
            <input type="hidden" class="form-control" name="profile_old_url" value="{{$editleads->profile_image}}" id="profile_old_url">
            <img src="{{asset($editleads->profile_image)}}" width="100" />
        </div>

        <div class="form-group">
            <label for="company-name">Company Name</label>
            <input type="text" class="form-control" value="{{$editleads->company_name}}"  name="company_name" id="company-name">
        </div>

        <div class="form-group">
            <label for="company-url">Company Url</label>
            <input type="text" class="form-control" name="company_url" value="{{$editleads->company_url}}" id="company-url">
        </div>

        <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" name="designation" value="{{$editleads->designation}}" id="designation">
        </div>

        <div class="form-group">
            <label for="extra-info">Extra Info:</label>
            <textarea class="form-control" name="extra_info" id="extra-info" rows="3">
                {{trim($editleads->extra_info)}}
            </textarea>
        </div>

        <div class="form-group">
            <label for="source">Source</label>
            <input type="text" class="form-control" name="source" value="{{$editleads->source}}" id="source" placeholder="Facebook, Linkding, Twitter">
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="valid" value="{{$editleads->valid}}" class="form-check-input">Valid</label>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

</div>
