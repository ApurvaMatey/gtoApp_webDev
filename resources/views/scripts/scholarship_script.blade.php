        <script>
            // $(function() {
            // 'use strict'

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

            // });
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
                        // console.log(response);

                        $('#edit-scholarship-id').val(response.scholarshipId);
                        $('#scholarship_title').val(response.title);
                        $('#scholarship_description').val(response.description);
                        // $('#scholarship_imagePath').val(response.imagePath);
                        CKEDITOR.instances['emergency_description'].setData(response.description);
                        $('#scholarship_url').val(response.url);
                        
                        $('#modal-edit-scholarship').modal('show');
                    },
                    error: function () {
                        alert("error");
                    }
                });
            }
        </script>

        <script type="text/javascript">
            // For Add Function
            CKEDITOR.on('instanceReady', function () {
                $('form textarea').attr('required', '');
                $.each(CKEDITOR.instances, function (instance) {
                    CKEDITOR.instances[instance].on("change", function (e) {
                        for (instance in CKEDITOR.instances) {
                            CKEDITOR.instances[instance].updateElement();
                            // $('form').parsley().validate();
                        }
                    });
                });
            });

            // For Edit Function
            // CKEDITOR.on('instanceReady', function () {
            //     $('#scholarship_description').attr('required', '');
            //     $.each(CKEDITOR.instances, function (instance) {
            //         CKEDITOR.instances[instance].on("change", function (e) {
            //             for (instance in CKEDITOR.instances) {
            //                 CKEDITOR.instances[instance].updateElement();
            //                 $('form').parsley().validate(); //Not Working please comment this line
            //             }
            //         });
            //     });
            // });
        </script>

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var element = document.getElementById("display-img");
                    element.classList.remove("d-none");
                    
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#display-img')
                            .attr('src', e.target.result)
                            // .width(150)
                            // .height(200);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>
</html>
