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
                        CKEDITOR.instances['culture_description'].setData(response.description);
                        document.getElementById("edit-display-img").src = response.imagePathFullPath;
                        $('#culture_url').val(response.url);
                        
                        $('#modal-edit-culture').modal('show');
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
            //     $('#culture_description').attr('required', '');
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
            // For Add Function
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

            // For Edit Function
            function editReadURL(input) {
                if (input.files && input.files[0]) {
                    var element = document.getElementById("edit-display-img");
                    element.classList.remove("d-none");

                    // img-culture

                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#edit-display-img')
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
