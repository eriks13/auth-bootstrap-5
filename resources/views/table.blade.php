@extends('layout.app')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap5.css">
@endsection

@section('content')
<div class="mb-4">
  <div class="d-flex justify-content-between">
    <div class="col-auto">
      <h5 class="fs-ui">Siple ui Table</h5>
    </div>
    <div class="col-auto">
      <a href="" class="btn btn-sm btn-ui px-3">New Table</a>
    </div>
  </div>
 </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card pb-2 px-2">
        <div class="card-body">
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
                <th class="fs-ui">Name</th>
                <th class="fs-ui">Position</th>
                <th class="fs-ui">Office</th>
                <th class="fs-ui">Age</th>
                <th class="fs-ui">Start date</th>
                <th class="fs-ui">Salary</th>
                <th class="fs-ui">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
                <td>
                  <a href="" class="btn btn-sm btn-ui fs-ui">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <a href="" class="btn btn-danger-ui btn-sm fs-ui">
                    <i class="bi bi-trash2"></i>
                  </a>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th class="fs-ui">Name</th>
                <th class="fs-ui">Position</th>
                <th class="fs-ui">Office</th>
                <th class="fs-ui">Age</th>
                <th class="fs-ui">Start date</th>
                <th class="fs-ui">Salary</th>
                <th class="fs-ui">Action</th>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>
    </div>
  </div>   
@endsection


@section('script')
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.colVis.min.js"></script>
<script src=" https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>

<script>
    $('#example').DataTable({
      responsive : true,
        layout: {
            topStart: {
                buttons: ['print', 'excel', 'pdf', 'colvis']
            }
        }
    });
</script>
@endsection