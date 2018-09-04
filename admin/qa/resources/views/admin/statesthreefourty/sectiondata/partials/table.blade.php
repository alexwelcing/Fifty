<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <tbody>
            <tr>
                <th>Sr.</th>
                <th>Table</th>
                <th>Question</th>
                <th>status</th>
                <th>Action</th>
            </tr>
            @foreach($datas as $k => $sectiondata)
            <tr>
                <td>{{ $k+1 }}</td>
                <td><a href="{{ route('sectionsdata.show', [$statesthreefourty->id,$section->id,$sectiondata->id ]) }}">@if($sectiondata->table_select == '1') Table 1 @else Table2 @endif</a></td>
                
                <td> {{ $sectiondata->questions->question }}</td>
                <td>
                  @if($sectiondata->active =='1')
                   <i class="fa fa-check success"></i>
                    @else
                     <i class="fa fa-times danger"></i>
                      @endif
                    </td>
                <td>
                    <a href="{{ route('sectionsdata.edit', [$statesthreefourty->id,$section->id, $sectiondata->id]) }}">
                        <i class="fa fa-pencil info"></i>
                    </a>
                    <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('sections.destroy', [$statesthreefourty->id, $section->id,$sectiondata->id]) }}">
                        <i class="fa fa-trash-o danger"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /.box-body -->