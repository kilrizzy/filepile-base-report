<div class="table-responsive">
    <table class="table table-bordered table-striped table-text-small">
        <thead>
        <tr>
            @foreach($report->getHeaders() as $header)
                <th>{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($report->getRows() as $row)
            <tr>
                @foreach($row as $rowKey => $rowValue)
                    <td>{{ $rowValue }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
