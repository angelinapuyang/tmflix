<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="js/main.js"></script>


</script>
<!--END OF JAVASCRIPT FOR SCROLL-->

<!--START OF JAVASCRIPT FOR DATATABLES PLUGIN BOOTSTRAP-->
<script>
    $(document).ready( function () {
    $('#datatable2').DataTable({
        scrollX: true,
        scrollY: 450,
        scrollCollapse: true,
        paging: true,
        
    });
});


</script>
<!--END OF JAVASCRIPT FOR DATATABLES PLUGIN BOOTSTRAP-->

<!--START OF JAVASCRIPT FOR GENRE-->
<script>
    $(document).ready( function () {
    $('#datatable1').DataTable({
        scrollX: true,
        scrollY: 450,
        scrollCollapse: true,
        paging: true,
    });
});


</script>
<!--END OF JAVASCRIPT FOR GENRE-->

<!-- START OF JAVASCRIPT TO DELETE TV SERIES########################################################################################################### -->
<script>
    $(document).ready(function () {
        $('.deletebtn').on('click', function() {
            $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_series_id').val(data[0]);
        });
    });
</script>
<!-- END OF JAVASCRIPT TO DELETE TV SERIES ########################################################################################################### -->

<!-- START OF JAVASCRIPT TO EDIT TV SERIES INFORMATION ########################################################################################################### -->
<script>
    $(document).ready(function () {
        $('.editbtn').on('click', function() {
            $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_series_id').val(data[0]);
                $('#series_title').val(data[2]);
                $('#series_description').val(data[3]);
                $('#release_year').val(data[4]);
                $('#maturity_rating').val(data[5]);
  
        });
    });
</script>
<!-- END OF JAVASCRIPT TO EDIT TV SERIES INFORMATION ########################################################################################################### -->

<!--START OF JAVASCRIPT TO MULTIPLE SELECT OF ACTOR, GENRE--->
<script>
$ (".multiple-select").select2({
  //maximumSelectionLength: 2
});
</script>

<!--END OF JAVASCRIPT TO MULTIPLE SELECT OF ACTOR, GENRE-->

</body>
</html>