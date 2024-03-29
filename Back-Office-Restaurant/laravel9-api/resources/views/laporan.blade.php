<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="https://img2.pngdownload.id/20180618/jup/kisspng-computer-icons-document-logo-raport-5b2730482286a6.2061352515292949201414.jpg" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />
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
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/all.css'); }}">
  <title>Laporan</title>
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
      <h2>Laporan Harian</h2>
      <a class="" href="{{ route('signout') }}" style="position:absolute;right:10px;top:10px;"><button type="button" class="btn btn-danger">Log Out</button></a>
    </div>

    <div class="body-content bg-white py-5">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <!-- <a href="{{ url('/laporanmasuk') }}"><button class="btn btn-large btn-success">Tambah Laporan</button></a> -->
            <!-- <a href="{{ url('/unduhlaporan') }}"><button class="btn btn-large btn-success">Unduh Laporan</button></a> -->


          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table id="example2" class="table table-bordered data-table" style="background-color: #6ECED9;">
              <thead style="background-color: black;">
                <tr>
                  <th style="color: white">No</th>
                  <th style="color: white">Tanggal</th>
                  <th style="color: white">Pemasukan</th>
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
      ajax: "{{ route('laporanmasuk.index') }}",
      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex'
        },
        {
          data: 'tanggal',
          name: 'tanggal'
        },
        {
          data: 'total_harga',
          name: 'total_harga'
        },
      ],
      dom: 'Bfrtip',
      buttons: [
        'print',
        'excelHtml5',
        'pdfHtml5'
      ]
    });

    // $(document).ready(function() {
    //   $('#example2').DataTable({
    //     dom: 'Bfrtip',
    //     buttons: [
    //       'excel', 'pdf', 'print'
    //     ]
    //   });
    // });
    $('body').on('click', '.delete', function() {
      if (confirm("Delete Record?") == true) {
        var id_laporan_masuk = $(this).attr('data-id');
        console.log("{{ csrf_token() }}");
        // ajax
        $.ajax({
          type: "GET",
          url: "{{ route('laporanmasuk.delete') }}",
          data: {
            id_laporan_masuk: id_laporan_masuk,
            _token: "{{ csrf_token() }}",
          },
          dataType: 'json',
          success: function(res) {
            // var oTable = $('#example2').dataTable();
            // oTable.fnDraw(true);
            $('#example2').DataTable().ajax.reload();
          }
        });
      }
    });
  });
</script>

</html>