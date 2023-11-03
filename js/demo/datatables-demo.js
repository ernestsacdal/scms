// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    dom: 'Bfrtip',  
        buttons: [{ extend: 'copy', footer: true},
        {extend: 'csv', footer: true, messageBottom : 'The information in this table is copyright to Araullo University School Clinic.'},
        {extend: 'excel', footer: true, messageBottom : 'The information in this table is copyright to Araullo University School Clinic.'},
        {extend: 'pdf', footer: true, messageBottom : 'The information in this table is copyright to Araullo University School Clinic.'},
        {extend: 'print', footer: true, messageBottom : 'The information in this table is copyright to Araullo University School Clinic.'}
          
            //'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
});

