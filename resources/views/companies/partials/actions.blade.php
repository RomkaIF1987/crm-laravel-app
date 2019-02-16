<a href="{{route('companies.edit', ['id' => $company->id])}}"
class="btn btn-primary">Edit</a>
<form action="{{route('companies.destroy', ['$company' => $company])}}"
method="POST"
style="display: inline">
@csrf
@method('delete')
<button type="submit" class="btn btn-danger">Delete</button>
</form>