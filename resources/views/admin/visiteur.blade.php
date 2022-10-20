@extends('layouts.app')

@section('content')

    <br> <br>
    <div class="card list">
        <div class="card-header list_title">
            <i class="fa-solid fa-table-list"></i> Visiteurs Liste
        </div>
        <div class="card-body list_body">
            <a class="btn btn-outline-success float-start addBtn" href="{{ url('/exportVisiteur') }}">
                <i class="fa-solid fa-file-export"></i> Export CSV
            </a>
          <!--  <button class="btn btn-outline-success float-end addBtn" style="margin-top= 10%" data-toggle="modal"
                data-target="#EmailModal">
                <i class="fa-solid fa-paper-plane"></i> Envoyer Email
            </button>!-->
            <br>
            <table class="table table-hover" id="VisiteurTable" style="width:100%">
                <thead class="bg-light">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ID Visiteur</th>
                        <th scope="col"> Nom Visiteur</th>
                        <th scope="col">CIN Visiteur</th>
                        <th scope="col">GSM Visiteur</th>
                        <th scope="col">Email Visiteur</th>
                        <th scope="col">ID TypeVisite</th>
                        <th scope="col">Societe Visiteur</th>
                        <th class="actions" scope="col">Action</th>
                        <!--<th></th>!-->
                    </tr>
                </thead>
                <tbody>




                </tbody>
            </table>
        </div>
    </div>
    <!--<div class="modal fade" id="EmailModal" tabindex="-1" role="dialog" style="width:100%;">
        <div class="modal-dialog modal-lg" role="document" style="overflow:auto; max-height:90vh">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="Email_title">Envoyer Email</span></h5>
                    <button type="button" class="btn btn-outline-danger close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">✗</span>
                    </button>
                </div>
                <div class="modal-body">
                  
                    <form id="EmailForm">
                        <div class="form_col">

                            <div class="form-group mb-2">
                                <label for="NomVS">Nom Emetteur</label>
                                <input type="text" class="form-control" id="Nom_Emetteur" name="Nom_Emetteur">
                                <span class="text-danger" id="error_Nom_Emetteur"></span>
                            </div>
                            <div class="form-group  mb-2">
                                <label for="CINVS">Email Emetteur </label>
                                <input type="text" class="form-control" id="Email_Emetteur" name="Email_Emetteur">
                                <span class="text-danger" id="error_Email_Emetteur"></span>
                            </div>
                            <div class="form-group  mb-2">
                                <label for="GSMVS">Objet </label>
                                <input type="telephone" class="form-control" id="Objet" name="Objet">
                                <span class="text-danger" id="error_Objet"></span>
                            </div>


                        </div>
                        <div class="form_col">
                            <div class="form-group mb-2">
                                <label for="EmailVS">Entete</label>
                                <input type="email" class="form-control" id="Entete" name="Entete">
                                <span class="text-danger" id="error_Entete"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label for="EmailVS">Corp</label>
                                <input type="email" class="form-control" id="Corp" name="Corp">
                                <span class="text-danger" id="error_Corp"></span>
                            </div>
                            <div class="form-group mb-2">
                                <label for="EmailVS">Pieds</label>
                                <input type="email" class="form-control" id="Pieds" name="Pieds">
                                <span class="text-danger" id="error_Pieds"></span>
                            </div>


                        </div>
                        <div class="form-group" id="messageEmail">

                        </div>

                        <button  type="submit" class="btn btn-outline-success nav_name " style="margin-top= 10%">
                                                                                                        <i class='bx bx-user nav_icon'></i> <span class="nav_name"> Submit</span>
                                                                                                      </button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btnEnreg">Enregistrer</button>
                    <button type="button" class="btn btn-secondary btnAnnul" data-dismiss="modal">Annuler</button>
                </div>

            </div>
        </div>
    </div>!-->


    <div class="modal fade" id="VisiteurEditModal" tabindex="-1" role="dialog" style="width:100%;">
        <div class="modal-dialog modal-lg" role="document" style="overflow:auto; max-height:90vh">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="titleVisiteur"></span>Modification Visiteur</h5>
                    <button type="button" class="btn btn-outline-danger close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form id="VisiteurFormEdit">
                        <input type="hidden" class="form-control" id="IdVS" name="IdVS">
                        <div class="form_col">
                        <div class="form-group mb-2">
                            <label for="exampleFormControlInput1">Nom Visiteur</label>
                            <input type="text" class="form-control" id="NomVS" name="NomVS">
                            <span class="text-danger" id="error_NomVS"></span>
                        </div>
                        <div class="form-group  mb-2">
                            <label for="exampleFormControlInput1">CIN Visiteur </label>
                            <input type="text" class="form-control" id="CINVS" name="CINVS">
                            <span class="text-danger" id="error_CINVS"></span>
                        </div>
                        <div class="form-group  mb-2">
                            <label for="exampleFormControlInput1">Telephone Visiteur </label>
                            <input type="text" class="form-control" name="GSMVS" id="GSMVS">

                            <span class="text-danger" id="error_GSMVS"></span>
                        </div>
                    </div>
                        <div class="form_col">
                        <div class="form-group mb-2">
                            <label for="exampleFormControlInput1">Email Visiteur</label>
                            <input type="text" class="form-control" id="EmailVS" name="EmailVS">
                            <span class="text-danger" id="error_EmailVS"></span>
                        </div>
                        <div class="form-group  mb-2">
                            <label for="IdTP">Type Visite</label>
                            <select class="form-control" name="IdTP" id="IdTP" required>
                                @foreach ($typeVisites as $typeVisites)
                                    <option value="{{ $typeVisites->IdTP }}">{{ $typeVisites->NomTP }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="error_IdDEP"></span>
                        </div>
                        <div class="form-group  mb-2">
                            <label for="exampleFormControlInput1">Societe Visiteur</label>
                            <input type="text" class="form-control" id="SocieteVS" name="SocieteVS">
                            <span class="text-danger" id="error_SocieteVS"></span>
                        </div>
                    </div>

                        <div class="form-group" id="messageEditVisiteur">

                        </div>

                        <!--<button  type="submit" class="btn btn-outline-success nav_name " style="margin-top= 10%">
                                                                                                    <i class='bx bx-user nav_icon'></i> <span class="nav_name"> Submit</span>
                                                                                                  </button>-->
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btnUpdate">Update</button>
                    <button type="button" class="btn btn-secondary btnAnnul" data-dismiss="modal">Annuler</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        function format(d) {
            // `d` is the original data object for the row
            return (
                '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<td>Crée par:</td>' +
                '<td>' +
                d.UserCr +
                '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Crée le</td>' +
                '<td>' +
                d.DateCr +
                '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Modifié par:</td>' +
                '<td>' + d.UserUp + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Modifié le:</td>' +
                '<td>' + d.DateUp + '</td>' +
                '</tr>' +
                '</table>'
            );
        }

        $(document).ready(function() {
            var table = $('#VisiteurTable').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                ajax: "{{ route('api.visiteur') }}",
                processing: true,
                columns: [{
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                    },

                    {
                        data: 'IdVS'
                    },
                    {
                        data: 'NomVS'
                    },
                    {
                        data: 'CINVS'
                    },
                    {
                        data: 'GSMVS'
                    },
                    {
                        data: 'EmailVS'
                    },
                    {
                        data: 'IdTP'
                    },
                    {
                        data: 'SocieteVS'
                    },
                    {
                        defaultContent: '<button class="btn btn-outline-primary edit" data-toggle="modal" data-target="#VisiteurEditModal"><i class="fa-solid fa-pen icon"></i></button>',

                    },
                    /*{

                        defaultContent: '<button class="btn btn-outline-danger delete" ><i class="fa-solid fa-trash icon"></i></button>',

                    },*/

                ],
                order: [
                    [1, 'asc']
                ],
            });
            $("#VisiteurTable").on("click", ".edit", function(e) {
                e.preventDefault();

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();


                console.log(data);
                $('#IdVS ').val(data[1]);
                $('#NomVS ').val(data[2]);
                $('#CINVS ').val(data[3]);
                $('#GSMVS ').val(data[4]);
                $('#EmailVS ').val(data[5]);
                $('#IdTP ').val(data[6]);
                $('#SocieteVS ').val(data[7]);

            });
            $(document).on("click", ".btnUpdate", function(event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                var IdVS = $("input[id=IdVS]").val();
                $.ajax({
                    url: "{{ url('update_visiteur') }}" + '/' + IdVS,
                    type: "PUT",
                    data: $("#VisiteurFormEdit").serialize(),
                    success: function(data, textStatus, xhr) {
                        $('#messageEditVisiteur').html('');
                        if (xhr.status === 201) {
                            $('#messageEditVisiteur').html(
                                '<div class="alert alert-success" id="messageEditVisiteur" role="alert">' +
                                data
                                .message + '</div>');

                            $("#VisiteurFormEdit")[0].reset();
                            table.ajax.reload();
                        } else {
                            $('#messageEdit').html(
                                '<div class="alert alert-warning" id="messageEditVisiteur" role="alert">' +
                                data
                                .error + '</div>');
                        }
                    },
                    error: function(response) {
                        var errors = Object.keys(response.responseJSON.errors);
                        $("#VisiteurFormEdit input").each(function(index, item) {
                            var id = $(item).attr('id');
                            if (errors.includes(id)) {
                                $('#' + id).next("span").text(
                                    "field is required or invalid.");
                            }
                        });

                    },
                });
            });
            $("#VisiteurTable").on("click", ".delete", function(e) {
                e.preventDefault();

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();


                console.log(data);
                $('#IdVS ').val(data[1]);
                swal.fire({
                    title: "Suppression",
                    text: "Veuillez confirmer la suppression",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Confirmer",
                    cancelButtonText: "Annuler",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        })
                        var IdVS = $("input[id=IdVS]").val();
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('delete_visiteur') }}/" + IdVS,
                            dataType: "JSON",
                            success: function(results) {
                                if (results.success === true) {
                                    swal.fire("Error!", results.success, "error");
                                } else {
                                    swal.fire("Done!", results.error, "success");

                                }
                                table.ajax.reload();
                            } //success
                        });
                    } else {
                        result.dismiss === Swal.DismissReason.cancel
                    }
                })



            });

            // Add event listener for opening and closing details
            $('#VisiteurTable tbody').on('click', 'td.dt-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).on("click", ".editBtn", function(e) {
            e.preventDefault();

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();


            console.log(data);
            $('#IdVS').val(data[0]);
            $('#NomVS').val(data[1]);
            $('#CINVS ').val(data[2]);
            $('#GSMVS').val(data[3]);
            $('#EmailVS').val(data[4]);
            $('#SocieteVS').val(data[5]);

        });
        $(document).on("click", ".btnUpdate", function(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            var IdVS = $("input[id=IdVS]").val();
            $.ajax({
                url: "{{ url('update_visiteur') }}" + '/' + IdVS,
                type: "PUT",
                data: $("#VisiteurFormEdit").serialize(),
                success: function(data, textStatus, xhr) {
                    $('#messageEditVisiteur').html('');
                    if (xhr.status === 201) {
                        $('#messageEditVisiteur').html(
                            '<div class="alert alert-success" id="messageEditVisiteur" role="alert">' +
                            data
                            .message + '</div>');

                        $("#VisiteurFormEdit")[0].reset();
                    } else {
                        $('#messageEdit').html(
                            '<div class="alert alert-warning" id="messageEditVisiteur" role="alert">' +
                            data
                            .error + '</div>');
                    }
                },
                error: function(response) {
                    var errors = Object.keys(response.responseJSON.errors);
                    $("#VisiteurFormEdit input").each(function(index, item) {
                        var id = $(item).attr('id');
                        if (errors.includes(id)) {
                            $('#' + id).next("span").text("field is required or invalid.");
                        }
                    });

                },
            });
        });
    </script>
@endpush