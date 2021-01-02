        <script src="{{ asset('lib/spectrum-colorpicker/spectrum.js') }}"></script>
        <script src="{{ asset('lib/pickerjs/picker.min.js') }}"></script>
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
            // Open Delete Emergency Modal
            function deleteEmergencyModal(emergencyId) {
                // alert('ok');
                $('#del-emergency-id').val(emergencyId);
                
                $('#modal-delete-emergency').modal('show');
            }

            // Open Edit Emergency Modal
            function editEmergencyModal(emergencyId) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ url('getEmergency') }}',
                    type: "POST",
                    data: { emergencyId: emergencyId} ,
                    dataType: "json",
                    success:function(response) {
                        console.log(response);

                        $('#edit-emergency-id').val(response.emergencyId);
                        $('#emergency_number').val(response.number);
                        $('#emergency_color_code').val(response.colorCode);
                        CKEDITOR.instances['emergency_description'].setData(response.description);
                        
                        $('#modal-edit-emergency').modal('show');
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
            //     $('#emergency_description').attr('required', '');
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
            // $(function() {
            //     'use strict'

                $('#showAlpha').spectrum({
                    color: 'rgba(23,162,184,0.5)',
                    showAlpha: true
                });
            // });
        </script>
    </body>
</html>
