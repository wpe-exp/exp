module.exports = function(id, url) {
  if (!id) {
    return;
  }
  var pageURL = url ? url : location.href;
  pageURL = encodeURI(pageURL);
  url = 'http://api.b.st-hatena.com/entry.count?url=' + location.href;
  console.log(url);
  $.ajax({
    url: url,
    dataType: 'jsonp',
    success: function(json) {
      var count;
      count = json.count ? json.count : 0;
      document.getElementById('hatebu-count').innerHTML = count;

      if(typeof(count) == 'undefined'){
        count = 0;
      }

    }
  });
};
