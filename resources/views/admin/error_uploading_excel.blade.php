<style>
    .card-datatable {
        background-color: #fff5f585;
        border-radius: 3px;
        padding: 15px;
    }

    .datatables-basic-err {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
    }

    .datatables-basic-err thead th {
        padding: 10px;
        text-align: left;
        border: none;
    }

    .datatables-basic-err tbody td {
        padding: 8px;
        border-bottom: 1px solid #dee2e6;
    }

    .datatables-basic-err tbody tr:nth-child(even) {
        background-color: #f1f1f1;
    }

    .datatables-basic-err tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    .datatables-basic-err tbody td {
        border: none;
    }

    .datatables-basic-err tbody td[style*="border: 1px solid red;"] {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb !important;
    }

    .datatables-basic-err tbody tr:hover {
        background-color: #e2e6ea;
    }

    .table-responsive {
        max-height: 400px;
        overflow-y: auto;
    }
</style>

<input type="hidden" id="filekey" value="{{ $fileKey }}">
<div class="card-datatable table-responsive">
    <table class="datatables-basic-err table border-top responsive">
        <thead>
            <tr>
                <th>Sl No.</th>
                @foreach ($excelData[0] as $col => $value)
                    <th>{{ str_replace('_', ' ', $col) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($excelData as $row => $value)
                @php
                    $errorCols = [];
                    foreach ($missingData as $error) {
                        if ($error['row'] == $row) {
                            $errorCols = array_merge($errorCols, $error['col']);
                        }
                    }
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @foreach ($value as $colKey => $colValue)
                        <td style="{{ in_array($colKey, $errorCols) ? 'border: 1px solid red;' : '' }}">
                            {{ $colValue }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).on('click', '#closeerrmodal', function() {
        var filekey = $("#filekey").val();
        $("#excel_error").modal("hide");
        $(`#${filekey}_label`).text("Chose Excel File");
        $(`#${filekey}`).val("");
        $("#filekey").val("");
    });
</script>
