        <script>
            $(function() {
            'use strict'

            $('#example1').DataTable({
                language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
                }
            });

            $('#example2').DataTable({
                responsive: true,
                language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
                }
            });

            // Select2
            // $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

            });
        </script>

        <script>
            // Open Delete Culture Modal
            function deleteCultureModal(cultureId) {
                // alert('ok');
                $('#del-culture-id').val(cultureId);
                
                $('#modal-delete-culture').modal('show');
            }

            // Open Edit Culture Modal
            function editCultureModal(cultureId) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ url('getCulture') }}',
                    type: "POST",
                    data: { cultureId: cultureId} ,
                    dataType: "json",
                    success:function(response) {
                        console.log(response);

                        $('#edit-culture-id').val(response.cultureId);
                        $('#culture_title').val(response.title);
                        $('#culture_description').val(response.description);
                        // $('#culture_imagePath').val(response.imagePath);
                        $('#culture_url').val(response.url);
                        
                        $('#modal-edit-culture').modal('show');
                    },
                    error: function () {
                        alert("error");
                    }
                });
            }

            setTimeout(function () {
                // Closing the alert 
                $('.alert-success').alert('close'); 
            }, 7000);
        </script>
    </body>
</html>
