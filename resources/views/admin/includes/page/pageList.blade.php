<?php
/**
 * Created by PhpStorm.
 * User: mohammed.mohasin
 * Date: 28-Aug-17
 * Time: 2:12 PM
 */
?>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            ?>
            @foreach($contents as $content)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>{{$content->page_title}}</td>
                    <td>  @if($content->page_featured_image!='')
                            <a href="{{asset($content->page_featured_image)}}" target="_blank"><img src="{{asset($content->page_featured_image)}}" width="100"></a>
                         @endif
                    </td>
                    <td>
                         <a href="{{route('editpage',['id'=>$content->id])}}" data-original-title="Edit Page"><i class="icon-pencil"></i>Edit</a>
                         <a href="{{route('deletepage')}}" class="deleteRow" data-primaryId="{{$content->id}}" onclick="javascript:return false" data-original-title="Delete"><i class="icon-remove"></i>
                         del</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
