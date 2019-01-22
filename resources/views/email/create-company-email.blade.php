@component('mail::message')
    # New company created

    The body of your message.
    {{dd()}}
    @component('mail::button', ['url' => route('companies.show',['company'=>$company->id])])
        Go to created company
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent