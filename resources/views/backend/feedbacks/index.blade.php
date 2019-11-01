@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3 class="header-list">User Messages</h3>
        <div class="col-12">
            <table id="feedbacks-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Comments</th>
                        <th>Option</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(function(){
        $('#feedbacks-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('feedback.data') !!}',
            columns: [
                {
                    data: 'fullname',
                    name: 'fullname'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'comment',
                    name: 'comment'
                },
                {
                    data: 'option',
                    name: 'option'
                }
            ]
        });
    });
</script>
@endpush