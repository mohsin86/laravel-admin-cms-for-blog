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
                    <td>{{$content->pricing_title}}</td>
                    <td>
                         <a href="{{route('editpricing',['id'=>$content->id])}}" data-original-title="Edit Page"><i class="icon-pencil"></i></a>
                         <a href="{{route('deletepricing')}}" class="deleteRow" data-primaryId="{{$content->id}}" onclick="javascript:return false" data-original-title="Delete"><i class="icon-remove"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
