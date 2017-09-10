<?php
/**
 * Created by PhpStorm.
 * User: mohsin
 * Date: 8/27/2017
 * Time: 3:30 PM
 */
?>
<div class="widget-content">

    <form method="post" action="{{action('LeadController@store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group form-group-lg">
            <label for="first-name">First Name</label>
            <input size="12" type="text" class="form-control" name="first_name" id="title">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="title">
        </div>

        <div class="form-group">
            <label for="profile-url">Profile Url</label>
            <input type="text" class="form-control" name="profile_url" id="profile-url">
        </div>

        <div class="form-group">
            <label for="profile-image">Image</label>
            <input type="file" class="form-control" name="profile_image" id="input-file" accept="image/*">
        </div>

        <div class="form-group">
            <label for="company-name">Company Name</label>
            <input type="text" class="form-control" name="company_name" id="company-name">
        </div>

        <div class="form-group">
            <label for="company-url">Company Url</label>
            <input type="text" class="form-control" name="company_url" id="company-url">
        </div>

        <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" name="designation" id="designation">
        </div>

        <div class="form-group">
            <label for="extra-info">Extra Info:</label>
            <textarea class="form-control" name="extra_info" id="extra-info" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="source">Source</label>
            <input type="text" class="form-control" name="source" id="source" placeholder="Facebook, Linkding, Twitter">
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="valid" class="form-check-input">Valid</label>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

</div>
