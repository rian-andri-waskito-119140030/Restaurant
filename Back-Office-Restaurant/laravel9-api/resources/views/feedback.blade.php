<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="https://w7.pngwing.com/pngs/485/677/png-transparent-computer-icons-feedback-miscellaneous-angle-text.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/25495e258e.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/all.css'); }}">
    <title>Feedback</title>
</head>

<body style="background-image: url(../images/resto.png);">

    <div class="sidebar">
        <h2>BACK OFFICE</h2>
        <i class="fa-5x fa-solid fa-circle-user"></i>
        <span>HEAD CHEF</span>
        <div class="left-bar">
            <a href="{{ url('/beranda') }}">Beranda</a>
            <a href="{{ url('/menu') }}">Menu</a>
            <a href="{{ url('kitchendisplay') }}">Kitchen Display</a>
            <a href="{{ url('/pesanan') }}">Pesanan Selesai</a>
            <a href="{{ url('/laporan') }}">Laporan</a>
            <a href="{{ url('/feedback') }}">Feedback</a>
        </div>
    </div>


    <div class="content">
        <div class="header-content">
            <h2>Feedback</h2>
            <a class="" href="{{ route('signout') }}" style="position:absolute;right:10px;top:10px;"><button type="button" class="btn btn-danger">Log Out</button></a>
        </div>

        <div class="body-content bg-white py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Feedback</h3>


                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered data-table" style="background-color: #6ECED9; margin-left:auto; margin-right:auto;">
                            <thead style="background-color: black;">
                                <tr>
                                    <th style="color: white">No</th>
                                    <th style="color: white">ID Feedback</th>
                                    <th style="color: white">Feedback</th>
                                    <th width="8%" style="color: white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div> <!-- close div card code -->
                    <!-- </div> -->
                </div> <!-- close box -->
            </div> <!-- close body content -->
        </div> <!-- close body content -->
    </div> <!-- close content -->
</body>
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('.data-table').DataTable({

            processing: true,
            serverSide: true,
            ajax: "{{ route('feedback-menu.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'id_feedback',
                    name: 'id_feedback'
                },
                {
                    data: 'isi_feedback',
                    name: 'isi_feedback'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            // dom: 'Bfrtip',
            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ]
        });

        // $(document).ready(function() {
        //     $('#example').DataTable({
        //         dom: 'Bfrtip',
        //         buttons: [
        //             'copy', 'csv', 'excel', 'pdf', 'print'
        //         ]
        //     });
        // });
        // $('body').on('click', '.delete', function() {
        //     if (confirm("Delete Record?") == true) {
        //         var id_menu = $(this).attr('data-id');
        //         console.log("{{ csrf_token() }}");
        //         // ajax
        //         $.ajax({
        //             type: "GET",
        //             url: "{{ route('menu.delete') }}",
        //             data: {
        //                 id_menu: id_menu,
        //                 _token: "{{ csrf_token() }}",
        //             },
        //             dataType: 'json',
        //             success: function(res) {
        //                 // var oTable = $('#example2').dataTable();
        //                 // oTable.fnDraw(true);
        //                 $('#example2').DataTable().ajax.reload();
        //             }
        //         });
        //     }
        // });
    });
</script>

</html>