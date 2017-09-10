<?php
/**
 * Created by PhpStorm.
 * User: mohammed.mohasin
 * Date: 28-Aug-17
 * Time: 2:14 PM
 */

?>
<form action="{{route('updatetestimonial',['id'=>$contents->id])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
    {{csrf_field()}}


    <div class="control-group">
        <label class="control-label">Name* : </label>
        <div class="controls">
            <input class="span11" name="testimonial_name" value="{{$contents->testimonial_name}}" placeholder="Testimonial Name" type="text">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Companies : </label>
        <div class="controls">
            <input class="span11" name="testimonial_companies" value="{{$contents->testimonial_companies}}" placeholder="Testimonial Companies" >
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Country* : </label>
        <div class="controls">
            <input class="span11" name="testimonial_country" value="{{$contents->testimonial_country}}" placeholder="Testimonial Country" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"> Image* : </label>
        <div class="controls">

            <input type="file" name="testimonial_images" id="input-file" />
            <input type="hidden" value="{{$contents->testimonial_images}}" name="testimonial_old_url"  />
            @if($contents->testimonial_images!='')
                <a href="{{asset($contents->testimonial_images)}}" target="_blank"><img src="{{asset($contents->testimonial_images)}}" width="100"></a>
            @endif
        </div>
    </div>


    <div class="control-group">
        <label class="control-label">Testimonial Desc* : </label>
        <div class="controls">
            <textarea class="span10 " name="testimonial_desc" rows="1"
                      placeholder="Testimonial Desc" name="testimonial_desc" >{{$contents->testimonial_desc}}</textarea>
        </div>

    </div>

    <div class="control-group">
        <label class="control-label">Facebook ID : </label>
        <div class="controls">
            <input class="span11" name="testimonial_facebook" value="{{$contents->testimonial_facebook}}" placeholder="testimonial_facebook" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Twitter ID : </label>
        <div class="controls">
            <input class="span11" name="testimonial_twitter" value="{{$contents->testimonial_twitter}}" placeholder="testimonial_twitter" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Google Plus ID : </label>
        <div class="controls">
            <input class="span11" name="testimonial_google_pluS" value="{{$contents->testimonial_google_pluS}}" placeholder="testimonial_google_pluS" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Extra ID : </label>
        <div class="controls">
            <input class="span11" name="testimonial_extra" value="{{$contents->testimonial_extra}}" placeholder="testimonial_extra" type="text">
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
