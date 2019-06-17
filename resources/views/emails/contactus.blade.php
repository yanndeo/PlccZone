@component('mail::message')
# Hey Admin

<h3>- Depuis le formulaire de contact </h3>
<br>
@component('mail::panel')
 {{ $msg}} .
            
               |{{ $name}}

@endcomponent


@component('mail::table')
# Infos complementaire


| Societe       | name         | email  |
| ------------- |:-------------:| --------:|
| {{ $society}} | {{ $name}}   |{{ $email}} |
@endcomponent

@component('mail::button', ['url' => config('app.url'), 'color' => 'success'])
Connect
@endcomponent

@endcomponent
