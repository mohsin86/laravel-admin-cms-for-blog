<?php
/**
 * Created by PhpStorm.
 * User: mohammed.mohasin
 * Date: 28-Aug-17
 * Time: 2:13 PM
 */

?>
<form action="{{route('storeteam')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="control-group">
        <label class="control-label">Name* : </label>
        <div class="controls">
            <input class="span11" name="team_name" value="{{old('team_name')}}" placeholder="Name" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Designation :</label>
        <div class="controls">
            <input class="span11" name="team_designation" value="{{old('team_designation')}}" placeholder="designation" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Image</label>
        <div class="controls">
            <input type="file" name="team_images" id="input-file"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Team about:</label>
        <div class="controls">
             <textarea class="textarea_editor span11" name="team_details" rows="1" placeholder="Team About">{{old('team_details')}}</textarea>
        </div>
    </div>



    <div class="control-group">
        <label class="control-label">Facebook Link :</label>
        <div class="controls">
            <input class="span11" name="team_facebook" value="{{old('team_facebook')}}" placeholder="facebook Link" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Twitter Link :</label>
        <div class="controls">
            <input class="span11" name="team_twitter" value="{{old('team_twitter')}}" placeholder="Twitter Link" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Google Plus Link :</label>
        <div class="controls">
            <input class="span11" name="team_google_pluS" value="{{old('team_google_pluS')}}" placeholder="Google Plus Link" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Linkdin Link :</label>
        <div class="controls">
            <input class="span11" name="team_linkdin" value="{{old('team_linkdin')}}" placeholder="Linkdin Link" type="text">
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>