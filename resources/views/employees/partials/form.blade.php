@csrf
<div class="form-group">
    <label for="formGroupExampleInput">First Name</label>
    <input type="text" class="form-control {{$errors->has('first_name') ? 'is-invalid' : ''}}" name="first_name"
           id="first_name" placeholder="Enter first name" value="{{old('first_name') ?? $employee->first_name}}"
           required autofocus>
</div>
@if($errors->has('first_name'))
    <div class="invalid-feedback">
        {{$errors->get('first_name')[0]}}
    </div>
@endif
<div class="form-group">
    <label for="exampleFormControlFile1">Last Name</label>
    <input type="text" class="form-control {{$errors->has('last_name') ? 'is-invalid' : ''}}" name="last_name"
           id="last_name" placeholder="Enter last name" value="{{old('last_name') ?? $employee->last_name}}" required
           autofocus>
</div>
@if($errors->has('last_name'))
    <div class="invalid-feedback">
        {{$errors->get('last_name')[0]}}
    </div>
@endif
<div class="form-group">
    <label for="formGroupExampleInput2">Email</label>
    <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email" id="email"
           placeholder="Enter email" value="{{old('email') ?? $employee->email}}" required autofocus>
</div>
@if($errors->has('email'))
    <div class="invalid-feedback">
        {{$errors->get('email')[0]}}
    </div>
@endif
<div class="form-group">
    <label for="formGroupExampleInput2">Phone</label>
    <input type="number" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" name="phone" id="phone"
           placeholder="Enter phone" value="{{old('phone') ?? $employee->phone}}" required autofocus>
</div>
@if($errors->has('phone'))
    <div class="invalid-feedback">
        {{$errors->get('phone')[0]}}
    </div>
@endif
