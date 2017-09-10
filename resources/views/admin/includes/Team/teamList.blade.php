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
                <th>Designation</th>
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
                    <td>{{$content->team_name}}</td>
                    <td>{{$content->team_designation}}</td>
                    <td>  @if($content->team_images!='')
                            <a href="{{asset($content->team_images)}}" target="_blank"><img src="{{asset($content->team_images)}}" width="100"></a>
                         @endif
                    </td>
                    <td>
                         <a href="{{route('editteam',['id'=>$content->id])}}" data-original-title="Edit team"><i class="icon-pencil"></i></a>
                         <a href="{{route('deleteteam')}}" class="deleteRow" data-primaryId="{{$content->id}}" onclick="javascript:return false" data-original-title="Delete"><i class="icon-remove"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
