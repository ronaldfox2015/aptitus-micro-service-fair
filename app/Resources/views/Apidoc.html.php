<!DOCTYPE HTML><html><head><title>Fair API documentation</title><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="generator" content="https://github.com/raml2html/raml2html 4.1.1"><link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/styles/default.min.css"><script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script><script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/highlight.min.js"></script><script type="text/javascript">
      $(document).ready(function() {
        $('.page-header pre code, .top-resource-description pre code, .modal-body pre code').each(function(i, block) {
          hljs.highlightBlock(block);
        });

        $('[data-toggle]').click(function() {
          var selector = $(this).data('target') + ' pre code';
          $(selector).each(function(i, block) {
            hljs.highlightBlock(block);
          });
        });

        // open modal on hashes like #_action_get
        $(window).bind('hashchange', function(e) {
          var anchor_id = document.location.hash.substr(1); //strip #
          var element = $('#' + anchor_id);

          // do we have such element + is it a modal?  --> show it
          if (element.length && element.hasClass('modal')) {
            element.modal('show');
          }
        });

        // execute hashchange on first page load
        $(window).trigger('hashchange');

        // remove url fragment on modal hide
        $('.modal').on('hidden.bs.modal', function() {
          try {
            if (history && history.replaceState) {
                history.replaceState({}, '', '#');
            }
          } catch(e) {}
        });
      });
    </script><style>
      .hljs {
        background: transparent;
      }
      .parent {
        color: #999;
      }
      .list-group-item > .badge {
        float: none;
        margin-right: 6px;
      }
      .panel-title > .methods {
        float: right;
      }
      .badge {
        border-radius: 0;
        text-transform: uppercase;
        width: 70px;
        font-weight: normal;
        color: #f3f3f6;
        line-height: normal;
      }
      .badge_get {
        background-color: #63a8e2;
      }
      .badge_post {
        background-color: #6cbd7d;
      }
      .badge_put {
        background-color: #22bac4;
      }
      .badge_delete {
        background-color: #d26460;
      }
      .badge_patch {
        background-color: #ccc444;
      }
      .list-group, .panel-group {
        margin-bottom: 0;
      }
      .panel-group .panel+.panel-white {
        margin-top: 0;
      }
      .panel-group .panel-white {
        border-bottom: 1px solid #F5F5F5;
        border-radius: 0;
      }
      .panel-white:last-child {
        border-bottom-color: white;
        -webkit-box-shadow: none;
        box-shadow: none;
      }
      .panel-white .panel-heading {
        background: white;
      }
      .tab-pane ul {
        padding-left: 2em;
      }
      .tab-pane h1 {
        font-size: 1.3em;
      }
      .tab-pane h2 {
        font-size: 1.2em;
        padding-bottom: 4px;
        border-bottom: 1px solid #ddd;
      }
      .tab-pane h3 {
        font-size: 1.1em;
      }
      .tab-content {
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        padding: 10px;
      }
      #sidebar {
        margin-top: 30px;
        padding-right: 5px;
        overflow: auto;
        height: 90%;
      }
      .top-resource-description {
        border-bottom: 1px solid #ddd;
        background: #fcfcfc;
        padding: 15px 15px 0 15px;
        margin: -15px -15px 10px -15px;
      }
      .resource-description {
        border-bottom: 1px solid #fcfcfc;
        background: #fcfcfc;
        padding: 15px 15px 0 15px;
        margin: -15px -15px 10px -15px;
      }
      .resource-description p:last-child {
        margin: 0;
      }
      .list-group .badge {
        float: left;
      }
      .method_description {
        margin-left: 85px;
      }
      .method_description p:last-child {
        margin: 0;
      }
      .list-group-item {
        cursor: pointer;
      }
      .list-group-item:hover {
        background-color: #f5f5f5;
      }
      pre code {
        overflow: auto;
        word-wrap: normal;
        white-space: pre;
      }
      .items {
        background: #f5f5f5;
        color: #333;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 9.5px;
        margin: 0 0 10px;
        font-size: 13px;
        line-height: 1.42857143;
      }
      .examples {
        margin-left: 0.5em;
      }
      .resource-modal li > ul {
        margin-bottom: 1em;
      }
    </style></head><body data-spy="scroll" data-target="#sidebar"><div class="container"><div class="row"><div class="col-md-9" role="main"><div class="page-header"><h1>Fair API documentation <small>version v1</small></h1><p>https://services.aptitus.com/{version}/fair/</p><ul><li><strong>version</strong>: <em>required (v1)</em></li></ul></div><div class="panel panel-default"><div class="panel-heading"><h3 id="login" class="panel-title">/login</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_login"><span class="parent"></span>/login</a> <span class="methods"><a href="#login_post"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_login" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#login_post'" class="list-group-item"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Create a new Login</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="login_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/login</h4></div><div class="modal-body"><div class="alert alert-info"><p>Create a new Login</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#login_post_request" data-toggle="tab">Request</a></li><li><a href="#login_post_response" data-toggle="tab">Response</a></li><li><a href="#login_post_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="login_post_request"><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>email</strong>: <em>required (string)</em></li><li><strong>password</strong>: <em>required (string)</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "email": "pakgva@gmail.com",
  "password": "123456"
}</code></pre></div></div><div class="tab-pane" id="login_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>message</strong>: <em>required (string)</em></li><li><strong>token</strong>: <em>required (string)</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se inició sesión correctamente.",
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE0OTU0NzQ3MDQsIm5iZiI6MTQ5NTQ3NDcwNCwiZXhwIjoxNDk1NTAzNTA0LCJkYXRhIjp7ImlkIjoiMTA4MTk3MSIsImVtYWlsIjoianp1bWFldGFAZWNvZGlnaXRhbC5wZSIsIm5hbWUiOiJKb3NlcGggWnVtYWV0YSIsInJvbGUiOiJhZG1pbi1tYXN0ZXIifX0.Sixitkju4L8P8ZPJqDNWRRuyREA9kIhcZrOGNByKM5o"
}</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/401" target="_blank">401</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>code</strong>: <em>required (integer)</em></li><li><strong>message</strong>: <em>required (string)</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "code": 401,
  "message": "Las credenciales son incorrectas."
}</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/500" target="_blank">500</a></h2><p>An error has occurred on the server.</p></div><div class="tab-pane" id="login_post_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="fairid_" class="panel-title">/{fairId}</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_fairid__sponsors"><span class="parent">/{fairId}</span>/sponsors</a> <span class="methods"><a href="#fairid__sponsors_get"><span class="badge badge_get">get</span></a> <a href="#fairid__sponsors_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_fairid__sponsors" class="panel-collapse collapse"><div class="panel-body"><div class="resource-description"><p>A Sponsors collection</p></div><div class="list-group"><div onclick="window.location.href = '#fairid__sponsors_get'" class="list-group-item"><span class="badge badge_get">get</span><div class="method_description"><p>Get the sponsors of the fair.</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#fairid__sponsors_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Create sponsor for the fair.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairid__sponsors_get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get</span> <span class="parent">/{fairId}</span>/sponsors</h4></div><div class="modal-body"><div class="alert alert-info"><p>Get the sponsors of the fair.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairid__sponsors_get_request" data-toggle="tab">Request</a></li><li><a href="#fairid__sponsors_get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairid__sponsors_get_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li></ul><h3>Query Parameters</h3><ul><li><strong>category</strong>: <em>(string - default: empty)</em><p>Category for the Company in Fair, could be ["Empleo", "Educacion"]. If not define a specific category list both categories.</p></li></ul></div><div class="tab-pane" id="fairid__sponsors_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: array of Sponsor</p><p><strong>Items</strong>: Sponsor</p><div class="items"><ul><li><strong>id</strong>: <em>required (integer)</em></li><li><strong>companyName</strong>: <em>required (string)</em></li><li><strong>image</strong>: <em>required (string)</em></li><li><strong>url</strong>: <em>required (string)</em></li><li><strong>coords</strong>: <em>required (object)</em><ul></ul></li><li><strong>category</strong>: <em>required (string)</em></li></ul></div><p><strong>Example</strong>:</p><div class="examples"><pre><code>[
  {
    "id": 170,
    "companyName": "Jair, Goyette and Rolfson",
    "category": "Empleo",
    "image": "https://dev.cde.expo.aptitus.g3c.pe/sponsor/fair-fqq33a951a754662d3a9132d280dc2f6bf.png",
    "url": "https://maqqrcia.biz",
    "coords": {
      "desktop": "125212,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115",
      "tablet": "744,41121,786,411,786,542,744,542"
    }
  },
  {
    "id": 171,
    "companyName": "Company, Goyette and Rolfson",
    "category": "Educacion",
    "image": "https://dev.cde.expo.aptitus.g3c.pe/sponsor/fair-fqq33a951a754662d3a9132d280dc2f6bf.png",
    "url": "https://marcia.biz",
    "coords": {
      "desktop": "1252,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115",
      "tablet": "744,421,786,411,786,542,744,542"
    }
  }
]</code></pre></div></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairid__sponsors_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent">/{fairId}</span>/sponsors</h4></div><div class="modal-body"><div class="alert alert-info"><p>Create sponsor for the fair.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairid__sponsors_post_request" data-toggle="tab">Request</a></li><li><a href="#fairid__sponsors_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairid__sponsors_post_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li></ul><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>id</strong>: <em>required (integer)</em></li><li><strong>companyName</strong>: <em>required (string)</em></li><li><strong>image</strong>: <em>required (string)</em></li><li><strong>url</strong>: <em>required (string)</em></li><li><strong>coords</strong>: <em>required (object)</em><ul></ul></li><li><strong>category</strong>: <em>required (string)</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "id": 321,
  "companyName": "Romaguera, Goyette and Rolfson",
  "image": "https://dev.cde.expo.aptitus.g3c.pe/sponsor/fair-f33a951a754662d3a9132d280dc2f6bf.png",
  "url": "https://goo.gl/5Qoysz",
  "coords": {
    "desktop": "1252,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115",
    "tablet": "744,411,786,411,786,542,744,542"
  },
  "category": "Educacion"
}</code></pre></div></div><div class="tab-pane" id="fairid__sponsors_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>message</strong>: <em>required (string)</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se registró el patrocinador correctamente."
}</code></pre></div></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_fairid__sponsors__sponsorid_"><span class="parent">/{fairId}/sponsors</span>/{sponsorId}</a> <span class="methods"><a href="#fairid__sponsors__sponsorid__get"><span class="badge badge_get">get</span></a> <a href="#fairid__sponsors__sponsorid__put"><span class="badge badge_put">put</span></a> <a href="#fairid__sponsors__sponsorid__delete"><span class="badge badge_delete">delete</span></a></span></h4></div><div id="panel_fairid__sponsors__sponsorid_" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#fairid__sponsors__sponsorid__get'" class="list-group-item"><span class="badge badge_get">get</span><div class="method_description"><p>Get sponsor information.</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#fairid__sponsors__sponsorid__put'" class="list-group-item"><span class="badge badge_put">put</span><div class="method_description"><p>Update sponsor information.</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#fairid__sponsors__sponsorid__delete'" class="list-group-item"><span class="badge badge_delete">delete</span><div class="method_description"></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairid__sponsors__sponsorid__get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get</span> <span class="parent">/{fairId}/sponsors</span>/{sponsorId}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Get sponsor information.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairid__sponsors__sponsorid__get_request" data-toggle="tab">Request</a></li><li><a href="#fairid__sponsors__sponsorid__get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairid__sponsors__sponsorid__get_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li><li><strong>sponsorId</strong>: <em>required (string)</em></li></ul></div><div class="tab-pane" id="fairid__sponsors__sponsorid__get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "id": 171,
  "companyName": "Jair, Goyette and Rolfson",
  "category": "Empleo",
  "image": "fair-fqq33a951a754662d3a9132d280dc2f6bf.png",
  "url": "https://maqqrcia.biz",
  "coords": {
    "desktop": "125212,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115",
    "tablet": "744,41121,786,411,786,542,744,542"
  }
}</code></pre></div></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairid__sponsors__sponsorid__put"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_put">put</span> <span class="parent">/{fairId}/sponsors</span>/{sponsorId}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Update sponsor information.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairid__sponsors__sponsorid__put_request" data-toggle="tab">Request</a></li><li><a href="#fairid__sponsors__sponsorid__put_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairid__sponsors__sponsorid__put_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li><li><strong>sponsorId</strong>: <em>required (string)</em></li></ul><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>id</strong>: <em>required (integer)</em></li><li><strong>companyName</strong>: <em>required (string)</em></li><li><strong>image</strong>: <em>required (string)</em></li><li><strong>url</strong>: <em>required (string)</em></li><li><strong>coords</strong>: <em>required (object)</em><ul></ul></li><li><strong>category</strong>: <em>required (string)</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "id": 321,
  "companyName": "Romaguera, Goyette and Rolfson",
  "image": "https://dev.cde.expo.aptitus.g3c.pe/sponsor/fair-f33a951a754662d3a9132d280dc2f6bf.png",
  "url": "https://goo.gl/5Qoysz",
  "coords": {
    "desktop": "1252,105,1260,96,1277,87,1307,83,1341,89,1374,101,1399,117,1401,125,1389,132,1361,141,1316,142,1285,135,1266,126,1255,115",
    "tablet": "744,411,786,411,786,542,744,542"
  },
  "category": "Educacion"
}</code></pre></div></div><div class="tab-pane" id="fairid__sponsors__sponsorid__put_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se actualizó al patrocinador correctamente."
}
</code></pre></div></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairid__sponsors__sponsorid__delete"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_delete">delete</span> <span class="parent">/{fairId}/sponsors</span>/{sponsorId}</h4></div><div class="modal-body"><ul class="nav nav-tabs"><li class="active"><a href="#fairid__sponsors__sponsorid__delete_request" data-toggle="tab">Request</a></li><li><a href="#fairid__sponsors__sponsorid__delete_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairid__sponsors__sponsorid__delete_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li><li><strong>sponsorId</strong>: <em>required (string)</em></li></ul></div><div class="tab-pane" id="fairid__sponsors__sponsorid__delete_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se eliminó al patrocinador satisfactoriamente."
}</code></pre></div></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="fairs" class="panel-title">/fairs</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_fairs"><span class="parent"></span>/fairs</a> <span class="methods"><a href="#fairs_get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_fairs" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#fairs_get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Get list of Fairs.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairs_get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/fairs</h4></div><div class="modal-body"><div class="alert alert-info"><p>Get list of Fairs.</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairs_get_response" data-toggle="tab">Response</a></li><li><a href="#fairs_get_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairs_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>message</strong>: <em>required (string)</em></li><li><strong>data</strong>: <em>required (array of )</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se obtuvieron las ferias correctamente.",
  "data": [
    {
      "id": 1,
      "name": "ExpoAptitus I",
      "created_at": "01/10/2017",
      "state": "Activo",
      "total_stands": 2,
      "total_companies": 31
    },
    {
      "id": 2,
      "name": "ExpoAptitus II",
      "created_at": "15/11/2017",
      "state": "Inactivo",
      "total_stands": 10,
      "total_companies": 18
    }
  ]
}</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/404" target="_blank">404</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>code</strong>: <em>required (integer)</em></li><li><strong>message</strong>: <em>required (string)</em></li></ul></div><div class="tab-pane" id="fairs_get_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_fairs__fairid_"><span class="parent">/fairs</span>/{fairId}</a> <span class="methods"><a href="#fairs__fairid__get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_fairs__fairid_" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#fairs__fairid__get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Get feria detail.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairs__fairid__get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/fairs</span>/{fairId}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Get feria detail.</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairs__fairid__get_request" data-toggle="tab">Request</a></li><li><a href="#fairs__fairid__get_response" data-toggle="tab">Response</a></li><li><a href="#fairs__fairid__get_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairs__fairid__get_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li></ul></div><div class="tab-pane" id="fairs__fairid__get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>message</strong>: <em>required (string)</em></li><li><strong>data</strong>: <em>required (object)</em><ul></ul></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se obtuvo la información de la feria correctamente.",
  "data": {
    "id": 1,
    "name": "ExpoAptitus I",
    "slogan": "ExpoAptitus I",
    "star_date": "01/10/2017",
    "end_date": "01/10/2017",
    "image": "https://cde.feria.g3c.pe/images/fair/5e8edf5ef2bdeb1bd697ed5c4e6aff82.png?v=12rf1234"
  }
}</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/404" target="_blank">404</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>code</strong>: <em>required (integer)</em></li><li><strong>message</strong>: <em>required (string)</em></li></ul></div><div class="tab-pane" id="fairs__fairid__get_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_fairs__fairid__companies"><span class="parent">/fairs/{fairId}</span>/companies</a> <span class="methods"><a href="#fairs__fairid__companies_get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a> <a href="#fairs__fairid__companies_post"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_fairs__fairid__companies" class="panel-collapse collapse"><div class="panel-body"><div class="resource-description"><p>A Companies collection</p></div><div class="list-group"><div onclick="window.location.href = '#fairs__fairid__companies_get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Get the companies of the fair.</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#fairs__fairid__companies_post'" class="list-group-item"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Create company for the fair.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairs__fairid__companies_get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/fairs/{fairId}</span>/companies</h4></div><div class="modal-body"><div class="alert alert-info"><p>Get the companies of the fair.</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairs__fairid__companies_get_request" data-toggle="tab">Request</a></li><li><a href="#fairs__fairid__companies_get_response" data-toggle="tab">Response</a></li><li><a href="#fairs__fairid__companies_get_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairs__fairid__companies_get_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li></ul><h3>Query Parameters</h3><ul><li><strong>category</strong>: <em>(string - default: empty)</em><p>Category for the Company in Fair, could be ["Empleo", "Educacion"]. If not define a specific category list both categories.</p></li><li><strong>sort</strong>: <em>(string - default: stand)</em><p>The sort field, could be ["name", "trade_name", "stand"]</p></li><li><strong>order</strong>: <em>(string - default: desc)</em><p>The sort order if sort parameter is provided. One of asc or desc</p></li></ul></div><div class="tab-pane" id="fairs__fairid__companies_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: array of Company</p><p><strong>Items</strong>: Company</p><div class="items"><ul><li><strong>stand</strong>: <em>required (string)</em></li><li><strong>document_number</strong>: <em>required (string)</em></li><li><strong>category</strong>: <em>required (string)</em></li><li><strong>trade_name</strong>: <em>required (string)</em></li><li><strong>slug</strong>: <em>required (string)</em></li><li><strong>industry</strong>: <em>required (string)</em></li><li><strong>name</strong>: <em>required (string)</em></li><li><strong>id</strong>: <em>required (integer)</em></li><li><strong>image</strong>: <em>required (string)</em></li><li><strong>model</strong>: <em>required (string)</em></li></ul></div><p><strong>Example</strong>:</p><div class="examples"><pre><code>[
  {
    "id": 2,
    "name": "Banco Hipotecario SA",
    "trade_name": "BANCO HIPOTECARIO",
    "slug": "banco-hipotecario2",
    "image": "https://dev.cde.expo.aptitus.g3c.pe/logo/fair-ba0342ca699136bf9d77276ba718b9b0.jpg",
    "category": "Empleo",
    "industry": "Banca y Entidades Financieras",
    "document_number": "20100041872",
    "model": "Modelo 3",
    "stand": "ORO"
  },
  {
    "id": 1,
    "name": "Gas Y Electricidad Peru SA",
    "trade_name": "Gas Y Electricidad Peru",
    "slug": "gas-electricidad",
    "image": "https://dev.cde.expo.aptitus.g3c.pe/logo/fair-ba0342ca699136bf9d77276ba718b9b0.jpg",
    "category": "Empleo",
    "industry": "Agricultura",
    "document_number": "20520603892",
    "model": "Modelo 1",
    "stand": "ORO"
  },
  {
    "id": 63,
    "name": "Tuesta Crisanto, Maribel SAC",
    "trade_name": "Tuesta Crisanto, Maribel",
    "slug": "tuesta-crisanto-maribel",
    "image": "https://dev.cde.expo.aptitus.g3c.pe/logo/fair-ba0342ca699136bf9d77276ba718b9b0.jpg",
    "category": "Empleo",
    "industry": "Seguridad",
    "document_number": "10230203267",
    "model": "Modelo 4",
    "stand": "ORO"
  },
  {
    "id": 69,
    "name": "Paul Taboada SA",
    "trade_name": "Paul Taboada",
    "slug": "luis-mercado-medina",
    "image": "https://dev.cde.expo.aptitus.g3c.pe/logo/fair-c8d6de8b3d4ab05767a999f52c9b11a4.png",
    "category": "Empleo",
    "industry": "Tecnología y sistemas.",
    "document_number": "10458164326",
    "model": "Modelo 8",
    "stand": "PLATA"
  }
]
</code></pre></div></div><div class="tab-pane" id="fairs__fairid__companies_get_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairs__fairid__companies_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/fairs/{fairId}</span>/companies</h4></div><div class="modal-body"><div class="alert alert-info"><p>Create company for the fair.</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairs__fairid__companies_post_request" data-toggle="tab">Request</a></li><li><a href="#fairs__fairid__companies_post_response" data-toggle="tab">Response</a></li><li><a href="#fairs__fairid__companies_post_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairs__fairid__companies_post_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li></ul><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>stand</strong>: <em>required (object)</em><p>Field "Stand".</p><p>Parameter [image][type] you accept only values ( image_monitor, image_totem, image_banderole_1, image_banderole_2, image_poster_1, image_poster_2, image_top, image_counter ).</p><p>Parameter [video] Only sent when the type of stand is gold or silver.</p><ul></ul></li><li><strong>document_number</strong>: <em>required (string - maxLength: 11)</em><p>Field "RUC".</p></li><li><strong>category</strong>: <em>required (one of Empleo, Educacion)</em><p>Field "Rubro".</p></li><li><strong>trade_name</strong>: <em>required (string - minLength: 10 - maxLength: 100)</em><p>Field "Empresa".</p></li><li><strong>logo</strong>: <em>required (string - maxLength: 200)</em><p>Field "Logo".</p></li><li><strong>business_name</strong>: <em>required (string - minLength: 10 - maxLength: 100)</em><p>Field "Razón Social".</p></li><li><strong>longitude</strong>: <em>(number)</em><p>Field "Longitud".</p></li><li><strong>document</strong>: <em>required (array of )</em><p>Group of fields "Descargables".</p></li><li><strong>industry_name</strong>: <em>required (string - minLength: 5 - maxLength: 100)</em><p>Field "Industria".</p></li><li><strong>social_media</strong>: <em>required (array of )</em><p>Group of fields "Redes Sociales".</p><p>Parameter [link] minLength and maxLength is 10 and 100.</p><p>Parameter [name] you accept only values (Facebook, Linkedin, Twitter, Youtube, Google+, Pinterest or Instagram).</p></li><li><strong>image_gallery</strong>: <em>required (array of )</em><p>Group of fields "Galería de Imágenes".</p></li><li><strong>latitude</strong>: <em>(number)</em><p>Field "Latitud".</p></li><li><strong>industry_id</strong>: <em>required (integer)</em><p>Field "Industria".</p></li><li><strong>profile</strong>: <em>required (array of )</em><p>Group of fields "Perfil Institucional".</p><p>Parameter [title] minLength and maxLength is 3 and 50.</p></li></ul><p><strong>Examples</strong>:</p><div class="examples"><p><strong>gold</strong>:<br></p><pre><code>{
  "document_number": "20414989277",
  "trade_name": "ATENTO DEL PERU",
  "business_name": "TELEATENTO DEL PERU S.A.C",
  "logo": "https://dev.cde.expo.aptitus.g3c.pe/logo/RTIUR546RT546REEyutsdds42DQA.jpg",
  "category": "Empleo",
  "industry_id": 1,
  "industry_name": "Call Center",
  "latitude": -12.064518,
  "longitude": 77.0401,
  "stand": {
    "type_id": 1,
    "model_id": 4,
    "amphitryon": 3,
    "colors": {
      "color_1": "#2abf2a",
      "color_2": "#0027ea"
    },
    "images": [
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_monitor"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_totem"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_banderole_1"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_banderole_2"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_top"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_counter"
      }
    ],
    "video": "https://www.youtube.com/watch?v=5o_nExedezw"
  },
  "profile": [
    {
      "title": "Misión",
      "description": "Misión de nuestra empresa en llevar a cabo..."
    },
    {
      "title": "Nuestros Productos",
      "description": "Nuestros productos respetan los estándares más altos de calidad ISO 9000..."
    }
  ],
  "social_media": [
    {
      "link": "https://www.facebook.com/zuck",
      "name": "Facebook"
    },
    {
      "link": "https://www.youtube.com/watch?v=5o_nExedezw",
      "name": "Youtube"
    }
  ],
  "image_gallery": [
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    },
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    }
  ],
  "document": [
    {
      "title": "Brochure 2017",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx"
    },
    {
      "title": "Perfil Institucional",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls"
    }
  ]
}</code></pre><p><strong>silver</strong>:<br></p><pre><code>{
  "document_number": "20414989277",
  "trade_name": "ATENTO DEL PERU",
  "business_name": "TELEATENTO DEL PERU S.A.C",
  "logo": "https://dev.cde.expo.aptitus.g3c.pe/logo/RTIUR546RT546REEyutsdds42DQA.jpg",
  "category": "Empleo",
  "industry_id": 1,
  "industry_name": "Call Center",
  "latitude": -12.132342,
  "longitude": -77.030275,
  "stand": {
    "type_id": 2,
    "model_id": 4,
    "amphitryon": 3,
    "colors": {
      "color_1": "#2abf2a",
      "color_2": "#0027ea"
    },
    "images": [
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_monitor"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_totem"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_poster_1"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_poster_2"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_top"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_counter"
      }
    ],
    "video": "https://www.youtube.com/watch?v=5o_nExedezw"
  },
  "profile": [
    {
      "title": "Misión",
      "description": "Misión de nuestra empresa en llevar a cabo..."
    },
    {
      "title": "Nuestros Productos",
      "description": "Nuestros productos respetan los estándares más altos de calidad ISO 9000..."
    }
  ],
  "social_media": [
    {
      "link": "https://www.facebook.com/zuck",
      "name": "Facebook"
    },
    {
      "link": "https://www.youtube.com/watch?v=5o_nExedezw",
      "name": "Youtube"
    }
  ],
  "image_gallery": [
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    },
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    }
  ],
  "document": [
    {
      "title": "Brochure 2017",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx"
    },
    {
      "title": "Perfil Institucional",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls"
    }
  ]
}</code></pre><p><strong>bronze</strong>:<br></p><pre><code>{
  "document_number": "20414989277",
  "trade_name": "ATENTO DEL PERU",
  "business_name": "TELEATENTO DEL PERU S.A.C",
  "logo": "https://dev.cde.expo.aptitus.g3c.pe/logo/RTIUR546RT546REEyutsdds42DQA.jpg",
  "category": "Empleo",
  "industry_id": 1,
  "industry_name": "Call Center",
  "latitude": -12.070951,
  "longitude": -77.03403,
  "stand": {
    "type_id": 3,
    "model_id": 4,
    "amphitryon": 3,
    "colors": {
      "color_1": "#2abf2a",
      "color_2": "#0027ea"
    },
    "images": [
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_monitor"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_banderole_1"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_poster_1"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_top"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_counter"
      }
    ]
  },
  "profile": [
    {
      "title": "Misión",
      "description": "Misión de nuestra empresa en llevar a cabo..."
    },
    {
      "title": "Nuestros Productos",
      "description": "Nuestros productos respetan los estándares más altos de calidad ISO 9000..."
    }
  ],
  "social_media": [
    {
      "link": "https://www.facebook.com/zuck",
      "name": "Facebook"
    },
    {
      "link": "https://www.youtube.com/watch?v=5o_nExedezw",
      "name": "Youtube"
    }
  ],
  "image_gallery": [
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    },
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    }
  ],
  "document": [
    {
      "title": "Brochure 2017",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx"
    },
    {
      "title": "Perfil Institucional",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls"
    }
  ]
}</code></pre></div></div><div class="tab-pane" id="fairs__fairid__companies_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>message</strong>: <em>required (string)</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se registró la empresa correctamente."
}
</code></pre></div></div><div class="tab-pane" id="fairs__fairid__companies_post_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_fairs__fairid__companies__identifier_"><span class="parent">/fairs/{fairId}/companies</span>/{identifier}</a> <span class="methods"><a href="#fairs__fairid__companies__identifier__get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a> <a href="#fairs__fairid__companies__identifier__put"><span class="badge badge_put">put <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a> <a href="#fairs__fairid__companies__identifier__delete"><span class="badge badge_delete">delete <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_fairs__fairid__companies__identifier_" class="panel-collapse collapse"><div class="panel-body"><div class="resource-description"><p>A single Company</p></div><div class="list-group"><div onclick="window.location.href = '#fairs__fairid__companies__identifier__get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Get company detail.</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#fairs__fairid__companies__identifier__put'" class="list-group-item"><span class="badge badge_put">put <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Update company information.</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#fairs__fairid__companies__identifier__delete'" class="list-group-item"><span class="badge badge_delete">delete <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Delete a Company</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairs__fairid__companies__identifier__get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/fairs/{fairId}/companies</span>/{identifier}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Get company detail.</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairs__fairid__companies__identifier__get_request" data-toggle="tab">Request</a></li><li><a href="#fairs__fairid__companies__identifier__get_response" data-toggle="tab">Response</a></li><li><a href="#fairs__fairid__companies__identifier__get_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairs__fairid__companies__identifier__get_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li><li><strong>identifier</strong>: <em>required (string)</em><p>Could be a companyId (int) or companySlug (string)</p></li></ul><h3>Query Parameters</h3><ul><li><strong>category</strong>: <em>required (string)</em><p>Category for the Company in Fair, could be ["Empleo", "Educacion"]</p></li><li><strong>preview</strong>: <em>(string - default: empty)</em><p>Show a column control with the pagination in the result, could be "active".</p></li></ul></div><div class="tab-pane" id="fairs__fairid__companies__identifier__get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>stand</strong>: <em>required (object)</em><p>Field "Stand".</p><p>Parameter [image][type] you accept only values ( image_monitor, image_totem, image_banderole_1, image_banderole_2, image_poster_1, image_poster_2, image_top, image_counter ).</p><ul></ul></li><li><strong>document_number</strong>: <em>required (string - maxLength: 11)</em><p>Field "RUC".</p></li><li><strong>category</strong>: <em>required (one of Empleo, Educacion)</em><p>Field "Rubro".</p></li><li><strong>trade_name</strong>: <em>required (string - minLength: 10 - maxLength: 100)</em><p>Field "Empresa".</p></li><li><strong>logo</strong>: <em>required (string - maxLength: 200)</em><p>Field "Logo".</p></li><li><strong>business_name</strong>: <em>required (string - minLength: 10 - maxLength: 100)</em><p>Field "Razón Social".</p></li><li><strong>longitude</strong>: <em>(number)</em><p>Field "Longitud".</p></li><li><strong>document</strong>: <em>required (array of )</em><p>Group of fields "Descargables".</p></li><li><strong>control</strong>: <em>required (object)</em><ul></ul></li><li><strong>social_media</strong>: <em>required (array of )</em><p>Group of fields "Redes Sociales".</p><p>Parameter [link] minLength and maxLength is 10 and 100.</p><p>Parameter [name] you accept only values (Facebook, Linkedin, Twitter, Youtube, Google+, Pinterest or Instagram).</p></li><li><strong>image_gallery</strong>: <em>required (array of )</em><p>Group of fields "Galería de Imágenes".</p></li><li><strong>latitude</strong>: <em>(number)</em><p>Field "Latitud".</p></li><li><strong>industry_id</strong>: <em>required (integer)</em><p>Field "Industria".</p></li><li><strong>profile</strong>: <em>required (array of )</em><p>Group of fields "Perfil Institucional".</p><p>Parameter [title] minLength and maxLength is 3 and 50.</p></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "document_number": "20414989277",
  "trade_name": "ATENTO DEL PERU",
  "business_name": "TELEATENTO DEL PERU S.A.C",
  "logo": "https://dev.cde.expo.aptitus.g3c.pe/logo/RTIUR546RT546REEyutsdds42DQA.jpg",
  "category": "Empleo",
  "industry_id": 1,
  "stand": {
    "type_id": 1,
    "model_id": 4,
    "amphitryon": 3,
    "colors": {
      "color_1": "#2abf2a",
      "color_2": "#0027ea"
    },
    "images": [
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "link": "https://cdn.expo.aptitus.com/images/5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_monitor"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "link": "https://cdn.expo.aptitus.com/images/5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_totem"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "link": "https://cdn.expo.aptitus.com/images/5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_banderole_1"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "link": "https://cdn.expo.aptitus.com/images/5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_banderole_2"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "link": "https://cdn.expo.aptitus.com/images/5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_top"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "link": "https://cdn.expo.aptitus.com/images/5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_counter"
      }
    ],
    "video": "https://www.youtube.com/watch?v=5o_nExedezw"
  },
  "profile": [
    {
      "title": "Misión",
      "description": "Misión de nuestra empresa en llevar a cabo..."
    },
    {
      "title": "Nuestros Productos",
      "description": "Nuestros productos respetan los estándares más altos de calidad ISO 9000..."
    }
  ],
  "social_media": [
    {
      "link": "https://www.facebook.com/zuck",
      "name": "Facebook"
    },
    {
      "link": "https://www.youtube.com/watch?v=5o_nExedezw",
      "name": "Youtube"
    }
  ],
  "image_gallery": [
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
      "link": "https://cdn.expo.aptitus.com/images/5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    },
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
      "link": "https://cdn.expo.aptitus.com/images/5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    }
  ],
  "document": [
    {
      "title": "Brochure 2017",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx",
      "link": "https://cdn.expo.aptitus.com/images/5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx"
    },
    {
      "title": "Perfil Institucional",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls",
      "link": "https://cdn.expo.aptitus.com/images/5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls"
    }
  ],
  "control": {
    "next": {
      "id": 2,
      "name": "BANCO HIPOTECARIO",
      "slug": "banco-hipotecario2",
      "image": "fair-920c93f7f8696ee196352f29a28b0db3.png",
      "category": "Empleo",
      "document_number": "20100041872",
      "model": "Modelo 3",
      "stand": "ORO"
    },
    "previous": {
      "id": 63,
      "name": "Tuesta Crisanto, Maribel",
      "slug": "luis-mercado-medina",
      "image": "fair-27d130bb4ac0978d77399d57bfd221d3.jpg",
      "category": "Empleo",
      "document_number": "10230203267",
      "model": "Modelo 4",
      "stand": "ORO"
    }
  }
}</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/404" target="_blank">404</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>code</strong>: <em>required (integer)</em></li><li><strong>message</strong>: <em>required (string)</em></li></ul></div><div class="tab-pane" id="fairs__fairid__companies__identifier__get_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairs__fairid__companies__identifier__put"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_put">put <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/fairs/{fairId}/companies</span>/{identifier}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Update company information.</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairs__fairid__companies__identifier__put_request" data-toggle="tab">Request</a></li><li><a href="#fairs__fairid__companies__identifier__put_response" data-toggle="tab">Response</a></li><li><a href="#fairs__fairid__companies__identifier__put_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairs__fairid__companies__identifier__put_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li><li><strong>identifier</strong>: <em>required (string)</em><p>Could be a companyId (int) or companySlug (string)</p></li></ul><h3>Query Parameters</h3><ul><li><strong>category</strong>: <em>required (string)</em><p>Old Category of the Company in Fair, could be ["Empleo", "Educacion"]</p></li></ul><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>stand</strong>: <em>required (object)</em><p>Field "Stand".</p><p>Parameter [image][type] you accept only values ( image_monitor, image_totem, image_banderole_1, image_banderole_2, image_poster_1, image_poster_2, image_top, image_counter ).</p><p>Parameter [video] Only sent when the type of stand is gold or silver.</p><ul></ul></li><li><strong>document_number</strong>: <em>required (string - maxLength: 11)</em><p>Field "RUC".</p></li><li><strong>category</strong>: <em>required (one of Empleo, Educacion)</em><p>Field "Rubro".</p></li><li><strong>trade_name</strong>: <em>required (string - minLength: 10 - maxLength: 100)</em><p>Field "Empresa".</p></li><li><strong>logo</strong>: <em>required (string - maxLength: 200)</em><p>Field "Logo".</p></li><li><strong>business_name</strong>: <em>required (string - minLength: 10 - maxLength: 100)</em><p>Field "Razón Social".</p></li><li><strong>longitude</strong>: <em>(number)</em><p>Field "Longitud".</p></li><li><strong>document</strong>: <em>required (array of )</em><p>Group of fields "Descargables".</p></li><li><strong>industry_name</strong>: <em>required (string - minLength: 5 - maxLength: 100)</em><p>Field "Industria".</p></li><li><strong>social_media</strong>: <em>required (array of )</em><p>Group of fields "Redes Sociales".</p><p>Parameter [link] minLength and maxLength is 10 and 100.</p><p>Parameter [name] you accept only values (Facebook, Linkedin, Twitter, Youtube, Google+, Pinterest or Instagram).</p></li><li><strong>image_gallery</strong>: <em>required (array of )</em><p>Group of fields "Galería de Imágenes".</p></li><li><strong>latitude</strong>: <em>(number)</em><p>Field "Latitud".</p></li><li><strong>industry_id</strong>: <em>required (integer)</em><p>Field "Industria".</p></li><li><strong>profile</strong>: <em>required (array of )</em><p>Group of fields "Perfil Institucional".</p><p>Parameter [title] minLength and maxLength is 3 and 50.</p></li></ul><p><strong>Examples</strong>:</p><div class="examples"><p><strong>gold</strong>:<br></p><pre><code>{
  "document_number": "20414989277",
  "trade_name": "ATENTO DEL PERU",
  "business_name": "TELEATENTO DEL PERU S.A.C",
  "logo": "https://dev.cde.expo.aptitus.g3c.pe/logo/RTIUR546RT546REEyutsdds42DQA.jpg",
  "category": "Empleo",
  "industry_id": 1,
  "industry_name": "Call Center",
  "latitude": -12.064518,
  "longitude": 77.0401,
  "stand": {
    "type_id": 1,
    "model_id": 4,
    "amphitryon": 3,
    "colors": {
      "color_1": "#2abf2a",
      "color_2": "#0027ea"
    },
    "images": [
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_monitor"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_totem"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_banderole_1"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_banderole_2"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_top"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_counter"
      }
    ],
    "video": "https://www.youtube.com/watch?v=5o_nExedezw"
  },
  "profile": [
    {
      "title": "Misión",
      "description": "Misión de nuestra empresa en llevar a cabo..."
    },
    {
      "title": "Nuestros Productos",
      "description": "Nuestros productos respetan los estándares más altos de calidad ISO 9000..."
    }
  ],
  "social_media": [
    {
      "link": "https://www.facebook.com/zuck",
      "name": "Facebook"
    },
    {
      "link": "https://www.youtube.com/watch?v=5o_nExedezw",
      "name": "Youtube"
    }
  ],
  "image_gallery": [
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    },
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    }
  ],
  "document": [
    {
      "title": "Brochure 2017",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx"
    },
    {
      "title": "Perfil Institucional",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls"
    }
  ]
}</code></pre><p><strong>silver</strong>:<br></p><pre><code>{
  "document_number": "20414989277",
  "trade_name": "ATENTO DEL PERU",
  "business_name": "TELEATENTO DEL PERU S.A.C",
  "logo": "https://dev.cde.expo.aptitus.g3c.pe/logo/RTIUR546RT546REEyutsdds42DQA.jpg",
  "category": "Empleo",
  "industry_id": 1,
  "industry_name": "Call Center",
  "latitude": -12.132342,
  "longitude": -77.030275,
  "stand": {
    "type_id": 2,
    "model_id": 4,
    "amphitryon": 3,
    "colors": {
      "color_1": "#2abf2a",
      "color_2": "#0027ea"
    },
    "images": [
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_monitor"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_totem"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_poster_1"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_poster_2"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_top"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_counter"
      }
    ],
    "video": "https://www.youtube.com/watch?v=5o_nExedezw"
  },
  "profile": [
    {
      "title": "Misión",
      "description": "Misión de nuestra empresa en llevar a cabo..."
    },
    {
      "title": "Nuestros Productos",
      "description": "Nuestros productos respetan los estándares más altos de calidad ISO 9000..."
    }
  ],
  "social_media": [
    {
      "link": "https://www.facebook.com/zuck",
      "name": "Facebook"
    },
    {
      "link": "https://www.youtube.com/watch?v=5o_nExedezw",
      "name": "Youtube"
    }
  ],
  "image_gallery": [
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    },
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    }
  ],
  "document": [
    {
      "title": "Brochure 2017",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx"
    },
    {
      "title": "Perfil Institucional",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls"
    }
  ]
}</code></pre><p><strong>bronze</strong>:<br></p><pre><code>{
  "document_number": "20414989277",
  "trade_name": "ATENTO DEL PERU",
  "business_name": "TELEATENTO DEL PERU S.A.C",
  "logo": "https://dev.cde.expo.aptitus.g3c.pe/logo/RTIUR546RT546REEyutsdds42DQA.jpg",
  "category": "Empleo",
  "industry_id": 1,
  "industry_name": "Call Center",
  "latitude": -12.070951,
  "longitude": -77.03403,
  "stand": {
    "type_id": 3,
    "model_id": 4,
    "amphitryon": 3,
    "colors": {
      "color_1": "#2abf2a",
      "color_2": "#0027ea"
    },
    "images": [
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_monitor"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_banderole_1"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_poster_1"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_top"
      },
      {
        "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png",
        "type": "image_counter"
      }
    ]
  },
  "profile": [
    {
      "title": "Misión",
      "description": "Misión de nuestra empresa en llevar a cabo..."
    },
    {
      "title": "Nuestros Productos",
      "description": "Nuestros productos respetan los estándares más altos de calidad ISO 9000..."
    }
  ],
  "social_media": [
    {
      "link": "https://www.facebook.com/zuck",
      "name": "Facebook"
    },
    {
      "link": "https://www.youtube.com/watch?v=5o_nExedezw",
      "name": "Youtube"
    }
  ],
  "image_gallery": [
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    },
    {
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.png"
    }
  ],
  "document": [
    {
      "title": "Brochure 2017",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx"
    },
    {
      "title": "Perfil Institucional",
      "name": "5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls"
    }
  ]
}</code></pre></div></div><div class="tab-pane" id="fairs__fairid__companies__identifier__put_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>message</strong>: <em>required (string)</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se actualizó la empresa correctamente."
}
</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/404" target="_blank">404</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>code</strong>: <em>required (integer)</em></li><li><strong>message</strong>: <em>required (string)</em></li></ul></div><div class="tab-pane" id="fairs__fairid__companies__identifier__put_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairs__fairid__companies__identifier__delete"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_delete">delete <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/fairs/{fairId}/companies</span>/{identifier}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Delete a Company</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairs__fairid__companies__identifier__delete_request" data-toggle="tab">Request</a></li><li><a href="#fairs__fairid__companies__identifier__delete_response" data-toggle="tab">Response</a></li><li><a href="#fairs__fairid__companies__identifier__delete_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairs__fairid__companies__identifier__delete_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li><li><strong>identifier</strong>: <em>required (string)</em><p>Could be a companyId (int) or companySlug (string)</p></li></ul><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>category</strong>: <em>required (one of Empleo, Educacion)</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "category": "Empleo"
}</code></pre></div></div><div class="tab-pane" id="fairs__fairid__companies__identifier__delete_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>message</strong>: <em>required (string)</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se eliminó la empresa satisfactoriamente."
}</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/404" target="_blank">404</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>code</strong>: <em>required (integer)</em></li><li><strong>message</strong>: <em>required (string)</em></li></ul></div><div class="tab-pane" id="fairs__fairid__companies__identifier__delete_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div></div><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_fairs__fairid__feed__page_"><span class="parent">/fairs/{fairId}</span>/feed/{page}</a> <span class="methods"><a href="#fairs__fairid__feed__page__post"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_fairs__fairid__feed__page_" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#fairs__fairid__feed__page__post'" class="list-group-item"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Generate and upload jobs feed file to S3</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="fairs__fairid__feed__page__post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/fairs/{fairId}</span>/feed/{page}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Generate and upload jobs feed file to S3</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#fairs__fairid__feed__page__post_request" data-toggle="tab">Request</a></li><li><a href="#fairs__fairid__feed__page__post_response" data-toggle="tab">Response</a></li><li><a href="#fairs__fairid__feed__page__post_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="fairs__fairid__feed__page__post_request"><h3>URI Parameters</h3><ul><li><strong>fairId</strong>: <em>required (string)</em></li><li><strong>page</strong>: <em>required (one of facebook, google)</em></li></ul></div><div class="tab-pane" id="fairs__fairid__feed__page__post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se generó el feed facebook correctamente.",
  "url": "https://dev.cde.expo.aptitus.g3c.pe/fair/csv/fair-feed-facebook-2018-05-17.csv"
}
</code></pre></div></div><div class="tab-pane" id="fairs__fairid__feed__page__post_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="upload_file__type_" class="panel-title">/upload-file/{type}</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_upload_file__type_"><span class="parent"></span>/upload-file/{type}</a> <span class="methods"><a href="#upload_file__type__post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_upload_file__type_" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#upload_file__type__post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Upload file a S3. Maximum allowed size is 8MB.</p><p>Use the "multipart-form/data" content type to upload a file which content will become the file.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="upload_file__type__post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent"></span>/upload-file/{type}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Upload file a S3. Maximum allowed size is 8MB.</p><p>Use the "multipart-form/data" content type to upload a file which content will become the file.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#upload_file__type__post_request" data-toggle="tab">Request</a></li><li><a href="#upload_file__type__post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="upload_file__type__post_request"><h3>URI Parameters</h3><ul><li><strong>type</strong>: <em>required (string)</em><p>Type of file to upload. Values allowed are "image" and "document".</p></li></ul><h3>Body</h3><p><strong>Media type</strong>: multipart/form-data</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>file</strong>: <em>required (file)</em><p>The file to be uploaded.</p></li><li><strong>folder</strong>: <em>required (string)</em><p>Folder to be uploaded.</p></li></ul></div><div class="tab-pane" id="upload_file__type__post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>message</strong>: <em>required (string)</em></li><li><strong>name</strong>: <em>required (string)</em><p>Name of file saved in S3.</p></li><li><strong>link</strong>: <em>required (string)</em></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Archivo subido correctamente.",
  "name": "fair-fdcb6432310998d42e929cd24f542a27.jpg",
  "link": "https://dev.cde.expo.aptitus.g3c.pe/totem/fair-fdcb6432310998d42e929cd24f542a27.jpg"
}</code></pre></div></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="stand_models__modelid_" class="panel-title">/stand-models/{modelId}</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_stand_models__modelid_"><span class="parent"></span>/stand-models/{modelId}</a> <span class="methods"><a href="#stand_models__modelid__get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_stand_models__modelid_" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#stand_models__modelid__get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Returns the rules by model of stand to use in frontend views.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="stand_models__modelid__get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/stand-models/{modelId}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Returns the rules by model of stand to use in frontend views.</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#stand_models__modelid__get_request" data-toggle="tab">Request</a></li><li><a href="#stand_models__modelid__get_response" data-toggle="tab">Response</a></li><li><a href="#stand_models__modelid__get_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="stand_models__modelid__get_request"><h3>URI Parameters</h3><ul><li><strong>modelId</strong>: <em>required (integer)</em><p>Model of stand.</p></li></ul></div><div class="tab-pane" id="stand_models__modelid__get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>message</strong>: <em>required (string)</em></li><li><strong>data</strong>: <em>required (object)</em><p>Rules: positions, sizes, images, colors and view orders by model of stand.</p><ul></ul></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se obtuvo la información del modelo de stand correctamente.",
  "data": {
    "imageStandsSize": 8,
    "height": 454,
    "width": 850,
    "drawOrder": [
      {
        "type": "image",
        "alias": "imageBase"
      },
      {
        "type": "image",
        "alias": "amphitryon"
      },
      {
        "type": "rectangle",
        "alias": "top"
      },
      {
        "type": "image",
        "alias": "logo_top"
      },
      {
        "type": "image",
        "alias": "poster_1"
      },
      {
        "type": "image",
        "alias": "poster_2"
      },
      {
        "type": "image",
        "alias": "monitor"
      },
      {
        "type": "image",
        "alias": "counter"
      },
      {
        "type": "image",
        "alias": "totem"
      }
    ],
    "imageStands": {
      "imageBase": {
        "source": "http://localhost:4200/assets/img/stands/plata1_full.png",
        "position_x": 0,
        "position_y": 0,
        "size_width": 1,
        "size_height": 1
      },
      "amphitryon": {
        "source": "",
        "position_x": 487,
        "position_y": 125,
        "size_width": 0.09,
        "size_height": 0.65
      },
      "logo_top": {
        "source": "http://localhost:4200/assets/img/tmp/image_logo_top.jpg",
        "position_x": 126,
        "position_y": 43.5,
        "size_width": 0.705,
        "size_height": 0.11
      },
      "poster_1": {
        "source": "http://localhost:4200/assets/img/tmp/image_poster_1.jpg",
        "position_x": 37.5,
        "position_y": 173,
        "size_width": 0.111,
        "size_height": 0.19
      },
      "poster_2": {
        "source": "http://localhost:4200/assets/img/tmp/image_poster_1.jpg",
        "position_x": 37.5,
        "position_y": 279,
        "size_width": 0.111,
        "size_height": 0.19
      },
      "monitor": {
        "source": "http://localhost:4200/assets/img/tmp/image_monitor.jpg",
        "position_x": 184.5,
        "position_y": 144,
        "size_width": 0.236,
        "size_height": 0.265
      },
      "counter": {
        "source": "http://localhost:4200/assets/img/tmp/image_counter.jpg",
        "position_x": 478.4,
        "position_y": 318.5,
        "size_width": 0.142,
        "size_height": 0.164
      },
      "totem": {
        "source": "http://localhost:4200/assets/img/tmp/image_totem.jpg",
        "position_x": 736,
        "position_y": 244,
        "size_width": 0.107,
        "size_height": 0.396
      }
    },
    "pathsStands": {
      "top": {
        "width": 787.5,
        "height": 96.8,
        "posX": 146,
        "posY": 39,
        "color": "rgba(122,24,10,1)",
        "type": "color_1"
      }
    }
  }
}</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/404" target="_blank">404</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>code</strong>: <em>required (integer)</em></li><li><strong>message</strong>: <em>required (string)</em></li></ul></div><div class="tab-pane" id="stand_models__modelid__get_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="stand_amphitryons__amphitryonid_" class="panel-title">/stand-amphitryons/{amphitryonId}</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_stand_amphitryons__amphitryonid_"><span class="parent"></span>/stand-amphitryons/{amphitryonId}</a> <span class="methods"><a href="#stand_amphitryons__amphitryonid__get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_stand_amphitryons__amphitryonid_" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#stand_amphitryons__amphitryonid__get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Returns the stand amphitryon data to use in frontend views.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="stand_amphitryons__amphitryonid__get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/stand-amphitryons/{amphitryonId}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Returns the stand amphitryon data to use in frontend views.</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#stand_amphitryons__amphitryonid__get_request" data-toggle="tab">Request</a></li><li><a href="#stand_amphitryons__amphitryonid__get_response" data-toggle="tab">Response</a></li><li><a href="#stand_amphitryons__amphitryonid__get_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="stand_amphitryons__amphitryonid__get_request"><h3>URI Parameters</h3><ul><li><strong>amphitryonId</strong>: <em>required (integer)</em><p>Amphitryon of stand.</p></li></ul></div><div class="tab-pane" id="stand_amphitryons__amphitryonid__get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>message</strong>: <em>required (string)</em></li><li><strong>data</strong>: <em>required (object)</em><p>Image of amphitryon of stand.</p><ul></ul></li></ul><p><strong>Example</strong>:</p><div class="examples"><pre><code>{
  "message": "Se obtuvo la información del anfitrión correctamente.",
  "data": {
    "image": "https://dev.cds.expo.aptitus.g3c.pe/anfitriona1.png"
  }
}</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/404" target="_blank">404</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>code</strong>: <em>required (integer)</em></li><li><strong>message</strong>: <em>required (string)</em></li></ul></div><div class="tab-pane" id="stand_amphitryons__amphitryonid__get_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="stand_types__typeid_" class="panel-title">/stand-types/{typeId}</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white resource-modal"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_stand_types__typeid_"><span class="parent"></span>/stand-types/{typeId}</a> <span class="methods"><a href="#stand_types__typeid__get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_stand_types__typeid_" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#stand_types__typeid__get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Returns the model and amphitryon data, and the rules to validate according to the type of stand.</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="stand_types__typeid__get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/stand-types/{typeId}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Returns the model and amphitryon data, and the rules to validate according to the type of stand.</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by <b>api_token</b><p>It is required to send the token header for the connection with the API.</p></div><ul class="nav nav-tabs"><li class="active"><a href="#stand_types__typeid__get_request" data-toggle="tab">Request</a></li><li><a href="#stand_types__typeid__get_response" data-toggle="tab">Response</a></li><li><a href="#stand_types__typeid__get_securedby" data-toggle="tab">Security</a></li></ul><div class="tab-content"><div class="tab-pane active" id="stand_types__typeid__get_request"><h3>URI Parameters</h3><ul><li><strong>typeId</strong>: <em>required (integer)</em><p>Type of stand.</p></li></ul></div><div class="tab-pane" id="stand_types__typeid__get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>message</strong>: <em>required (string)</em></li><li><strong>data</strong>: <em>required (object)</em><p>Data of dependences and rules by type of stand.</p><p>Key [list] - Data of model and amphitryon.</p><p>Key [rules] - Rules of videos, images and colors, etc.</p><ul></ul></li></ul><p><strong>Examples</strong>:</p><div class="examples"><p><strong>1_gold</strong>:<br></p><pre><code>{
  "message": "Depedencias y reglas listadas correctamente.",
  "data": {
    "list": {
      "models": [
        {
          "id": 1,
          "value": "Modelo 1"
        },
        {
          "id": 2,
          "value": "Modelo 2"
        },
        {
          "id": 3,
          "value": "Modelo 3"
        },
        {
          "id": 4,
          "value": "Modelo 4"
        },
        {
          "id": 5,
          "value": "Modelo 5"
        }
      ],
      "amphitryons": [
        {
          "id": 1,
          "value": "Anfitriona 1"
        },
        {
          "id": 2,
          "value": "Anfitriona 2"
        },
        {
          "id": 3,
          "value": "Anfitriona 3"
        },
        {
          "id": 4,
          "value": "Anfitriona 4"
        },
        {
          "id": 5,
          "value": "Anfitriona 5"
        },
        {
          "id": 6,
          "value": "Anfitriona 6"
        },
        {
          "id": 7,
          "value": "Anfitriona 7"
        },
        {
          "id": 8,
          "value": "Anfitriona 8"
        }
      ]
    },
    "rules": [
      {
        "image_monitor": {
          "required": true
        }
      },
      {
        "image_totem": {
          "required": true
        }
      },
      {
        "image_banderole_1": {
          "required": true
        }
      },
      {
        "image_banderole_2": {
          "required": true
        }
      },
      {
        "image_top": {
          "required": true
        }
      },
      {
        "image_counter": {
          "required": true
        }
      },
      {
        "color_1": {
          "required": true
        }
      },
      {
        "color_2": {
          "required": true
        }
      },
      {
        "amphitryon": {
          "required": true
        }
      },
      {
        "video": {
          "required": false
        }
      }
    ]
  }
}</code></pre><p><strong>2_silver</strong>:<br></p><pre><code>{
  "message": "Depedencias y reglas listadas correctamente.",
  "data": {
    "list": {
      "models": [
        {
          "id": 6,
          "value": "Modelo 6"
        },
        {
          "id": 7,
          "value": "Modelo 7"
        },
        {
          "id": 8,
          "value": "Modelo 8"
        }
      ],
      "amphitryons": [
        {
          "id": 1,
          "value": "Anfitriona 1"
        },
        {
          "id": 2,
          "value": "Anfitriona 2"
        },
        {
          "id": 3,
          "value": "Anfitriona 3"
        },
        {
          "id": 4,
          "value": "Anfitriona 4"
        },
        {
          "id": 5,
          "value": "Anfitriona 5"
        },
        {
          "id": 6,
          "value": "Anfitriona 6"
        },
        {
          "id": 7,
          "value": "Anfitriona 7"
        },
        {
          "id": 8,
          "value": "Anfitriona 8"
        }
      ]
    },
    "rules": [
      {
        "image_monitor": {
          "required": true
        }
      },
      {
        "image_totem": {
          "required": true
        }
      },
      {
        "image_poster_1": {
          "required": true
        }
      },
      {
        "image_top": {
          "required": true
        }
      },
      {
        "image_counter": {
          "required": true
        }
      },
      {
        "color_1": {
          "required": true
        }
      },
      {
        "color_2": {
          "required": true
        }
      },
      {
        "amphitryon": {
          "required": true
        }
      },
      {
        "video": {
          "required": false
        }
      }
    ]
  }
}</code></pre><p><strong>3_bronze</strong>:<br></p><pre><code>{
  "message": "Depedencias y reglas listadas correctamente.",
  "data": {
    "list": {
      "models": [
        {
          "id": 9,
          "value": "Modelo 9"
        }
      ],
      "amphitryons": [
        {
          "id": 1,
          "value": "Anfitriona 1"
        },
        {
          "id": 2,
          "value": "Anfitriona 2"
        },
        {
          "id": 3,
          "value": "Anfitriona 3"
        },
        {
          "id": 4,
          "value": "Anfitriona 4"
        },
        {
          "id": 5,
          "value": "Anfitriona 5"
        },
        {
          "id": 6,
          "value": "Anfitriona 6"
        },
        {
          "id": 7,
          "value": "Anfitriona 7"
        },
        {
          "id": 8,
          "value": "Anfitriona 8"
        }
      ]
    },
    "rules": [
      {
        "image_monitor": {
          "required": true
        }
      },
      {
        "image_banderole_1": {
          "required": true
        }
      },
      {
        "image_poster_1": {
          "required": true
        }
      },
      {
        "image_top": {
          "required": true
        }
      },
      {
        "image_counter": {
          "required": true
        }
      },
      {
        "color_1": {
          "required": true
        }
      },
      {
        "color_2": {
          "required": true
        }
      },
      {
        "amphitryon": {
          "required": true
        }
      }
    ]
  }
}</code></pre></div><h2>HTTP status code <a href="http://httpstatus.es/404" target="_blank">404</a></h2><h3>Body</h3><p><strong>Media type</strong>: application/json</p><p><strong>Type</strong>: object</p><strong>Properties</strong><ul><li><strong>code</strong>: <em>required (integer)</em></li><li><strong>message</strong>: <em>required (string)</em></li></ul></div><div class="tab-pane" id="stand_types__typeid__get_securedby"><h1>Secured by api_token</h1><h3>Headers</h3><ul><li><strong>token</strong>: <em>required (string)</em></li></ul></div></div></div></div></div></div></div></div></div></div></div><div class="col-md-3"><div id="sidebar" class="hidden-print affix" role="complementary"><ul class="nav nav-pills nav-stacked"><li><a href="#login">/login</a></li><li><a href="#fairid_">/{fairId}</a></li><li><a href="#fairs">/fairs</a></li><li><a href="#upload_file__type_">/upload-file/{type}</a></li><li><a href="#stand_models__modelid_">/stand-models/{modelId}</a></li><li><a href="#stand_amphitryons__amphitryonid_">/stand-amphitryons/{amphitryonId}</a></li><li><a href="#stand_types__typeid_">/stand-types/{typeId}</a></li></ul></div></div></div></div></body></html>