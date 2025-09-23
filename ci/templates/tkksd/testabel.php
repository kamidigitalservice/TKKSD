<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" /> -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container">
    <table class="datatable table table-hover table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Class</th>
        </tr>
      </thead>
      
      <tbody>
        <tr>
          <td>1</td>
          <td>Jane</td>
          <td>Address 1</td>
          <td>A</td>
        </tr>
        <tr>
          <td>1</td>
          <td>John</td>
          <td>Address 2</td>
          <td>B</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Jasmin</td>
          <td>Address 3</td>
          <td>A</td>
        </tr>
      </tbody>
    </table>
  </div>

  
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <!-- Responsive extension -->
  <!-- <script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script> -->
  <!-- Buttons extension -->
  <script src="//cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
  <!-- <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.bootstrap.min.js"></script> -->
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script> -->
  <!-- <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script> -->
  
  <!-- <script src="script.js"></script> -->
    <script type="text/javascript">
  	// Code goes here

var dataTable = $('.datatable').DataTable({
  buttons: [
    {
      extend: 'excel',
      text: 'Export to Excel',
      className: 'btn-sm btn-flat',
    },
  ],
  dom: "<'row'<'col-md-3'l><'col-md-6 text-center'B><'col-md-3'f>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-md-5'i><'col-md-7'p>>",
  drawCallback: function(settings) {
    if (!$('.datatable').parent().hasClass('table-responsive')) {
      $('.datatable').wrap("<div class='table-responsive'></div>");
    }
  }
});

dataTable.columns().every(function() {
  var column = this;

  $('.filter-column', this.footer()).on('keyup change', function() {
    if (column.search() !== this.value) {
      column
        .search(this.value)
        .draw();
      this.focus();
    }
  });
});
  </script>
</body>

</html>