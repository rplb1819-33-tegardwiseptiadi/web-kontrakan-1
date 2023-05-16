<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tegar Dwi Septiadi">
    <title>@yield('title')</title>
    
    @stack("prepend-style")
    @include('includes.style')
    @stack("addon-style")
</head>

<body>
    @include('includes.sidenav')
    <!-- Main content -->
    <div class="main-content" id="panel">
        @include("includes.topnav")
        @yield('header')
        @yield('container')
    </div>

    @include('includes.scripts')
    @stack("addon-script")
    <script>
        $("#logoutBtn").on("click", (e) => {
            e.preventDefault();
            $("#logout-form").submit();
        });

        $('.mydatatable').DataTable({
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, "All"]
            ],
            scrollY: 400,
            scrollX: true,
            scrollCollapse: true,
            pagingType: "simple_numbers",
            language: {
                paginate: {
                    previous: "<i class='fas fa-angle-left'></i>",
                    next: "<i class='fas fa-angle-right'></i>",
                }
            }
        });
        $('.dataTables_filter input').attr("placeholder", "Search...");
        //script type text di thead pada datatable dengan langsung menampilkan isi dari tiap thead
        // initComplete: function (){
        //     this.api().columns().every( function () {
        //           var column = this;
        //           var select = $('<select><option value=""></option></select>')
        //           .appendTo( $(column.header()).empty() )
        //           .on( 'change', function () {
        //               var val = $.fn.dataTable.util.escapeRegex(
        //                   $(this).val()
        //               );
        //                 column
        //                 .search( val ? '^'+val+'$' : '', true, false)
        //                 .draw();
        //           });

        //         column.data().unique().sort().each( function ( d, j ) {
        //           select.append( '<option value="'+d+'">'+d+'</option>')
        //         });
        //     });
        //   } 

        //  script type text dengan placeholder di thead pada datatable
        // var table = $('.mydatatable').DataTable(); 
        // $('.mydatatable thead th').each( function () {  
        //   var title = $(this).text();
        //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );  
        // }); 

        // table.columns().every( function (){
        //     var that = this;
        //     $('input', this.header() ).on( 'keyup change', function () {
        //           if ( that.search() !== this.value ) {
        //             that.search( this.value ).draw();
        //           } 
        //     });
        // });
    </script>

    <script>
        const previewImg = (target, imgPreviewPlace, labelPlace = ".custom-file") => {
            const input = document.querySelector(target)
            if (input.files && input.files[0]) {
                // buat mengganti URL nya
                $(labelPlace).text(input.files[0].name);

                // ini buat mengganti preview 
                const reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = (e) => $(imgPreviewPlace).attr("src", e.target.result);

                $(imgPreviewPlace).removeClass("d-none");
                $(labelPlace).removeClass("d-none");
            }
        }

        $("#fotoKTP").on("change", () => previewImg("#fotoKTP", "#previewKTPImg", "#previewKTPLabel"));
        // $("#fotoKK").on("change", () => previewImg("#fotoKK", "#previewKKImg", "#previewKKLabel"));
        // $("#fotoSuratNikah").on("change", () => previewImg("#fotoSuratNikah", "#previewSuratNikahImg",
        //     "#previewSuratNikahLabel"));
    </script>
</body>

</html>
