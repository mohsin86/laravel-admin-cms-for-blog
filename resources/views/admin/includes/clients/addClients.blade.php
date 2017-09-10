<?php
/**
 * Created by PhpStorm.
 * User: mohammed.mohasin
 * Date: 28-Aug-17
 * Time: 2:13 PM
 */

$client_title = old('client_title');
?>


<form action="{{route('storeclient')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="control-group">
        <label class="control-label">Client Title :</label>
        <div class="controls">
            <input class="span11" name="client_title" value="{{old('client_title')}}" placeholder="Page Title" type="text">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Client Image</label>
        <div class="controls">
            <input type="file" name="client_image" id="input-file"/>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
