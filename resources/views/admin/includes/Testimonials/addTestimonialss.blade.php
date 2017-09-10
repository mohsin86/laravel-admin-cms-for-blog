<?php
/**
 * Created by PhpStorm.
 * User: mohammed.mohasin
 * Date: 28-Aug-17
 * Time: 2:13 PM
 */

?>
<form action="{{route('storetestimonial')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="control-group">
        <label class="control-label">Name* : </label>
        <div class="controls">
            <input class="span11" name="testimonial_name" value="{{old('testimonial_name')}}" placeholder="Name" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Companies :</label>
        <div class="controls">
            <input class="span11" name="testimonial_companies" value="{{old('testimonial_companies')}}" placeholder="Companies" >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Country :</label>
        <div class="controls">
            <input class="span11" name="testimonial_country" value="{{old('testimonial_country')}}" placeholder="Country" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Image</label>
        <div class="controls">
            <input type="file" name="testimonial_images" id="input-file"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Testimonial Desc:</label>
        <div class="controls">
             <textarea class="span11" name="testimonial_desc" rows="1" placeholder="Testimonial Desc">{{old('testimonial_desc')}}</textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Facebook ID :</label>
        <div class="controls">
            <input class="span11" name="testimonial_facebook" value="{{old('testimonial_facebook')}}" placeholder="facebook Link" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Twitter ID :</label>
        <div class="controls">
            <input class="span11" name="testimonial_twitter" value="{{old('testimonial_twitter')}}" placeholder="Twitter Link" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Google Plus ID :</label>
        <div class="controls">
            <input class="span11" name="testimonial_google_pluS" value="{{old('testimonial_google_pluS')}}" placeholder="Google Plus Link" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Extra ID :</label>
        <div class="controls">
            <input class="span11" name="testimonial_extra" value="{{old('testimonial_extra')}}" placeholder="Testimonial Extra" type="text">
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>