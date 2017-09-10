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
                    <td>{{$content->client_title}}</td>
                    <td>  @if($content->client_image!='')
                            <a href="{{asset($content->client_image)}}" target="_blank"><img src="{{asset($content->client_image)}}" width="100"></a>
                         @endif
                    </td>
                    <td>
                         <a href="{{route('editclient',['id'=>$content->id])}}" data-original-title="Edit Client"><i class="icon-pencil"></i></a>
                         <a href="{{route('deleteclient')}}" class="deleteRow" data-primaryId="{{$content->id}}" onclick="javascript:return false" data-original-title="Delete"><i class="icon-remove"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
