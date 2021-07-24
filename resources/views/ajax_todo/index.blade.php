@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-left">Ajax Todo</h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" id="addNewItem">
                            <h5>+</h5>
                        </button>
                    </div>
                    @csrf
                    <div class="card-body">
                        <ul class="list-group" id="items">
                            @foreach($todos as $todo)
                            <li class="list-group-item todo-item" data-toggle="modal" data-target="#exampleModal">{{ $todo->item }}
                                <input type="hidden" id="todo_id" name="todo_id" value="{{ $todo->id }}">
                            </li>
                            @endforeach
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
                    <input type="hidden" id="item_id" name="item_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="delete_btn" data-dismiss="modal">Delete</button>
                    <button type="button" class="btn btn-info" id="update_btn">Save changes</button>
                    <button type="button" class="btn btn-primary" id="add_btn" data-dismiss="modal">Add Item</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom_js')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.todo-item', function (event){
                let text = $(this).text();
                let id = $(this).find('#todo_id').val();
                $('#item_input').val(text)
                $('#item_id').val(id)
                $('#title').text('Edit Item')
                $('#delete_btn').show()
                $('#update_btn').show()
                $('#add_btn').hide()
            })


            $(document).on('click', '#addNewItem', function (event) {
                $('#item_input').val('')
                $('#title').text('Add New Item')
                $('#delete_btn').hide()
                $('#update_btn').hide()
                $('#add_btn').show()
            })

            $('#add_btn').click(function (event){
                let inputValue = $('#item_input').val();
                $.post('add_todo', {'inputValue': inputValue, '_token': $('input[name=_token]').val()}, function (data){
                })
                $('#items').load(location.href + ' #items')
            })

            $('#delete_btn').click(function (event){
                let id = $('#item_id').val();
                $.post('delete_todo', {'id': id, '_token': $('input[name=_token]').val()}, function (data){
                })
                $('#items').load(location.href + ' #items')

            })



        })


    </script>
@endsection
