{{ form('signup','class':'ui form segment') }}
    <div class="ui success message">
        <p>{{ flash.output() }}</p>
    </div>
    <div class="two fields">
       {{ signupForm.renderDecorated('firstName') }}
        {{ signupForm.renderDecorated('lastName') }}
    </div>
    <div class="three fields">
        {{ signupForm.renderDecorated('month')}}
        {{ signupForm.renderDecorated('day')}}
        {{ signupForm.renderDecorated('year')}}
    </div>
    {{ signupForm.renderDecorated('gender') }}
    {{ signupForm.renderDecorated('username') }}
    {{ signupForm.renderDecorated('password') }}
    {#{{ signupForm.renderDecorated('terms') }}#}
    <button type="submit" class="ui submit button">Sign Up</button>
{{ endform() }}