# Donation management

APIs for managing Donation History

## Admin or User see the all donation history

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/donation-history" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/donation-history"
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
 "donation_date" : "2021-01-20 14:00:11",
}
```
<div id="execution-results-GETapi-donation-history" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-donation-history"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-donation-history"></code></pre>
</div>
<div id="execution-error-GETapi-donation-history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-donation-history"></code></pre>
</div>
<form id="form-GETapi-donation-history" data-method="GET" data-path="api/donation-history" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-donation-history', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-donation-history" onclick="tryItOut('GETapi-donation-history');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-donation-history" onclick="cancelTryOut('GETapi-donation-history');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-donation-history" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/donation-history</code></b>
</p>
<p>
<label id="auth-GETapi-donation-history" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-donation-history" data-component="header"></label>
</p>
</form>


## Admin or User see the Specific donation history

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/donation-history/minima" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/donation-history/minima"
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
 "donation_date" : "2021-01-20 14:00:11",
}
```
<div id="execution-results-GETapi-donation-history--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-donation-history--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-donation-history--id-"></code></pre>
</div>
<div id="execution-error-GETapi-donation-history--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-donation-history--id-"></code></pre>
</div>
<form id="form-GETapi-donation-history--id-" data-method="GET" data-path="api/donation-history/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-donation-history--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-donation-history--id-" onclick="tryItOut('GETapi-donation-history--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-donation-history--id-" onclick="cancelTryOut('GETapi-donation-history--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-donation-history--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/donation-history/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-donation-history--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-donation-history--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-donation-history--id-" data-component="url" required  hidden>
<br>
</p>
</form>



