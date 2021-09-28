@extends('layouts.dashboard')


@section('content')

<body class="bg-dark">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title">Message Templates
                  <a class="btn btn-success ml-5" href="{{route('templates.create')}}">Add New Template</a>
                </h4>
            </div>
         </div>
         <div class="card-body">
           <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Client Name</th>
                        <th>User Name</th>
                        <th>Template Name</th>
                        <th>Message</th>
                        <th>Created at</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

       </div>
     </div>
   </div>
 </div>
</body>
<script type="text/javascript">

  $(function () {

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('templates.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
            {data: 'client', name: 'client.clientName'},
            {data: 'user', name: 'user.username'},
            {data: 'name', name: 'name'},
            {data: 'message', name: 'message'},
            {
               data: 'created_at',
               type: 'num',
               render: {
                  _: 'display',
                  sort: 'timestamp'
               }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#createNewItem').click(function () {
        $('#saveBtn').val("create-Item");
        $('#User_id').val('');
        $('#ItemForm').trigger("reset");
        $('#modelHeading').html("Create New User");
        $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.editItem', function () {
      var Pref_id = $(this).data('id');
        $.ajax({
          data: {
            idee: Pref_id
          },
          url: "{{ route('pass_id') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
             // console.log('Succ:', data);
             window.location = "{{ route('templates.index') }}" +'/' + data +'/edit';
          },
          error: function (data) {
            console.log('Errorr:', data);

          }
      });

   });

   $('body').on('click', '.showItem', function () {
     var Pref_id = $(this).data('id');
       $.ajax({
         data: {
           idee: Pref_id
         },
         url: "{{ route('pass_id') }}",
         type: "POST",
         dataType: 'json',
         success: function (data) {
            // console.log('Succ:', data);
            window.location = "{{ route('templates.index') }}" +'/' + data ;
         },
         error: function (data) {
           console.log('Errorr:', data);

         }
     });

  });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
          data: $('#ItemForm').serialize(),
          url: "{{ route('users.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#ItemForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();

          },
          error: function (data) {
            console.log('Errorr:', data);
            if(data.responseText)
          	{
              var errors = $.parseJSON(data.responseText);
          		jQuery('.alert-danger').html('');
          		jQuery.each(errors.errors, function(key, value){
          			jQuery('.alert-danger').show();
          			jQuery('.alert-danger').append('<li>'+value+'</li>');
                console.log('Errorrr:', value);
          		});
          	}
          	else
          	{
          		jQuery('.alert-danger').hide();
          		$('#open').hide();
          		$('#ajaxModel').modal('hide');
          	}
          }
      });
    });


    $('body').on('click', '.deleteItem', function () {
        var Pref_id = $(this).data('id');
          $.ajax({
            data: {
              idee: Pref_id
            },
            url: "{{ route('pass_id') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
               // console.log('Succ:', data);
               var User_id = data ;
               var res =   Swal.fire({
                               title: 'Are you sure?',
                               text: "You won't be able to revert this!",
                               icon: 'warning',
                               showCancelButton: true,
                               confirmButtonColor: '#3085d6',
                               cancelButtonColor: '#d33',
                               confirmButtonText: 'Yes, delete it!'
                             }).then((result) => {
                               if (result.value) {
                                 $.ajax({
                                     type: "DELETE",
                                     url: "{{ route('templates.store') }}"+'/'+User_id,
                                     success: function (data) {
                                         table.draw();
                                         Swal.fire(
                                           'Deleted!',
                                           'Template has been deleted.',
                                           'success'
                                         )
                                     },
                                     error: function (data) {
                                         console.log('Error:', data);
                                         Swal.fire(
                                           'Failed!',
                                           'Template has not been deleted.',
                                           'error'
                                         )
                                     }
                                 });

                               }
                             });
            },
            error: function (data) {
              console.log('Errorr:', data);

            }
        });

    });

  });
</script>
@endsection
