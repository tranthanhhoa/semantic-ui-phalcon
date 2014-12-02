<div class="ui green message">{{ flash.output() }}</div>
{{ form('login','class':'ui form') }}
{{ loginForm.renderDecorated('email') }}
{{ loginForm.renderDecorated('password') }}
{{ loginForm.renderDecorated('csrf') }}
<button type="submit" class="ui primary button">
    Login
</button>
{{ endform() }}