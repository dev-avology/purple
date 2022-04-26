@foreach($artistArts as $art)
<tr class="open-artwork" data-id="{{$art->art_id}}">
    <td>
        <img src="{{asset(config('file-upload-paths.artwork').'/'.$art->art_photo_path)}}" width="auto" height="45px">
    </td>
    <td>{{$art->title}}</td>
    <td>
        @if ($art->is_public)
        <span class="badge bg-success">Active</span>
        @else
        <span class="badge bg-warning">Not Active</span>
        @endif
    </td>
    <td>7</td>
</tr>
@endforeach

<script>
  $('.open-artwork').click(function() {
    let currentRowID = $(this).data('id');
    window.location="artwork/"+currentRowID;
  });
</script>