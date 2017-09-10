<?php
/**
 * Created by PhpStorm.
 * User: mohammed.mohasin
 * Date: 28-Aug-17
 * Time: 2:14 PM
 */

$pricing_additional_feature_title = old('pricing_additional_feature_title');
$options = [];
if(!empty($pricing_additional_feature_title)){
    $i = 0;
    foreach ($pricing_additional_feature_title as $title){
        $options[$i]['pricing_additional_feature_title'] = $title;
        $i++;
    }
}

$pricing_additional_feature_title = old('pricing_additional_feature_title');

$editoptions = [];
if(!empty($pricing_additional_feature_title)){
    $i = 0;
    foreach ($pricing_additional_feature_title as $title){
        $editoptions[$i]['pricing_additional_feature_title'] = $title;
        $i++;
    }
}


if(count($pricing_features)< 0 || count($editoptions)>0){
    $pricing_features = $editoptions;
}


$pricing_title = old('pricing_title') !='' ? old('pricing_title'): $contents->pricing_title;
$pricing_core_features = old('pricing_core_features') !='' ? old('pricing_core_features'): $contents->pricing_core_features;

?>
<form action="{{route('updatepricing',['id'=>$contents->id])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="control-group">
        <label class="control-label">Pricing Title :</label>
        <div class="controls">
            <input class="span11" name="pricing_title" value="{{$pricing_title}}" placeholder="Pricing Title" type="text">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Pricing Core Features</label>
        <div class="controls">
            <textarea class="textarea_editor span10" name="pricing_core_features"  placeholder="Core Features">{{$pricing_core_features}}</textarea>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Aditional Features</label>
        <div id="pageOptions" class="form-inline">
            <div id="" class="AddMore span12 ">
                @if(!empty($pricing_features)):
                <?php
                $i = 0;
                ?>
                @foreach($pricing_features as $option)
                    <div id="{{ $i==0 ? 'first-row' : '' }}" class="row list-group-item">
                        <div class="form-group">
                            <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
                            <label for="email">Features Title:</label>
                            <input type="hidden" value="{{$option['id']}}" name="pricing_featuress_id[]">
                            <input type="text" class="form-control" value="{{$option['pricing_additional_feature_title']}}"  placeholder="Enter Additional Features"
                                   name="pricing_additional_feature_title[]">
                        </div>

                        @if ($i==0)
                            <a href="#" id="AddMorePage" class="btn btn-info">Add More</a>
                        @else
                            <div class="remove" style="display: inline-block">

                                <a  href="{{route('deletepricingfeatures')}}" data-primaryId="{{$option['id']}}" class="removeTag2Pagent deleteRow"  onclick="javascript: return false;">Remove<i class="icon-remove"></i></a>

                            </div>
                        @endif
                    </div>
                    <?php $i++; ?>
                @endforeach

                @else
                    <div id="first-row" class="row">
                        <div class="form-group">
                            <label for="email">Features Title:</label>
                            <input type="text" class="form-control"  placeholder="Enter Additional Feature"
                                   name="pricing_additional_feature_title[]">
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
    <div class="row list-group-item">
        <div class="form-group">
            <span class="glyphicon glyphicon-move" aria-hidden="true"></span>
            <label for="email">Features Title :</label>
            <input type="text" class="form-control"  placeholder="Enter Additional Feature"
                   name="pricing_additional_feature_title[]">
        </div>

        <div class="remove" style="display: inline-block">
            <a  href="#" data-primaryId="" class="removeTag2Pagent"  onclick="javascript: return false;"><i class="icon-remove"></i></a>
        </div>
    </div>

</div>