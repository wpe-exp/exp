module.exports = function(id, url) {
  if (!id) {
    return;
  }
  var pageURL = url ? url : location.href;
  pageURL = encodeURI(pageURL);
  url = 'http://urls.api.twitter.com/1/urls/count.json?url=' + location.href;
  console.log(url);
  $.ajax({
    url: url,
    dataType: 'jsonp',
    success: function(json) {
      var count;
      count = json.count ? json.count : 0;
      document.getElementById('tweet-count').innerHTML = count;
    }
  });
};
