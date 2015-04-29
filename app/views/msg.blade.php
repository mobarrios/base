@if($errors->count() != 0)
<div class="alert alert-danger ">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @foreach($errors->all() as $error)
    {{$error}}
    @endforeach
</div>
@endif 