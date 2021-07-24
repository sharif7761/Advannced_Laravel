@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-left">Ajax Todo</h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                            <h5>+</h5>
                        </button>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item todo-item" data-toggle="modal" data-target="#exampleModal">Cras justo odio</li>
                            <li class="list-group-item todo-item" data-toggle="modal" data-target="#exampleModal">Dapibus ac facilisis in</li>
                            <li class="list-group-item todo-item" data-toggle="modal" data-target="#exampleModal">Morbi leo risus</li>
                            <li class="list-group-item todo-item" data-toggle="modal" data-target="#exampleModal">Porta ac consectetur ac</li>
                            <li class="list-group-item todo-item" data-toggle="modal" data-target="#exampleModal">Vestibulum at eros</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Add New Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="Enter Item" id="item_input" name="item_input">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="delete-btn">Delete</button>
                    <button type="button" class="btn btn-info" id="update-btn">Save changes</button>
                    <button type="button" class="btn btn-primary" id="add-btn">Add Item</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom_js')
    <script>
        $(document).ready(function(){
            $('.todo-item').each(function (){
                $(this).click(function (event){
                    let text = $(this).text();
                    $('#item_input').val(text)
                    $('#title').text('Edit Item')
                    $('#delete-btn').show()
                    $('#update-btn').show()
                    $('#add-btn').hide()
                })
            })
        })
    </script>
@endsection
