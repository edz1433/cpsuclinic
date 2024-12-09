<script>
$(document).ready(function() {
    $('.patients-data').DataTable({
        "ajax": "{{ route('patients.data', ['id' => $id]) }}",
        responsive: true,
        lengthChange: true,
        searching: true,
        paging: true,
        "columns": [
            { data: 'id'},
            { data: 'full_name'},
            { data: 'age' },
            { data: 'sex' },
            { data: 'c_status' },   
            @if($id == 1)
            { 
                data: 'pexam_remarks', 
                render: function(data, type, row) {
                    if (data === 1) {
                        return '<span class="badge badge-success">Fit for enrollment</span>';
                    } else if (data === 2) {
                        return '<span class="badge badge-danger">Not fit for enrollment</span>';
                    } else if (data === 3) {
                        return `<span class="badge badge-warning" data-toggle="tooltip" title="${row.pend_reason}">Pending</span>`;
                    } else {
                        return '';
                    }
                }
            },
            @endif
            {
                data: 'id',
                render: function(data, type, row) {
                    var moreInfoUrl = "{{ route('moreInfo', ['id' => ':category', 'mid' => ':id']) }}".replace(':category', {{ isset($id) ? $id : '' }}).replace(':id', data);
                    var fileReadUrl = "{{ route('fileRead', ['cat' => ':category', 'id' => ':id']) }}".replace(':category', {{ isset($id) ? $id : '' }}).replace(':id', data);
                    var reportsReadUrl = "{{ route('reportsRead', ':id') }}".replace(':id', data);
                    
                    return `
                        <div class="btn-group">
                            <a href="${moreInfoUrl}" class="mr-1 btn btn-info btn-sm text-light" title="More Info">
                                <i class="fas fa-exclamation-circle"></i> 
                            </a>
                            <a href="${fileReadUrl}" class="mr-1 btn btn-success btn-sm" title="File Info">
                                <i class="fas fa-file"></i> 
                            </a>
                            <a href="${reportsReadUrl}" class="mr-1 btn btn-warning btn-sm" title="Pre-Entrance Health Examination Report">
                                <i class="fas fa-file-pdf"></i> 
                            </a>
                            <button class="mr-1 btn btn-danger btn-sm patient-delete" data-id="${data}" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                }
            }
        ],
        initComplete: function(settings, json) {
            var api = this.api();
            api.column(0, {search: 'applied', order: 'applied'}).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        },
        "createdRow": function (row, data, dataIndex) {
            $(row).attr('id', 'tr-' + data.id);
        }
    });
});
</script>