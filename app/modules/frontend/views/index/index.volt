<h1>Home page</h1>
{% if session.has('auth') %}
<a href="/logout">Log out</a>
{% endif %}
{% if !session.has('auth') %}
    <a href="/login">Log in</a>
{% endif %}