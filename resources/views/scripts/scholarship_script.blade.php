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
            // Open Delete Scholarship Modal
            function deleteScholarshipModal(scholarshipId) {
                // alert('ok');
                $('#del-scholarship-id').val(scholarshipId);
                
                $('#modal-delete-scholarship').modal('show');
            }

            // Open Edit Scholarship Modal
            function editScholarshipModal(scholarshipId) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ url('getScholarship') }}',
                    type: "POST",
                    data: { scholarshipId: scholarshipId} ,
                    dataType: "json",
                    success:function(response) {
                        console.log(response);

                        $('#edit-scholarship-id').val(response.scholarshipId);
                        $('#scholarship_title').val(response.title);
                        $('#scholarship_description').val(response.description);
                        // $('#scholarship_imagePath').val(response.imagePath);
                        $('#scholarship_url').val(response.url);
                        
                        $('#modal-edit-scholarship').modal('show');
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
