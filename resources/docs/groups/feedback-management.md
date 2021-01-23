# Feedback management

APIs for managing Feedback

## admin or user can see the given feedback

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/feedbacks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/feedbacks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

{
 "name" : "ahad",
 "email" : "ahad@email.com",
 "feedback" : "good persion",
 "donation_id" : "2",
 "type" : "donor",
}
```
<div id="execution-results-GETapi-feedbacks" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-feedbacks"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-feedbacks"></code></pre>
</div>
<div id="execution-error-GETapi-feedbacks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-feedbacks"></code></pre>
</div>
<form id="form-GETapi-feedbacks" data-method="GET" data-path="api/feedbacks" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-feedbacks', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-feedbacks" onclick="tryItOut('GETapi-feedbacks');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-feedbacks" onclick="cancelTryOut('GETapi-feedbacks');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-feedbacks" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/feedbacks</code></b>
</p>
<p>
<label id="auth-GETapi-feedbacks" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-feedbacks" data-component="header"></label>
</p>
</form>


## Donor or Receiver give feedback vice versa

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/feedback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"donation_id":0,"feedback":"\"Good persion\""}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/feedback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "donation_id": 0,
    "feedback": "\"Good persion\""
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "message": "Thank for your feedback"
}
```
<div id="execution-results-POSTapi-feedback" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-feedback"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-feedback"></code></pre>
</div>
<div id="execution-error-POSTapi-feedback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-feedback"></code></pre>
</div>
<form id="form-POSTapi-feedback" data-method="POST" data-path="api/feedback" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-feedback', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-feedback" onclick="tryItOut('POSTapi-feedback');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-feedback" onclick="cancelTryOut('POSTapi-feedback');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-feedback" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/feedback</code></b>
</p>
<p>
<label id="auth-POSTapi-feedback" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-feedback" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>donation_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="donation_id" data-endpoint="POSTapi-feedback" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>feedback</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="feedback" data-endpoint="POSTapi-feedback" data-component="body" required  hidden>
<br>
</p>

</form>


## admin or user can see the specific feedback against donation

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/feedback/accusamus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/feedback/accusamus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

{
 "name" : "ahad",
 "email" : "ahad@email.com",
 "feedback" : "good persion",
 "donation_id" : "2",
 "type" : "donor",
}
```
<div id="execution-results-GETapi-feedback--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-feedback--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-feedback--id-"></code></pre>
</div>
<div id="execution-error-GETapi-feedback--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-feedback--id-"></code></pre>
</div>
<form id="form-GETapi-feedback--id-" data-method="GET" data-path="api/feedback/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-feedback--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-feedback--id-" onclick="tryItOut('GETapi-feedback--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-feedback--id-" onclick="cancelTryOut('GETapi-feedback--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-feedback--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/feedback/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-feedback--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-feedback--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-feedback--id-" data-component="url" required  hidden>
<br>
</p>
</form>



