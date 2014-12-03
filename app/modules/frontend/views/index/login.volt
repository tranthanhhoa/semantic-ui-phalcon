{{ flash.output() }}
{{ form('login','class':'ui form') }}
{{ loginForm.renderDecorated('email') }}
{{ loginForm.renderDecorated('password') }}
{{ loginForm.render('csrf',['value': security.getToken()]) }}
<button type="submit" class="ui primary button">
    Login
</button>

{{ endform() }}