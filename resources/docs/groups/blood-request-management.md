# Blood Request management

APIs for managing Blood request

## user can accept the request if he/she want to become a donor


This router filter based on same location and blood group

This router not allowed to donor give blood within 3 month from last donation date

All params are come from ther url

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/accept-request?accept_user_id=0&request_user_id=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/accept-request"
);

let params = {
    "accept_user_id": "0",
    "request_user_id": "0",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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
 "meassge" : "Thank you For sincerity or Thank you For sincerity But Request Already accept",
}
```
<div id="execution-results-GETapi-accept-request" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-accept-request"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-accept-request"></code></pre>
</div>
<div id="execution-error-GETapi-accept-request" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-accept-request"></code></pre>
</div>
<form id="form-GETapi-accept-request" data-method="GET" data-path="api/accept-request" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-accept-request', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-accept-request" onclick="tryItOut('GETapi-accept-request');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-accept-request" onclick="cancelTryOut('GETapi-accept-request');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-accept-request" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/accept-request</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>accept_user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="accept_user_id" data-endpoint="GETapi-accept-request" data-component="query" required  hidden>
<br>
</p>
<p>
<b><code>request_user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="request_user_id" data-endpoint="GETapi-accept-request" data-component="query" required  hidden>
<br>
</p>
</form>


## User can request for a blood

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/blood-request" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"location":"\"Shamim Sharani\"","relation":"\"Wife\"","alternate_mobile":"\"01845392010\"","blood_group":"\"A-\"","request_datetime":"\"2021-01-20 14:00:11\""}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/blood-request"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "location": "\"Shamim Sharani\"",
    "relation": "\"Wife\"",
    "alternate_mobile": "\"01845392010\"",
    "blood_group": "\"A-\"",
    "request_datetime": "\"2021-01-20 14:00:11\""
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
 "meassge" : "Your Request Send towards Donor!",
}
```
<div id="execution-results-POSTapi-blood-request" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-blood-request"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-blood-request"></code></pre>
</div>
<div id="execution-error-POSTapi-blood-request" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-blood-request"></code></pre>
</div>
<form id="form-POSTapi-blood-request" data-method="POST" data-path="api/blood-request" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-blood-request', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-blood-request" onclick="tryItOut('POSTapi-blood-request');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-blood-request" onclick="cancelTryOut('POSTapi-blood-request');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-blood-request" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/blood-request</code></b>
</p>
<p>
<label id="auth-POSTapi-blood-request" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-blood-request" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>location</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="location" data-endpoint="POSTapi-blood-request" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>relation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="relation" data-endpoint="POSTapi-blood-request" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>alternate_mobile</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="alternate_mobile" data-endpoint="POSTapi-blood-request" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>blood_group</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="blood_group" data-endpoint="POSTapi-blood-request" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>request_datetime</code></b>&nbsp;&nbsp;<small>dateTime</small>  &nbsp;
<input type="text" name="request_datetime" data-endpoint="POSTapi-blood-request" data-component="body" required  hidden>
<br>
</p>

</form>


## admin and user can see the request history

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/request-history" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/request-history"
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
 "request_user_name" : "ahad",
 "request_user_id" : "1",
 "blood_group" : "B+",
 "location" : "Mugdha",
 "alternate_mobile" : "01845392010",
 "relation" : "wife",
 "request_datetime" : "2021-01-21 13:21:24",
}
```
<div id="execution-results-GETapi-request-history" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-request-history"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-request-history"></code></pre>
</div>
<div id="execution-error-GETapi-request-history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-request-history"></code></pre>
</div>
<form id="form-GETapi-request-history" data-method="GET" data-path="api/request-history" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-request-history', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-request-history" onclick="tryItOut('GETapi-request-history');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-request-history" onclick="cancelTryOut('GETapi-request-history');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-request-history" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/request-history</code></b>
</p>
<p>
<label id="auth-GETapi-request-history" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-request-history" data-component="header"></label>
</p>
</form>


## Admin can see the accept user who accept the request

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/accept-user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/accept-user"
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
 "email" : "ahad@gmail.com",
 "accept_user_id" : "1",
 "request_id" : "2",
 "request_user_id" : "3",
}
```
<div id="execution-results-GETapi-accept-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-accept-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-accept-user"></code></pre>
</div>
<div id="execution-error-GETapi-accept-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-accept-user"></code></pre>
</div>
<form id="form-GETapi-accept-user" data-method="GET" data-path="api/accept-user" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-accept-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-accept-user" onclick="tryItOut('GETapi-accept-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-accept-user" onclick="cancelTryOut('GETapi-accept-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-accept-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/accept-user</code></b>
</p>
<p>
<label id="auth-GETapi-accept-user" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-accept-user" data-component="header"></label>
</p>
</form>


## Admin can set the donor against the request for blood

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/add-donor" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"donor_id":0,"receiver_id":0,"request_id":0,"donation_date":"\"2021-01-20 14:00:11\""}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/add-donor"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "donor_id": 0,
    "receiver_id": 0,
    "request_id": 0,
    "donation_date": "\"2021-01-20 14:00:11\""
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
    "message": "Donor assigned successfully"
}
```
<div id="execution-results-POSTapi-add-donor" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-add-donor"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-add-donor"></code></pre>
</div>
<div id="execution-error-POSTapi-add-donor" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-add-donor"></code></pre>
</div>
<form id="form-POSTapi-add-donor" data-method="POST" data-path="api/add-donor" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-add-donor', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-add-donor" onclick="tryItOut('POSTapi-add-donor');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-add-donor" onclick="cancelTryOut('POSTapi-add-donor');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-add-donor" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/add-donor</code></b>
</p>
<p>
<label id="auth-POSTapi-add-donor" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-add-donor" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>donor_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="donor_id" data-endpoint="POSTapi-add-donor" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>receiver_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="receiver_id" data-endpoint="POSTapi-add-donor" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>request_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="request_id" data-endpoint="POSTapi-add-donor" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>donation_date</code></b>&nbsp;&nbsp;<small>dateTime</small>  &nbsp;
<input type="text" name="donation_date" data-endpoint="POSTapi-add-donor" data-component="body" required  hidden>
<br>
</p>

</form>



