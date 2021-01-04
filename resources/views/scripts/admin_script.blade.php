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
            // Open Delete Admin Modal
            function deleteAdminModal(adminId) {
                // alert('ok');
                $('#del-admin-id').val(adminId);
                
                $('#modal-delete-admin').modal('show');
            }

            // Open Edit Admin Modal
            function editAdminModal(adminId) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ url('getAdmin') }}',
                    type: "POST",
                    data: { adminId: adminId} ,
                    dataType: "json",
                    success:function(response) {
                        // console.log(response.adminId);

                        $('#edit-admin-id').val(response.adminId);
                        $('#admin_name').val(response.name);
                        $('#email').val(response.email);
                        $('#number').val(response.phone);
                        
                        $('#modal-edit-admin').modal('show');
                    },
                    error: function () {
                        alert("error");
                    }
                });
            }
        </script>
    </body>
</html>
