<!doctype html>
<html>
    <head>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>
    (function(w,d,s,g,js,fs){
      g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
      js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
      js.src='https://apis.google.com/js/platform.js';
      fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
    }(window,document,'script'));
    </script>
  </head>
<body style="background-color:#b2b4b7;">
@include('layouts.navbar')

  <hr size="10px" noshade>
  <div id="embed-api-auth-container" style="display: none;"></div>
  <div id="chart-1-container"></div>
  <hr size="10px" noshade>
  <div id="chart-2-container" style="float: left; margin-left: 20%"></div>
  <div id="chart-3-container" style="float: right; margin-right: 20%"></div>
  <div id="view-selector-1-container" style="display: none;"></div>
  <div id="view-selector-2-container" style="display: none;"></div>
  <div id="view-selector-3-container" style="display: none;"></div>
</body>
<script>

gapi.analytics.ready(function() {

  /**
   * Authorize the user immediately if the user has already granted access.
   * If no access has been created, render an authorize button inside the
   * element with the ID "embed-api-auth-container".
   */
  gapi.analytics.auth.authorize({
    container: 'embed-api-auth-container',
    clientid: '857647485425-55a218bhbr00v6a9vj4urmi2vs8qpf6i.apps.googleusercontent.com'
  });


  /**
   * Create a new ViewSelector instance to be rendered inside of an
   * element with the id "view-selector-container".
   */
  var viewSelector1 = new gapi.analytics.ViewSelector({
    container: 'view-selector-1-container'
  });

  var viewSelector2 = new gapi.analytics.ViewSelector({
    container: 'view-selector-1-container'
  });

  var viewSelector3 = new gapi.analytics.ViewSelector({
    container: 'view-selector-3-container'
  });

  // Render the view selector to the page.
  viewSelector1.execute();
  viewSelector2.execute();
  viewSelector3.execute();


  /**
   * Create a new DataChart instance with the given query parameters
   * and Google chart options. It will be rendered inside an element
   * with the id "chart-container".
   */
  var dataChart1 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:pageviews, ga:uniquePageviews, ga:timeOnPage, ga:bounces, ga:entrances, ga:exits',
      dimensions: 'ga:pagePath',
      'start-date': 'yesterday',
      'end-date': 'today',
      sort: '-ga:pageviews',
    },
    chart: {
      container: 'chart-1-container',
      type: 'TABLE',
      options: {
        width: '100%'
      }
    }
  });

  var dataChart2 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:entrances',
      dimensions: 'ga:landingPagePath, ga:secondPagePath',
      'start-date': 'yesterday',
      'end-date': 'today',
      sort: '-ga:entrances',
    },
    chart: {
      container: 'chart-2-container',
      type: 'TABLE',
      options: {
        width: '100%'
      }
    }
  });

  var dataChart3 = new gapi.analytics.googleCharts.DataChart({
    query: {
      metrics: 'ga:exits',
      dimensions: 'ga:previousPagePath, ga:exitPagePath',
      'start-date': 'yesterday',
      'end-date': 'today',
      sort: '-ga:exits',
    },
    chart: {style="background-color:#b2b4b7;"
      container: 'chart-3-container',
      type: 'TABLE',
      options: {
        width: '100%'
      }
    }
  });

  /**
   * Render the dataChart on the page whenever a new view is selected.
   */
  viewSelector1.on('change', function(ids) {
    dataChart1.set({query: {ids: ids}}).execute();
  });

  viewSelector2.on('change', function(ids) {
    dataChart2.set({query: {ids: ids}}).execute();
  });

  viewSelector3.on('change', function(ids) {
    dataChart3.set({query: {ids: ids}}).execute();
  });

});
</script>
