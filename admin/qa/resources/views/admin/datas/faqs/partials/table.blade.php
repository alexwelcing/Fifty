<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <tbody>
            <tr>
                <th>Sr.</th>
                <th>Description</th>
                @if($data->table_rows=='2')
                <th>Description 2</th>
                @endif
                <th>Action</th>
            </tr>
            @foreach($datas as $k => $faq)
            <tr>
                <td>{{ $k+1 }}</td>
                <td>{!! $faq->description !!}</td>
                @if($data->table_rows=='2')
                <td>{!! $faq->description2 !!}</td>
                @endif
                <td>
                    <a href="{{ route('faqs.edit', [$data->id, $faq->id]) }}">
                        <i class="fa fa-pencil info"></i>
                    </a>
                    <a data-method="Delete" data-confirm="Are you sure?" href="{{ route('faqs.destroy', [$data->id, $faq->id]) }}">
                        <i class="fa fa-trash-o danger"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /.box-body -->