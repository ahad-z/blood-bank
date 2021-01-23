# User management

APIs for managing users

## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/registration" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"ahad","email":"ahadcseiuits@gmail.com","mobile":"01981732712","alternate_mobile":"01845392010","blood_group":"B+","religion":"Islam","weight":"60kg","birth_date":"1997-08-03","district":"Chandpur","police_station":"Chandpur","post_office":"Darussalam","union":"\"Bagadi\""}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/registration"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ahad",
    "email": "ahadcseiuits@gmail.com",
    "mobile": "01981732712",
    "alternate_mobile": "01845392010",
    "blood_group": "B+",
    "religion": "Islam",
    "weight": "60kg",
    "birth_date": "1997-08-03",
    "district": "Chandpur",
    "police_station": "Chandpur",
    "post_office": "Darussalam",
    "union": "\"Bagadi\""
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
    "name": "Thank you for your registration"
}
```
<div id="execution-results-POSTapi-registration" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-registration"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-registration"></code></pre>
</div>
<div id="execution-error-POSTapi-registration" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-registration"></code></pre>
</div>
<form id="form-POSTapi-registration" data-method="POST" data-path="api/registration" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-registration', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-registration" onclick="tryItOut('POSTapi-registration');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-registration" onclick="cancelTryOut('POSTapi-registration');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-registration" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/registration</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>mobile</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="mobile" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>alternate_mobile</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="alternate_mobile" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>blood_group</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="blood_group" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>religion</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="religion" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>weight</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="weight" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>birth_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="birth_date" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>district</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="district" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>police_station</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="police_station" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>post_office</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="post_office" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>union</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="union" data-endpoint="POSTapi-registration" data-component="body" required  hidden>
<br>
</p>

</form>



