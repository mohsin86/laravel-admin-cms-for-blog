<?php
/**
 * Created by PhpStorm.
 * User: mohammed.mohasin
 * Date: 28-Aug-17
 * Time: 2:14 PM
 */
?>
<form action="{{route('updateclient',['id'=>$contents->id])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="control-group">
        <label class="control-label">Client Title :</label>
        <div class="controls">
            <input class="span11" name="client_title" value="{{$contents->client_title}}" placeholder="Client Title" type="text">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Client Image</label>
        <div class="controls">

            <input type="file" name="client_image" id="input-file" />
            <input type="hidden" value="{{$contents->client_image}}" name="client_old_url"  />
            @if($contents->client_image!='')
                <a href="{{asset($contents->client_image)}}" target="_blank"><img src="{{asset($contents->client_image)}}" width="100"></a>
            @endif
        </div>
    </div>


    <div class="form-actions">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
