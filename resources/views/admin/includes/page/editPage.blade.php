<?php
/**
 * Created by PhpStorm.
 * User: mohammed.mohasin
 * Date: 28-Aug-17
 * Time: 2:14 PM
 */


$page_options_title = old('page_options_title');
$page_options_body = old('page_options_body');
$page_options_id = old('page_options_id');
$editoptions = [];
if(!empty($page_options_title)){
    $i = 0;
    foreach ($page_options_title as $title){
        $editoptions[$i]['page_options_title'] = $title;
        $editoptions[$i]['page_options_id'] = $page_options_id;
        $i++;
    }
}
if(!empty($page_options_body)){
    $i = 0;
    foreach ($page_options_body as $body){
        $editoptions[$i++]['page_options_body'] = $body;
    }
}

if(count($page_options)<0 || count($editoptions)>0){
    $page_options = $editoptions;
}


$page_body = old('page_body') !='' ? old('page_body'): $contents->page_body;
?>
<form action="{{route('updatepage',['id'=>$contents->id])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="control-group">
        <label class="control-label">Page Title :</label>
        <div class="controls">
            <input class="span11" name="page_title" value="{{$contents->page_title}}" placeholder="Page Title" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Page Subtitle :</label>
        <div class="controls">
            <input class="span11" name="page_subtitle" value="{{$contents->page_title}}" placeholder="Page Subtitle" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Featured Image</label>
        <div class="controls">

            <input type="file" name="page_featured_image" id="input-file" />
            <img src="{{asset($contents->page_featured_image)}}" width="100" />
            <input type="hidden" value="{{$contents->page_featured_image}}" name="page_old_url"  />
            @if($contents->page_featured_image!='')
                <a href="{{asset($contents->page_featured_image)}}" target="_blank"><img src="{{asset($contents->page_featured_image)}}" width="100"></a>
            @endif
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Body</label>
        <div class="controls">
            <textarea class="textarea_editor" name="page_body" rows="10"  placeholder="Enter text ...">{{$contents->page_body}}</textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Pages Options</label>
        <div id="pageOptions" class=form-inline">
            <div class="AddMore span12">
                @if(count($page_options)>0):
                <?php

                $i = 0;
                ?>
                @foreach($page_options as $option)
                    <div id="{{ $i==0 ? 'first-row' : '' }}" class="row">
                        <div class="form-group">
                            <label for="email">Option Title:</label>
                            <input type="hidden" value="{{$option['id']}}" name="page_options_id[]">

                            <input type="text" class="form-control" value="{{$option['page_options_title']}}"  placeholder="Enter Option Title"
                                   name="page_options_title[]">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Option Body:</label>
                            <textarea class="span10 " name="page_options_body[]" rows="1"
                                      placeholder="Enter Option text ...">{{$option['page_options_body']}}</textarea>
                        </div>
                        @if ($i==0)
                            <a href="#" id="AddMorePage" class="btn btn-info">Add More</a>
                        @else
                            <div class="remove" style="display: inline-block">


                                <a  href="{{route('deletepageoptions')}}" data-primaryId="{{$option['id']}}" class="removeTag2Pagent deleteRow"  onclick="javascript: return false;">Remove<i class="icon-remove"></i></a>


                            </div>
                        @endif
                    </div>
                    <?php $i++; ?>
                @endforeach

                @else
                    <div id="first-row" class="row">
                        <div class="form-group">
                            <label for="email">Option Title:</label>
                            <input type="text" class="form-control"  placeholder="Enter Option Title"
                                   name="page_options_title[]">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Option Body:</label>
                            <textarea class="span10 " name="page_options_body[]" rows="1"
                                      placeholder="Enter Option text ..."></textarea>
                        </div>
                        <a href="#" id="AddMorePage" class="btn btn-info">Add More</a>
                    </div>

                @endif
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>

<div id="OptionCopy">
    <div class="row">
        <div class="form-group">
            <label for="email">Option Title:</label>
            <input type="text" class="form-control"  placeholder="Enter Option Title"
                   name="page_options_title[]">
        </div>
        <div class="form-group">
            <label for="pwd">Option Body:</label>
            <textarea class="span10 " name="page_options_body[]"
                      placeholder="Enter Option text ..."></textarea>
        </div>
        <div class="remove" style="display: inline-block">
            <a  href="#" data-primaryId="" class="removeTag2Pagent"  onclick="javascript: return false;">Remove<i class="icon-remove"></i></a>
        </div>
    </div>

</div>