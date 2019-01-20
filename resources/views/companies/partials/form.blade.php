@csrf
<div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" class="form-control" name="name" {{$errors->has('name') ? 'is-invalid' : ''}} id="name"
           placeholder="Enter name" value="{{old('name') ?? $company->name}}">
    @if($errors->has('name'))
        <div class="invalid-feedback">
            {{$errors->get('title')[0]}}
        </div>
    @endif
</div>
<div class="form-group">
    <label for="formGroupExampleInput2">Email</label>
    <input type="email" class="form-control" name="email" {{$errors->has('email') ? 'is-invalid' : ''}} id="email"
           placeholder="Enter email" value="{{old('email') ?? $company->email}}">
    @if($errors->has('email'))
        <div class="invalid-feedback">
            {{$errors->get('email')[0]}}
        </div>
    @endif
</div>
<div class="form-group">
    <label for="formGroupExampleInput2">Website</label>
    <input type="text" class="form-control" name="website" {{$errors->has('website') ? 'is-invalid' : ''}} id="website"
           placeholder="Enter website" value="{{old('website') ?? $company->website}}">
    @if($errors->has('website'))
        <div class="invalid-feedback">
            {{$errors->get('website')[0]}}
        </div>
    @endif
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">Input logo image</label>{{old('logo') ?? $company->logo}}
    <input type="file" class="form-control-file" name="logo" {{$errors->has('logo') ? 'is-invalid' : ''}} id="logo"
           value="{{old('logo') ?? $company->logo}}">
    @if($errors->has('logo'))
        <div class="invalid-feedback">
            {{$errors->get('logo')[0]}}
        </div>
    @endif
</div>