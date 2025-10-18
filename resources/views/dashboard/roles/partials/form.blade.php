
@include('dashboard.errors')
<div class="row">
  <form action="{{route('dashboard.roles.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-md-12">
      <div class="form-group">
        <label for="name">اسم الدور</label>
        <input type="text" name="name" value="{{ isset($role) ? $role->name  : old('name') }}" class="form-control" id="name" placeholder="الاسم">
      </div>
    </div>
 @foreach($title_pre as $key => $title)
  <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            {{ $key}}
          </h3>
        </div>
        <div class="card-body" >
          <ul class="list-unstyled">
            @foreach($title as $key => $permission)
            <li>
              <!-- checkbox -->
              <div class="icheck-primary d-inline ml-2">
                <input type="checkbox" class="permission_input"  name="{{$permission}}" id="todoCheck{{$permission}}"  value="@if(isset($role_permission))@if(in_array($permission, $role_permission)) On @else Off @endif @endif" @if(isset($role_permission))@if(in_array($permission, $role_permission)) checked @endif @endif>
                <label for="todoCheck{{$permission}}"></label>
              </div>
              <!-- todo text -->
              <span class="text">{{$permission}}</span>
            </li>
            @endforeach

          </ul>
        </div>
      </div>
  </div>
 @endforeach
  </div>
  </form>

@push('scripts')
<script type="text/javascript">
  $( document ).ready(function() {
  $( ".permission_input" ).click(function() {
    if ($(this).parent().prop('className') == 'checked'){
      $(this).val("Off");
      $(this).removeAttr("checked");
    }else{
      $(this).val("On");
      $(this).attr("checked", "checked");
    }
    // debugger;
  });
  $( ".select_all" ).click(function() {
    if ($(this).parent().prop('className') != 'checked'){
      $(".permission_input").each(function() {
        $(this).parent().addClass('checked');
        $(this).val("On");
        $(this).attr("checked", "checked");
      });
    }else{
      $(".permission_input").each(function() {
        $(this).parent().removeAttr('class');
        $(this).val("Off");
        $(this).removeAttr("checked");
      });
    }
    // debugger;
  });
});
</script>

@endpush




