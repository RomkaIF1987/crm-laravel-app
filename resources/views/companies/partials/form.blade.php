@csrf
<div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name"
           placeholder="Enter name" value="{{old('name') ?? $company->name}}" required autofocus>
    @if($errors->has('name'))
        <div class="invalid-feedback">
            {{$errors->get('name')[0]}}
        </div>
    @endif
</div>
<div class="form-group">
    <label for="formGroupExampleInput2">Email</label>
    <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email" id="email"
           placeholder="Enter email" value="{{old('email') ?? $company->email}}">
    @if($errors->has('email'))
        <div class="invalid-feedback">
            {{$errors->get('email')[0]}}
        </div>
    @endif
</div>
<div class="form-group">
    <label for="formGroupExampleInput2">Website</label>
    <input type="text" class="form-control {{$errors->has('website') ? 'is-invalid' : ''}} " name="website" id="website"
           placeholder="Enter website" value="{{old('website') ?? $company->website}}">
    @if($errors->has('website'))
        <div class="invalid-feedback">
            {{$errors->get('website')[0]}}
        </div>
    @endif
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">Input logo image</label>
    @if($company->logo)
        <img src="/storage/logo_companies/{{$company->logo}}">
        <p>If you want to update logo insert it below</p>
    @endif
    <input type="file" class="form-control-file {{$errors->has('logo') ? 'is-invalid' : ''}} " name="logo" id="logo">
    @if($errors->has('logo'))
        <div class="invalid-feedback">
            {{$errors->get('logo')[0]}}
        </div>
    @endif
</div>