@extends('BackEnd.layouts.default') @section ('title', 'Quản lý người dùng') @section('content')
<div id="content-container">
    <br>
    <div class="col-md-12 col-wrap-user">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Thống kê</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Tạo người dùng mới</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="col-sm-12">
            <div class="panel">
                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
                    </div>
                    <div id="London" class="tabcontent">
                        <h3>London</h3>
                        <p>London is the capital city of England.</p>
                    </div>
                    <div id="Paris" class="tabcontent">
                        <h3>Paris</h3>
                        <p>Paris is the capital of France.</p>
                    </div>
                    <div id="Tokyo" class="tabcontent">
                        <h3>Tokyo</h3>
                        <p>Tokyo is the capital of Japan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('myJs')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('.datatable-index-users').DataTable({
        "language": {
            "lengthMenu": "Hiển thị _MENU_ bản ghi trên 1 trang",
            "zeroRecords": "Không tìm thấy bản ghi nào",
            "info": "Đang hiện trang thứ _PAGE_ / _PAGES_",
            "infoEmpty": "Không tìm thấy thông tin",
            "infoFiltered": "(Lọc từ _MAX_ tổng cộng bản ghi)",
            "search": "Tìm kiếm",
            "previous": "Trang trước",
            "next": "Trang sau"
        },
        dom: 'Bfrtip',
        buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            },
            'excel',
            'csv',
            'print'
        ]
    });
});
</script>
@endsection