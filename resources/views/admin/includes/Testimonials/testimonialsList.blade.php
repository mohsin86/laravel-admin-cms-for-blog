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
                <th>Name</th>
                <th>Company</th>
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
                    <td>{{$content->testimonial_name}}</td>
                    <td>{{$content->testimonial_companies}}</td>
                    <td>  @if($content->testimonial_images!='')
                            <a href="{{asset($content->testimonial_images)}}" target="_blank"><img src="{{asset($content->testimonial_images)}}" width="100"></a>
                         @endif
                    </td>
                    <td>
                         <a href="{{route('edittestimonial',['id'=>$content->id])}}" data-original-title="Edit testimonial"><i class="icon-pencil"></i></a>
                         <a href="{{route('deletetestimonial')}}" class="deleteRow" data-primaryId="{{$content->id}}" onclick="javascript:return false" data-original-title="Delete"><i class="icon-remove"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
