
/****************************************
 *       Basic Table                   *
 ****************************************/
$('#zero_config').DataTable();

$(document).ready(function() {
    $('#suivi_lists').DataTable({
        "paging": false,               // Disable pagination
        "lengthChange": false,         // Disable the "Show entries" dropdown
        "info": false,                 // Disable the info text (e.g. "Showing 1 to 10 of 57 entries")
        "//scrollY": "400px",            // Enable vertical scroll with a height of 400px (adjust as needed)
        "scrollCollapse": true,        // Allow the table to reduce in height when fewer records are shown
        "columnDefs": [
            { 
                "targets": "_all", 
                "orderable": true       // Enable column ordering for all columns
            }
        ],
        "dom": '<"top"f>rt<"bottom"><"clear">' // Show only the search box ("f") and the table ("rt")
    });
});

/****************************************
 *       Default Order Table           *
 ****************************************/
$('#default_order').DataTable({
    "order": [
        [3, "desc"]
    ]
});

/****************************************
 *       Multi-column Order Table      *
 ****************************************/
$('#multi_col_order').DataTable({
    columnDefs: [{
        targets: [0],
        orderData: [0, 1]
    }, {
        targets: [1],
        orderData: [1, 0]
    }, {
        targets: [4],
        orderData: [4, 0]
    }]
});