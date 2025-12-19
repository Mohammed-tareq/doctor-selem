<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.6.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.6.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-home-info">
                                <a href="#endpoints-GETapi-home-info">Handle the incoming request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-articles">
                                <a href="#endpoints-GETapi-articles">GET api/articles</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-articles--article_id-">
                                <a href="#endpoints-GETapi-articles--article_id-">GET api/articles/{article_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-books">
                                <a href="#endpoints-GETapi-books">GET api/books</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-books--book_id-">
                                <a href="#endpoints-GETapi-books--book_id-">GET api/books/{book_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-blogs">
                                <a href="#endpoints-GETapi-blogs">GET api/blogs</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-blogs--blog_id-">
                                <a href="#endpoints-GETapi-blogs--blog_id-">GET api/blogs/{blog_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-audios">
                                <a href="#endpoints-GETapi-audios">GET api/audios</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-audios--audio_id-">
                                <a href="#endpoints-GETapi-audios--audio_id-">GET api/audios/{audio_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-setting">
                                <a href="#endpoints-GETapi-setting">Handle the incoming request.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: December 19, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-home-info">Handle the incoming request.</h2>

<p>
</p>



<span id="example-requests-GETapi-home-info">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/home-info" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/home-info"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-home-info">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;user_info&quot;: {
            &quot;user_name&quot;: &quot;الدكتور سليم&quot;,
            &quot;user_full_name&quot;: &quot;الدكتور سليم محمد أحمد&quot;,
            &quot;user_cv&quot;: null,
            &quot;user_personal&quot;: &quot;طبيب متخصص في الطب الباطني مع خبرة واسعة في التشخيص والعلاج\n            أستاذ في كلية الطب مع اهتمام خاص بالبحوث الطبية\n            جراح متخصص في جراحة القلب مع سنوات من الخبرة\n            طبيب أطفال مع شغف بمساعدة الأطفال والعائلات\n            باحث طبي متخصص في الأمراض المزمنة&quot;,
            &quot;user_educational&quot;: &quot;طبيب متخصص في الطب الباطني مع خبرة واسعة في التشخيص والعلاج\n            أستاذ في كلية الطب مع اهتمام خاص بالبحوث الطبية\n            جراح متخصص في جراحة القلب مع سنوات من الخبرة\n            طبيب أطفال مع شغف بمساعدة الأطفال والعائلات\n            باحث طبي متخصص في الأمراض المزمنة&quot;,
            &quot;user_image_cover&quot;: &quot;http://localhost:8000/files/user.webp&quot;,
            &quot;user_images&quot;: [
                &quot;http://localhost:8000/files/user1.png&quot;,
                &quot;http://localhost:8000/files/user2.png&quot;
            ]
        },
        &quot;articals_count&quot;: 5,
        &quot;books_count&quot;: 10,
        &quot;audios_count&quot;: 45,
        &quot;awords_count&quot;: 12,
        &quot;business&quot;: [
            {
                &quot;start_date&quot;: &quot;2018&quot;,
                &quot;end_date&quot;: &quot;2018&quot;,
                &quot;content&quot;: [
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;,
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;,
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;,
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;
                ]
            },
            {
                &quot;start_date&quot;: &quot;2000&quot;,
                &quot;end_date&quot;: &quot;2000&quot;,
                &quot;content&quot;: [
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;,
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;,
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;,
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;
                ]
            },
            {
                &quot;start_date&quot;: &quot;2001&quot;,
                &quot;end_date&quot;: &quot;2001&quot;,
                &quot;content&quot;: [
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;,
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;,
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;,
                    &quot;عمل في مجله مصر &quot;,
                    &quot;حصلت على بكالوريوس الطب من جامعه القاهره&quot;,
                    &quot;حصل علي جوائز&quot;
                ]
            }
        ],
        &quot;books&quot;: [
            {
                &quot;book_id&quot;: 1,
                &quot;book_name&quot;: &quot;الأدوية والعلاجات&quot;,
                &quot;book_date&quot;: &quot;1977&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Boyle-Kling&quot;
            },
            {
                &quot;book_id&quot;: 2,
                &quot;book_name&quot;: &quot;أمراض القلب والشرايين&quot;,
                &quot;book_date&quot;: &quot;2015&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Cruickshank, Veum and Ward&quot;
            },
            {
                &quot;book_id&quot;: 3,
                &quot;book_name&quot;: &quot;أمراض القلب والشرايين&quot;,
                &quot;book_date&quot;: &quot;2014&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Grady-Schultz&quot;
            }
        ],
        &quot;articles&quot;: [
            {
                &quot;article_id&quot;: 1,
                &quot;article_title&quot;: &quot;دراسة عن الصحة النفسية في المجتمع&quot;,
                &quot;article_time&quot;: &quot;5:55 AM&quot;,
                &quot;article_date&quot;: &quot;20/Jan/1993&quot;
            },
            {
                &quot;article_id&quot;: 2,
                &quot;article_title&quot;: &quot;بحث في فعالية الأدوية الجديدة&quot;,
                &quot;article_time&quot;: &quot;5:55 AM&quot;,
                &quot;article_date&quot;: &quot;01/Mar/2007&quot;
            },
            {
                &quot;article_id&quot;: 3,
                &quot;article_title&quot;: &quot;بحث في الطب الوقائي&quot;,
                &quot;article_time&quot;: &quot;5:55 AM&quot;,
                &quot;article_date&quot;: &quot;21/Mar/1995&quot;
            },
            {
                &quot;article_id&quot;: 4,
                &quot;article_title&quot;: &quot;بحث في الطب الوقائي&quot;,
                &quot;article_time&quot;: &quot;5:55 AM&quot;,
                &quot;article_date&quot;: &quot;05/Jun/1970&quot;
            },
            {
                &quot;article_id&quot;: 5,
                &quot;article_title&quot;: &quot;مراجعة شاملة لأحدث الأبحاث في طب القلب&quot;,
                &quot;article_time&quot;: &quot;5:55 AM&quot;,
                &quot;article_date&quot;: &quot;25/May/1986&quot;
            }
        ],
        &quot;audios&quot;: [
            {
                &quot;project_id&quot;: 1,
                &quot;project_title&quot;: &quot;مشروع تطوير البرمجيات الطبية&quot;,
                &quot;project_image_cover&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;project_audio&quot;: [
                    {
                        &quot;audio_id&quot;: 1,
                        &quot;audio_title&quot;: &quot;توعية صحية&quot;,
                        &quot;audio_details&quot;: &quot;تحليل عميق للموضوع مع استعراض الخبرات العملية&quot;,
                        &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                        &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                        &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                        &quot;duration&quot;: &quot;02:32&quot;
                    }
                ]
            },
            {
                &quot;project_id&quot;: 2,
                &quot;project_title&quot;: &quot;مشروع الأبحاث الطبية&quot;,
                &quot;project_image_cover&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;project_audio&quot;: [
                    {
                        &quot;audio_id&quot;: 4,
                        &quot;audio_title&quot;: &quot;محاضرة عن الطب الحديث&quot;,
                        &quot;audio_details&quot;: &quot;شرح تفصيلي مع أمثلة عملية من الواقع الطبي&quot;,
                        &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                        &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                        &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                        &quot;duration&quot;: &quot;02:32&quot;
                    }
                ]
            },
            {
                &quot;project_id&quot;: 3,
                &quot;project_title&quot;: &quot;مشروع التحسين الصحي&quot;,
                &quot;project_image_cover&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;project_audio&quot;: [
                    {
                        &quot;audio_id&quot;: 7,
                        &quot;audio_title&quot;: &quot;شرح عن الأمراض المزمنة&quot;,
                        &quot;audio_details&quot;: &quot;شرح تفصيلي مع أمثلة عملية من الواقع الطبي&quot;,
                        &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                        &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                        &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                        &quot;duration&quot;: &quot;02:32&quot;
                    }
                ]
            },
            {
                &quot;project_id&quot;: 4,
                &quot;project_title&quot;: &quot;مشروع تطوير النظام الصحي&quot;,
                &quot;project_image_cover&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;project_audio&quot;: [
                    {
                        &quot;audio_id&quot;: 10,
                        &quot;audio_title&quot;: &quot;ندوة حول الصحة النفسية&quot;,
                        &quot;audio_details&quot;: &quot;شرح تفصيلي مع أمثلة عملية من الواقع الطبي&quot;,
                        &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                        &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                        &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                        &quot;duration&quot;: &quot;02:32&quot;
                    }
                ]
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-home-info" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-home-info"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-home-info"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-home-info" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-home-info">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-home-info" data-method="GET"
      data-path="api/home-info"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-home-info', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-home-info"
                    onclick="tryItOut('GETapi-home-info');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-home-info"
                    onclick="cancelTryOut('GETapi-home-info');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-home-info"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/home-info</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-home-info"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-home-info"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-articles">GET api/articles</h2>

<p>
</p>



<span id="example-requests-GETapi-articles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/articles" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/articles"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-articles">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;articles&quot;: [
            {
                &quot;article_id&quot;: 1,
                &quot;article_title&quot;: &quot;دراسة عن الصحة النفسية في المجتمع&quot;,
                &quot;article_time&quot;: &quot;5:55 AM&quot;,
                &quot;article_date&quot;: &quot;20/Jan/1993&quot;
            },
            {
                &quot;article_id&quot;: 2,
                &quot;article_title&quot;: &quot;بحث في فعالية الأدوية الجديدة&quot;,
                &quot;article_time&quot;: &quot;5:55 AM&quot;,
                &quot;article_date&quot;: &quot;01/Mar/2007&quot;
            },
            {
                &quot;article_id&quot;: 3,
                &quot;article_title&quot;: &quot;بحث في الطب الوقائي&quot;,
                &quot;article_time&quot;: &quot;5:55 AM&quot;,
                &quot;article_date&quot;: &quot;21/Mar/1995&quot;
            },
            {
                &quot;article_id&quot;: 4,
                &quot;article_title&quot;: &quot;بحث في الطب الوقائي&quot;,
                &quot;article_time&quot;: &quot;5:55 AM&quot;,
                &quot;article_date&quot;: &quot;05/Jun/1970&quot;
            },
            {
                &quot;article_id&quot;: 5,
                &quot;article_title&quot;: &quot;مراجعة شاملة لأحدث الأبحاث في طب القلب&quot;,
                &quot;article_time&quot;: &quot;5:55 AM&quot;,
                &quot;article_date&quot;: &quot;25/May/1986&quot;
            }
        ],
        &quot;count&quot;: 5,
        &quot;pagination&quot;: {
            &quot;total&quot;: 5,
            &quot;current_page&quot;: 1,
            &quot;last_page&quot;: 1,
            &quot;per_page&quot;: 9,
            &quot;from&quot;: 1,
            &quot;to&quot;: 5,
            &quot;links&quot;: {
                &quot;first&quot;: &quot;http://localhost:8000/api/articles?page=1&quot;,
                &quot;last&quot;: &quot;http://localhost:8000/api/articles?page=1&quot;,
                &quot;prev&quot;: null,
                &quot;next&quot;: null
            },
            &quot;pagination_links&quot;: [
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                    &quot;page&quot;: null,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://localhost:8000/api/articles?page=1&quot;,
                    &quot;label&quot;: &quot;1&quot;,
                    &quot;page&quot;: 1,
                    &quot;active&quot;: true
                },
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                    &quot;page&quot;: null,
                    &quot;active&quot;: false
                }
            ]
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-articles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-articles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-articles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-articles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-articles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-articles" data-method="GET"
      data-path="api/articles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-articles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-articles"
                    onclick="tryItOut('GETapi-articles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-articles"
                    onclick="cancelTryOut('GETapi-articles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-articles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/articles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-articles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-articles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-articles--article_id-">GET api/articles/{article_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-articles--article_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/articles/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/articles/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-articles--article_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;article_id&quot;: 1,
        &quot;article_title&quot;: &quot;دراسة عن الصحة النفسية في المجتمع&quot;,
        &quot;article_time&quot;: &quot;5:55 AM&quot;,
        &quot;article_date&quot;: &quot;1993&quot;,
        &quot;article_classification&quot;: &quot;الدراسات الطبية&quot;,
        &quot;article_type&quot;: &quot;دراسة حالة&quot;,
        &quot;article_author&quot;: &quot;دكتور مصطفي &quot;,
        &quot;article_publisher&quot;: &quot;دكتور مصطفي &quot;,
        &quot;article_reference&quot;: null,
        &quot;total_word_count&quot;: 52,
        &quot;article_sections_count&quot;: 3,
        &quot;article_sections&quot;: [
            {
                &quot;section_order&quot;: 2,
                &quot;section_title&quot;: &quot;المراجع&quot;,
                &quot;section_content&quot;: {
                    &quot;type&quot;: &quot;text&quot;,
                    &quot;title&quot;: &quot;المناقشة&quot;,
                    &quot;content&quot;: &quot;مقدمة شاملة عن الموضوع المطروح&quot;
                }
            },
            {
                &quot;section_order&quot;: 6,
                &quot;section_title&quot;: &quot;الملاحق&quot;,
                &quot;section_content&quot;: {
                    &quot;type&quot;: &quot;image&quot;,
                    &quot;title&quot;: &quot;النتائج&quot;,
                    &quot;content&quot;: &quot;http://localhost:8000/files/book1.webp&quot;
                }
            },
            {
                &quot;section_order&quot;: 5,
                &quot;section_title&quot;: &quot;المناقشة&quot;,
                &quot;section_content&quot;: {
                    &quot;type&quot;: &quot;text&quot;,
                    &quot;title&quot;: &quot;المنهجية&quot;,
                    &quot;content&quot;: &quot;مقدمة شاملة عن الموضوع المطروح&quot;
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-articles--article_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-articles--article_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-articles--article_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-articles--article_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-articles--article_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-articles--article_id-" data-method="GET"
      data-path="api/articles/{article_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-articles--article_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-articles--article_id-"
                    onclick="tryItOut('GETapi-articles--article_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-articles--article_id-"
                    onclick="cancelTryOut('GETapi-articles--article_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-articles--article_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/articles/{article_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-articles--article_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-articles--article_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>article_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="article_id"                data-endpoint="GETapi-articles--article_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the article. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-books">GET api/books</h2>

<p>
</p>



<span id="example-requests-GETapi-books">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/books" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/books"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-books">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;data&quot;: [
            {
                &quot;book_id&quot;: 1,
                &quot;book_name&quot;: &quot;الأدوية والعلاجات&quot;,
                &quot;book_date&quot;: &quot;1977&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Boyle-Kling&quot;
            },
            {
                &quot;book_id&quot;: 2,
                &quot;book_name&quot;: &quot;أمراض القلب والشرايين&quot;,
                &quot;book_date&quot;: &quot;2015&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Cruickshank, Veum and Ward&quot;
            },
            {
                &quot;book_id&quot;: 3,
                &quot;book_name&quot;: &quot;أمراض القلب والشرايين&quot;,
                &quot;book_date&quot;: &quot;2014&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Grady-Schultz&quot;
            },
            {
                &quot;book_id&quot;: 4,
                &quot;book_name&quot;: &quot;الأدوية والعلاجات&quot;,
                &quot;book_date&quot;: &quot;1994&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Luettgen and Sons&quot;
            },
            {
                &quot;book_id&quot;: 5,
                &quot;book_name&quot;: &quot;دليل شامل للجراحة&quot;,
                &quot;book_date&quot;: &quot;1996&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Cartwright, Goyette and Braun&quot;
            },
            {
                &quot;book_id&quot;: 6,
                &quot;book_name&quot;: &quot;طب الأطفال الشامل&quot;,
                &quot;book_date&quot;: &quot;2020&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Oberbrunner, Kulas and Miller&quot;
            },
            {
                &quot;book_id&quot;: 7,
                &quot;book_name&quot;: &quot;التشخيص الطبي&quot;,
                &quot;book_date&quot;: &quot;1994&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Gibson-Raynor&quot;
            },
            {
                &quot;book_id&quot;: 8,
                &quot;book_name&quot;: &quot;طب الأطفال الشامل&quot;,
                &quot;book_date&quot;: &quot;1981&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Collier and Sons&quot;
            },
            {
                &quot;book_id&quot;: 9,
                &quot;book_name&quot;: &quot;طب الأطفال الشامل&quot;,
                &quot;book_date&quot;: &quot;1982&quot;,
                &quot;image&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;publishing_house&quot;: &quot;Grant Group&quot;
            }
        ],
        &quot;count&quot;: 9,
        &quot;pagination&quot;: {
            &quot;total&quot;: 10,
            &quot;current_page&quot;: 1,
            &quot;last_page&quot;: 2,
            &quot;per_page&quot;: 9,
            &quot;from&quot;: 1,
            &quot;to&quot;: 9,
            &quot;links&quot;: {
                &quot;first&quot;: &quot;http://localhost:8000/api/books?page=1&quot;,
                &quot;last&quot;: &quot;http://localhost:8000/api/books?page=2&quot;,
                &quot;prev&quot;: null,
                &quot;next&quot;: &quot;http://localhost:8000/api/books?page=2&quot;
            },
            &quot;pagination_links&quot;: [
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                    &quot;page&quot;: null,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://localhost:8000/api/books?page=1&quot;,
                    &quot;label&quot;: &quot;1&quot;,
                    &quot;page&quot;: 1,
                    &quot;active&quot;: true
                },
                {
                    &quot;url&quot;: &quot;http://localhost:8000/api/books?page=2&quot;,
                    &quot;label&quot;: &quot;2&quot;,
                    &quot;page&quot;: 2,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://localhost:8000/api/books?page=2&quot;,
                    &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                    &quot;page&quot;: 2,
                    &quot;active&quot;: false
                }
            ]
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-books" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-books"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-books"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-books" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-books">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-books" data-method="GET"
      data-path="api/books"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-books', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-books"
                    onclick="tryItOut('GETapi-books');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-books"
                    onclick="cancelTryOut('GETapi-books');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-books"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/books</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-books"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-books"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-books--book_id-">GET api/books/{book_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-books--book_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/books/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/books/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-books--book_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;book_id&quot;: 1,
        &quot;book_name&quot;: &quot;الأدوية والعلاجات&quot;,
        &quot;book_date&quot;: &quot;1977&quot;,
        &quot;image&quot;: [
            &quot;http://localhost:8000/files/book1.webp&quot;,
            &quot;http://localhost:8000/files/book2.webp&quot;
        ],
        &quot;publishing_house&quot;: &quot;Boyle-Kling&quot;,
        &quot;book_lang&quot;: &quot;fr&quot;,
        &quot;book_pages&quot;: 510,
        &quot;book_edition_number&quot;: 3,
        &quot;book_classfiction&quot;: &quot;الأبحاث الطبية&quot;,
        &quot;book_goals&quot;: &quot;أهداف الكتاب تشمل توفير معلومات شاملة ومفيدة للقارئ&quot;,
        &quot;book_summary&quot;: &quot;ملخص شامل للكتاب يغطي أهم المواضيع والمحاور الرئيسية مع شرح مفصل لكل فصل من فصول الكتاب&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-books--book_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-books--book_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-books--book_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-books--book_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-books--book_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-books--book_id-" data-method="GET"
      data-path="api/books/{book_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-books--book_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-books--book_id-"
                    onclick="tryItOut('GETapi-books--book_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-books--book_id-"
                    onclick="cancelTryOut('GETapi-books--book_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-books--book_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/books/{book_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-books--book_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-books--book_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>book_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="book_id"                data-endpoint="GETapi-books--book_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the book. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-blogs">GET api/blogs</h2>

<p>
</p>



<span id="example-requests-GETapi-blogs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/blogs" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/blogs"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;blogs&quot;: [
            {
                &quot;blog_id&quot;: 1,
                &quot;blog_title&quot;: &quot;مقال تعليمي عن الطب&quot;,
                &quot;blog_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;blog_time&quot;: &quot;5:55 AM&quot;,
                &quot;blog_views&quot;: 7557,
                &quot;blog_image_cover&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;blog_classification&quot;: &quot;البحث العلمي&quot;,
                &quot;blog_image_content&quot;: &quot;http://localhost:8000/files/book2.webp&quot;,
                &quot;blog_content&quot;: &quot;\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n        &quot;
            },
            {
                &quot;blog_id&quot;: 2,
                &quot;blog_title&quot;: &quot;رأي حول مستقبل الرعاية الصحية&quot;,
                &quot;blog_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;blog_time&quot;: &quot;5:55 AM&quot;,
                &quot;blog_views&quot;: 4591,
                &quot;blog_image_cover&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;blog_classification&quot;: &quot;التكنولوجيا الطبية&quot;,
                &quot;blog_image_content&quot;: &quot;http://localhost:8000/files/book2.webp&quot;,
                &quot;blog_content&quot;: &quot;\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n        &quot;
            },
            {
                &quot;blog_id&quot;: 3,
                &quot;blog_title&quot;: &quot;أحدث التطورات في مجال الطب&quot;,
                &quot;blog_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;blog_time&quot;: &quot;5:55 AM&quot;,
                &quot;blog_views&quot;: 2148,
                &quot;blog_image_cover&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;blog_classification&quot;: &quot;البحث العلمي&quot;,
                &quot;blog_image_content&quot;: &quot;http://localhost:8000/files/book2.webp&quot;,
                &quot;blog_content&quot;: &quot;\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n        &quot;
            },
            {
                &quot;blog_id&quot;: 4,
                &quot;blog_title&quot;: &quot;نصائح صحية مهمة للجميع&quot;,
                &quot;blog_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;blog_time&quot;: &quot;5:55 AM&quot;,
                &quot;blog_views&quot;: 1884,
                &quot;blog_image_cover&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;blog_classification&quot;: &quot;الأبحاث الطبية&quot;,
                &quot;blog_image_content&quot;: &quot;http://localhost:8000/files/book2.webp&quot;,
                &quot;blog_content&quot;: &quot;\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n        &quot;
            },
            {
                &quot;blog_id&quot;: 5,
                &quot;blog_title&quot;: &quot;مقال تعليمي عن الطب&quot;,
                &quot;blog_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;blog_time&quot;: &quot;5:55 AM&quot;,
                &quot;blog_views&quot;: 2315,
                &quot;blog_image_cover&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;blog_classification&quot;: &quot;التوعية الصحية&quot;,
                &quot;blog_image_content&quot;: &quot;http://localhost:8000/files/book2.webp&quot;,
                &quot;blog_content&quot;: &quot;\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n        &quot;
            }
        ],
        &quot;count&quot;: 5,
        &quot;pagination&quot;: {
            &quot;total&quot;: 5,
            &quot;current_page&quot;: 1,
            &quot;last_page&quot;: 1,
            &quot;per_page&quot;: 9,
            &quot;from&quot;: 1,
            &quot;to&quot;: 5,
            &quot;links&quot;: {
                &quot;first&quot;: &quot;http://localhost:8000/api/blogs?page=1&quot;,
                &quot;last&quot;: &quot;http://localhost:8000/api/blogs?page=1&quot;,
                &quot;prev&quot;: null,
                &quot;next&quot;: null
            },
            &quot;pagination_links&quot;: [
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                    &quot;page&quot;: null,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://localhost:8000/api/blogs?page=1&quot;,
                    &quot;label&quot;: &quot;1&quot;,
                    &quot;page&quot;: 1,
                    &quot;active&quot;: true
                },
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                    &quot;page&quot;: null,
                    &quot;active&quot;: false
                }
            ]
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-blogs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-blogs" data-method="GET"
      data-path="api/blogs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs"
                    onclick="tryItOut('GETapi-blogs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs"
                    onclick="cancelTryOut('GETapi-blogs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-blogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-blogs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-blogs--blog_id-">GET api/blogs/{blog_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-blogs--blog_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/blogs/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/blogs/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blogs--blog_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;blog_id&quot;: 1,
        &quot;blog_title&quot;: &quot;مقال تعليمي عن الطب&quot;,
        &quot;blog_date&quot;: &quot;19/Dec/2025&quot;,
        &quot;blog_time&quot;: &quot;5:55 AM&quot;,
        &quot;blog_views&quot;: 7557,
        &quot;blog_image_cover&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
        &quot;blog_classification&quot;: &quot;البحث العلمي&quot;,
        &quot;blog_image_content&quot;: &quot;http://localhost:8000/files/book2.webp&quot;,
        &quot;blog_content&quot;: &quot;\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n            مقدمة شاملة عن الموضوع المطروح\n            محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة\n            خلاصة الموضوع مع التوصيات المهمة\n        &quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blogs--blog_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blogs--blog_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blogs--blog_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-blogs--blog_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blogs--blog_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-blogs--blog_id-" data-method="GET"
      data-path="api/blogs/{blog_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blogs--blog_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-blogs--blog_id-"
                    onclick="tryItOut('GETapi-blogs--blog_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-blogs--blog_id-"
                    onclick="cancelTryOut('GETapi-blogs--blog_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-blogs--blog_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blogs/{blog_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-blogs--blog_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-blogs--blog_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>blog_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="blog_id"                data-endpoint="GETapi-blogs--blog_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the blog. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-audios">GET api/audios</h2>

<p>
</p>



<span id="example-requests-GETapi-audios">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/audios" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/audios"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-audios">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;audios&quot;: [
            {
                &quot;audio_id&quot;: 1,
                &quot;audio_title&quot;: &quot;توعية صحية&quot;,
                &quot;audio_details&quot;: &quot;تحليل عميق للموضوع مع استعراض الخبرات العملية&quot;,
                &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                &quot;duration&quot;: &quot;02:32&quot;
            },
            {
                &quot;audio_id&quot;: 2,
                &quot;audio_title&quot;: &quot;محاضرة عن الطب الحديث&quot;,
                &quot;audio_details&quot;: &quot;شرح تفصيلي مع أمثلة عملية من الواقع الطبي&quot;,
                &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                &quot;duration&quot;: &quot;02:32&quot;
            },
            {
                &quot;audio_id&quot;: 3,
                &quot;audio_title&quot;: &quot;محاضرة تعليمية&quot;,
                &quot;audio_details&quot;: &quot;شرح تفصيلي مع أمثلة عملية من الواقع الطبي&quot;,
                &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                &quot;duration&quot;: &quot;02:32&quot;
            },
            {
                &quot;audio_id&quot;: 4,
                &quot;audio_title&quot;: &quot;محاضرة عن الطب الحديث&quot;,
                &quot;audio_details&quot;: &quot;شرح تفصيلي مع أمثلة عملية من الواقع الطبي&quot;,
                &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                &quot;duration&quot;: &quot;02:32&quot;
            },
            {
                &quot;audio_id&quot;: 5,
                &quot;audio_title&quot;: &quot;حلقة نقاش عن الأبحاث الطبية&quot;,
                &quot;audio_details&quot;: &quot;تفاصيل شاملة عن الموضوع المطروح مع شرح مفصل لكل النقاط المهمة&quot;,
                &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                &quot;duration&quot;: &quot;02:32&quot;
            },
            {
                &quot;audio_id&quot;: 6,
                &quot;audio_title&quot;: &quot;حلقة نقاش عن الأبحاث الطبية&quot;,
                &quot;audio_details&quot;: &quot;شرح تفصيلي مع أمثلة عملية من الواقع الطبي&quot;,
                &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                &quot;duration&quot;: &quot;02:32&quot;
            },
            {
                &quot;audio_id&quot;: 7,
                &quot;audio_title&quot;: &quot;شرح عن الأمراض المزمنة&quot;,
                &quot;audio_details&quot;: &quot;شرح تفصيلي مع أمثلة عملية من الواقع الطبي&quot;,
                &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                &quot;duration&quot;: &quot;02:32&quot;
            },
            {
                &quot;audio_id&quot;: 8,
                &quot;audio_title&quot;: &quot;مقابلة مع خبير طبي&quot;,
                &quot;audio_details&quot;: &quot;تحليل عميق للموضوع مع استعراض الخبرات العملية&quot;,
                &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                &quot;duration&quot;: &quot;02:32&quot;
            },
            {
                &quot;audio_id&quot;: 9,
                &quot;audio_title&quot;: &quot;توعية صحية&quot;,
                &quot;audio_details&quot;: &quot;تفاصيل شاملة عن الموضوع المطروح مع شرح مفصل لكل النقاط المهمة&quot;,
                &quot;audio_project&quot;: &quot;http://localhost:8000/files/book1.webp&quot;,
                &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
                &quot;audio_time&quot;: &quot;5:55 AM&quot;,
                &quot;duration&quot;: &quot;02:32&quot;
            }
        ],
        &quot;count&quot;: 9,
        &quot;pagination&quot;: {
            &quot;total&quot;: 45,
            &quot;current_page&quot;: 1,
            &quot;last_page&quot;: 5,
            &quot;per_page&quot;: 9,
            &quot;from&quot;: 1,
            &quot;to&quot;: 9,
            &quot;links&quot;: {
                &quot;first&quot;: &quot;http://localhost:8000/api/audios?page=1&quot;,
                &quot;last&quot;: &quot;http://localhost:8000/api/audios?page=5&quot;,
                &quot;prev&quot;: null,
                &quot;next&quot;: &quot;http://localhost:8000/api/audios?page=2&quot;
            },
            &quot;pagination_links&quot;: [
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                    &quot;page&quot;: null,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://localhost:8000/api/audios?page=1&quot;,
                    &quot;label&quot;: &quot;1&quot;,
                    &quot;page&quot;: 1,
                    &quot;active&quot;: true
                },
                {
                    &quot;url&quot;: &quot;http://localhost:8000/api/audios?page=2&quot;,
                    &quot;label&quot;: &quot;2&quot;,
                    &quot;page&quot;: 2,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://localhost:8000/api/audios?page=3&quot;,
                    &quot;label&quot;: &quot;3&quot;,
                    &quot;page&quot;: 3,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://localhost:8000/api/audios?page=4&quot;,
                    &quot;label&quot;: &quot;4&quot;,
                    &quot;page&quot;: 4,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://localhost:8000/api/audios?page=5&quot;,
                    &quot;label&quot;: &quot;5&quot;,
                    &quot;page&quot;: 5,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://localhost:8000/api/audios?page=2&quot;,
                    &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                    &quot;page&quot;: 2,
                    &quot;active&quot;: false
                }
            ]
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-audios" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-audios"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-audios"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-audios" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-audios">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-audios" data-method="GET"
      data-path="api/audios"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-audios', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-audios"
                    onclick="tryItOut('GETapi-audios');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-audios"
                    onclick="cancelTryOut('GETapi-audios');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-audios"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/audios</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-audios"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-audios"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-audios--audio_id-">GET api/audios/{audio_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-audios--audio_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/audios/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/audios/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-audios--audio_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;audio_id&quot;: 1,
        &quot;audio_title&quot;: &quot;توعية صحية&quot;,
        &quot;audio_details&quot;: &quot;تحليل عميق للموضوع مع استعراض الخبرات العملية&quot;,
        &quot;audio_project&quot;: {
            &quot;project_classfication&quot;: &quot;الخدمات الصحية&quot;,
            &quot;project_title&quot;: &quot;مشروع تطوير البرمجيات الطبية&quot;
        },
        &quot;audio_date&quot;: &quot;19/Dec/2025&quot;,
        &quot;audio_time&quot;: &quot;5:55 AM&quot;,
        &quot;duration&quot;: &quot;02:32&quot;,
        &quot;audio_content&quot;: &quot;http://localhost:8000/files/audio.mp3&quot;,
        &quot;audio_type&quot;: &quot;مقابلة&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-audios--audio_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-audios--audio_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-audios--audio_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-audios--audio_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-audios--audio_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-audios--audio_id-" data-method="GET"
      data-path="api/audios/{audio_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-audios--audio_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-audios--audio_id-"
                    onclick="tryItOut('GETapi-audios--audio_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-audios--audio_id-"
                    onclick="cancelTryOut('GETapi-audios--audio_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-audios--audio_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/audios/{audio_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-audios--audio_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-audios--audio_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>audio_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="audio_id"                data-endpoint="GETapi-audios--audio_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the audio. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-setting">Handle the incoming request.</h2>

<p>
</p>



<span id="example-requests-GETapi-setting">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/setting" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/setting"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-setting">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;site_name&quot;: &quot;Doctor Selem&quot;,
        &quot;site_email&quot;: &quot;info@doctorselem.com&quot;,
        &quot;site_phone&quot;: &quot;+201234567890&quot;,
        &quot;facebook&quot;: &quot;https://facebook.com/doctorselem&quot;,
        &quot;twitter&quot;: &quot;https://twitter.com/doctorselem&quot;,
        &quot;linkin&quot;: &quot;https://linkedin.com/in/doctorselem&quot;,
        &quot;instagram&quot;: &quot;https://instagram.com/doctorselem&quot;,
        &quot;footer&quot;: &quot;&copy; 2024 Doctor Selem. All rights reserved.&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-setting" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-setting"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-setting"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-setting" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-setting">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-setting" data-method="GET"
      data-path="api/setting"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-setting', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-setting"
                    onclick="tryItOut('GETapi-setting');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-setting"
                    onclick="cancelTryOut('GETapi-setting');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-setting"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/setting</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-setting"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-setting"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
