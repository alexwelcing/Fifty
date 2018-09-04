<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <tbody>
            <tr>
                <th>Sr.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach($datas as $k => $section)
            <tr>
                <td>{{ $k+1 }}</td>
                <td><a href="{{ route('sections.show', [$statesthreefourty->id,$section->id]) }}">{!! $section->title !!}</a></td>
                <td>{!! $section->description!!}</td>
                <td>
                  @if($section->active =='1')
                   <i class="fa fa-check success"></i>
                    @else
                     <i class="fa fa-times danger"></i>
                      @endif
                    </td>
                <td>
                    <a href="{{ route('sections.edit', [$statesthreefourty->id, $section->id]) }}">
                        <i class="fa fa-pencil info"></i>
                    </a>
                    <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('sections.destroy', [$statesthreefourty->id, $section->id]) }}">
                        <i class="fa fa-trash-o danger"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /.box-body -->